<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::post('/login', LoginController::class);
    Route::post('/logout', LogoutController::class);
    Route::post('/register', RegisterController::class);
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Roles', 'prefix' => 'roles'], function () {
        Route::get('/', IndexController::class);
        Route::post('/', StoreController::class);
        Route::get('/{role}', ShowController::class);
        Route::patch('/{role}', UpdateController::class);
        Route::delete('/{role}', DestroyController::class);
    });

    Route::group(['namespace' => 'Users', 'prefix' => 'users'], function () {
        Route::get('/', IndexController::class);
        Route::post('/', StoreController::class);
        Route::get('/{user}', ShowController::class);
        Route::patch('/{user}', UpdateController::class);
        Route::delete('/{user}', DestroyController::class);
    });
});
