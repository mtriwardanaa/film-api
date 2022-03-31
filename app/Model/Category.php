<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

/**
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 * @property Movie[] $movies
 */
class Category extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    protected $appends  = ['encript', 'encript_parent'];

    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'name', 'created_at', 'updated_at'];

    protected $hidden = [
        'id', 'parent_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movies()
    {
        return $this->hasMany('App\Model\Movie');
    }
}
