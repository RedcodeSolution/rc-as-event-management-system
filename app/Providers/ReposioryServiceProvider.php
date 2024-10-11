<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\JobRepositoryInterface;
use App\Repositories\JobRepository;

class ReposioryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}