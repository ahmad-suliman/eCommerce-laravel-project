<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $cart = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        return view('Product.cart', ['cart' => $cart]);
    }
    public function addToCart(Request $request)
    {

        $user_id = auth()->id();
        $checkQuantity = Cart::where('user_id', $user_id)->where('product_id', $request->product_id)->first();
        if ($checkQuantity) {
            $checkQuantity->quantity += 1;
            $checkQuantity->save();
        } else {
            $newCart = new Cart();
            $newCart->user_id = $user_id;
            $newCart->product_id = $request->product_id;
            $newCart->quantity = 1;
            $newCart->save();
        }
        return redirect()->back();
    }
    public function deleteItem($id)
    {
        $cartItem = Cart::where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if (!$cartItem) {
            abort(404);
        } else {
            $cartItem->delete();
        }



        return redirect('/cart');
    }
    
}
