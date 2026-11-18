<?php

namespace App\Providers;

use App\Models\Profile;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
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
        if (! $this->app->environment('local')) {
            URL::forceScheme('https');
        }

        View::composer('app', function ($view) {
            $view->with('layoutProfile', Profile::first());
        });
    }
}
