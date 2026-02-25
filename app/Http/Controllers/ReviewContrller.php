<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewContrller extends Controller
{
    public function review(){
        $review = Review::all();
        return view('/review',['reviews'=>$review]);
    }
    public function addReview(Request $request){
        $user_id = auth()->id();
        $request->validate([
            'name'=> 'required',
            'phone'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        $newReview = new Review();
        $newReview->name    = $request->name;
        $newReview->phone   = $request->phone;
        $newReview->email   = $request->email;
        $newReview->subject = $request->subject;
        $newReview->message = $request->message;
        $newReview->user_id = $user_id;
        $newReview->save();

        return redirect('/review');
    }
}
