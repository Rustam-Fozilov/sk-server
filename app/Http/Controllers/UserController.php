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
}
