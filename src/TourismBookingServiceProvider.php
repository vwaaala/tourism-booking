<?php

namespace Bunker\TourismBooking;

use Illuminate\Support\ServiceProvider;

class TourismBookingServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views/tourism-booking', 'tourism_booking');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'tourism-booking');
        $this->mergeConfigFrom(__DIR__ . '/config/tourism_booking.php', 'tourism-booking');
        $this->publishes([
            __DIR__ . '/config/tourism_booking.php' => config_path('tourism_booking.php'),
//            __DIR__ . '/resources/views/tourism-booking' => resource_path('views/vendor/tourism-booking')
        ], 'tourism_booking');
    }

    public function register()
    {

    }
}
