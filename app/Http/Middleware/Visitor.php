<?php

namespace App\Http\Middleware;

use Closure;

use App\Visitor as Service;

use Illuminate\Http\Request;

class Visitor
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
        Service::add($request->ip());
        return $next($request);
    }
}
