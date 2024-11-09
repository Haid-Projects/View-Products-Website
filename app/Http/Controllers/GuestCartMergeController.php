<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestCartMergeController extends Controller
{
    public function mergeCart(Request $request)
    {
        if (session()->has('cart')) {
            $sessionCart = session()->get('cart');
            $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

            foreach ($sessionCart as $cartItem) {
                $cart->cartItems()->updateOrCreate(
                    ['product_variant_id' => $cartItem['product_variant_id']],
                    ['quantity' => $cartItem['quantity'], 'price' => $cartItem['price']]
                );
            }

            session()->forget('cart');
        }

        return redirect()->route('cart.view');
    }
}
