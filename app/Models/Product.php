<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Tool;
use App\Models\PlanSubscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['productable_id', 'productable_type'];
    
    public function productable()
    {
        return $this->morphTo();
    }

    public function scopeActiveProductable($query)
    {
        return $query->whereHasMorph('productable', [Tool::class], function ($query) {
            $query->where('is_active', true);
        });
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(PlanSubscription::class);
    }
}
