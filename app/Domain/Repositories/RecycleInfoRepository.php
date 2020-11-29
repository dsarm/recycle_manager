<?php namespace Recycle\Domain\Repositories;

use Recycle\Recycle;
use Recycle\RecycleInfo;

class RecycleInfoRepository implements RecycleInfoRepositoryInterface {

    protected $recycleInfo;

    public function __construct(RecycleInfo $recycleInfo)
    {
        $this->recycleInfo = $recycleInfo;
    }

    public function listAll()
    {
        return $this->recycleInfo->get();
    }

    public function getRecycleInfoById($id)
    {
        return $this->recycleInfo->findOrFail( $id );
    }

    public function createRecycleInfo( Recycle $recycle, $input )
    {
        
        $recycleInfoData = array_only($input,
            array(
                'name',
                'description',
                'recycle_size'
            )
        );

		try {

			$recycleInfo = $recycle->recycle_info()->create([
                'name' => $recycleInfoData['name'],
                'description' => $recycleInfoData['description'],
                'size' => $recycleInfoData['recycle_size'][0]
            ]);
            
		} catch ( \Exception $e ) {

            echo 'Error: RecycleInfoRepository@createRecycleInfo'.PHP_EOL;
			echo $e->getMessage();
			dd($recycleInfoData);
		}

        return $recycleInfo;
    }

    public function updateRecycleInfo( Recycle $recycle, $input )
    {
        $recycleInfoData = array_only($input,
            array(
                'name',
                'description',
                'recycle_size'
            )
        );

        try {

            $result = $recycle->recycle_info()->update([
                'name' => $recycleInfoData['name'],
                'description' => $recycleInfoData['description'],
                'size' => $recycleInfoData['recycle_size'][0]
            ]);
            
        } catch ( \Exception $e ) {

            echo 'Error: RecycleInfoRepository@updateRecycleInfo'.PHP_EOL;
            echo $e->getMessage();
            dd($recycleInfoData);
        }

        return $result;
    }
}