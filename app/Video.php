<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'video_name',
        'description',
        'logo_url',
        'category_id',
    ];

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
}
