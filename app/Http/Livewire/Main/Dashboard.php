<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.main.dashboard')->layout('components.layouts.dash', ['title' => 'Dashboard']);
    }
}
