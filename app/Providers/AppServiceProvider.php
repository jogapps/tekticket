<?php

namespace App\Providers;

use App\Model\EventPrice;
use App\Model\Ticket;
use App\Observers\EventPrice\EventPriceObserver;
use App\Observers\Ticket\TicketObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        EventPrice::observe(EventPriceObserver::class);
        Ticket::observe(TicketObserver::class);
    }
}
