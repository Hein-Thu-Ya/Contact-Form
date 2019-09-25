<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('welcome');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'min:10'
        ]);

        $data = array(
			'email' => $request->email,
			'subject' => $request->subject,
            'bodyMessage' => $request->message
        );
        
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('heinthuya12@gmail.com');
            $message->subject($data['subject']);
        });

        return redirect()->back()->with('success', 'Your Email was Sent!');

    }
}
