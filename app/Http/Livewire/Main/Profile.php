<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.main.profile')->layout('components.layouts.dash', ['title' => 'Profile']);
    }
}
