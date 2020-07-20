<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @param AuthRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function login(AuthRequest $request)
    {

        $creds = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (!Auth::attempt($creds)) {
            return response(['message' => 'Invalid credentials.']);
        }

        $user = Auth::getUser();
        $token = $user->createToken($user->email)->accessToken;

        return response([
            'accessToken' => $token,
        ]);
    }
}
