<?php

namespace App\Http\Middleware;

use Closure;

class TitleDecorator
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
        if($path == '/')
            $path = '';
        else
            $path = ' - '.$path;
        $response =  $next($request);
        $content = $response->content();
        $pattern = '{(<title>.+)(</title>)}';
        $replace = '$1'.$path.'$2';
        $content = preg_replace($pattern, $replace, $content);
        $response->setContent($content);
        return $response;
    }
}
