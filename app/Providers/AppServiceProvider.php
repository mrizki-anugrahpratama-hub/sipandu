<?php

namespace App\Providers;

use App\Models\ArsipAktif; 
use App\Observers\ArsipAktifObserver;
// Tambahkan ini di bagian atas file AppServiceProvider.php
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ArsipAktif::observe(ArsipAktifObserver::class);

        View::composer('layouts.app', function ($view) {
            if (Auth::check()) {
                $view->with([
                    'notifications' => Auth::user()->notifications()->take(5)->get(),
                    'unreadNotifications' => Auth::user()->unreadNotifications->count(),
                ]);
            }
        });
    }
}
