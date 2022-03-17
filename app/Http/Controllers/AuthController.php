<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Atentica usuário e retorna um token caso sucesso no login.
     *
     * @return string
     */
    public function login(Request $request)
    {
        $credentials = $request->all(['email', 'password']);
        $token = auth('api')->attempt($credentials);
        if ($token) {
            return response()->json(
                [
                    'status' => 200,
                    'message' => 'User logged in success. :)',
                    'token' => $token
                ] 
            );
        }

        return response()->json(
            [
                'status' => 403,
                'message' => 'Invalid email or password. :(',
                'token' => $token
            ], 403
        );
    }

    public function logout()
    {
        return 'success';
    }

    public function refresh()
    {
        return 'success';
    }

    public function me()
    {
        return 'success';
    }
}
