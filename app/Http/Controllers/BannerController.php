<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Http\Requests\{StoreBannerRequest, UpdateBannerRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:banner view')->only('index', 'show');
        $this->middleware('permission:banner create')->only('create', 'store');
        $this->middleware('permission:banner edit')->only('edit', 'update');
        $this->middleware('permission:banner delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $banners = Banner::query();

            return Datatables::of($banners)
                ->addColumn('title', function($row){
                    return str($row->title)->limit(100);
                })
				->addColumn('deksripsi', function($row){
                    return str($row->deksripsi)->limit(100);
                })

                ->addColumn('banner', function ($row) {
                    if ($row->banner == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/banners/' . $row->banner);
                })

                ->addColumn('action', 'banners.include.action')
                ->toJson();
        }

        return view('banners.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $attr = $request->validated();

        if ($request->file('banner') && $request->file('banner')->isValid()) {

            $path = storage_path('app/public/uploads/banners/');
            $filename = $request->file('banner')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('banner')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            $attr['banner'] = $filename;
        }

        Banner::create($attr);
        Alert::toast('The banner was created successfully.', 'success');
        return redirect()
            ->route('banners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $attr = $request->validated();

        if ($request->file('banner') && $request->file('banner')->isValid()) {

            $path = storage_path('app/public/uploads/banners/');
            $filename = $request->file('banner')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('banner')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            // delete old banner from storage
            if ($banner->banner != null && file_exists($path . $banner->banner)) {
                unlink($path . $banner->banner);
            }

            $attr['banner'] = $filename;
        }

        $banner->update($attr);
        Alert::toast('The banner was updated successfully.', 'success');
        return redirect()
            ->route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        try {
            $path = storage_path('app/public/uploads/banners/');

            if ($banner->banner != null && file_exists($path . $banner->banner)) {
                unlink($path . $banner->banner);
            }

            $banner->delete();
            Alert::toast('The banner was deleted successfully.', 'success');
            return redirect()
                ->route('banners.index')
                ->with('success', __('The banner was deleted successfully.'));
        } catch (\Throwable $th) {
            Alert::toast('The banner cant be deleted because its related to another table.', 'error');
            return redirect()
                ->route('banners.index');
        }
    }
}
