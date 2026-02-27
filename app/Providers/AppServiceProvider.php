<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    // protected $listen = [
    //     \SocialiteProviders\Manager\SocialiteWasCalled::class => [
    //         '\Uspdev\SenhaunicaSocialite\SenhaunicaExtendSocialite@handle',
    //     ],
    // ];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
