<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Resources\Resource;
use App\Services\UniversityService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function __construct(
        protected UniversityService $service,
    )
    {
    }

    public function index(ListRequest $request): Resource
    {
        $data = $this->service->all($request->validated());
        return new Resource($data);
    }

    public function show(int $id, Request $request): JsonResponse
    {
        $data = $this->service->show($id);
        return success($data);
    }
}
