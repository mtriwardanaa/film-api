<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

/**
 * @property integer $id
 * @property integer $movie_id
 * @property integer $user_id
 * @property int $rating
 * @property string $created_at
 * @property string $updated_at
 * @property Movie $movie
 * @property User $user
 */
class MovieRating extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    protected $appends  = ['encript', 'encript_movie', 'encript_user'];

    /**
     * @var array
     */
    protected $fillable = ['movie_id', 'user_id', 'rating', 'created_at', 'updated_at'];

    protected $hidden = [
        'id', 'movie_id', 'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie()
    {
        return $this->belongsTo('App\Model\Movie');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}
