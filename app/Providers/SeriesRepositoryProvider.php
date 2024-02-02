<?php

namespace App\Providers;

use App\Repositories\SeriesRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\EloquentSeriesRepository;
use Illuminate\Auth\EloquentUserProvider;

class SeriesRepositoryProvider extends ServiceProvider
{

    public array $bindings = [
        SeriesRepository::class => EloquentSeriesRepository::class
    ];

    /**
     * Register services.
     */
   /*  public function register(): void
    {
        $this->app->bind(SeriesRepository::class, EloquentSeriesRepository::class);
    } */
}
