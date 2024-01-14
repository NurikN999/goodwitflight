<?php

namespace App\Http\Repositories\Interfaces;

interface ApplicationRepositoryInterface extends RepositoryInterface
{

    public function findApplicationById(int $id);

    public function findApplictionByState(string $state);

}
