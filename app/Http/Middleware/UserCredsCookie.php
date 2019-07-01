<?php

namespace App\Http\Middleware;

use Cookie;
use Closure;

class UserCredsCookie
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
        if($this->hasCookie('pga_user_id')) {
            return $next($request);
        } else {
            $this->makeMyCookie();
            return $next($request);
        }
    }

    protected function makeMyCookie()
    {
        return Cookie::queue(Cookie::make('pga_user_id', uniqid('pga_', true), 525600));
    }

    protected function hasCookie($cookie_name)
    {
        $cookie_exist = Cookie::get($cookie_name);
        return ($cookie_exist) ? true : false;
    }
}
