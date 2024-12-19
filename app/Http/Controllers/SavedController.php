<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\Saved\AddRequest;
use App\Http\Resources\Resource;
use App\Services\SavedService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SavedController extends Controller
{
    public function __construct(
        protected SavedService $service,
    )
    {
    }

    public function list(ListRequest $request): Resource
    {
        $data = $this->service->list($request->validated());
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
