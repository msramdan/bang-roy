<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Gateway;

class ReportGatewayController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:report gateway view')->only('index', 'show');
    }

    public function index()
    {
        if (request()->ajax()) {
            $gateways = Gateway::query()->orderBy('id', 'DESC');

            return DataTables::of($gateways)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })->addColumn('status_online', function ($row) {
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
                ->addColumn('action', 'gateways.include.action')
                ->rawColumns(['status_online', 'action', 'gateways.include.action', 'pktfwd_status'])
                ->toJson();
        }
        $from = date('Y-m-d') . " 00:00:00";
        $to = date('Y-m-d') . " 23:59:59";
        $microFrom = strtotime($from) * 1000;
        $microTo = strtotime($to) * 1000;

        return view('report-gateways.index',[
            'microFrom' => $microFrom,
            'microTo' => $microTo,
        ]);
    }
}
