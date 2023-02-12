<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Http\Requests\{StoreMaintenanceRequest, UpdateMaintenanceRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class MaintenanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:maintenance view')->only('index', 'show');
        $this->middleware('permission:maintenance create')->only('create', 'store');
        $this->middleware('permission:maintenance edit')->only('edit', 'update');
        $this->middleware('permission:maintenance delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $maintenances = Maintenance::with('instance:id,instance_name', 'user:id,name');

            return DataTables::of($maintenances)
                ->addIndexColumn()
                ->addColumn('instance', function ($row) {
                    return $row->instance ? $row->instance->instance_name : '';
                })->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '';
                })->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })->addColumn('action', 'maintenances.include.action')
                ->toJson();
        }

        return view('maintenances.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenances.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMaintenanceRequest $request)
    {

        Maintenance::create($request->validated());
        Alert::toast('The maintenance was created successfully.', 'success');
        return redirect()->route('maintenances.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        $maintenance->load('instance:id,app_id', 'user:id,name',);

        return view('maintenances.show', compact('maintenance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        $maintenance->load('instance:id,app_id', 'user:id,name',);

        return view('maintenances.edit', compact('maintenance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMaintenanceRequest $request, Maintenance $maintenance)
    {

        $maintenance->update($request->validated());
        Alert::toast('The maintenance was updated successfully.', 'success');
        return redirect()
            ->route('maintenances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        try {
            $maintenance->delete();
            Alert::toast('The maintenance was deleted successfully.', 'success');
            return redirect()->route('maintenances.index');
        } catch (\Throwable $th) {
            Alert::toast('The maintenance cant be deleted because its related to another table.', 'error');
            return redirect()->route('maintenances.index');
        }
    }
}
