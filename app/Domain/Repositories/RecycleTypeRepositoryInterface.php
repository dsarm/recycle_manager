<?php namespace Recycle\Domain\Repositories;

interface RecycleTypeRepositoryInterface {

    public function listAll();

    public function getRecycleTypeById($id);

    public function createRecycleType($input);
}