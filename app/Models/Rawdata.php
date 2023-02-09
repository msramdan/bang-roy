<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawdata extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['dev_eui', 'app_id', 'type', 'time', 'gwid', 'rssi', 'snr', 'freq', 'dr', 'adr', 'class', 'fcnt', 'fport', 'confirmed', 'data', 'gws', 'payload_data', 'convert', 'type_payload'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['dev_eui' => 'string', 'app_id' => 'integer', 'type' => 'string', 'time' => 'string', 'gwid' => 'string', 'rssi' => 'string', 'snr' => 'string', 'freq' => 'string', 'dr' => 'string', 'adr' => 'string', 'class' => 'string', 'fcnt' => 'string', 'fport' => 'string', 'confirmed' => 'string', 'data' => 'string', 'gws' => 'string', 'payload_data' => 'string', 'convert' => 'string', 'type_payload' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    

}
