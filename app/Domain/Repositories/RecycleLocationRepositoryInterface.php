<?php namespace Recycle\Domain\Repositories;

use Recycle\Recycle;
interface RecycleLocationRepositoryInterface {

    public function listAll();

    public function getRecycleLocationById($id);

    public function createRecycleLocation( Recycle $recycle, $input );
}