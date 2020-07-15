<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('contact');
    }


    /**
     * Save contact form data
     *
     * @param ContactRequest $request
     * @return RedirectResponse
     */
    public function submit(ContactRequest $request)
    {
        $request->validated();

        $contact = new Contact($request->all());
        $contact->save();

        return redirect()
            ->back()
            ->with('success', __('Your message was sent and will be processed as soon as possible.'));
    }
}
