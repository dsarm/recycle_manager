<?php

namespace Recycle;

use Illuminate\Database\Eloquent\Model;

class RecycleLocation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recycle_location';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lng', 
        'lat', 
        'pitch',
        'heading',
        'address', 
        'postal_code', 
        'recycle_id',
        'city',
        'country'
    ];

    public function recycle()
    {
        return $this->belongsTo('Recycle\Recycle');
    }
}