<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\{StoreTicketRequest, UpdateTicketRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

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
            $tickets = Ticket::with('device:id,dev_eui');

            return DataTables::of($tickets)
                ->addColumn('description', function($row){
                    return str($row->description)->limit(100);
                })
				->addColumn('device', function ($row) {
                    return $row->device ? $row->device->dev_eui : '';
                })->addColumn('action', 'tickets.include.action')
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
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {

        $ticket->update($request->validated());
        Alert::toast('The ticket was updated successfully.', 'success');
        return redirect()
            ->route('tickets.index');
    }
}
