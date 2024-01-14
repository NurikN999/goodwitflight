<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Interfaces\ApplicationRepositoryInterface;
use App\Http\Requests\ApplicationStoreRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    private $applicationRepository;

    public function __construct(ApplicationRepositoryInterface $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
    }

    public function index()
    {
        return response($this->applicationRepository->all(), Response::HTTP_OK);
    }

    public function show(int $id)
    {
        return response($this->applicationRepository->findApplicationById($id), Response::HTTP_OK);
    }

    public function store(ApplicationStoreRequest $request)
    {
        return response(
            $this->applicationRepository->create($request->all()),
            Response::HTTP_CREATED
        );
    }

    public function update(Request $request, int $id)
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
