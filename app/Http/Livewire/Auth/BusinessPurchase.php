<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class BusinessPurchase extends Component
{
    public function render()
    {
        return view('livewire.auth.business-purchase')->layout('components.layouts.auth', ['title' => 'Business purchase']);
    }
}
