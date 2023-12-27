<?php

namespace TomatoPHP\TomatoUserActivities;

use TomatoPHP\TomatoAdmin\Facade\TomatoMenu;
use TomatoPHP\TomatoAdmin\Services\Contracts\Menu;
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
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
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


        $this->mergeConfigFrom(__DIR__ . '/../config/tomato-user-activities.php', 'tomato-user-activities');
        Benchmark::start(config('tomato-user-activities.request.benchmark', 'application'));


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {

        $this->app->register(EventServiceProvider::class);

        TomatoMenu::register([
            Menu::make()
                ->group(__('CRM'))
                ->label(__('User Activities'))
                ->route('admin.activities.index')
                ->icon('bx bx-history')
        ]);
    }

}
