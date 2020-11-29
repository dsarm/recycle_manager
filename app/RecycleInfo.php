<?php

namespace Recycle;

use Illuminate\Database\Eloquent\Model;

class RecycleInfo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recycle_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name', 
    	'description', 
        'size', 
    	'recycle_id'
	];


    public function recycle()
    {
        return $this->belongsTo('Recycle\Recycle');
    }

}
