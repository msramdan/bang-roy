<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Http\Requests\{StoreDeviceRequest, UpdateDeviceRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:device view')->only('index', 'show');
        $this->middleware('permission:device create')->only('create', 'store');
        $this->middleware('permission:device edit')->only('edit', 'update');
        $this->middleware('permission:device delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $devices = Device::with('subnet:id,subnet', 'instance:id,instance_name,app_id', 'cluster:id,cluster_name',);
            return DataTables::of($devices)
                ->addIndexColumn()
                ->addColumn('subnet', function ($row) {
                    return $row->subnet ? $row->subnet->subnet : '';
                })->addColumn('instance', function ($row) {
                    return $row->instance ? $row->instance->instance_name : '';
                })->addColumn('app_id', function ($row) {
                    return $row->instance ? $row->instance->app_id : '';
                })->addColumn('cluster', function ($row) {
                    return $row->cluster ? $row->cluster->cluster_name : '';
                })->addColumn('action', 'devices.include.action')
                ->toJson();
        }

        return view('devices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeviceRequest $request)
    {

        Device::create($request->validated());
        Alert::toast('The device was created successfully.', 'success');
        return redirect()->route('devices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        $device->load('subnet:id,subnet', 'instance:id,app_id', 'cluster:id,instance_id',);

        return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $device->load('subnet:id,subnet', 'instance:id,app_id', 'cluster:id,instance_id',);

        return view('devices.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeviceRequest $request, Device $device)
    {

        $device->update($request->validated());
        Alert::toast('The device was updated successfully.', 'success');
        return redirect()
            ->route('devices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        try {
            $device->delete();
            Alert::toast('The device was deleted successfully.', 'success');
            return redirect()->route('devices.index');
        } catch (\Throwable $th) {
            Alert::toast('The device cant be deleted because its related to another table.', 'error');
            return redirect()->route('devices.index');
        }
    }
}
