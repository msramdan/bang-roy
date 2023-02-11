<?php

namespace Database\Seeders;

use App\Models\Kabkot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class KabkotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kabkot::create(
            [
                'provinsi_id' => 1,
                'kabupaten_kota' => 'Bandung',
                'ibukota' => 'Cikole',
                'k_bsni' => 123,
            ],
            [
                'provinsi_id' => 1,
                'kabupaten_kota' => 'Sukabumi',
                'ibukota' => 'Cibeureum',
                'k_bsni' => 123,
            ]
        );
    }
}
