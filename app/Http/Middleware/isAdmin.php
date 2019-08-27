<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Redirect;

class isAdmin
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
        $user = \Auth::user();
        if ($user->is_admin != 1) {
            return redirect()->back()->with('adminError', 'No tenés privilegios de admnistrador');
        }
        return $next($request);
    }
}
