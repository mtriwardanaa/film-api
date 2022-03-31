<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

/**
 * @property integer $id
 * @property integer $movie_id
 * @property integer $category_id
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 * @property Movie $movie
 */
class MovieCategory extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    protected $appends  = ['encript', 'encript_movie', 'encript_category'];

    /**
     * @var array
     */
    protected $fillable = ['movie_id', 'category_id', 'created_at', 'updated_at'];

    protected $hidden = [
        'id', 'movie_id', 'category_id'
    ];

     public function getEncriptAttribute() {
        return Crypt::encryptString($this->id);
    }

    public function getEncriptMovieAttribute() {
        return Crypt::encryptString($this->movie_id);
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie()
    {
        return $this->belongsTo('App\Model\Movie');
    }
}
