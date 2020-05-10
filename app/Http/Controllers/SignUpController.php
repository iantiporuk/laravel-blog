<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;

class SignUpController extends Controller
{
    public function signUp(SignUpRequest $request) {

        return "Redirect to account";
    }
}
