<?php

namespace TomatoPHP\TomatoUserActivities;

use TomatoPHP\TomatoUserActivities\Providers\EventServiceProvider;
use TomatoPHP\TomatoUserActivities\Services\Benchmark;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\ServiceProvider;

/**
 * Class AdvancedLoggerServiceProvider
 */
class AdvancedLoggerServiceProvider extends ServiceProvider
{
    use DispatchesJobs;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/tomato-user-activities.php' => config_path('tomato-user-activities.php'),
        ], 'config');
        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/tomato-user-activities.php', 'tomato-user-activities');
        Benchmark::start(config('tomato-user-activities.request.benchmark', 'application'));
    }
}
