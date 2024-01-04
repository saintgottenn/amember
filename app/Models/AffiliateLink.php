<?php

namespace App\Models;

use App\Models\User;
use App\Models\Affiliate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AffiliateLink extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'affiliate_link'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function affiliates()
    {
        return $this->hasMany(Affiliate::class, 'affiliate_link_id');
    }
}
