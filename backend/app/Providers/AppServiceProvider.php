<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Filters\TapeFilter;
use App\Http\Requests\FilterRequest;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TapeFilter::class, function ($app) {
            return new TapeFilter($app->make(FilterRequest::class));
        });
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
