<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Resources\Resource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        protected UserService $service,
    )
    {
    }

    public function me(): JsonResponse
    {
        $data = $this->service->me();
        return success($data);
    }

    public function saved(ListRequest $request): Resource
    {
        $data = $this->service->saved($request->validated());
        return new Resource($data);
    }

    public function searchHistory(ListRequest $request): Resource
    {
        $data = $this->service->searchHistory($request->validated());
        return new Resource($data);
    }
}
