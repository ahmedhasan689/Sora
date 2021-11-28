<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'password',
        'country_id',
        'avatar',
        'user_type',
        
    ];


    // Validate Rules
    public static function adminValidateRules() 
    {
        return [
            'name' => 'required|min:3|max:15',
            'phone_number' => 'required|numeric|min:10',
            'email' => 'required|email',
            'password' => 'nullable|min:6|max:20',
            'country' => 'required',
            'avatar' => 'nullable|Image',
            'admin',
        ];
    } 

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subscriptions() {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
