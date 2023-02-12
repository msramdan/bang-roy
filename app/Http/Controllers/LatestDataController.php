<?php

namespace App\Http\Controllers;

use App\Models\LatestData;
use App\Http\Requests\{StoreLatestDataRequest, UpdateLatestDataRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class LatestDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:latest data view')->only('index', 'show');
        $this->middleware('permission:latest data create')->only('create', 'store');
        $this->middleware('permission:latest data edit')->only('edit', 'update');
        $this->middleware('permission:latest data delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $latestDatas = LatestData::with('device:id,dev_eui', 'rawdata:id,dev_eui');

            return DataTables::of($latestDatas)
                ->addIndexColumn()
                ->addColumn('device', function ($row) {
                    return $row->device ? $row->device->dev_eui : '';
                })->addColumn('rawdata', function ($row) {
                    return $row->rawdata ? $row->rawdata->dev_eui : '';
                })->addColumn('temperature', function ($row) {
                    return $row->temperature . ' C';
                })->addColumn('humidity', function ($row) {
                    return $row->humidity . ' %';
                })->addColumn('battery', function ($row) {
                    return $row->battery . ' V';
                })->addColumn('period', function ($row) {
                    return $row->period . ' Second';
                })->addColumn('rssi', function ($row) {
                    return $row->rssi . ' dBm';
                })->addColumn('snr', function ($row) {
                    return $row->snr . ' dB';
                })->addColumn('action', 'latest-datas.include.action')
                ->toJson();
        }

        return view('latest-datas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('latest-datas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLatestDataRequest $request)
    {

        LatestData::create($request->validated());
        Alert::toast('The latestData was created successfully.', 'success');
        return redirect()->route('latest-datas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LatestData  $latestData
     * @return \Illuminate\Http\Response
     */
    public function show(LatestData $latestData)
    {
        $latestData->load('device:id,dev_eui', 'rawdata:id,dev_eui');

        return view('latest-datas.show', compact('latestData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LatestData  $latestData
     * @return \Illuminate\Http\Response
     */
    public function edit(LatestData $latestData)
    {
        $latestData->load('device:id,dev_eui', 'rawdata:id,dev_eui');

        return view('latest-datas.edit', compact('latestData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LatestData  $latestData
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLatestDataRequest $request, LatestData $latestData)
    {

        $latestData->update($request->validated());
        Alert::toast('The latestData was updated successfully.', 'success');
        return redirect()
            ->route('latest-datas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LatestData  $latestData
     * @return \Illuminate\Http\Response
     */
    public function destroy(LatestData $latestData)
    {
        try {
            $latestData->delete();
            Alert::toast('The latestData was deleted successfully.', 'success');
            return redirect()->route('latest-datas.index');
        } catch (\Throwable $th) {
            Alert::toast('The latestData cant be deleted because its related to another table.', 'error');
            return redirect()->route('latest-datas.index');
        }
    }
}
