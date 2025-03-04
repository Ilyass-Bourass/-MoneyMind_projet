<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

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
        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);
            
            // Notre commande est déjà programmée ici
            $schedule->command('users:update-salary')
                    ->daily()
                    ->at('11:28')
                    ->appendOutputTo(storage_path('logs/scheduler.log'));
        });
    }
}
