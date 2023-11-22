<?php

namespace Database\Seeders;

use App\Models\Categoryproduct;
use App\Models\User;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoryproduct::create([
            'category_name' => 'PLC Controller & HMI Scada',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Categoryproduct::create([
            'category_name' => 'Mechanical & Electrical',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Categoryproduct::create([
            'category_name' => 'Power Tools',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Categoryproduct::create([
            'category_name' => 'Custom Making & Repair',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Categoryproduct::create([
            'category_name' => 'Weid Muller',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Categoryproduct::create([
            'category_name' => 'Smarth Security System',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Categoryproduct::create([
            'category_name' => 'Other',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
