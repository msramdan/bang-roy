<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['link_facebook', 'link_instagram', 'link_youtube', 'link_twitter'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['link_facebook' => 'string', 'link_instagram' => 'string', 'link_youtube' => 'string', 'link_twitter' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    

}
