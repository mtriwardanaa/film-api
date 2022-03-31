<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

/**
 * @property integer $id
 * @property integer $movie_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property Movie $movie
 */
class MovieActor extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    protected $appends  = ['encript', 'encript_movie'];

    /**
     * @var array
     */
    protected $fillable = ['movie_id', 'name', 'created_at', 'updated_at'];

    protected $hidden = [
        'id', 'movie_id'
    ];

    public function getEncriptAttribute() {
        return Crypt::encryptString($this->id);
    }

    public function getEncriptMovieAttribute() {
        return Crypt::encryptString($this->movie_id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie()
    {
        return $this->belongsTo('App\Model\Movie');
    }
}
