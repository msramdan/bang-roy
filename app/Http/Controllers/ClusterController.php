<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Http\Requests\{StoreClusterRequest, UpdateClusterRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

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
            $clusters = Cluster::with('instance:id,instance_name');

            return DataTables::of($clusters)
                ->addIndexColumn()
                ->addColumn('instance', function ($row) {
                    return $row->instance ? $row->instance->instance_name : '';
                })->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
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

        Cluster::create($request->validated());
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

        return view('clusters.edit', compact('cluster'));
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
