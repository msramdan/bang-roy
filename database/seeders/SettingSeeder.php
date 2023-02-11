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
            'token' => 'W4OBctr1nstGjv5ePcd42ypMqI3UsXSTfNGNAcjLP+c=',
            'is_notif_tele' => 0,
        ]);
    }
}
