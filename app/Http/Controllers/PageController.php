<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    function index()
    {
        return view('home');
    }

    function about()
    {
        return view('about');
    }

    function contact()
    {
        return view('contact');
    }

    function contactMessage(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string']
        ]);

        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;

        $message->save();

        Mail::raw("Name: {$request->name}\nEmail: {$request->email}\nMessage: {$request->message}", function ($message) {
            $message->to('pramitagrgotame75@gmail.com')
                    ->subject('New Contact Form Submission');
        });

        return redirect()->route('page.contact')->with('success', 'Your message has been sent successfully!');
    }
}
