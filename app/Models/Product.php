<?php

namespace App\Models;

use App\Models\Cart;
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

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
