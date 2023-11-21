<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Testimony;
use App\Models\Banner;
use App\Models\Business;
use App\Models\Certificate;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Team;
use App\Models\Vm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Categoryproduct;
use App\Models\Product;




class WebController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $testimonies = Testimony::all();
        $banners = Banner::all();
        $categoryproducts = Categoryproduct::all();
        $products = Product::paginate(8);
        return view('web.home', [
            'clients' => $clients,
            'testimonies' => $testimonies,
            'banners' => $banners,
            'categoryproducts' => $categoryproducts,
            'products' => $products,
        ]);
    }

    public function contact()
    {
        return view('web.contact');
    }

    function submitContact(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('contacts')->insert($data);
        Alert::toast('the message was sent successfully', 'success');
        return redirect()->back();
    }

    public function team()
    {
        $teams = Team::paginate(6);
        return view('web.team', [
            'teams' => $teams,
        ]);
    }

    public function company()
    {
        $vm = Vm::findOrFail(1)->first();
        return view('web.company', [
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
        $businesses = Business::paginate(6);
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
        $portfolios = Portfolio::paginate(6);
        return view('web.portfolio', [
            'portfolios' => $portfolios,
        ]);
    }
}
