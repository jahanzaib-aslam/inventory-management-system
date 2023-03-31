<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function __construct(private AuthService $service)
    {
    }


    public function login(LoginRequest $request) : JsonResponse
    {
        $response = $this->service->login($request->validated());
        return response()->success($response->code(), $response->message(), $response->getData());
    }

    public function logout(): JsonResponse
    {
        $response = $this->service->logout();
        return response()->success($response->code(), $response->message(), $response->getData());
    }
}
