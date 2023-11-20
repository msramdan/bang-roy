<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['photo', 'deskripsi_testimony', 'nama_user', 'jabatan'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['photo' => 'string', 'deskripsi_testimony' => 'string', 'nama_user' => 'string', 'jabatan' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    

}
