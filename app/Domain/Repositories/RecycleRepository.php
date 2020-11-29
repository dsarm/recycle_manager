<?php namespace Recycle\Domain\Repositories;

use Recycle\Recycle;

class RecycleRepository implements RecycleRepositoryInterface {

    protected $recycle;

    public function __construct(Recycle $recycle)
    {
        $this->recycle = $recycle;
    }

    public function listAll()
    {
        return $this->recycle->get();
    }

    public function getRecycleById($id)
    {
        return $this->recycle->findOrFail( $id );
    }

    public function createRecycle( $input )
    {
        $recycleData = array_only($input,
            array(
                "code"
            )
        );
        
        $recycle = new Recycle;
        $recycle->code = $recycleData["code"];

        try {

            $result = $recycle->save();
            
        }
        catch ( \Exception $e ) {

            echo 'Error: RecycleRepository@createRecycle'.PHP_EOL;
            echo $e->getMessage();
            dd($recycle);
        }
        
        return $recycle;
    }

    public function removeRecycle(Recycle $recycle)
    {
        try {

            $result = $recycle->delete();
            
        }
        catch ( \Exception $e ) {

            echo 'Error: RecycleRepository@removeRecycle';
            echo '<br>';
            echo '<br>';
            echo $e->getMessage();
            dd($recycle);
        }

        return $result;
    }

    public function syncRecycleTypes(Recycle $recycle, $input)
    {
        $recycleTypeData = array_only($input,
            array(
                "recycle_type_id"
            )
        );

        try {

            $result = $recycle->recycle_type()->sync( 
                $recycleTypeData["recycle_type_id"] 
            );
            
        }
        catch ( \Exception $e ) {

            echo 'Error: RecycleRepository@syncRecycleTypes'.PHP_EOL;
            echo $e->getMessage();
            dd($recycle);
        }

        return $result;
    }
}