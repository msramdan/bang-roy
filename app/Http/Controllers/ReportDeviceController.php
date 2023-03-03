<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Rawdata;
use App\Models\Device;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Exports\ReportDeviceLogExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportDeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:report device view')->only('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $rawdatas = Rawdata::query();
            $dev_eui = intval($request->query('dev_eui'));
            $start_date = intval($request->query('start_date'));
            $end_date = intval($request->query('end_date'));

            if (isset($dev_eui) && !empty($dev_eui)) {
                if($dev_eui !='All'){
                    $rawdatas = $rawdatas->where('dev_eui',$dev_eui);
                }
            }
            if (isset($start_date) && !empty($start_date)) {
                $from = date("Y-m-d H:i:s", substr($request->query('start_date'), 0, 10));
                $rawdatas = $rawdatas->where('created_at', '>=', $from);
            }else{
                $from = date('Y-m-d') . " 00:00:00";
                $rawdatas = $rawdatas->where('created_at', '>=', $from);
            }
            if (isset($end_date) && !empty($end_date)) {
                $to = date("Y-m-d H:i:s", substr($request->query('end_date'), 0, 10));
                $rawdatas = $rawdatas->where('created_at', '<=', $to);
            }else{
                $to = date('Y-m-d') . " 23:59:59";
                $rawdatas = $rawdatas->where('created_at', '<=', $to);
            }

            $rawdatas = $rawdatas->orderBy('rawdatas.id', 'desc')->get();
            return DataTables::of($rawdatas)
                ->addIndexColumn()
                // ->addColumn('payload', function ($row) {
                //     $payload = json_decode($row->payload_data, true);
                //     return json_encode($payload, JSON_PRETTY_PRINT);
                // })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })
                ->addColumn('adr', function ($row) {
                    if ($row->adr == 1 || $row->adr == '1') {
                        return 'True';
                    }
                    return '-';
                })
                ->addColumn('action', 'rawdatas.include.action')
                ->rawColumns(['parsed', 'action'])
                ->toJson();
        }
        $from = date('Y-m-d') . " 00:00:00";
        $to = date('Y-m-d') . " 23:59:59";
        $microFrom = strtotime($from) * 1000;
        $microTo = strtotime($to) * 1000;
        return view('report-devices.index',[
            'device' => Device::all(),
            'microFrom' => $microFrom,
            'microTo' => $microTo,
        ]);
    }

    public function export($dev_eui, $start_date, $end_date)
    {
        $date= date('d-m-Y');
        $nameFile = 'RM-Device Log-' .$date;
         return Excel::download(new ReportDeviceLogExport($dev_eui, $start_date, $end_date), $nameFile.'.xlsx');

    }

}
