<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\contact;
use App\Models\Review;
use App\Models\User;

class AdminController extends Controller
{
    public function showDashborad()
    {
        $totalProducts = Product::all();
        $totalMessages = contact::all();
        $totalReviews = Review::all();
        $unreadMessage = Contact::where('is_read', 0)->count();
        $latestMessage = contact::latest()->take(5)->get();
        $latestProduct = Product::latest()->take(5)->get();
        $leatestUsers = User::latest()->take(5)->get();
        $latestReviews = Review::latest()->take(5)->get();
        return view('admin.dashbord', [
                                                    'totalProducts' => $totalProducts,
                                                     'totalMessages' => $totalMessages,
                                                      'totalReviews' => $totalReviews, 
                                                      'unreadMessage' => $unreadMessage,
                                                      'latestMessage'=>$latestMessage,
                                                      'latestProduct'=>$latestProduct,
                                                      'leatestUsers'=>$leatestUsers,
                                                      'latestReviews'=>$latestReviews]);
    }
    public function data()
    {
        if (auth()->user()->role == 1) {
            $products = Product::all();
            return view('Admin.productTable', ['products' => $products]);
        } else {
            return back();
        }
    }
    public function showtable()
    {
        $reviews = Review::all();
        return view('admin.reviewtable', ['reviews' => $reviews]);
    }
    public function showmessage()
    {
        $contacts = contact::all();
        return view('admin.messagetable', ['contacts' => $contacts]);
    }
    public function showusers()
    {
        $users = User::all();
        return view('admin.usertable', ['users' => $users]);
    }
    public function deletereview($reviewId)
    {

        $currentReview = Review::findOrFail($reviewId);
        $currentReview->delete();
        return back();
    }
    public function markRead($message_id)
    {

        $message = contact::findOrFail($message_id);
        $message->is_read = 1;
        $message->save();
        return back();
    }
    public function deleteRead($message_id)
    {

        $message = contact::findOrFail($message_id);
        $message->delete();
        return back();
    }
    public function deleteUser($user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user->id == auth()->id()) {
            return back();
        }
        if (auth()->user()->role == 1) {
            $user = User::findOrFail($user_id)->delete();
            return back();
        }
    }
}
