<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ($request->is('backend') || $request->is("backend/*")) {
                return route('backend.login');
            } elseif ($request->is('organizer') || $request->is("organizer/*")) {
                return route('organizer.login');
            }
            return route('login');
        }
    }
}
