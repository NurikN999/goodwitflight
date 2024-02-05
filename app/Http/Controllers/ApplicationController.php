<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Interfaces\ApplicationRepositoryInterface;
use App\Http\Requests\ApplicationStoreRequest;
use App\Http\Requests\ApplicationUpdateRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    private $applicationRepository;

    public function __construct(ApplicationRepositoryInterface $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
    }

    public function index(Request $request)
    {
        $filters = $request->query();
        return response($this->applicationRepository->all($filters), Response::HTTP_OK);
    }

    public function show(int $id)
    {
        return response()->json(
            $this->applicationRepository->findApplicationById($id),
            Response::HTTP_OK
        );
    }

    public function store(ApplicationStoreRequest $request)
    {
        return response()->json(
            $this->applicationRepository->create(
                array_merge($request->all(), ['state' => 'new'])
            ),
            Response::HTTP_CREATED
        );
    }

    public function update(
        ApplicationUpdateRequest $request,
        int $id
    )
    {
        return response(
            $this->applicationRepository->update($request->all(), $id),
            Response::HTTP_OK
        );
    }

    public function destroy(int $id)
    {
        return response(
            $this->applicationRepository->delete($id),
            Response::HTTP_NO_CONTENT
        );
    }
}
