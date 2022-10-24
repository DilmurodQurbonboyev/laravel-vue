<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\UserDataService;
use App\Services\OneIdLoginService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected string $redirectTo = RouteServiceProvider::HOME;

    public OneIdLoginService $oneIdLoginService;
    public UserService $userService;
    public UserDataService $userDataService;


    public function __construct(
        OneIdLoginService $oneIdLoginService,
        UserService       $userService,
        UserDataService   $userDataService
    )
    {
        $this->middleware('guest')->except('logout');
        $this->oneIdLoginService = $oneIdLoginService;
        $this->userService = $userService;
        $this->userDataService = $userDataService;
    }

    public function oneId()
    {
        return redirect($this->oneIdLoginService->getOneId());
    }

    public function check(Request $request): JsonResponse
    {
        $accessToken = $this->oneIdLoginService->getAccessToken($request)['access_token'];
        $responseData = $this->oneIdLoginService->sendAccessToken($accessToken);
        $userInfo = json_decode($responseData, true);
        $userData = UserData::query()
            ->where(['user_id' => $userInfo['user_id'], 'pin' => $userInfo['pin']])
            ->first();
        if ($userData) {
            $user = User::query()
                ->where('name', $userData['user_id'])
                ->where('password', $userData['pin'])
                ->first();
        } else {
            $user = $this->userService->create($userInfo);
            $this->userDataService->create($userInfo, $user);
        }

        Auth::guard('web')->login($user);

        return response()->json([
            'user' => $user
        ]);
//        return $this->authenticated($request, $this->guard()->user()) ?: redirect()->intended($this->redirectPath());
    }
}
