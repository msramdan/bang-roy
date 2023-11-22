<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['nama_perusahaan','deskripsi','no_whatsapp', 'telepon', 'alamat', 'email', 'akte_notaris', 'kep_men_kum_ham', 'npwp', 'nib', 'sppkp', 'logo'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['nama_perusahaan' => 'string', 'telepon' => 'string', 'alamat' => 'string', 'email' => 'string', 'akte_notaris' => 'string', 'kep_men_kum_ham' => 'string', 'npwp' => 'string', 'nib' => 'string', 'sppkp' => 'string', 'logo' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];



}
