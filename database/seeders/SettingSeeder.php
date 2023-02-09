<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
            'aplication_name' => 'Smart Temperature',
            'endpoint_nms' => 'https://wspiot.xyz',
            'is_notif_tele' => 0,
        ]);
    }
}
