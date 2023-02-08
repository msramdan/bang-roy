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
        $this->middleware('permission:gateway view')->only('index', 'show');
        $this->middleware('permission:gateway create')->only('create', 'store');
        $this->middleware('permission:gateway edit')->only('edit', 'update');
        $this->middleware('permission:gateway delete')->only('destroy');
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
                ->addColumn('action', 'gateways.include.action')
                ->toJson();
        }

        return view('gateways.index');
    }
}
