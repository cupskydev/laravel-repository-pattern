<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\CarRepository;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\CarRepositoryInterface;
use App\Services\CarService;
use App\Services\Interfaces\CarServiceInterface;
use Illuminate\Support\ServiceProvider;

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
        // repositories
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);

        // services
        $this->app->bind(CarServiceInterface::class, CarService::class);
    }
}
