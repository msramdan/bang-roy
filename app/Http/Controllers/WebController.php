<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


class WebController extends Controller
{
    public function index()
    {
        return view('web.home');
    }

}
