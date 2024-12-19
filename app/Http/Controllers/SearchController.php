<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\Search\SaveSearchRequest;
use App\Services\SearchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(
        protected SearchService $service,
    )
    {
    }

    public function search(ListRequest $request): JsonResponse
    {
        $data = $this->service->search($request->validated());
        return success($data);
    }

    public function save(SaveSearchRequest $request): JsonResponse
    {
        $this->service->save($request->validated());
        return success();
    }
}
