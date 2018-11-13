<?php

namespace App\Http\Middleware;

use Closure;

class EmployerMiddleware
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
		if ($request->user()->typeID != '2')
		{
			return redirect('/loginUser');
		}

		return $next($request);
	}
}
