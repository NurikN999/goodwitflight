<?php

namespace App\Http\Repositories\Interfaces;

interface RepositoryInterface
{
    public function all(array $filters = []);

    public function create(array $data);

    public function update(array $data, int $id);

    public function delete(int $id);
}
