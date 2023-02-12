<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subnet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['subnet'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    // protected $casts = ['subnet' => 'string'];



}
