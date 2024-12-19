<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\Search\AddHistoryRequest;
use App\Http\Resources\Resource;
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

    public function searchHistoryList(ListRequest $request): Resource
    {
        $data = $this->service->searchHistoryList($request->validated());
        return new Resource($data);
    }

    public function addSearchHistory(AddHistoryRequest $request): JsonResponse
    {
        $this->service->addSearchHistory($request->validated());
        return success();
    }

    public function deleteSearchHistory(AddHistoryRequest $request): JsonResponse
    {
        $this->service->deleteSearchHistory($request->validated());
        return success();
    }
}
