<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kecamatan::create(
            [
                'kabkot_id' => 1,
                'kecamatan' => 'Cibiru',
            ],
            [
                'kabkot_id' => 2,
                'kecamatan' => 'Cikole',
            ]
        );
    }
}
