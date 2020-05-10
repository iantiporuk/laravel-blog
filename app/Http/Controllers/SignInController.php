<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;

class SignInController extends Controller
{
    public function signIn(SignInRequest $request) {
        return "Redirect to account";
    }
}
