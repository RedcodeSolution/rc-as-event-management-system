<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\InvitationRepositoryInterface;
use App\Repositories\InvitationRepository;
use App\Repositories\EventRepositoryInterface;
use App\Repositories\EventRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {

        $this->app->bind(InvitationRepositoryInterface::class, InvitationRepository::class);
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);

    }

    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
