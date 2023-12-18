<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        if(!$request->has('highload')) {
            return redirect()->back()->withInput()->withErrors(['highload' => 'Accept the user agreement.']);
        }

        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|digits_between:10,20',
            'password' => 'required|string|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);

        session(['redirected' => true, 'registerData' => $data]);
        return redirect()->route('auth.showBusinessPurchase');
    }

    public function businessPurchase(Request $request) 
    {
        if($request->has('continue')) {
            return $this->finalRegister(session('registerData'));
        } elseif($request->has('businessPurchase')) {
            $data = $request->validate([
                'full_name' => 'required|string|max:255',
                'vat_number' => 'required|string|max:255',
                'company_name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'town_city' => 'required|string|max:255',
                'state_country' => 'required|string|max:255',
                'postcode' => 'required|string|max:255',
                'country' => 'required|string|max:255',
            ]);

            $data['is_business'] = true;

            return $this->finalRegister(array_merge($data, session('registerData')));
        }
    }

    private function finalRegister($data) 
    {
        $user = User::create($data);
        
        session()->flush();
        
        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        $login = $request->login;

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $creds = [$fieldType => $login, 'password' => $request->password];

        if(Auth::attempt($creds)) {
            return redirect()->route('dashboard');
        } else {
            return back()->withInput()->withErrors(['login' => 'User not found']);
        }
        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
