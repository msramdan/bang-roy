<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

function setting_web()
{
    return DB::table('companies')->first();
}

function social()
{
    return DB::table('socials')->first();
}

function set_show($uri)
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return 'show';
            }
        }
    } else {
        if (Route::is($uri)) {
            return 'show';
        }
    }
}

function ambilDataTanggal($tanggal_string) {
    // Konversi string ke timestamp
    $timestamp = strtotime($tanggal_string);

    // Ambil data tanggal
    $tanggal = date("d", $timestamp);
    $bulan = date("M", $timestamp); // M mengembalikan singkatan bulan
    $tahun = date("Y", $timestamp);

    // Mengembalikan hasil dalam bentuk array
    return array(
        'tanggal' => $tanggal,
        'bulan' => $bulan,
        'tahun' => $tahun
    );
}

function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}

