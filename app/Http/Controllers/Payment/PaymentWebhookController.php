<?php

namespace App\Http\Controllers\Payment;

use App\Models\Cart;
use App\Models\Payment;
use App\Facades\CartFacade;
use Illuminate\Http\Request;
use App\Models\PlanSubscription;
use App\Jobs\SubscriptionExpiryJob;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class PaymentWebhookController extends Controller
{
    public function handleRazorpayCallback(Request $request)
    {
        $secret = env('RAZORPAY_WEBHOOK_SECRET');

        $razorpaySignature = $request->header('X-Razorpay-Signature');
        $body = $request->getContent();

        if(hash_hmac('sha256', $body, $secret) === $razorpaySignature) {
            $data = json_decode($body, true);
            $paymentData = $data['payload']['payment']['entity'];

            if($data['event'] === 'order.paid') {
                Payment::create([
                    'user_id' => $paymentData['notes']['user_id'],
                    'amount' => $paymentData['amount'],
                    'currency' => $paymentData['currency'],
                    'products' => json_encode(explode(", ", $paymentData['notes']['products'])),
                ]);
                

                $this->subscribeToPlans($paymentData['notes']['products'], $paymentData['notes']['user_id']);
            }
        } 
    }

    protected function subscribeToPlans($productsIds, $userId)
    {
        $productsIds = explode(", ", $productsIds);

        foreach($productsIds as $productId) {
            $subscription = PlanSubscription::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'started_at' => now(),
                'expires_at' => now()->addMonth(),
                'active' => true,
            ]);

            SubscriptionExpiryJob::dispatch($subscription)->delay(now()->addMonth());

        }

        Cart::where('user_id', $userId)
            ->whereIn('product_id', $productsIds)
            ->delete();
    }
}
