<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;

class Products extends Component
{
    public function render()
    {
        return view('livewire.main.products')->layout('components.layouts.dash', ['title' => 'Products']);
    }
}
