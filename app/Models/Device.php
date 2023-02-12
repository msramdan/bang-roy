<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
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
    // protected $casts = ['dev_eui' => 'string'];

    public function subnet()
    {
        return $this->belongsTo(\App\Models\Subnet::class);
    }

    public function instance()
    {
        return $this->belongsTo(\App\Models\Instance::class);
    }

    public function cluster()
    {
        return $this->belongsTo(\App\Models\Cluster::class);
    }
}
