<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Http\Requests\{StoreSocialRequest, UpdateSocialRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:social view')->only('index', 'show');
        $this->middleware('permission:social edit')->only('edit', 'update');
    }

    public function index()
    {
        $social = Social::findOrFail(1)->first();
        return view('socials.edit', compact('social'));
    }


    public function update(UpdateSocialRequest $request, Social $social)
    {
        $social->update($request->validated());
        Alert::toast('The social was updated successfully.', 'success');
        return redirect()
            ->route('socials.index');
    }
}
