<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Requests\{StoreSettingRequest, UpdateSettingRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:setting view')->only('index');
        $this->middleware('permission:setting edit')->only('update');
    }

    public function index()
    {
        $setting = Setting::findOrFail(1)->first();
        return view('settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {

        $setting->update($request->validated());
        Alert::toast('The setting was updated successfully.', 'success');
        return redirect()->route('settings.index');
    }
}
