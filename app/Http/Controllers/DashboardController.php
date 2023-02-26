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
        $ticket =Ticket::get();
        return view('dashboard',[
        'instances' => $instances,
        'ticket' => $ticket

    ]);
    }
}
