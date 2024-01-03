<?php

namespace App\Http\Controllers\Payment;

use App\Models\Cart;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;

class PaymentController extends Controller
{
    public function payWithRazorpay()
    {
      $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

      $cartItems = CartResource::collection(Cart::where('user_id', auth()->id())->with('product.productable.prices')->get())->toArray(request());
      
      ['productIds' => $productIds, 'totalCost' => $totalCost] = $this->getPaymentData($cartItems);

      $razorpay_order = $api->order->create([
          'receipt' => 'order_rcptid_11',
          'amount' => $totalCost * 100, 
          'currency' => 'INR',
          'notes' => [
            'products' => $productIds,
            'email' => auth()->user()->email,
            'user_id' => auth()->id(),
          ],
        ]);

        return back()->with(compact('razorpay_order'));
    }

  
    protected function getPaymentData($cartItems) 
    {
      $productIds = collect($cartItems)->map(function ($item) {
          return $item['product']['product_id'];
      })->implode(', ');

      $totalCost = collect($cartItems)->sum(function ($item) {
        return $item['product']['price'];
      });

      return [
        'productIds' => $productIds,
        'totalCost' => $totalCost
      ];
    }
}
