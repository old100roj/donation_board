<?php

namespace App\Providers;

use App\ViewComponents\ExceptDonatesComponent;
use Blade;
use Illuminate\Contracts\Support\Htmlable;
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
        Blade::directive('render', function ($className) {
            return $this->app->make($className)->toHtml();
        });
    }
}
