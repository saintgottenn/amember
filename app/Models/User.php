<?php

namespace App\Models;

use App\Models\Affiliate;

use Laravel\Paddle\Billable;
use App\Models\AffiliateLink;
use Laravel\Sanctum\HasApiTokens;
use TCG\Voyager\Traits\VoyagerUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'phone_number',
        'full_name',
        'company_name',
        'vat_number',
        'address',
        'town_city',
        'state_country',
        'postcode',
        'country',
        'is_business',
        'permissions',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function affiliateLinks()
    {
        return $this->hasMany(AffiliateLink::class, 'user_id');
    }

    public function referredByAffiliates()
    {
        return $this->hasMany(Affiliate::class, 'referred_user_id');
    }

    public function sendPasswordResetNotification($token) 
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
