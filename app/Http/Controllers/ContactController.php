<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContact()
    {
        return view('contact');
    }
    public function storgeMessage(Request $request)
    {
        $user_id = auth()->id();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        $newMessage = new Contact();
        $newMessage->name = $request->name;
        $newMessage->email = $request->email;
        $newMessage->phone = $request->phone;
        $newMessage->Subject = $request->subject;
        $newMessage->message = $request->message;
        $newMessage->user_id = $user_id;
        $newMessage->save();

        return back()->with('success','Your Message Submit It Successfully');
    }
}
