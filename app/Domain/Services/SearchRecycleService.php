<?php namespace Recycle\Domain\Services;


use Illuminate\Log\Writer as Log;


use Recycle\Recycle;
use Recycle\RecycleLocation;

use Recycle\Domain\Repositories\RecycleRepository;

class SearchRecycleService {


	protected $recycleRepository;

    public function __construct(
    	Recycle $recycle
    )
    {
    	$this->recycle = $recycle;
    }

    public function searchRecycleInsideArea($referenceArea)
    {

        $northEast = [
            'lat' => $referenceArea['north'], 
            'lng' => $referenceArea['east']
        ];

        $southWest = [
            'lat' => $referenceArea['south'], 
            'lng' => $referenceArea['west']
        ];

        $recycles = $this->recycle->whereHas('recycle_location', function ($query) use ( $northEast, $southWest ) {
        
            $query->where(
                'lat', '<=', $northEast['lat']
            )->where(
                'lat', '>=', $southWest['lat']
            )->where(
                'lng', '<=', $southWest['lng']
            )->where(
                'lng', '>=', $northEast['lng']
            );

        })->with([
            'recycle_location', 
            'recycle_location', 
            'recycle_info', 
            'recycle_type'
        ])->get();
        
        return $recycles;

    }



}