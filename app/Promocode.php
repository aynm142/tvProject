<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Promocode
 *
 * @property int $id
 * @property string $code
 * @property float $reward
 * @property int $quantity
 * @property string $expiry_date
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Promocode whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Promocode whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Promocode whereExpiryDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Promocode whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Promocode whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Promocode whereReward($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Promocode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Promocode extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'code',
        'id',
        'user_id',
        'delete_time',
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
