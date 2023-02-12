<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['aplication_name', 'endpoint_nms', 'is_notif_tele', 'token'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    // protected $casts = ['aplication_name' => 'string', 'endpoint_nms' => 'string', 'is_notif_tele' => 'boolean', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
}
