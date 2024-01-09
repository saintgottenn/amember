<?php

namespace App\Http\Livewire\Main;

use App\Models\Tool;
use App\Models\Package;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\PlanSubscription;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\PlanSubscriptionResource;

class Dashboard extends Component
{
    public $packages = [];
    public $tools = [];

    public function mount()
    {
        $this->packages = PlanSubscriptionResource::collection(
            PlanSubscription::where('active', true)
                ->where('user_id', auth()->id())
                ->whereHas('product', function ($query) {
                    $query->where('productable_type', Package::class);
                })
                ->with('product.productable')
                ->get()
        )->toArray(request());

        $this->tools = PlanSubscriptionResource::collection(
            PlanSubscription::where('active', true)
                ->where('user_id', auth()->id())
                ->whereHas('product', function ($query) {
                    $query->where('productable_type', Tool::class);
                })
                ->with('product.productable')
                ->get()
        )->toArray(request());
    }

    public function render()
    {
        return view('livewire.main.dashboard')->layout('components.layouts.dash', ['title' => 'Dashboard']);
    }
}
