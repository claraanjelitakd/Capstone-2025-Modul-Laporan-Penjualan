<?php

namespace App\Providers;
use App\Http\Middleware\RoleCheck; // pastikan ada use ini di atas
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; // pastikan ada use ini di atas

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
        Route::aliasMiddleware('role', RoleCheck::class); // <-- ini yang nambahin alias 'role'
    }
}
