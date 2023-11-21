<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Http\Requests\{StoreBusinessRequest, UpdateBusinessRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:business view')->only('index', 'show');
        $this->middleware('permission:business create')->only('create', 'store');
        $this->middleware('permission:business edit')->only('edit', 'update');
        $this->middleware('permission:business delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $businesses = Business::query();

            return Datatables::of($businesses)
                ->addColumn('keterangan', function($row){
                    return str($row->keterangan)->limit(100);
                })
				
                ->addColumn('photo', function ($row) {
                    if ($row->photo == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/photos/' . $row->photo);
                })

                ->addColumn('action', 'businesses.include.action')
                ->toJson();
        }

        return view('businesses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('businesses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBusinessRequest $request)
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

        Business::create($attr);

        return redirect()
            ->route('businesses.index')
            ->with('success', __('The business was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        return view('businesses.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        return view('businesses.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business $business
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBusinessRequest $request, Business $business)
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
            if ($business->photo != null && file_exists($path . $business->photo)) {
                unlink($path . $business->photo);
            }

            $attr['photo'] = $filename;
        }

        $business->update($attr);

        return redirect()
            ->route('businesses.index')
            ->with('success', __('The business was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        try {
            $path = storage_path('app/public/uploads/photos/');

            if ($business->photo != null && file_exists($path . $business->photo)) {
                unlink($path . $business->photo);
            }

            $business->delete();

            return redirect()
                ->route('businesses.index')
                ->with('success', __('The business was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('businesses.index')
                ->with('error', __("The business can't be deleted because it's related to another table."));
        }
    }
}
