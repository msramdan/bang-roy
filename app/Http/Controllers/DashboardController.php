<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instance;
use App\Models\Ticket;
use App\Models\Device;
use App\Models\Cluster;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard');
    }

}
