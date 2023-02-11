<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelurahan::create(
            [
                'kecamatan_id' => 1,
                'kelurahan' => 'Cicendo',
                'kd_pos' => 12313
            ]
        );
    }
}
