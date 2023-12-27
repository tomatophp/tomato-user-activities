<?php

namespace TomatoPHP\TomatoUserActivities;

use TomatoPHP\TomatoUserActivities\Providers\EventServiceProvider;
use TomatoPHP\TomatoUserActivities\Services\Benchmark;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\ServiceProvider;

/**
 * Class AdvancedLoggerServiceProvider
 */
class TomatoUserActivitiesServiceProvider extends ServiceProvider
{
    use DispatchesJobs;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //Register generate command
        $this->commands([
            \TomatoPHP\TomatoUserActivities\Console\TomatoUserActivitiesInstall::class
        ]);

        //Register Config file
        $this->mergeConfigFrom(__DIR__ . '/../config/tomato-user-activities.php', 'tomato-user-activities');

        //Publish Config
        $this->publishes([
            __DIR__ . '/../config/tomato-user-activities.php' => config_path('tomato-user-activities'),
        ], 'tomato-user-activities-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        //Publish Migrations
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'tomato-user-activities-migrations');

        //Register views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'tomato-user-activities');

        //Publish Views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/tomato-user-activities'),
        ], 'tomato-user-activities-views');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'tomato-user-activities');

        //Publish Lang
        $this->publishes([
            __DIR__ . '/../resources/lang' => app_path('lang/vendor/tomato-user-activities'),
        ], 'tomato-user-activities-lang');

        //Register Routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

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
