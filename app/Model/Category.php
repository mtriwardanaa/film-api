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

    public function getEncriptAttribute() {
        return Crypt::encryptString($this->id);
    }

    public function getEncriptParentAttribute() {
        return Crypt::encryptString($this->parent_id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Model\Category', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movieCategories()
    {
        return $this->hasMany('App\Model\MovieCategory');
    }
}
