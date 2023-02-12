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
            $parseds = Parsed::with('device:id,dev_eui');

            return DataTables::of($parseds)
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
                })
                ->toJson();
        }

        return view('parseds.index');
    }
}
