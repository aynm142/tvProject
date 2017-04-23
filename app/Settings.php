<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'logo_image',
        'site_name',
        'background_image',
        'banner',
    ];
}
