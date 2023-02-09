<?php

namespace App\Http\Controllers;

use App\Models\Parsed;
use App\Http\Requests\{StoreParsedRequest, UpdateParsedRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class ParsedController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:parsed view')->only('index', 'show');
        $this->middleware('permission:parsed create')->only('create', 'store');
        $this->middleware('permission:parsed edit')->only('edit', 'update');
        $this->middleware('permission:parsed delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $parseds = Parsed::with('device:id,dev_eui', 'rawdata:id,dev_eui');

            return DataTables::of($parseds)
                ->addColumn('device', function ($row) {
                    return $row->device ? $row->device->dev_eui : '';
                })->addColumn('rawdata', function ($row) {
                    return $row->rawdata ? $row->rawdata->dev_eui : '';
                })->addColumn('action', 'parseds.include.action')
                ->toJson();
        }

        return view('parseds.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parseds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParsedRequest $request)
    {

        Parsed::create($request->validated());
        Alert::toast('The parsed was created successfully.', 'success');
        return redirect()->route('parseds.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parsed  $parsed
     * @return \Illuminate\Http\Response
     */
    public function show(Parsed $parsed)
    {
        $parsed->load('device:id,dev_eui', 'rawdata:id,dev_eui');

		return view('parseds.show', compact('parsed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parsed  $parsed
     * @return \Illuminate\Http\Response
     */
    public function edit(Parsed $parsed)
    {
        $parsed->load('device:id,dev_eui', 'rawdata:id,dev_eui');

		return view('parseds.edit', compact('parsed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parsed  $parsed
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParsedRequest $request, Parsed $parsed)
    {

        $parsed->update($request->validated());
        Alert::toast('The parsed was updated successfully.', 'success');
        return redirect()
            ->route('parseds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parsed  $parsed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parsed $parsed)
    {
        try {
            $parsed->delete();
            Alert::toast('The parsed was deleted successfully.', 'success');
            return redirect()->route('parseds.index');
        } catch (\Throwable $th) {
            Alert::toast('The parsed cant be deleted because its related to another table.', 'error');
            return redirect()->route('parseds.index');
        }
    }
}
