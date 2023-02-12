<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationalTime extends Model
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
    // protected $casts = ['day' => 'string', 'open_hour' => 'datetime:H:i', 'open_hour' => 'datetime:H:i'];

    public function instance()
    {
        return $this->belongsTo(\App\Models\Instance::class);
    }
}
