<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use App\Http\Requests\{StoreTestimonyRequest, UpdateTestimonyRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class TestimonyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:testimony view')->only('index', 'show');
        $this->middleware('permission:testimony create')->only('create', 'store');
        $this->middleware('permission:testimony edit')->only('edit', 'update');
        $this->middleware('permission:testimony delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $testimonies = Testimony::query();

            return Datatables::of($testimonies)
                ->addColumn('deskripsi_testimony', function($row){
                    return str($row->deskripsi_testimony)->limit(100);
                })
				
                ->addColumn('photo', function ($row) {
                    if ($row->photo == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/photos/' . $row->photo);
                })

                ->addColumn('action', 'testimonies.include.action')
                ->toJson();
        }

        return view('testimonies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimonies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonyRequest $request)
    {
        $attr = $request->validated();
        
        if ($request->file('photo') && $request->file('photo')->isValid()) {

            $path = storage_path('app/public/uploads/photos/');
            $filename = $request->file('photo')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('photo')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            $attr['photo'] = $filename;
        }

        Testimony::create($attr);

        return redirect()
            ->route('testimonies.index')
            ->with('success', __('The testimony was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimony $testimony
     * @return \Illuminate\Http\Response
     */
    public function show(Testimony $testimony)
    {
        return view('testimonies.show', compact('testimony'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimony $testimony
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimony $testimony)
    {
        return view('testimonies.edit', compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimony $testimony
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonyRequest $request, Testimony $testimony)
    {
        $attr = $request->validated();
        
        if ($request->file('photo') && $request->file('photo')->isValid()) {

            $path = storage_path('app/public/uploads/photos/');
            $filename = $request->file('photo')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('photo')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            // delete old photo from storage
            if ($testimony->photo != null && file_exists($path . $testimony->photo)) {
                unlink($path . $testimony->photo);
            }

            $attr['photo'] = $filename;
        }

        $testimony->update($attr);

        return redirect()
            ->route('testimonies.index')
            ->with('success', __('The testimony was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimony $testimony
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimony $testimony)
    {
        try {
            $path = storage_path('app/public/uploads/photos/');

            if ($testimony->photo != null && file_exists($path . $testimony->photo)) {
                unlink($path . $testimony->photo);
            }

            $testimony->delete();

            return redirect()
                ->route('testimonies.index')
                ->with('success', __('The testimony was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('testimonies.index')
                ->with('error', __("The testimony can't be deleted because it's related to another table."));
        }
    }
}
