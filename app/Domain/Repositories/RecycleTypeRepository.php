<?php namespace Recycle\Domain\Repositories;

use Recycle\RecycleType;

class RecycleTypeRepository implements RecycleTypeRepositoryInterface {

    protected $recycleType;

    public function __construct(RecycleType $recycleType)
    {
        $this->recycleType = $recycleType;
    }

    public function listAll()
    {
        return $this->recycleType->get();
    }

    public function getRecycleTypeById($id)
    {
        return $this->recycleType->findOrFail( $id );
    }

    public function createRecycleType($input)
    {

        $recycleTypeData = array_only($input,
            array(
                'name',
                'description'
            )
        );

        $recycleType = new RecycleType;
        $recycleType->name = $recycleTypeData['name'];
        $recycleType->description = $recycleTypeData['description'];

		try {

			$result = $recycleType->create();
		}
		catch ( \Exception $e ) {

			echo $e->getMessage();
			dd($recycleType);
		}

        return $result;
    }
}