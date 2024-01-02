<?php

namespace App\Services;

use App\Models\Cart;

class CartService
{
    public function loadCartItems()
    {
      $cartItems = Cart::where('user_id', auth()->id())->get();

      $cartData = $cartItems->map(function ($item) {
        return [
          'product_id' => $item->product_id,
        ];
      });

      session(['cart' => $cartData]);
    }
}