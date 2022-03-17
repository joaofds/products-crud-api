<?php
namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Autentica usuário e retorna um token caso sucesso no login.
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
            ],
            403
        );
    }

    /**
     * Logout na API
     *
     * @return void
     */
    public function logout()
    {
        auth('api')->logout();

        return Response()->json(
            [
                'status' => 200,
                'message' => 'Logout success! Good bye... :)'
            ]
        );
    }

    /**
     * Renova o token do usuario autenticado.
     *
     * @return Response Json
     */
    public function refresh()
    {
        $token = auth('api')->refresh();

        return Response()->json(
            [
                'status' => 200,
                'message' => 'Refresh token success. :)',
                'token' => $token
            ]
        );
    }

    /**
     * Rota de verificação de usuario autenticado.
     *
     * @return Response Json
     */
    public function me()
    {
        return response()->json(
            [
                'status' => 200,
                'message' => 'Refresh token success. :)',
                'user_data' => auth()->user()
            ]
        );
    }
}
