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
        $instances = Instance::with('province:id,provinsi', 'kabkot:id,kabupaten_kota', 'kecamatan:id,kabkot_id', 'kelurahan:id,kecamatan_id')->get();
        $ticket = Ticket::orderBy('id', 'desc')->limit(9)->get();
        $ticketOpen = Ticket::where('status', 'Opened')->count();
        $ticketClose = Ticket::where('status', 'Closed')->count();
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
        $countDeviceError = Device::where('status', '=', 'error')->count();
        $deviceError = Device::where('status', '=', 'error')->get();
        // dd($deviceError);
        // ===
        $countBranches = Instance::count();
        $countBranchesError = "SELECT * FROM devices WHERE status='error' GROUP BY instance_id";
        $selectBranchesError = DB::select($countBranchesError);
        // ===
        $countCluster = Cluster::count();
        $countClusterError = "SELECT * FROM devices WHERE status='error' GROUP BY cluster_id";
        $selectClusterError = DB::select($countClusterError);
        // === user online
        $usersOnline = DB::table('users')
            ->where('is_online', '=', 'Y')
            ->count();

        return view('dashboard', [
            'instances' => $instances,
            'usersOnline' => $usersOnline,
            'ticket' => $ticket,
            'ticketOpen' => $ticketOpen,
            'ticketClose' => $ticketClose,
            'TotalByBrances' => $TotalByBrances,
            'TotalByCluster' => $TotalByCluster,
            'TotalByLocation' => $TotalByLocation,
            'countDevice' => $countDevice,
            'countDeviceError' => $countDeviceError,
            'listDeviceError' => $deviceError,
            'chartPersentage' => round((($countDevice - $countDeviceError) * 100) / $countDevice, 2),
            // ==
            'countBranches' => $countBranches,
            'selectBranchesError' => count($selectBranchesError),
            'listBranchesError' => $selectBranchesError,
            // ==
            'chartPersentageBranches' => round((($countBranches - count($selectBranchesError)) * 100) / $countBranches, 2),
            'countCluster' => $countCluster,
            'selectClusterError' => count($selectClusterError),
            'listClusterError' => $selectClusterError,
            // ===
            'chartPersentageCluster' => round((($countCluster - count($selectClusterError)) * 100) / $countCluster, 2),
        ]);
    }
}
