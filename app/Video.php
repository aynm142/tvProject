<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Video
 *
 * @property-read \App\Category $categories
 * @mixin \Eloquent
 * @property int $id
 * @property int $category_id
 * @property string $video_name
 * @property string $description
 * @property string $video_url
 * @property string $logo_url
 * @property string $background_url
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Video whereBackgroundUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Video whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Video whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Video whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Video whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Video whereLogoUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Video whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Video whereVideoName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Video whereVideoUrl($value)
 */
class Video extends Model
{
    protected $fillable = [
        'video_name',
        'description',
        'logo_url',
        'background_url',
        'video_url',
        'category_id',
    ];

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

    function getVideoUrl()
    {
        return (array) @unserialize($this->video_url);
    }
}
