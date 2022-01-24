<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Gate;


class User extends Authenticatable implements MustVerifyEmail
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
        'role_id',
        'subscription_id',
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
            return asset('assets/Front/img/no-image.png');
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

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'user_id');
    }

    public function profile() {
        return $this->hasOne(Profile::class, 'user_id')->withDefault();
    }

    public function posts() {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'user_id')->withDefault();
    }

    public function board() {
        return $this->hasOne(Board::class, 'user_id')->withDefault();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Authrized
    public function hasAbility($ability){
        foreach($this->roles as $role) {
            if (in_array($ability ,$role->abilities)) {
                return true;
            };
        };
        return false;
    }

}
