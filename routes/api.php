<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassSetupController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LessonPartController;
use App\Http\Controllers\LessonPartEvaluationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\UserTypeController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix("/v1")->group(function () {

    Route::prefix("/auth")->group(function () {
        Route::post("login", [AuthController::class, "login"]);
        Route::post("register", [AuthController::class, "register"]);
        Route::put("profile", [AuthController::class, "profile"]);
        Route::post("logout", [AuthController::class, "logout"]);
    });
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

    Route::prefix("subject-management")->group(function () {

        Route::get("", [SubjectController::class, "index"]); // get all department
        Route::post("", [SubjectController::class, "store"]); // create user
        Route::get("{id}", [SubjectController::class, "show"])->whereNumber("id"); // get department details
        Route::get("user/{id}", [SubjectController::class, "userSubjects"])->whereNumber("id"); // get user's subjects
        Route::put("{id}", [SubjectController::class, "update"])->whereNumber("id"); // update department details
        Route::delete("{id}", [SubjectController::class, "destroy"])->whereNumber("id"); // delete department
    });

    Route::prefix("unit-management")->group(function () {

        Route::get("", [UnitController::class, "index"]); // get all department
        Route::post("", [UnitController::class, "store"]); // create user
        Route::get("{id}", [UnitController::class, "show"])->whereNumber("id"); // get department details
        Route::get("subject/{id}", [UnitController::class, "subjectsUnit"])->whereNumber("id"); // get subject's units
        Route::put("{id}", [UnitController::class, "update"])->whereNumber("id"); // update department details
        Route::delete("{id}", [UnitController::class, "destroy"])->whereNumber("id"); // delete department
    });

    Route::prefix("lesson-management")->group(function () {

        Route::get("", [LessonController::class, "index"]); // get all lessons
        Route::post("", [LessonController::class, "store"]); // create new lesson
        Route::get("{id}", [LessonController::class, "show"])->whereNumber("id"); // get lesson details
        Route::get("subject/{id}", [LessonController::class, "lessonsPerUnit"])->whereNumber("id"); // get unit's lessons
        Route::put("{id}", [LessonController::class, "update"])->whereNumber("id"); // update lesson details
        Route::delete("{id}", [LessonController::class, "destroy"])->whereNumber("id"); // delete lesson
    });

    Route::prefix("lesson-part-management")->group(function () {

        Route::get("", [LessonPartController::class, "index"]); // get all lessons
        Route::post("", [LessonPartController::class, "store"]); // create new lesson
        Route::get("{id}", [LessonPartController::class, "show"])->whereNumber("id"); // get lesson details
        Route::put("{id}", [LessonPartController::class, "update"])->whereNumber("id"); // update lesson part details
        Route::delete("{id}", [LessonPartController::class, "destroy"])->whereNumber("id"); // delete lesson
    });

    Route::prefix("lesson-evaluation")->group(function () {

        Route::get("", [LessonPartEvaluationController::class, "index"]); // get all lessons
        Route::post("", [LessonPartEvaluationController::class, "store"]); // create new lesson evaluation
        Route::get("{id}", [LessonPartEvaluationController::class, "show"])->whereNumber("id"); // get lesson details
        Route::put("{id}", [LessonPartEvaluationController::class, "update"])->whereNumber("id"); // update lesson part details
        Route::delete("{id}", [LessonPartEvaluationController::class, "destroy"])->whereNumber("id"); // delete lesson
    });
});
