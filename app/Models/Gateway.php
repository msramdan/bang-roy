<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    use HasFactory;

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
    // protected $casts = ['gwid' => 'string', 'status_online' => 'boolean', 'pktfwd_status' => 'boolean', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];



}
