<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instance;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $instances = Instance::get();
        $ticket =Ticket::orderBy('id', 'desc')->limit(9)->get();
        $ticketOpen = Ticket::where('status','Opened')->count();
        $ticketClose = Ticket::where('status','Closed')->count();
        // ===
        $TotalByBrances =  "SELECT `instance_name`, count(*) AS total FROM `devices` INNER JOIN `instances` ON `devices`.`instance_id` = `instances`.`id` GROUP BY `devices`.`instance_id`";
        $TotalByBrances = DB::select($TotalByBrances);
        // ===
        $TotalByCluster =  "SELECT `cluster_name`, count(*) AS total FROM `devices` INNER JOIN `clusters` ON `devices`.`cluster_id` = `clusters`.`id` GROUP BY `devices`.`cluster_id`";
        $TotalByCluster = DB::select($TotalByCluster);
        // ===
        $TotalByLocation =  "SELECT `kabupaten_kota`, count(*) AS total FROM `devices`
        INNER JOIN `instances` ON `devices`.`instance_id` = `instances`.`id`
        INNER JOIN `kabkots` ON `instances`.`kabkot_id` = `kabkots`.`id`
        GROUP BY `instances`.`kabkot_id`";
        $TotalByLocation = DB::select($TotalByLocation);

        return view('dashboard',[
        'instances' => $instances,
        'ticket' => $ticket,
        'ticketOpen' => $ticketOpen,
        'ticketClose' => $ticketClose,
        'TotalByBrances' => $TotalByBrances,
        'TotalByCluster' => $TotalByCluster,
        'TotalByLocation' => $TotalByLocation,
    ]);
    }
}
