<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Rawdata;

class ReportDeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:report device view')->only('index', 'show');
    }

    public function index()
    {
        if (request()->ajax()) {
            $rawdatas = Rawdata::query()->orderBy('id', 'DESC');

            return DataTables::of($rawdatas)
                ->addIndexColumn()
                ->addColumn('payload', function ($row) {
                    $payload = json_decode($row->payload_data, true);
                    return json_encode($payload, JSON_PRETTY_PRINT);
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })
                ->rawColumns(['parsed'])
                ->toJson();
        }

        return view('report-devices.index');
    }
}
