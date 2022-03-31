<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

/**
 * @property integer $id
 * @property integer $movie_id
 * @property integer $genre_id
 * @property string $created_at
 * @property string $updated_at
 * @property Genre $genre
 * @property Movie $movie
 */
class MovieGenre extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    protected $appends  = ['encript', 'encript_movie', 'encript_genre'];

    /**
     * @var array
     */
    protected $fillable = ['movie_id', 'genre_id', 'created_at', 'updated_at'];

    protected $hidden = [
        'id', 'movie_id', 'genre_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function genre()
    {
        return $this->belongsTo('App\Model\Genre');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie()
    {
        return $this->belongsTo('App\Model\Movie');
    }
}
