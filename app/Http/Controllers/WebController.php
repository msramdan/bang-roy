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

    public function contact()
    {
        return view('web.contact');
    }

    public function team()
    {
        return view('web.team');
    }

    public function company()
    {
        return view('web.company');
    }

    public function certificates()
    {
        return view('web.certificates');
    }

    public function service()
    {
        return view('web.service');
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
