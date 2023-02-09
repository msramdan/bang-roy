<?php

namespace App\Http\Controllers;

use App\Models\Subnet;
use App\Http\Requests\{StoreSubnetRequest, UpdateSubnetRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class SubnetController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subnet view')->only('index', 'show');
        $this->middleware('permission:subnet create')->only('create', 'store');
        $this->middleware('permission:subnet edit')->only('edit', 'update');
        $this->middleware('permission:subnet delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $subnets = Subnet::query();

            return DataTables::of($subnets)
                ->addColumn('action', 'subnets.include.action')
                ->toJson();
        }

        return view('subnets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subnets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubnetRequest $request)
    {
        
        Subnet::create($request->validated());
        Alert::toast('The subnet was created successfully.', 'success');
        return redirect()->route('subnets.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subnet  $subnet
     * @return \Illuminate\Http\Response
     */
    public function show(Subnet $subnet)
    {
        return view('subnets.show', compact('subnet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subnet  $subnet
     * @return \Illuminate\Http\Response
     */
    public function edit(Subnet $subnet)
    {
        return view('subnets.edit', compact('subnet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subnet  $subnet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubnetRequest $request, Subnet $subnet)
    {
        
        $subnet->update($request->validated());
        Alert::toast('The subnet was updated successfully.', 'success');
        return redirect()
            ->route('subnets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subnet  $subnet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subnet $subnet)
    {
        try {
            $subnet->delete();
            Alert::toast('The subnet was deleted successfully.', 'success');
            return redirect()->route('subnets.index');
        } catch (\Throwable $th) {
            Alert::toast('The subnet cant be deleted because its related to another table.', 'error');
            return redirect()->route('subnets.index');
        }
    }
}
