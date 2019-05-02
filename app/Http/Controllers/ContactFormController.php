<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
    	return view('contact.create');
    }

    public function store()
    {
    	$data = request()->validate([
    		'name' => 'required',
    		'email' => 'required|email',
    		'message' => 'required'
    	]);

    	Mail::to('test@test.com')->send(new ContactFormMail($data));
        // session()->flash('message', 'Thank for your message. We\'ll be in touch.');
    	return redirect('contact-us')
            ->with('message','Thank for your message. We\'ll be in touch.');
    }
}
