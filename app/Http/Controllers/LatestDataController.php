<?php

namespace App\Http\Controllers;

use App\Models\LatestData;
use App\Http\Requests\{StoreLatestDataRequest, UpdateLatestDataRequest};
use App\Models\Parsed;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use DateTime;

class LatestDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:latest data view')->only('index', 'show');
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
                })->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })->addColumn('action', 'latest-datas.include.action')
                ->toJson();
        }

        return view('latest-datas.index');
    }


    public function show(Request $request, LatestData $latestData)
    {

        $parsed_data = Parsed::where('device_id', $latestData->device_id);
        $start_dates = Carbon::now()->firstOfMonth();
        $end_dates = Carbon::now()->endOfMonth();
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');
        if (!empty($start_date)) {
            $start_dates = date("Y-m-d H:i:s", substr($start_date, 0, 10));
            $end_date = date("Y-m-d H:i:s", substr($end_date, 0, 10));
        }
        $parsed_data = $parsed_data->whereBetween('created_at', [$start_dates, $end_dates])
            ->orderBy('parseds.id', 'desc')->get();


        return view('latest-datas.show', [
            'parsed_data' => $parsed_data,
            'device_id' => $latestData->device_id,
        ]);
    }
}
