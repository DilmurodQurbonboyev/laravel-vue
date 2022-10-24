<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('check', [LoginController::class, 'check']);

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::controller(LoginController::class)
    ->prefix('admin')
    ->group(function () {
        Route::get('/oneId', 'oneId')->name('oneId');
        Route::get('/check', 'check')->name('check');
        Route::get('/login-site', 'getLoginSiteForm')->name('getLoginSiteForm');
        Route::post('/login-site', 'setLoginSiteForm')->name('setLoginSiteForm');
});

//Route::get('select-role', [AdminController::class, 'getRole'])->name('getRole');
//Route::get('change-role', [AdminController::class, 'changeRole'])->name('changeRole');
//Route::post('select-role', [AdminController::class, 'setRole'])->name('setRole');
//
