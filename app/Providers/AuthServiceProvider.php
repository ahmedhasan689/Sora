<?php

namespace App\Providers;

use App\Models\Category;
use App\Policies\CategoryPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Category::class => CategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::before(function($user, $ability) {
            if ($user->user_type == 2) {
                return true;
            }
        });

        foreach ( config('abilities') as $ability => $label ) {
            Gate::define($ability , function($user) use ($ability) {
                foreach($user->roles as $role) {
                    if (in_array($ability ,$role->abilities)) {
                        return true;
                    };
                };
                return false;
            });
        }
    }
    
}
