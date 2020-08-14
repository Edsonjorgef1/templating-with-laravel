<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use App\User;

//TODO: php artisan make:provider BladeExtrasServiceProvider 


class BladeExtrasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('hasrole', function($expression){
            if(Auth::User()){
                if(Auth::user()->hasAnyRole($expression)){
                    return true;
                }
            }
            return false;
        });
    }
}
