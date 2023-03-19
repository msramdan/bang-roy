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
            $tickets = Ticket::query();
            $status = $request->query('status');
            $start_date = intval($request->query('start_date'));
            $end_date = intval($request->query('end_date'));

            if (isset($status) && !empty($status)) {
                if ($status != 'All') {
                    $tickets = $tickets->where('status', $status);
                }
            }
            if (isset($start_date) && !empty($start_date)) {
                $from = date("Y-m-d H:i:s", substr($request->query('start_date'), 0, 10));
                $tickets = $tickets->where('created_at', '>=', $from);
            } else {
                $from = date('Y-m-d') . " 00:00:00";
                $tickets = $tickets->where('created_at', '>=', $from);
            }
            if (isset($end_date) && !empty($end_date)) {
                $to = date("Y-m-d H:i:s", substr($request->query('end_date'), 0, 10));
                $tickets = $tickets->where('created_at', '<=', $to);
            } else {
                $to = date('Y-m-d') . " 23:59:59";
                $tickets = $tickets->where('created_at', '<=', $to);
            }
            $tickets = $tickets->orderBy('tickets.id', 'desc')->get();
            return DataTables::of($tickets)
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
        $from = date('Y-m-d') . " 00:00:00";
        $to = date('Y-m-d') . " 23:59:59";
        $microFrom = strtotime($from) * 1000;
        $microTo = strtotime($to) * 1000;
        return view('tickets.index', [
            'microFrom' => $microFrom,
            'microTo' => $microTo,
        ]);
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
