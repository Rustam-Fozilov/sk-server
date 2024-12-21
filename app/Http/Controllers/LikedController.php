<?php

namespace App\Http\Controllers;

use App\Http\Requests\Liked\AddRequest;
use App\Http\Requests\ListRequest;
use App\Http\Resources\Resource;
use App\Services\LikedService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LikedController extends Controller
{
    public function __construct(
        protected LikedService $service,
    )
    {
    }

    public function list(ListRequest $request): Resource
    {
        $data = $this->service->list($request->all());
        return new Resource($data);
    }

    public function add(AddRequest $request): JsonResponse
    {
        $this->service->add($request->validated());
        return success();
    }

    public function delete(AddRequest $request): JsonResponse
    {
        $this->service->delete($request->validated());
        return success();
    }
}
