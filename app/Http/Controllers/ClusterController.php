<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Http\Requests\{StoreClusterRequest, UpdateClusterRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SettingToleranceAlert;


class ClusterController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:cluster view')->only('index', 'show');
        $this->middleware('permission:cluster create')->only('create', 'store');
        $this->middleware('permission:cluster edit')->only('edit', 'update');
        $this->middleware('permission:cluster delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $clusters = Cluster::with('instance:id,instance_name')->orderBy('id', 'DESC');

            return DataTables::of($clusters)
                ->addIndexColumn()
                ->addColumn('instance', function ($row) {
                    return $row->instance ? $row->instance->instance_name : '';
                })->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })->addColumn('action', 'clusters.include.action')
                ->toJson();
        }

        return view('clusters.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clusters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClusterRequest $request)
    {

        $cluster = Cluster::create($request->validated());

        // insert tolerance
        $field_data = $request->field_data;
        $min_tolerance = $request->min_tolerance;
        $max_tolerance = $request->max_tolerance;

        foreach ($field_data as $a => $field) {
            SettingToleranceAlert::create([
                'cluster_id' => $cluster->id,
                'field_data' => $field,
                'min_tolerance' => $min_tolerance[$a],
                'max_tolerance' => $max_tolerance[$a]
            ]);
        }

        Alert::toast('The cluster was created successfully.', 'success');
        return redirect()->route('clusters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function show(Cluster $cluster)
    {
        $cluster->load('instance:id,app_id');

        return view('clusters.show', compact('cluster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function edit(Cluster $cluster)
    {
        $cluster->load('instance:id,app_id');
        $tolerance = SettingToleranceAlert::where('cluster_id', $cluster->id)->orderBy('id', 'asc')->get();
        return view('clusters.edit', compact('cluster', 'tolerance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClusterRequest $request, Cluster $cluster)
    {

        $cluster->update($request->validated());

        $tolerance_id = $request->tolerance_id;
        $field_datas = $request->field_data;
        $min_tolerances = $request->min_tolerance;
        $max_tolerances = $request->max_tolerance;
        foreach ($tolerance_id as $a => $tolerance_id) {
            $device_tolerance = SettingToleranceAlert::where('cluster_id', $cluster->id)
                ->where('id', $tolerance_id)
                ->first();
            if ($device_tolerance) {
                $device_tolerance->update([
                    'field_data' => $field_datas[$a],
                    'min_tolerance' => $min_tolerances[$a],
                    'max_tolerance' => $max_tolerances[$a],
                ]);
            } else {
                $setting_tolerance = SettingToleranceAlert::create([
                    'cluster_id' => $cluster->id,
                    'field_data' => $field_datas[$a],
                    'min_tolerance' => $min_tolerances[$a],
                    'max_tolerance' => $max_tolerances[$a]
                ]);
            }
        }

        Alert::toast('The cluster was updated successfully.', 'success');
        return redirect()
            ->route('clusters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cluster $cluster)
    {
        try {
            $cluster->delete();
            Alert::toast('The cluster was deleted successfully.', 'success');
            return redirect()->route('clusters.index');
        } catch (\Throwable $th) {
            Alert::toast('The cluster cant be deleted because its related to another table.', 'error');
            return redirect()->route('clusters.index');
        }
    }
}
