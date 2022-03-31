<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

/**
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property MovieGenre[] $movieGenres
 */
class Genre extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    protected $appends  = ['encript'];

    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at'];

    protected $hidden = [
        'id'
    ];

    public function getEncriptAttribute() {
        return Crypt::encryptString($this->id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movieGenres()
    {
        return $this->hasMany('App\Model\MovieGenre');
    }
}
