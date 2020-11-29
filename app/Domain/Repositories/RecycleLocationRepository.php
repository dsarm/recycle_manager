<?php namespace Recycle\Domain\Repositories;

use Recycle\Recycle;
use Recycle\RecycleLocation;

class RecycleLocationRepository implements RecycleLocationRepositoryInterface {

    protected $recycleLocation;

    public function __construct(RecycleLocation $recycleLocation)
    {
        $this->recycleLocation = $recycleLocation;
    }

    public function listAll()
    {
        return $this->recycleLocation->get();
    }

    public function getRecycleLocationById($id)
    {
        return $this->recycleLocation->findOrFail( $id );
    }

    public function createRecycleLocation( Recycle $recycle, $input )
    {
        
        $recycleLocationData = array_only($input,
            array(
                'recycle_type_id',
                'lng',
                'lat',
                'pitch',
                'heading',
                'address',
                'postal_code',
                'city',
                'country',
            )
        );

		try {

			$recycleLocation = $recycle->recycle_location()->create([
                'lng' => $recycleLocationData['lng'],
                'lat' => $recycleLocationData['lat'],
                'pitch' => $recycleLocationData['pitch'],
                'heading' => $recycleLocationData['heading'],
                'address' => $recycleLocationData['address'],
                'postal_code' => $recycleLocationData['postal_code'],
                'city' => isset($recycleLocationData['city']) ? $recycleLocationData['city'] : null,
                'country' => isset($recycleLocationData['country']) ? $recycleLocationData['country'] : null ,
            ]);
            
		}
		catch ( \Exception $e ) {

            echo 'Error: RecycleLocationRepository@createRecycleLocation'.PHP_EOL;
			echo $e->getMessage();
			dd($recycleLocationData);
		}

        return $recycleLocation;
    }

    public function updateRecycleLocation( Recycle $recycle, $input )
    {

        $recycleLocationData = array_only($input,
            array(
                'recycle_type_id',
                'lng',
                'lat',
                'pitch',
                'heading',
                'address',
                'postal_code',
                'city',
                'country',
            )
        );

        try {

            $result = $recycle->recycle_location()->update([
                'lng' => $recycleLocationData['lng'],
                'lat' => $recycleLocationData['lat'],
                'pitch' => $recycleLocationData['pitch'],
                'heading' => $recycleLocationData['heading'],
                'address' => $recycleLocationData['address'],
                'postal_code' => $recycleLocationData['postal_code'],
                'city' => isset($recycleLocationData['city']) ? $recycleLocationData['city'] : null,
                'country' => isset($recycleLocationData['country']) ? $recycleLocationData['country'] : null ,
            ]);
            
        }
        catch ( \Exception $e ) {

            echo 'Error: RecycleLocationRepository@updateRecycleLocation'.PHP_EOL;
            echo $e->getMessage();
            dd($recycleLocationData);
        }

        return $result;
    }
}