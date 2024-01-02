<?php

namespace App\Http\Controllers;

use Laravel\Paddle\Cashier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function checkout(Request $request)
    {
        
        $checkout = $request->user()->checkout(['pri_tshirt', 'pri_socks' => 5]);

        dd($checkout);
    }
}
