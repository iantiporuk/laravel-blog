<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Database\QueryException;
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
        return view('subscription');
    }

    /**
     * Subscribe user by email
     *
     * @param Request $request
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        try {
            $subscription = new Subscription;
            $subscription->email = $request->email;
            $subscription->save();

            return redirect()->back()->with('success', __('Thanks! Now you are subscribed.'));
        } catch (QueryException  $e) {

            // catch database exception like Duplicate entry
            return redirect()->back()->with('error', __('You have already subscribed.'));
        } catch (\Exception  $e) {

            return redirect()->back()->with('error', __('Something went wrong.'));
        }
    }

    /**
     * Unsubscribe user by email
     *
     * @param string $email
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unsubscribe(string $email, Request $request)
    {
        $subscription = Subscription::where('email', $email)->first();

        if (!$subscription) {
            return redirect()->route('subscription')->with('warning', __('You have not subscribed yet'));
        }

        $subscription->delete();

        return redirect()->route('subscription')->with('success', __('You have successfully unsubscribed.'));
    }
}
