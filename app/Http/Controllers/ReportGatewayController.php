<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\GatewayLog;
use App\Exports\ReportGatewayLogExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Gateway;


class ReportGatewayController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:report gateway view')->only('index', 'show');
    }

    public function index(Request $request)
    {
        if (request()->ajax()) {
            $gateways = GatewayLog::query();
            $gwid = intval($request->query('gwid'));
            $start_date = intval($request->query('start_date'));
            $end_date = intval($request->query('end_date'));

            if (isset($gwid) && !empty($gwid)) {
                if($gwid !='All'){
                    $gateways = $gateways->where('gateway_id',$gwid);
                }
            }
            if (isset($start_date) && !empty($start_date)) {
                $from = date("Y-m-d H:i:s", substr($request->query('start_date'), 0, 10));
                $gateways = $gateways->where('created_at', '>=', $from);
            }else{
                $from = date('Y-m-d') . " 00:00:00";
                $gateways = $gateways->where('created_at', '>=', $from);
            }
            if (isset($end_date) && !empty($end_date)) {
                $to = date("Y-m-d H:i:s", substr($request->query('end_date'), 0, 10));
                $gateways = $gateways->where('created_at', '<=', $to);
            }else{
                $to = date('Y-m-d') . " 23:59:59";
                $gateways = $gateways->where('created_at', '<=', $to);
            }

            $gateways = $gateways->orderBy('gateway_logs.id', 'desc')->get();
            return DataTables::of($gateways)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })
                ->addColumn('gwid', function ($row) {
                    return getGwid($row->gateway_id)->gwid;
                })
                ->addColumn('type', function ($row) {
                    return 'MQTT';
                })
                ->addColumn('status_online', function ($row) {
                    if ($row->status_online == 1) {
                        return '<button class="btn btn-pill btn-primary btn-air-primary btn-xs" type="button" title="btn btn-pill btn-primary btn-air-primary btn-xs">True</button>';
                    } else {
                        return
                            '<button class="btn btn-pill btn-danger btn-air-danger btn-xs" type="button" title="btn btn-pill btn-danger btn-air-danger btn-xs">False</button>';
                    }
                })->addColumn('pktfwd_status', function ($row) {
                    if ($row->pktfwd_status == 1) {
                        return '<button class="btn btn-pill btn-primary btn-air-primary btn-xs" type="button" title="btn btn-pill btn-primary btn-air-primary btn-xs">True</button>';
                    } else {
                        return
                            '<button class="btn btn-pill btn-danger btn-air-danger btn-xs" type="button" title="btn btn-pill btn-danger btn-air-danger btn-xs">False</button>';
                    }
                })
                ->rawColumns(['status_online', 'gateways.include.action', 'pktfwd_status'])
                ->toJson();
        }
        $from = date('Y-m-d') . " 00:00:00";
        $to = date('Y-m-d') . " 23:59:59";
        $microFrom = strtotime($from) * 1000;
        $microTo = strtotime($to) * 1000;

        return view('report-gateways.index',[
            'gateway' => Gateway::all(),
            'microFrom' => $microFrom,
            'microTo' => $microTo,
        ]);
    }

    public function export($gwid, $start_date, $end_date)
    {
        $date= date('d-m-Y');
        $nameFile = 'RM-Device Log-' .$date;
         return Excel::download(new ReportGatewayLogExport($gwid, $start_date, $end_date), $nameFile.'.xlsx');

    }
}
