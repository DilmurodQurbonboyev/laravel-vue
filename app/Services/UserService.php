<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($request): User
    {
        $user = User::create(
            $request['user_id'],
            $request['email'],
            $request['pin'],
        );
        $this->userRepository->save($user);
        return $user;
    }
}
