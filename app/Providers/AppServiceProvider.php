<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Settings;
use App\Models\Packet;
use App\Models\Pages;
use App\Models\Whyus;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if (!$this->app->runningInConsole()) {
            $settings = Settings::translated()->first();
            View::share('settings', $settings);

            $packets = Packet::translated()->get();
            View::share('packets', $packets);

            $why = Whyus::translated()->get();
            View::share('why', $why);

            $pages = Pages::translated()->first();
            View::share('pages', $pages);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Appzcoder\CrudGenerator\CrudGeneratorServiceProvider');
        }
    }
}
