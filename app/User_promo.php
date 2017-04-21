<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_promo extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'video_id',
        'promocode_id',
    ];
}
