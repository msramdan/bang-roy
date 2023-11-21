<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Testimony;
use App\Models\Banner;
use App\Models\Business;
use App\Models\Certificate;
use App\Models\Portfolio;
use App\Models\Team;
use App\Models\Vm;
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
        $vm = Vm::findOrFail(1)->first();
        return view('web.company',[
            'vm' => $vm,
        ]);
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
        $portfolios = Portfolio::all();
        return view('web.portfolio', [
            'portfolios' => $portfolios,
        ]);
    }



}
