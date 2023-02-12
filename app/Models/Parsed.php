<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parsed extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['device_id', 'rawdata_id', 'frame_id', 'temperature', 'humidity', 'period', 'rssi', 'snr', 'battery'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    // protected $casts = ['frame_id' => 'string', 'temperature' => 'float', 'humidity' => 'float', 'period' => 'integer', 'rssi' => 'float', 'snr' => 'float', 'battery' => 'float', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];



    public function device()
    {
        return $this->belongsTo(\App\Models\Device::class);
    }
    public function rawdata()
    {
        return $this->belongsTo(\App\Models\Rawdata::class);
    }
}
