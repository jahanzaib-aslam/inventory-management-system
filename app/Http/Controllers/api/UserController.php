<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\CreateUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $service)
    {
    }

    public function create(CreateUserRequest $request) : JsonResponse
    {
        $response =  $this->service->create($request->validated());
        return response()->success($response->code(), $response->message(), $response->getData());
    }

    public function update(UpdateUserRequest $request) : JsonResponse
    {
        $response =  $this->service->update($request->validated());
        return response()->success($response->code(), $response->message(), $response->getData());

    }
}