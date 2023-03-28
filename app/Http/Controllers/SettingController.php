<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Requests\{StoreSettingRequest, UpdateSettingRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
    public function update(Request $request, $id)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'favicon' => 'image|mimes:jpeg,png,jpg,gif,svg,ico|max:2048|dimensions:width=512,height=512',
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg,ico|max:2048|dimensions:width=660,height=220',
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }



        $setting_app = Setting::findOrFail($id);
        if ($request->file('logo') != null || $request->file('logo') != '') {
            Storage::disk('local')->delete('public/img/setting_app/' . $setting_app->logo);
            $logo = $request->file('logo');
            $logo->storeAs('public/img/setting_app', $logo->hashName());
            $setting_app->update([
                'logo'     => $logo->hashName(),
            ]);
        }

        if ($request->file('favicon') != null || $request->file('favicon') != '') {
            Storage::disk('local')->delete('public/img/setting_app/' . $setting_app->favicon);
            $favicon = $request->file('favicon');
            $favicon->storeAs('public/img/setting_app', $favicon->hashName());
            $setting_app->update([
                'favicon'     => $favicon->hashName(),
            ]);
        }

        $setting_app->update([
            'aplication_name' => $request->aplication_name,
            'endpoint_nms' => $request->endpoint_nms,
            'is_notif_tele' => $request->is_notif_tele,
            'token' => $request->token
        ]);
        Alert::toast('The setting was updated successfully.', 'success');
        return redirect()->route('settings.index');
    }
}
