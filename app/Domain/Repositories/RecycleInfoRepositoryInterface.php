<?php namespace Recycle\Domain\Repositories;

use Recycle\Recycle;

interface RecycleInfoRepositoryInterface {

    public function listAll();

    public function getRecycleInfoById($id);

    public function createRecycleInfo( Recycle $recycle, $input );
}