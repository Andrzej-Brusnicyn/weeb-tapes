<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $user = auth()->user();

        $cartItem = $user->cartItems()->where('tape_id', $request->tape_id)->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => $user->id,
                'tape_id' => $request->tape_id,
                'quantity' => 1,
            ]);
        }

    }

    public function removeFromCart(Request $request)
    {
        $user = auth()->user();
        $user->cartItems()->where('tape_id', $request->tape_id)->delete();

    }

    public function getCartItems()
    {
        $user = auth()->user();

        $cartItems = $user->cartItems()->with('tape')->get();

        return response()->json([
            'cart_items' => $cartItems,
        ]);
    }
}
