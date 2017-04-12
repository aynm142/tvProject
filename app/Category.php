<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property-read \App\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Video[] $videos
 * @mixin \Eloquent
 * @property int $id
 * @property string $category_name
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereCategoryName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereId($value)
 */
class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'category_name',
    ];

    protected $hidden = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }
}
