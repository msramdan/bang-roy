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
        // ===
        $countDevice = Device::count();
        $countDeviceError = Device::where('status','=','error')->count();
        // ===
        $countBranches = Instance::count();
        $countBranchesError = "SELECT * FROM devices WHERE status='error' GROUP BY instance_id";
        $selectBranchesError = DB::select($countBranchesError);
        // ===
        $countCluster = Cluster::count();
        $countClusterError = "SELECT * FROM devices WHERE status='error' GROUP BY cluster_id";
        $selectClusterError = DB::select($countClusterError);

        return view('dashboard',[
        'instances' => $instances,
        'ticket' => $ticket,
        'ticketOpen' => $ticketOpen,
        'ticketClose' => $ticketClose,
        'TotalByBrances' => $TotalByBrances,
        'TotalByCluster' => $TotalByCluster,
        'TotalByLocation' => $TotalByLocation,
        'countDevice' => $countDevice,
        'countDeviceError' => $countDeviceError,
        'chartPersentage' => (($countDevice - $countDeviceError) * 100) / $countDevice,


        'countBranches' => $countBranches,
        'selectBranchesError' => count($selectBranchesError),
        'countCluster' => $countCluster,
        'selectClusterError' => count($selectClusterError),

    ]);
    }
}
