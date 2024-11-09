<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Add a product variant to the cart
    public function addToCart(Request $request, $productVariantId)
    {
        $variant = ProductVariant::findOrFail($productVariantId);
        $cartItem = [
            'product_variant_id' => $variant->id,
            'quantity' => $request->quantity,
            'price' => $variant->price,
        ];

        if (auth()->check()) {
            // Authenticated user, save to DB
            $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
            $cart->cartItems()->create($cartItem);
        } else {
            // Guest user, save to session
            $cart = session()->get('cart', []);
            $cart[$productVariantId] = $cartItem;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item added to cart.');
    }

    // View the cart
    public function viewCart()
    {
        if (auth()->check()) {
            $cart = Cart::with('cartItems')->where('user_id', auth()->id())->first();
        } else {
            $cart = session()->get('cart', []);
        }

        return view('cart.view', compact('cart'));
    }

    // Update the quantity in the cart
    public function updateCart(Request $request, $productVariantId)
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->first();
            $cartItem = $cart->cartItems()->where('product_variant_id', $productVariantId)->first();
            $cartItem->update(['quantity' => $request->quantity]);
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$productVariantId])) {
                $cart[$productVariantId]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
            }
        }

        return redirect()->back()->with('success', 'Cart updated.');
    }

    // Remove an item from the cart
    public function removeFromCart($productVariantId)
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->first();
            $cart->cartItems()->where('product_variant_id', $productVariantId)->delete();
        } else {
            $cart = session()->get('cart', []);
            unset($cart[$productVariantId]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}
