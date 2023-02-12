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
            $gateways = Gateway::query();

            return DataTables::of($gateways)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })
                ->addColumn('action', 'gateways.include.action')
                ->toJson();
        }

        return view('gateways.index');
    }
}
