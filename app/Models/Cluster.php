<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['instance_id', 'cluster_kode', 'cluster_name'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['cluster_kode' => 'string', 'cluster_name' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    

	public function instance()
	{
		return $this->belongsTo(\App\Models\Instance::class);
	}
}
