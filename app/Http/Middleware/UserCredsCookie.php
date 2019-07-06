<?php

namespace App\Http\Middleware;

use Cookie;
use Closure;
use App\CustomTheme;

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
            // check to see if custom profile entry is set
            $encrypter = app(\Illuminate\Contracts\Encryption\Encrypter::class);
            $user_id = $encrypter->decrypt($_COOKIE['pga_user_id']);

            $check_custom_theme = CustomTheme::where('cookie_id', '=', $user_id)
                ->first();

            if(!$check_custom_theme) {
                $url_id = uniqid();
                $this->generate_custom_profile($user_id, $url_id);
            }
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

    protected function generate_custom_profile($user_id, $url_id) {
        $custom_theme = new CustomTheme;
        $custom_theme->cookie_id = $user_id;
        $custom_theme->custom_url = $url_id;

        $custom_theme->save();
    }
}
