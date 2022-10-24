<?php

namespace App\Services;

use App\Models\UserData;
use App\Repositories\UserDataRepository;

class UserDataService
{
    private UserDataRepository $userDataRepository;

    public function __construct(UserDataRepository $userDataRepository)
    {
        $this->userDataRepository = $userDataRepository;
    }

    public function create($request, $user): UserData
    {
        return $this->userDataRepository->save($request, $user);
    }
}
