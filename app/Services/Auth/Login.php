<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Login {

    public function __construct(private UserRepository $repository)
    {

    }

    public function login(array $loginData) : User
    {

        $user = $this->getUser($loginData['username']);

        $this->checkPassword($user, $loginData['password']);

        $token = $this->getToken($user);

        $user->token = $token;

        return $user;

    }

    private function getUser(string $username) : User
    {
        $user = $this->repository->getByCondtion(['username' => $username]);

        if(!$user){
            throw new ModelNotFoundException('Invalid User');
        }

        return $user;
    }

    private function checkPassword(User $user, string $password) : bool
    {
        if (!Hash::check($password, $user->password)) {
            throw new AuthenticationException('Invalid username of password');
        }

        return true;
    }

    private function getToken(User $user) : string
    {
        $token = $user->createToken('access_token', ['simple-user'])->plainTextToken;
        return $token;
    }
}