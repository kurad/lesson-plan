<?php

namespace App\Http\Controllers;

use App\Http\Requests\Classes\CreateClassRequest;
use App\Http\Requests\Classes\UpdateClassRequest;
use App\Services\ClassService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ClassSetupController extends Controller
{
    public function __construct(public ClassService $classService)
    {
    }

    public function index()
    {
        $result = $this->classService->allClasses()->toArray();

        return Response::json($result);
    }

    public function store(CreateClassRequest $request)
    {
        try {

            $class = $this->classService->createClass($request->dto);
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
            $class = $this->classService->getClass($id);
            return Response::json($class);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }

    public function update(UpdateClassRequest $request, int $id)
    {
        try {
            $class = $this->classService->updateClass($request->dto, $id);
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
            $class = $this->classService->destroyClass($id);
            return Response::json($class);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }
}