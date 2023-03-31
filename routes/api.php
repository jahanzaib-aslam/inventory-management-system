<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\ProductTypeController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::prefix('admin')->group(function () {
        Route::group(['excluded_middleware' => ['auth:sanctum']], function () {
            Route::controller(AuthController::class)->group(function () {
                Route::post('/login', 'login');
            });
    });

    Route::get('logout', [AuthController::class, 'logout']);

    Route::prefix('user')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::post('/create', 'create');
            Route::post('/update', 'update');
        });
    });

    Route::prefix('product')->group(function () {
        Route::controller(ProductController::class)->group(function () {
            Route::post('/create', 'create');
            Route::get('/show/{id}', 'show');
            Route::post('/update', 'update');
            Route::delete('/delete/{product}', 'delete');
            Route::get('/list', 'list');
        });

        Route::prefix('type')->group(function () {
            Route::controller(ProductTypeController::class)->group(function () {
                Route::post('/create', 'create');
                Route::post('/show', 'show');
                Route::post('/update', 'update');
                Route::delete('/delete/{type}', 'delete');
                Route::post('/list', 'list');
            });
        });
    });

    });
});