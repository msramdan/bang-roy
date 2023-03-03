<?php

namespace App\Http\Controllers;

use App\Models\Gateway;
use App\Http\Requests\{StoreGatewayRequest, UpdateGatewayRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class GatewayController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:gateway view')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
                ->addColumn('action', 'gateways.include.action')
                ->rawColumns(['status_online', 'action', 'gateways.include.action', 'pktfwd_status'])
                ->toJson();
        }

        return view('gateways.index');
    }
}
