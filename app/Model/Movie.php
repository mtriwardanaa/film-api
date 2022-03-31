<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

/**
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $cover
 * @property string $source
 * @property string $trailer
 * @property string $desc
 * @property int $duration
 * @property string $quality
 * @property string $release_date
 * @property float $rating
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 * @property MovieActor[] $movieActors
 * @property MovieCountry[] $movieCountries
 * @property MovieDirector[] $movieDirectors
 * @property MovieFavorite[] $movieFavorites
 * @property MovieGenre[] $movieGenres
 * @property MovieRating[] $movieRatings
 * @property MovieTag[] $movieTags
 */
class Movie extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    protected $appends  = ['encript', 'encript_category'];

    /**
     * @var array
     */
    protected $fillable = ['category_id', 'title', 'cover', 'source', 'trailer', 'desc', 'duration', 'quality', 'release_date', 'rating', 'created_at', 'updated_at'];

    protected $hidden = [
        'id', 'category_id'
    ];

    public function getEncriptAttribute() {
        return Crypt::encryptString($this->id);
    }

    public function getEncriptCategoryAttribute() {
        return Crypt::encryptString($this->category_id);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movieActors()
    {
        return $this->hasMany('App\Model\MovieActor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movieCountries()
    {
        return $this->hasMany('App\Model\MovieCountry');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movieDirectors()
    {
        return $this->hasMany('App\Model\MovieDirector');
    }

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
    public function movieGenres()
    {
        return $this->hasMany('App\Model\MovieGenre');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movieRatings()
    {
        return $this->hasMany('App\Model\MovieRating');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movieTags()
    {
        return $this->hasMany('App\Model\MovieTag');
    }
}
