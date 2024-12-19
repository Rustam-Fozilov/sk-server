<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\ListRequest;
use App\Http\Resources\Resource;
use App\Services\BlogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(
        protected BlogService $service,
    )
    {
    }

    public function index(ListRequest $request): Resource
    {
        $data = $this->service->list($request->validated());
        return new Resource($data);
    }

    public function show(Request $request, $id): JsonResponse
    {
        $data = $this->service->show($id);
        return success($data);
    }
}
