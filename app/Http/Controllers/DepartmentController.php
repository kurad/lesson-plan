<?php

namespace App\Http\Controllers;

use App\Http\Requests\Department\CreateDepartmentRequest;
use App\Services\DepartmentService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DepartmentController extends Controller
{
    public function __construct(public DepartmentService $departmentService)
    {
    }


    public function departments()
    {

        $result = $this->departmentService->allDepartments()->toArray();

        return Response::json($result);
    }

    public function getDepartment(int $id)
    {
    }

    public function create(CreateDepartmentRequest $request)
    {
        try {

            $department = $this->departmentService->createDepartment($request->dto);
            return Response::json($department);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }

    public function updateDepartement(Request $request)
    {
    }

    public function destroyDepartment(int $id)
    {
    }
}