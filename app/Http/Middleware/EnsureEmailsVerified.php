<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Redirect;
use function GuzzleHttp\Promise\all;

class EnsureEmailsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $request->user() ||
            ($request->user() instanceof MustVerifyEmail &&
                ! $request->user()->hasVerifiedEmail())) {
            $email = $request->user()->email;
            return $request->expectsJson()
                ? abort(403, 'Your email address is not verified.')
                : Redirect::route($this->redirectionRoute($request))
                    ->with('email_verification', $email);
        }

        return $next($request);
    }

    private function redirectionRoute($request)
    {
        if($request->is('organizer') || $request->is("organizer/*")) {

            auth()->guard('organizer')->logout();
            return 'organizer.login';
            }
            auth()->guard('web')->logout();
                return 'login';
    }

}
