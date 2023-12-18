<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;

class Plans extends Component
{
    public function render()
    {
        return view('livewire.main.plans')->layout('components.layouts.dash', ['title' => 'Plans']);
    }
}
