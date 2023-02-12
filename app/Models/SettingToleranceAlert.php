<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingToleranceAlert extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['instance_id', 'field_data', 'min_tolerance', 'max_tolerance'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    // protected $casts = ['field_data' => 'string', 'min_tolerance' => 'float', 'max_tolerance' => 'float', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];



    public function instance()
    {
        return $this->belongsTo(\App\Models\Instance::class);
    }
}
