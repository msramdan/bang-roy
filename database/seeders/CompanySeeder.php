<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
        Company::create([
            'nama_perusahaan' => 'PT CONTROMEKA SYSTEM',
            'telepon' => '(0895) 30605050',
            'alamat' => 'Jl. SMP 10 No.123 Rt.003 Rw.001, Kel. Bedahan Sawangan, Depok 16518 Jawa Barat',
            'email' => 'wigunacontromekasystem@gmail.com',
            'akte_notaris' => 'No. 2 08 Juni 2023',
            'kep_men_kum_ham' => 'AHU-0042740.AH.01.01.TAHUN 2023 ',
            'npwp' => '39.274.444.7-448.000',
            'nib' => '1406230027193',
            'sppkp' => 'S-197/PKP/KPP.330503/2023',
            'logo' => null,
        ]);
    }
}
