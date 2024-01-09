<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function verify(EmailVerificationRequest  $request)
    {
        $request->fulfill();

        session()->forget('last_verification_mail_sent');

        return redirect()->route('dashboard');
    }
}
