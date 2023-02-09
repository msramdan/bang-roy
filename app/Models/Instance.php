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
    protected $fillable = ['app_id', 'app_name', 'push_url', 'instance_name', 'address', 'provinsi_id', 'kabkot_id', 'kecamatan_id', 'kelurahan_id', 'zip_kode', 'email', 'phone', 'longitude', 'latitude'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['app_id' => 'integer', 'app_name' => 'string', 'push_url' => 'string', 'instance_name' => 'string', 'address' => 'string', 'zip_kode' => 'string', 'email' => 'string', 'phone' => 'string', 'longitude' => 'string', 'latitude' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    
	
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
