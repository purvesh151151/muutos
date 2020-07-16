<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Localization
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
        if(Auth::check()){
            if(Auth::user()->localization){
               \App::setlocale(Auth::user()->localization); 
            }
        }
        // dd(Auth::user()->localization);   

        // if(\Session::has('locale')){
        //     \App::setlocale(\Session::get('locale'));
        // }
        return $next($request);
    }
}
