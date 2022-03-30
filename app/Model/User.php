<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @property integer $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $level
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property MovieFavorite[] $movieFavorites
 * @property MovieRating[] $movieRatings
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'username', 'password', 'level', 'remember_token', 'created_at', 'updated_at'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movieFavorites()
    {
        return $this->hasMany('App\Model\MovieFavorite');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movieRatings()
    {
        return $this->hasMany('App\Model\MovieRating');
    }
}
