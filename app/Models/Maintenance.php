<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['instance_id', 'date', 'start_time', 'end_time', 'user_id'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    // protected $casts = ['date' => 'date:d/m/Y', 'start_time' => 'datetime:H:i', 'end_time' => 'datetime:H:i'];

    public function instance()
    {
        return $this->belongsTo(\App\Models\Instance::class);
    }
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
