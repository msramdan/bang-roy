<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Social;
use Illuminate\Database\Seeder;


class SocialSeeder extends Seeder
{
    public function run()
    {
        Social::create([
            'link_facebook' => '-',
            'link_instagram' => '-',
            'link_youtube' => '-',
            'link_twitter' => '-',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
