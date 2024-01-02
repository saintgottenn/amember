<?php

namespace App\Http\Controllers\Payment;

use App\Models\Payment;
use Illuminate\Http\Request;
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

            if($payload['event'] === 'order.paid') {
                Payment::create([
                    'user_id' => $paymentData['notes']['user_id'],
                    'amount' => $paymentData['amount'],
                    'currency' => $paymentData['currency'],
                    'products' => json_encode(explode(", ", $paymentData['notes']['products'])),
                ]);
            }
        } 
    }
}
