<?php

namespace App\Http\Repositories\User;

use App\Http\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function all()
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    public function create(array $data)
    {
        $user = User::create($data);

        return new UserResource($user);
    }

    public function update(array $data, int $id)
    {
        $user = User::findOrFail($id);

        $user->update($data);

        return new UserResource($user);
    }

    public function delete(int $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return new UserResource($user);
    }

    public function findUserByEmail(string $email)
    {
        return new UserResource(User::where('email', $email)->first());
    }

    public function findUserById(int $id)
    {
        return new UserResource(User::findOrFail($id));
    }

}
