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
                ->addColumn('device', function ($row) {
                    return $row->device ? $row->device->dev_eui : '';
                })->addColumn('rawdata', function ($row) {
                    return $row->rawdata ? $row->rawdata->dev_eui : '';
                })
                ->toJson();
        }

        return view('parseds.index');
    }
}
