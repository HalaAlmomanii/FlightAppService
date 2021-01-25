<?php

namespace App\Providers;

use App\Repositories\FlightRepository;
use App\Repositories\FlightService;
use App\Repositories\FlightServiceInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(FlightServiceInterface::class, FlightRepository::class);
    }
}
