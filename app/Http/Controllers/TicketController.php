<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\{StoreTicketRequest, UpdateTicketRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ticket view')->only('index');
        $this->middleware('permission:ticket edit')->only('edit', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $parsed_data = Ticket::with('device:id,dev_eui,instance_id,cluster_id');

            $query_parsed = intval($request->query('parsed_data'));

            if (isset($query_parsed) && !empty($query_parsed)) {
                $parsed_data = $parsed_data->where('tickets.id', $query_parsed);
            }
            $parsed_data = $parsed_data->orderBy('tickets.id', 'DESC')->get();
            return DataTables::of($parsed_data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })->addColumn('status', function ($row) {
                    if ($row->status == "Opened") {
                        return '<button class="btn btn-pill btn-danger btn-air-danger btn-xs" type="button" title=""> Open</button>';
                    } else {
                        return '<button class="btn btn-pill btn-primary btn-air-primary btn-xs" type="button" title="">Close</button>';
                    }
                })
                ->addColumn('description', function ($row) {
                    $result = json_decode($row->description);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $arr =  json_decode($row->description);
                        $output = '';
                        foreach ($arr as $value) {
                            $output .= "<li>" . $value . "</li>";
                        }
                        return $output;
                    } else {
                        return $row->description;
                    }
                })
                ->addColumn('user', function ($row) {
                    if ($row->update_by) {
                        $user = User::find($row->update_by);
                        return $user->name;
                    }

                    return '-';
                })
                ->addColumn('branches', function ($row) {
                    return $row->device ? getInstance($row->device->instance_id)->instance_name  : '';
                })
                ->addColumn('cluster', function ($row) {
                    return $row->device ? getCluster($row->device->cluster_id)->cluster_name  : '';
                })

                ->addColumn('device', function ($row) {
                    return $row->device ? $row->device->dev_eui : '';
                })->addColumn('action', 'tickets.include.action', 'description')
                ->rawColumns(['description', 'action', 'tickets.include.action', 'status'])
                ->toJson();
        }

        return view('tickets.index');
    }

    public function edit(Ticket $ticket)
    {
        $ticket->load('device:id,dev_eui');

        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $tiket = Ticket::where('id', $ticket->id)
            ->update([
                'status' => $request->status,
                'update_by' => auth()->user()->id
            ]);
        if ($request->status == 'Closed') {
            $statusDevice = null;
        } else {
            $statusDevice = 'error';
        }
        DB::table('devices')
            ->where('id', $ticket->device_id)
            ->update(['status' => $statusDevice]);

        Alert::toast('The ticket was updated successfully.', 'success');
        return redirect()
            ->route('tickets.index');
    }
}
