<?php

namespace App\Services\User;

use App\Helpers\ResponseCode;
use App\Http\Resources\user\UserResource;
use App\Repositories\UserRepository;
use App\Responses\UserResponse;
use Illuminate\Http\Request;

class UserService {

    public function __construct(private UserRepository $repository, private UserResponse $response, private Request $request)
    {
    }

    public function create(array $request) : UserResponse
    {
        $user =  $this->repository->create($request);
        $user =  new UserResource($user);
        $this->response->setResponse(ResponseCode::Regular->value, 'success', $user->toArray($this->request));
        return $this->response;
    }

    public function update(array $request) : UserResponse
    {
        $this->repository->update($request['id'], $request);
        $user =  $this->repository->getById($request['id']);
        $user =  new UserResource($user);
        $this->response->setResponse(ResponseCode::Regular->value, 'success', $user->toArray($this->request));
        return $this->response;
    }
}