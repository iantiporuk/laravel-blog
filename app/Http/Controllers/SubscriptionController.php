<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Subscription;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
        $request->validate(
            [
                'email' => ['required', 'email', 'max:255', 'unique:subscriptions'],
            ]
        );

        $subscription = new Subscription($request->all());
        $subscription->save();

        return redirect()
            ->back()
            ->with('success', __('Thanks! Now you are subscribed.'));
    }

    /**
     * Unsubscribe form
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function unsubscribeForm(Request $request)
    {
        $user = Auth::user();

        return view('unsubscription', ['email' => $user ? $user->email : '']);
    }

    /**
     * Unsubscribe form
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function unsubscribe(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'max:255'],
            ]
        );

        try {
            $subscription = Subscription::where('email', $request->get('email'))->firstOrFail();
            $subscription->delete();

            return redirect()
                ->route('subscription')
                ->with('success', __('You have successfully unsubscribed.'));
        } catch (\Exception $exception) {
            return redirect()
                ->route('unsubscription')
                ->with('warning', __('You have not subscribed yet'));
        }
    }
}
