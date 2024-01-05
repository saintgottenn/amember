<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class ResetPassword extends Component
{
    public $token;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
    }

    public function render()
    {
        return view('livewire.auth.reset-password')->layout('components.layouts.auth', ['title' => 'Reset password']);
    }
}
