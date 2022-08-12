<?php

namespace App\Providers;

use App\Repositories\Developer\DeveloperRepositoryInterface;
use App\Repositories\Developer\DevelopersRepository;
use App\Repositories\Task\TaskRepository;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class,TaskRepository::class);
        $this->app->bind(DeveloperRepositoryInterface::class,DevelopersRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
