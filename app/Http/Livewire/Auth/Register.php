<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Http\Request;

class Register extends Component
{
    public function mount(Request $request)
    {
        if($request->has('affiliate_key')) {
            session(['affiliate_key' => $request->input('affiliate_key')]);
        }
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('components.layouts.auth', ['title' => 'Create Account']);
    }
}
