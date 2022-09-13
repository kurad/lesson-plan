<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileFormRequest;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum")->except(["login", "register"]);
    }

    public function login(LoginFormRequest $request)
    {
        $email = $request->dto->email;
        $password = $request->dto->password;

        /** @var User */
        $user = User::where('email', $request['email'])->first();

        if (is_null($user)) {
            return Response()->json([
                'message' => 'Invalid  credentials'
            ], 401);
        }

        $isValid =  Hash::check($password, $user->password);
        if (!$isValid) {
            return Response()->json([
                'message' => 'Invalid  credentials'
            ], 401);
        }

        $allPermissions = config("permissions");

        dd($allPermissions);

        $userPermissions = [];

        if ($user->user_type_id == 1) {

            $userPermissions = $allPermissions["teacher"];
        } else {

            $userPermissions = $allPermissions["hod"];
        }

        $token = $user->createToken('auth_token', $userPermissions)->plainTextToken;


        return response()->json([
            'user' => $user->only(["email", "f_name"]),
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    public function register(RegisterFormRequest $request)
    {
        $firstName = $request->dto->firstName;
        $lastName = $request->dto->lastName;
        $departmentId = $request->dto->departmentId;
        $userTypeId = $request->dto->userTypeId;
        $phoneNumber = $request->dto->phoneNumber;
        $email = $request->dto->email;
        $password = bcrypt($request->dto->password);

        try {
            $user = User::create([
                "department_id" => $departmentId,
                "user_type_id" => $userTypeId,
                "f_name" => $firstName,
                "l_name" => $lastName,
                "phone" => $phoneNumber,
                "email" => $email,
                "password" => $password,
            ]);

            return $user;
        } catch (Exception $th) {
            Log::error("Failed to create user ", [
                "message" => $th->getMessage(),
                "function" => __FUNCTION__,
                "class" => __CLASS__,
                "trace" => $th->getTrace()
            ]);
            throw new Exception("Sorry, there were some issues, contact the system admin");
        }
    }

    public function getLoggedUser(Request $request)
    {
        $user = $request->user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user->only(["email", "f_name"]),
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    public function profile()
    {
        $user = request()->user();


        return response()->json([
            "data" => $user
        ]);
    }

    public function updateProfile(UpdateProfileFormRequest $request): User
    {
        $user = request()->user();
        if (is_null($user)) {
            throw new Exception("The user does not exist");
        }

        $firstName = $request->dto->firstName;
        $lastName = $request->dto->lastName;
        $departmentId = $request->dto->departmentId;
        $phoneNumber = $request->dto->phoneNumber;
        $email = $request->dto->email;
        $password = bcrypt($request->dto->password);

        try {
            $user->update([
                "department_id" => $departmentId,
                "f_name" => $firstName,
                "l_name" => $lastName,
                "phone" => $phoneNumber,
                "email" => $email,
                "password" => $password,
            ]);

            return $user;
        } catch (Exception $th) {

            Log::error("Failed to update user profile ", [
                "message" => $th->getMessage(),
                "function" => __FUNCTION__,
                "class" => __CLASS__,
                "trace" => $th->getTrace()
            ]);
            throw new Exception("Sorry, there were some issues, contact the system admin");
        }
    }

    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }
        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
