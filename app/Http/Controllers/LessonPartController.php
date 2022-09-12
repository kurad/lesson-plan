<?php

namespace App\Http\Controllers;

use App\DTO\LessonParts\UpdateLessonPartDto;
use App\Http\Requests\LessonPart\CreateLessonPartRequest;
use App\Services\LessonPartService;
use Exception;
use Illuminate\Support\Facades\Response;

class LessonPartController extends Controller
{
    public function __construct(public LessonPartService $lessonParts)
    {
    }

    public function index()
    {
        $result = $this->lessonParts->allLessonParts()->toArray();

        return Response::json($result);
    }

    public function store(CreateLessonPartRequest $request)
    {
        try {

            $lessonPart = $this->lessonParts->createLessonPart($request->dto);
            return Response::json($lessonPart);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }

    public function show(int $id)
    {
        try {
            $lessonPart = $this->lessonParts->getLessonPart($id);
            return Response::json($lessonPart);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }

    public function update(UpdateLessonPartDto $request, int $id)
    {
        try {
            $lessonPart = $this->lessonParts->updateLessonPart($request->dto, $id);
            return Response::json($lessonPart);
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
            $lessonPart = $this->lessonParts->destroyLessonPart($id);
            return Response::json($lessonPart);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }
}
