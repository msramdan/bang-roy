<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['subject', 'description', 'device_id', 'status'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    // protected $casts = ['subject' => 'string', 'description' => 'string', 'status' => 'string'];



    public function device()
    {
        return $this->belongsTo(\App\Models\Device::class);
    }
}
