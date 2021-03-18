<?php

namespace App\Providers;

use App\Http\ViewComposer\GeneralComposer;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use View;


class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        View::composer('frontend.*', GeneralComposer::class);
    }

    public function register()
    {

    }


}
