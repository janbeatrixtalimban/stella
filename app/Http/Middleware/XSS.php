<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class XSS
{
    public function handle(Request $request, Closure $next)
    {
        $input = $request->all();
        array_walk_recursive($input, function(&$input) {
            $input = strip_tags($input);
        });
        $request->merge($input);
        return $next($request);
    }
}

// source: https://itsolutionstuff.com/post/how-to-create-middleware-for-xss-protection-in-laravel-5example.html?fbclid=IwAR36KvCovJMXLhs4mZDqDfV8xe_TGRjwat8aZqNPD-e5LC1FwRUuRrtffN0
