<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Closure;

class Locale
{
    /**
     * setting the application locale
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //get language locale from session
        $raw_locale = Session::get('locale');

        if (in_array($raw_locale, Config::get('app.locales'))) {
            $locale = $raw_locale;
        }
        else {
            // if $raw_locale is empty or not in array of locales
            $locale = Config::get('app.locale');
        }
        //Set the application locale

        App::setLocale($locale);
        //dd(Config::get('app.locale'));
        return $next($request);
    }
}
