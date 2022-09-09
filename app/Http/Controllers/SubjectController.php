<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subject\CreateSubjectRequest;
use App\Http\Requests\Subject\UpdateSubjectRequest;
use App\Services\SubjectService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SubjectController extends Controller
{
    public function __construct(public SubjectService $subjectService)
    {
    }

    public function index()
    {
        $result = $this->subjectService->allSubjects()->toArray();

        return Response::json($result);
    }

    public function store(CreateSubjectRequest $request)
    {
        try {

            $class = $this->subjectService->createSubject($request->dto);
            return Response::json($class);
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
            $subject = $this->subjectService->getSubject($id);
            return Response::json($subject);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }

    public function userSubjects(int $id)
    {
        try {
            $subjects = $this->subjectService->subjectsPerUser($id);
            return Response::json($subjects);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }

    public function update(UpdateSubjectRequest $request, int $id)
    {
        try {
            $class = $this->subjectService->updateSubject($request->dto, $id);
            return Response::json($class);
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
            $class = $this->subjectService->destroySubject($id);
            return Response::json($class);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }
}