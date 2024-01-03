<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlanSubscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'started_at', 'active', 'expires_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
