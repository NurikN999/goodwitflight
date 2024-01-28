<?php

namespace App\Http\Repositories\Application;

use App\Http\Repositories\Interfaces\ApplicationRepositoryInterface;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;

class ApplicationRepository implements ApplicationRepositoryInterface
{

    public function all()
    {
        return [
            'success' => true,
            'data' => ApplicationResource::collection(Application::all())
        ];
    }

    public function create(array $data)
    {
        $application = Application::create($data);

        return [
            'success' => true,
            'data' => new ApplicationResource($application)
        ];
    }

    public function update(array $data, int $id)
    {
        $application = Application::find($id);

        $application->update($data);

        return [
            'success' => true,
            'data' => new ApplicationResource($application)
        ];
    }

    public function delete(int $id)
    {
        $application = Application::find($id);

        $application->delete();

        return [
            'success' => true,
            'data' => null
        ];
    }

    public function findApplicationById(int $id)
    {
        return [
            'success' => true,
            'data' => new ApplicationResource(Application::find($id))
        ];
    }

    public function findApplictionByState(string $state)
    {
        return [
            'success' => true,
            'data' => ApplicationResource::collection(Application::where('state', $state)->get())
        ];
    }

}
