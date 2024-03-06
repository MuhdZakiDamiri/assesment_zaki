<?php

use App\Http\Controllers\departmentContoller;
use App\Http\Controllers\userController;
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

Route::group(['middleware' => 'json.response'], function () {
    Route::group(['prefix' => 'user'], function () {
        // get all user
        Route::get('/', [userController::class, 'index']);

        // get user by id (single user)
        Route::get('/{user}', [userController::class, 'show']);

        // store new user with department
        Route::post('/', [userController::class, 'store']);

        // update user
        Route::put('/{user}', [userController::class, 'update']);

        // delete user
        Route::delete('/{user}', [userController::class, 'destroy']);
    });

    Route::group(['prefix' => 'department', 'middleware' => 'json.response'], function () {
        // get all departments
        Route::get('/', [departmentContoller::class, 'index']);

        // store new department
        Route::post('/', [departmentContoller::class, 'store']);

        // update department
        Route::put('/{department}', [departmentContoller::class, 'update']);

        // delete department
        Route::delete('/{department}', [departmentContoller::class, 'destroy']);
    });
});

