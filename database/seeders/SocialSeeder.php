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
        ]);
    }
}
