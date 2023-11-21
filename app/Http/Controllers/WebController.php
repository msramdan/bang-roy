<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Testimony;
use Illuminate\Support\Facades\DB;


class WebController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $testimonies = Testimony::all();
        return view('web.home', [
            'clients' => $clients,
            'testimonies' => $testimonies,
        ]);
    }
}
