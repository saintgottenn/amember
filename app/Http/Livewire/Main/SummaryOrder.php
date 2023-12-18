<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;

class SummaryOrder extends Component
{
    public function render()
    {
        return view('livewire.main.summary-order')->layout('components.layouts.dash', ['title' => 'Summary order']);
    }
}
