<?php

namespace App\Http\Middleware;

use Filament\Facades\Filament;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RedirectIfNotFillamentMiddleware extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function authenticate($request, array $guards)
    {
        $auth = Filament::auth();
        $user = $auth->user();
        $panel = Filament::getCurrentPanel();

        if (
            ! ($auth->check()
              && $user instanceof FilamentUser
              && $user->canAccessPanel($panel))
        ) {
            // Session::flush();
            // $this->unauthenticated($request, $guards);
            abort(404);
        }
    }

    protected function redirectTo(Request $request): ?string
    {
        return Filament::getLoginUrl();
    }
}
