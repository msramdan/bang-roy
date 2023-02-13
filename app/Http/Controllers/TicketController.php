<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\{StoreTicketRequest, UpdateTicketRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

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
    public function index()
    {
        if (request()->ajax()) {
            $tickets = Ticket::with('device:id,dev_eui')->orderBy('tickets.id', 'DESC');

            return DataTables::of($tickets)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
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
                ->addColumn('device', function ($row) {
                    return $row->device ? $row->device->dev_eui : '';
                })->addColumn('action', 'tickets.include.action', 'description')
                ->rawColumns(['description', 'action', 'tickets.include.action'])
                ->toJson();
        }

        return view('tickets.index');
    }

    public function show(Ticket $ticket)
    {
        $ticket->load('device:id,dev_eui');

        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
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
        Ticket::where('id', $ticket->id)
            ->update([
                'status' => $request->status
            ]);
        Alert::toast('The ticket was updated successfully.', 'success');
        return redirect()
            ->route('tickets.index');
    }
}
