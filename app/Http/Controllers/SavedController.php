<?php

namespace App\Http\Controllers;

use App\Http\Requests\Saved\SaveRequest;
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

    public function save(SaveRequest $request): JsonResponse
    {
        $this->service->save($request->validated());
        return success();
    }
}
