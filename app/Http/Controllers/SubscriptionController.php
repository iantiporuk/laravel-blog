<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('subscribe');
    }

    /**
     * Subscribe user by email
     *
     * @param Request $request
     */
    public function subscribe(Request $request)
    {

    }

    /**
     * Unsubscribe user by email
     *
     * @param Request $request
     */
    public function unsubscribe(Request $request)
    {

    }
}
