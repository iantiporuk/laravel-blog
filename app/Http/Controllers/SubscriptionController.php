<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('subscription');
    }

    /**
     * Subscribe user by email
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255', 'unique:subscriptions'],
        ]);

        $subscription = new Subscription($request->all());
        $subscription->save();

        return redirect()
            ->back()
            ->with('success', __('Thanks! Now you are subscribed.'));
    }

    /**
     * Unsubscribe user by email
     *
     * @param string $email
     * @param Request $request
     * @return RedirectResponse
     */
    public function unsubscribe(string $email, Request $request)
    {
        $subscription = Subscription::where('email', $email)->first();

        if (!$subscription) {
            return redirect()
                ->route('subscription')
                ->with('warning', __('You have not subscribed yet'));
        }

        $subscription->delete();

        return redirect()
            ->route('subscription')
            ->with('success', __('You have successfully unsubscribed.'));
    }
}
