<?php

namespace NhamtPhat\SpatieBackup;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class TelegramNotificationsServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-backup-tg-notifications');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/backup-telegram.php' => config_path('backup-telegram.php'),
            ], 'laravel-backup-telegram-config');
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/backup-telegram.php', 'backup-telegram');
    }
}