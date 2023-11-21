<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

function setting_web()
{
    return DB::table('companies')->first();
}

function social()
{
    return DB::table('socials')->first();
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
