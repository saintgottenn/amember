<?php

namespace App\Http\Controllers\Payment;

use App\Models\Cart;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function payWithRazorpay()
    {
      $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

      $cartItems = Cart::where('user_id', auth()->id())->get();

      $productIds = $cartItems->pluck('product_id')->implode(", ");

      $totalCost = $cartItems->sum(function ($item) {
        return $item->product->productable->price;
      });

      $plan = $api->plan->create([
        'period' => 'monthly',
        'interval' => 1,
        'item' => [
          'name' => 'Monthly Subscription Plan',
          'amount' => $totalCost * 100, 
          'currency' => 'INR',
        ],
      ]);

      $razorpay_subscription = $api->subscription->create([
        'plan_id' => $plan['id'],
        'quantity' => 1, 
        'total_count' => 12, 
        'customer_notify' => 1, 
        'notes' => [
          'products' => $productIds,
          'email' => auth()->user()->email,
          'user_id' => auth()->id(),
        ],
      ]);

      
      return back()->with(compact('razorpay_subscription'));
    }
}
