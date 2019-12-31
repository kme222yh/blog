<?php

namespace App\Http\Middleware;

use Closure;

class NavHiliteMiddleware
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
        $path = $request->path();
        $response =  $next($request);
        $content = $response->content();
        $pattern = '{<li><a href="'.$path.'">}';
        $replace = '<li class="here"><a href="'.$path.'">';
        $content = preg_replace($pattern, $replace, $content);
        $response->setContent($content);
        return $response;
    }
}
