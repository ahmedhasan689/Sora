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

    public static function SubadminValidateRules()
    {
        return [
            'name' => 'required|min:3|max:15',
            'phone_number' => 'required|numeric|min:10',
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
            'country' => 'required',
            'avatar' => 'nullable|Image',
            'subadmin',
        ];
    }

    public static function usersValidateRules()
    {
        return [
            'name' => 'required|min:3|max:15',
            'phone_number' => 'required|numeric|min:10',
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
            'country' => 'required',
            'avatar' => 'nullable|Image',
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

    // Accessors For avatar
    public function getImageAttribute()
    {
        if (!$this->avatar) {
            return asset('assets/img/AdminLTELogo.png');
        }

        if (stripos($this->avatar, 'http') === 0) {
            return $this->avatar;
        }

        return asset('uploads' . '/' . $this->avatar);
    }


    // Relation
    public function subscriptions()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'user_id');
    }
}
