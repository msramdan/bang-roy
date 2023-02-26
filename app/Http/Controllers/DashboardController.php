<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instance;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $instances = Instance::get();
        $ticket =Ticket::orderBy('id', 'desc')->limit(9)->get();
        $ticketOpen = Ticket::where('status','Opened')->count();
        $ticketClose = Ticket::where('status','Closed')->count();
        return view('dashboard',[
        'instances' => $instances,
        'ticket' => $ticket,
        'ticketOpen' => $ticketOpen,
        'ticketClose' => $ticketClose,
    ]);
    }
}
