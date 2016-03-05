<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class profileEditor
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
        if (isset($request->username) &&(Auth::user()->user_name != $request->username||Auth::user()->id != $request->username))
        {
           return redirect('');
        }
        return $next($request);
    }
}
