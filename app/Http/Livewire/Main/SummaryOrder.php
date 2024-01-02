<?php

namespace App\Http\Livewire\Main;

use App\Models\Cart;
use Livewire\Component;
use App\Http\Resources\CartResource;

class SummaryOrder extends Component
{
    public $items = [];

    public function mount()
    {
        $this->items = CartResource::collection(Cart::where('user_id', auth()->id())->with('product.productable')->get())->toArray(request());

    }   

    public function render()
    {
        return view('livewire.main.summary-order')->layout('components.layouts.dash', ['title' => 'Summary order']);
    }
}
