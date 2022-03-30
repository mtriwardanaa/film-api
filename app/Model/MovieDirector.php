<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $movie_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property Movie $movie
 */
class MovieDirector extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['movie_id', 'name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie()
    {
        return $this->belongsTo('App\Model\Movie');
    }
}