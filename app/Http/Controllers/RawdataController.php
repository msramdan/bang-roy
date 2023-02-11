<?php

namespace App\Http\Controllers;

use App\Models\Rawdata;
use App\Http\Requests\{StoreRawdataRequest, UpdateRawdataRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class RawdataController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:rawdata view')->only('index');
        $this->middleware('permission:rawdata delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $rawdatas = Rawdata::query();

            return DataTables::of($rawdatas)
                ->addColumn('payload', function ($row) {
                    $payload = json_decode($row->payload_data, true);
                    return json_encode($payload, JSON_PRETTY_PRINT);
                })
                ->addColumn('parsed', function ($row) {
                    return  '<center>
                    <a href="' . url('/panel/parsed-gm?parsed_data=' . $row->id) . '" style="width:120px" target="_blank" class="btn btn-sm  btn-success"> Parsed Data</a></center>';
                })
                ->addColumn('action', 'rawdatas.include.action')
                ->rawColumns(['parsed', 'action'])
                ->toJson();
        }

        return view('rawdatas.index');
    }
    public function destroy(Rawdata $rawdata)
    {
        try {
            $rawdata->delete();
            Alert::toast('The rawdata was deleted successfully.', 'success');
            return redirect()->route('rawdatas.index');
        } catch (\Throwable $th) {
            Alert::toast('The rawdata cant be deleted because its related to another table.', 'error');
            return redirect()->route('rawdatas.index');
        }
    }
}
