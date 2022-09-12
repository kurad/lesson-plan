<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginFormRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

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


        $token = $user->createToken('auth_token')->plainTextToken;


        return response()->json([
            'user' => $user->only(["email", "f_name"]),
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
