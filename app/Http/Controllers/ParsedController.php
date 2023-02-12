<?php

namespace App\Http\Controllers;

use App\Models\Parsed;
use App\Http\Requests\{StoreParsedRequest, UpdateParsedRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $parsed_data = Parsed::with('device:id,dev_eui');
            $query_parsed = intval($request->query('parsed_data'));
            if (isset($query_parsed) && !empty($query_parsed)) {
                $parsed_data = $parsed_data->where('rawdata_id', $query_parsed);
            }
            return DataTables::of($parsed_data)
                ->addIndexColumn()
                ->addColumn('device', function ($row) {
                    return $row->device ? $row->device->dev_eui : '';
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
                })
                ->toJson();
        }
        return view('parseds.index');
    }
}
