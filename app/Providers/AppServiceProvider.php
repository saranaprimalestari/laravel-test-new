<?php

namespace App\Providers;

// use Illuminate\Contracts\Pagination\Paginator;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
        // Gate::define('admin', function(User $user){
        //     return $user->is_admin;
        // });
        // dd(Auth::check());
        // if(Auth::check()){
            
        // }else{
        //     dd(Auth::check());
        // }
        view()->composer('*', function ($view) 
        {
            // if (Auth::check()) {
            //     echo " ini true";
            // }   
        }); 
    }
}
