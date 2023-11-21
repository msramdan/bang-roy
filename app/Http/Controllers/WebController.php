<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Testimony;
use App\Models\Banner;
use App\Models\Business;
use App\Models\Certificate;
use App\Models\Team;
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

    public function contact()
    {
        return view('web.contact');
    }

    public function team()
    {
        $teams = Team::all();
        return view('web.team', [
            'teams' => $teams,
        ]);
    }

    public function company()
    {
        return view('web.company');
    }

    public function certificates()
    {
        $certificates = Certificate::all();
        return view('web.certificates', [
            'certificates' => $certificates,
        ]);
    }

    public function service()
    {
        $businesses = Business::all();
        return view('web.service', [
            'businesses' => $businesses,
        ]);
    }

    public function catalog()
    {
        return view('web.catalog');
    }

    public function portfolio()
    {
        return view('web.portfolio');
    }



}
