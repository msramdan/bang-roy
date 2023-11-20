<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Vm;
use Illuminate\Database\Seeder;

class VisiMisiSeeder extends Seeder
{
    public function run()
    {
        Vm::create([
            'visi' => 'Being a reliable and committed company
            by offering products and services with
            quality service to consumers in
            Industrial appliances and Engineering.',
            'misi' => 'As a company that is reliable in its field by
            offering quality products and services and is
            able to increase human resources and can
            support national economic development by
            providing professional services',
        ]);
    }
}
