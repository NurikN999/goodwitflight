<?php

namespace App\Http\Repositories\Interfaces;

interface UserRepositoryInterface extends RepositoryInterface
{

    public function findUserByEmail(string $email);

    public function findUserById(int $id);

}
