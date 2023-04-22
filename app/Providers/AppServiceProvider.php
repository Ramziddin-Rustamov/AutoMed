<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
        Paginator::useBootstrap();

        Gate::define('super-admin', function (User $user) {
            return $user->email === 'automed@gmail.com';
        });
        Gate::define('master', function (User $user) {
            return $user->job === 'master';
        });
        Gate::define('seller', function (User $user) {
            return $user->job === 'seller';
        });
    }
}