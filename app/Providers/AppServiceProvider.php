<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Pegawai;
use App\Observers\PegawaiObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Pegawai::observe(PegawaiObserver::class);
    }
}
