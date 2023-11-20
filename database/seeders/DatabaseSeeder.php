<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(SocialSeeder::class);
        $this->call(VisiMisiSeeder::class);
    }
}
