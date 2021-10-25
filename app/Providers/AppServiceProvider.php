<?php

namespace App\Providers;

use App\Services\CookieCartService;
use App\Services\FileUploadService;
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
        $this->app->bind(CookieCartService::class, CookieCartService::class);
        $this->app->bind(FileUploadService::class, FileUploadService::class);
    }
}
