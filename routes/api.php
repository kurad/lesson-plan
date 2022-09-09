<?php

use App\Http\Controllers\ClassSetupController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\UserTypeController;
use App\Models\UserType;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('api')->group(function () {

    Route::resource('levels', LevelController::class);
});


Route::prefix("/v1")->group(function () {

    Route::prefix("user-management")->group(function () {

        Route::get("", [UserManagementController::class, "allUsers"]); // get all users
        Route::post("", [UserManagementController::class, "create"]); // create user
        Route::get("{id}", [UserManagementController::class, "getUser"])->whereNumber("id"); // get user details
        Route::put("{id}", [UserManagementController::class, "updateUser"])->whereNumber("id"); // update user details
        Route::delete("{id}", [UserManagementController::class, "destroyUser"])->whereNumber("id"); // delete user
    });

    Route::prefix("departments")->group(function () {

        Route::get("", [DepartmentController::class, "departments"]); // get all department
        Route::post("", [DepartmentController::class, "create"]); // create user
        Route::get("{id}", [DepartmentController::class, "getDepartment"])->whereNumber("id"); // get department details
        Route::put("{id}", [DepartmentController::class, "updateDepartment"])->whereNumber("id"); // update department details
        Route::delete("{id}", [DepartmentController::class, "destroyDepartment"])->whereNumber("id"); // delete department
    });

    Route::prefix("user-type")->group(function () {

        Route::get("", [UserTypeController::class, "index"]); // get all department
        Route::post("", [UserTypeController::class, "create"]); // create user
        Route::get("{id}", [UserTypeController::class, "show"])->whereNumber("id"); // get department details
        Route::put("{id}", [UserTypeController::class, "update"])->whereNumber("id"); // update department details
        Route::delete("{id}", [UserTypeController::class, "destroy"])->whereNumber("id"); // delete department
    });

    Route::prefix("class-setup")->group(function () {

        Route::get("", [ClassSetupController::class, "index"]); // get all department
        Route::post("", [ClassSetupController::class, "store"]); // create user
        Route::get("{id}", [ClassSetupController::class, "show"])->whereNumber("id"); // get department details
        Route::put("{id}", [ClassSetupController::class, "update"])->whereNumber("id"); // update department details
        Route::delete("{id}", [ClassSetupController::class, "destroy"])->whereNumber("id"); // delete department
    });
});