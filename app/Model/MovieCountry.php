<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

/**
 * @property integer $id
 * @property integer $movie_id
 * @property integer $country_id
 * @property string $created_at
 * @property string $updated_at
 * @property Country $country
 * @property Movie $movie
 */
class MovieCountry extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    protected $appends  = ['encript', 'encript_movie', 'encript_country'];

    /**
     * @var array
     */
    protected $fillable = ['movie_id', 'country_id', 'created_at', 'updated_at'];

    protected $hidden = [
        'id', 'movie_id', 'country_id'
    ];

    public function getEncriptAttribute() {
        return Crypt::encryptString($this->id);
    }

    public function getEncriptMovieAttribute() {
        return Crypt::encryptString($this->movie_id);
    }

    public function getEncriptCountryAttribute() {
        return Crypt::encryptString($this->country_id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Model\Country');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie()
    {
        return $this->belongsTo('App\Model\Movie');
    }
}
