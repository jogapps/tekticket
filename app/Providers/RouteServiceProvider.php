<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const    HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapOrganizerRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api/organizer')
            ->middleware('api')
            ->namespace($this->namespace . '\Frontend\Organizer')
            ->group(base_path('routes/api/organizer.php'));

        Route::prefix('api/user')
            ->middleware('api')
            ->namespace($this->namespace . '\Frontend\Customer')
            ->group(base_path('routes/api/customer.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::prefix('backend')
            ->middleware('web')
            ->as('backend.')
            ->namespace($this->namespace . '\Administrator')
            ->group(base_path('routes/admin.php'));
    }

    protected function mapOrganizerRoutes()
    {
        Route::prefix('organizer')
            ->middleware('web')
            ->as('organizer.')
            ->namespace($this->namespace . '\Frontend\Organizer')
            ->group(base_path('routes/organizer.php'));
    }
}
