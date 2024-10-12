<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\InvitationRepositoryInterface;
use App\Repositories\InvitationRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(InvitationRepositoryInterface::class, InvitationRepository::class);
    }

    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
