<?php namespace Recycle\Domain\Repositories;

use Recycle\Recycle;

interface RecycleRepositoryInterface {

    public function listAll();

    public function getRecycleById($id);

    public function createRecycle($input);

    public function removeRecycle(Recycle $recycle);
}