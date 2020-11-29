<?php

namespace Recycle;

use Illuminate\Database\Eloquent\Model;

class RecycleType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recycle_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'slug', 
        'description', 
        'color', 
        'active'
    ];

    public function recycles()
    {
        return $this->belongsToMany('Recycle\Recycle');
    }
}
