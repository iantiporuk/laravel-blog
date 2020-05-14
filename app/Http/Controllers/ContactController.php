<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('contact');
    }


    public function submit(ContactRequest $request)
    {
        $request->validated();

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('success', __('Your message was sent and will be processed is soon as possible.'));
    }
}
