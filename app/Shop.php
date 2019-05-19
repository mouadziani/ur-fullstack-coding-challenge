<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $image
 * @property float $distance
 * @property integer $likes
 * @property integer $dislikes
 * @property string $created_at
 * @property string $updated_at
 * @property User[] $users
 */
class Shop extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'image', 'distance', 'likes', 'dislikes', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'preferred_shops')
                    ->as('preferredShop')
                    ->withPivot('user_id', 'shop_id', 'created_at', 'updated_at');
    }
}
