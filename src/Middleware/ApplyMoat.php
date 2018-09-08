<?php

namespace CoreBlue\Moat\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApplyMoat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session('moat') === null && $request->url() !== route('moat.show')) {
            return redirect()->route('moat.show');
        }

        return $next($request);
    }
}
