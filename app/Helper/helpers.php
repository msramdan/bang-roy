<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

function setting_web()
{
    $setting = DB::table('companies')->first();
    return $setting;
}

function set_show($uri)
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return 'show';
            }
        }
    } else {
        if (Route::is($uri)) {
            return 'show';
        }
    }
}
