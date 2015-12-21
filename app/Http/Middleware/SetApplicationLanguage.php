<?php 

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

class SetApplicationLanguage {
    public function handle($request, Closure $next)
    {
        App::setLocale(Session::has('language') ? Session::get('language') : Config::get('app.locale'));
        return $next($request);
    }
}
