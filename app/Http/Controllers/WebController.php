<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Testimony;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;


class WebController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $testimonies = Testimony::all();
        $banners = Banner::all();
        return view('web.home', [
            'clients' => $clients,
            'testimonies' => $testimonies,
            'banners' => $banners,
        ]);
    }
}
