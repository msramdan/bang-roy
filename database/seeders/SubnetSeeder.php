<?php

namespace Database\Seeders;

use App\Models\Subnet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubnetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subnet = [
            'ch_00-07',
            'ch_08-15',
        ];

        foreach ($subnet as $i => $sub) {
            Subnet::create([
                'subnet' => $sub
            ]);
        }
    }
}
