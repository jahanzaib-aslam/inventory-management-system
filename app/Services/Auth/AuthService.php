<?php

namespace App\Services\Auth;

use App\Helpers\ResponseCode;
use App\Http\Requests\user\LoginRequest;
use App\Http\Resources\user\LoginResource;
use App\Models\User;
use App\Responses\UserResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService {

    public function __construct(private UserResponse $response, private Request $request)
    {

    }

    public function login(array $request) : UserResponse
    {

        $loginService = app(Login::class);

        $user = $loginService->login($request);

        $user = new LoginResource($user);

        $this->response->setResponse(ResponseCode::Regular->value, 'logged in successfully',  $user->toArray($this->request));

        return $this->response;
    }

    public function logout() : UserResponse
    {
        auth()->user()->currentAccessToken()->delete();

        $this->response->setResponse(ResponseCode::Regular->value, 'logged out successfully');

        return $this->response;

    }
}