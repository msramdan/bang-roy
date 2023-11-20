<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['banner', 'title', 'deksripsi'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['banner' => 'string', 'title' => 'string', 'deksripsi' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    

}
