<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        User::setStripeKey('sk_test_e1uYs4OyaF4ymNdsMO2VHwOD');
    }
}
