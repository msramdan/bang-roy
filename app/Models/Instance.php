<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];
    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    // protected $casts = ['app_id' => 'integer', 'app_name' => 'string', 'push_url' => 'string', 'instance_name' => 'string', 'address' => 'string', 'zip_kode' => 'string', 'email' => 'string', 'phone' => 'string', 'longitude' => 'string', 'latitude' => 'string'];



    public function province()
    {
        return $this->belongsTo(\App\Models\Province::class);
    }
    public function kabkot()
    {
        return $this->belongsTo(\App\Models\Kabkot::class);
    }
    public function kecamatan()
    {
        return $this->belongsTo(\App\Models\Kecamatan::class);
    }
    public function kelurahan()
    {
        return $this->belongsTo(\App\Models\Kelurahan::class);
    }
}
