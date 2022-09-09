<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserType\CreateUserTypeRequest;
use App\Http\Requests\UserType\UpdateUserTypeRequest;
use App\Services\UserTypeService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserTypeController extends Controller
{
    public function __construct(public UserTypeService $userTypeService)
    {
    }


    public function index()
    {
        $result = $this->userTypeService->userTypes()->toArray();

        return Response::json($result);
    }

    public function create(CreateUserTypeRequest $request)
    {
        try {

            $userType = $this->userTypeService->createUserType($request->dto);
            return Response::json($userType);
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
            $userType = $this->userTypeService->show($id);
            return Response::json($userType);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }

    public function update(UpdateUserTypeRequest $request, int $id)
    {
        try {
            $userType = $this->userTypeService->updateUserType($request->dto, $id);
            return Response::json($userType);
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
            $userType = $this->userTypeService->destroyUserType($id);
            return Response::json($userType);
        } catch (Exception $th) {

            return Response::json([
                "error" => $th->getMessage(),
                "status" => 422
            ], 422);
        }
    }
}