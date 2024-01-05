<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    public $input;

    public function submit()
    {
        $this->validate(['input' => 'required']);

        $field = filter_var($this->input, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $user = User::where($field, $this->input)->first();

        if (!$user) {
            return $this->addError('input', 'User not found');;
        }

        $status = Password::sendResetLink(['email' => $user->email]);

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', $status);
        } else {
            return back()->with('error', $status);
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')->layout('components.layouts.auth', ['title' => 'Forgot password']);
    }
}
