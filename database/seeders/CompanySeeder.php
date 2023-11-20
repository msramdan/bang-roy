<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        Company::create([
            'aplication_name' => 'Smart Temperature',
            'endpoint_nms' => 'https://wspiot.xyz',
            'token' => 'ey338TVl/vgfYWTbffz4aAViUleX9ABA3ei3KhK7JAs=',
            'is_notif_tele' => 0,
        ]);
    }
}
