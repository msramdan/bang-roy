<?php

namespace App\Http\Controllers;

use App\Models\Instance;
use App\Http\Requests\{StoreInstanceRequest, UpdateInstanceRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class InstanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:instance view')->only('index', 'show');
        $this->middleware('permission:instance create')->only('create', 'store');
        $this->middleware('permission:instance edit')->only('edit', 'update');
        $this->middleware('permission:instance delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $instances = Instance::with('province:id,provinsi', 'kabkot:id,provinsi_id', 'kecamatan:id,kabkot_id', 'kelurahan:id,kecamatan_id', );

            return DataTables::of($instances)
                ->addColumn('address', function($row){
                    return str($row->address)->limit(100);
                })
				->addColumn('province', function ($row) {
                    return $row->province ? $row->province->provinsi : '';
                })->addColumn('kabkot', function ($row) {
                    return $row->kabkot ? $row->kabkot->provinsi_id : '';
                })->addColumn('kecamatan', function ($row) {
                    return $row->kecamatan ? $row->kecamatan->kabkot_id : '';
                })->addColumn('kelurahan', function ($row) {
                    return $row->kelurahan ? $row->kelurahan->kecamatan_id : '';
                })->addColumn('action', 'instances.include.action')
                ->toJson();
        }

        return view('instances.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instances.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstanceRequest $request)
    {
        
        Instance::create($request->validated());
        Alert::toast('The instance was created successfully.', 'success');
        return redirect()->route('instances.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function show(Instance $instance)
    {
        $instance->load('province:id,provinsi', 'kabkot:id,provinsi_id', 'kecamatan:id,kabkot_id', 'kelurahan:id,kecamatan_id', );

		return view('instances.show', compact('instance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function edit(Instance $instance)
    {
        $instance->load('province:id,provinsi', 'kabkot:id,provinsi_id', 'kecamatan:id,kabkot_id', 'kelurahan:id,kecamatan_id', );

		return view('instances.edit', compact('instance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstanceRequest $request, Instance $instance)
    {
        
        $instance->update($request->validated());
        Alert::toast('The instance was updated successfully.', 'success');
        return redirect()
            ->route('instances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instance $instance)
    {
        try {
            $instance->delete();
            Alert::toast('The instance was deleted successfully.', 'success');
            return redirect()->route('instances.index');
        } catch (\Throwable $th) {
            Alert::toast('The instance cant be deleted because its related to another table.', 'error');
            return redirect()->route('instances.index');
        }
    }
}
