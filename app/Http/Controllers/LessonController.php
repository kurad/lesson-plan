<?php

namespace App\Http\Controllers;

use App\Exceptions\ActionIsForbiddenException;
use App\Http\Requests\Lesson\CreateLessonRequest;
use App\Http\Requests\Lesson\UpdateLessonRequest;
use App\Models\User;
use App\Services\LessonService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LessonController extends Controller
{
    public function __construct(public LessonService $lessonService)
    {

        //$this->middleware(["auth:sanctum"]);
    }

    public function index()
    {
        // /** @var User */
        // $user = request()->user();
        // if (!$user->tokenCan("lessons:all")) {
        //     throw new ActionIsForbiddenException();
        // }

        $lessons = $this->lessonService->allLessons()->toArray();
        return Response::json($lessons);
    }

    public function store(CreateLessonRequest $request)
    {
        /** @var User */
        $user = request()->user();
        if (!$user->tokenCan("lessons:create")) {
            throw new ActionIsForbiddenException();
        }

        try {

            $lesson = $this->lessonService->createLesson($request->dto);
            return Response::json($lesson);
        } catch (Exception $th) {

            $error = getHttpMessageAndStatusCodeFromException($th);

            return Response::json([
                "message" => $error["message"],
            ], $error["status"]);
        }
    }

    public function show(int $id)
    {
        try {
            $lesson = $this->lessonService->getLesson($id);
            return Response::json($lesson);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }

    public function lessonsPerUnit(int $id)
    {
        try {
            $lessons = $this->lessonService->lessonsPerUnit($id);
            return Response::json($lessons);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }

    public function update(UpdateLessonRequest $request, int $id)
    {
        try {
            $lesson = $this->lessonService->updateLesson($request->dto, $id);
            return Response::json($lesson);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }

    public function destroy(int $id)
    {
        try {
            $lesson = $this->lessonService->destroyLesson($id);
            return Response::json($lesson);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }
}