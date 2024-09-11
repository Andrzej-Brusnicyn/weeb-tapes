<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\TapeRepositoryInterface;
use App\Repositories\TapeRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
	public function register(): void
    {
        $this->app->bind(TapeRepositoryInterface::class, TapeRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
