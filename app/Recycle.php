<?php

namespace Recycle;

use Illuminate\Database\Eloquent\Model;

class Recycle extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recycle';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active', 
        'code'
    ];


    public function recycle_type()
    {
        return $this->belongsToMany('Recycle\RecycleType');
    }

    public function recycle_location()
    {
        return $this->hasOne('Recycle\RecycleLocation');
    }

    public function recycle_info()
    {
        return $this->hasOne('Recycle\RecycleInfo');
    }
}
