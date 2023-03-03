<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatewayLog extends Model
{
    use HasFactory;
    protected $table = 'gateway_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['gwid', 'status_online', 'pktfwd_status'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    // protected $casts = ['gwid' => 'string', 'status_online' => 'boolean', 'pktfwd_status' => 'boolean'];



}
