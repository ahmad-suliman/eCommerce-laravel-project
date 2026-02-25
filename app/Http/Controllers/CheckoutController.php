<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;



class CheckoutController extends Controller
{
    public function createSession()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $cart = Cart::where('user_id', Auth::id())->with('product')->get();

        $lineItems = [];

        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->product->name,
                    ],
                    'unit_amount' => $item->product->price * 100,
                ],
                'quantity' => $item->quantity,
            ];
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }
    public function success()
    {
        // Clear cart
        Cart::where('user_id', Auth::id())->delete();

        return back()->with('success','Payment Done');
    }

    public function cancel()
    {
        return  back()->with('cancle','Payment cancled');
    }
}
