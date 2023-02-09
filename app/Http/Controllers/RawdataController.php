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
                ->addColumn('data', function ($row) {
                    return str($row->data)->limit(100);
                })
                ->addColumn('gws', function ($row) {
                    return str($row->gws)->limit(100);
                })
                ->addColumn('payload_data', function ($row) {
                    return str($row->payload_data)->limit(100);
                })
                ->addColumn('convert', function ($row) {
                    return str($row->convert)->limit(100);
                })
                ->addColumn('action', 'rawdatas.include.action')
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
