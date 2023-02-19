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
use Illuminate\Support\Facades\DB;

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
            $latestDatas = DB::table('latest_datas')
                ->join('devices', 'latest_datas.device_id', '=', 'devices.id')
                ->join('clusters', 'devices.cluster_id', '=', 'clusters.id')
                ->join('instances', 'devices.instance_id', '=', 'instances.id')
                ->select('latest_datas.*', 'devices.dev_eui', 'clusters.cluster_name', 'instances.instance_name')
                ->get();
            return DataTables::of($latestDatas)
                ->addIndexColumn()
                ->addColumn('cluster_name', function ($row) {
                    return $row->cluster_name;
                })
                ->addColumn('instance_name', function ($row) {
                    return $row->instance_name;
                })
                ->addColumn('device', function ($row) {
                    return $row->dev_eui;
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
                })
                ->addColumn('updated_at', function ($row) {
                    return Carbon::parse($row->updated_at)->format('d M Y H:i:s');
                })
                ->addColumn('time', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->addColumn('action', 'latest-datas.include.action')
                ->toJson();
        }

        return view('latest-datas.index');
    }


    public function show(Request $request, LatestData $latestData)
    {
        $from = date('Y-m-d') . " 00:00:00";
        $to = date('Y-m-d') . " 23:59:59";
        $microFrom = strtotime($from) * 1000;
        $microTo = strtotime($to) * 1000;
        $start_date = $request->query('start_date');
        if (!empty($start_date)) {
            $from = date("Y-m-d H:i:s", substr($request->query('start_date'), 0, 10));
            $to = date("Y-m-d H:i:s", substr($request->query('end_date'), 0, 10));
            $microFrom = $request->query('start_date');
            $microTo = $request->query('end_date');
        }
        $sql = "SELECT * FROM parseds where device_id='$latestData->device_id' and created_at >= '$from' AND created_at <= '$to' order By id asc";
        $parsed_data = DB::select($sql);
        $temperature_datas = [];
        $humidity_datas = [];
        $battery_datas = [];
        $parsed_dates = [];

        foreach ($parsed_data as $data) {
            $dates = strtotime($data->created_at);
            $battery = $data->battery;
            $temperature = $data->temperature;
            $humidity = $data->humidity;

            array_push($parsed_dates, $dates);
            array_push($battery_datas, $battery);
            array_push($temperature_datas, $temperature);
            array_push($humidity_datas, $humidity);
        }

        return view('latest-datas.show', [
            'parsed_data' => $parsed_data,
            'parsed_dates' => $parsed_dates,
            'device_id' => $latestData->device_id,
            'microFrom' => $microFrom,
            'microTo' => $microTo,
            'from' => $from,
            'to' => $to,
            'temperature_datas' => $temperature_datas,
            'humidity_datas' => $humidity_datas,
            'battery_datas' => $battery_datas,
        ]);
    }
}
