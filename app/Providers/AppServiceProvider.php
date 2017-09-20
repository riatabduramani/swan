<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Settings;
use App\Models\Packet;
use App\Models\Pages;
use App\Models\Whyus;

use App\Models\District;
use App\Models\Country;
use App\Models\City;

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

            $country = Country::pluck('name','id');
            View::share('country', $country);

            $countrymk = Country::where('id', 128)->pluck('name','id');
            View::share('countrymk', $countrymk);

            $city = City::pluck('name','id');
            View::share('city', $city);

            $district = District::where('city_id', 1)->pluck('name','id');
            View::share('district', $district);
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
