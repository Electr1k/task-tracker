<?php

namespace App\Providers;

use App\Interfaces\Repository\Task\TaskInterface;
use App\Repository\TaskRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(TaskInterface::class, TaskRepository::class);
    }
}
