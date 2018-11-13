<?php

namespace App\Http\Middleware;

use Closure;

class ModelMiddleware
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
		if ($request->user()->typeID != '3')
		{
			return redirect('/loginUser');
		}

		return $next($request);
	}
}
