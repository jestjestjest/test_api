<?php

namespace App\Http\Controllers\api\v1\auth;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth('custom_api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }


    public function logout()
    {
        auth('custom_api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('custom_api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('custom_api')->factory()->getTTL()
        ]);
    }

    public function guard()
    {
        return \Auth::Guard('custom_api');
    }
}
