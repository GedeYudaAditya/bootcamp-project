<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $arrRole = explode('|', $role);
        if (in_array(Auth::user()->kategoriAkun, $arrRole)) {
            return $next($request);
        }
        abort(403, 'Unauthorized action.');
        // if (Auth::user() && Auth::user()->kategoriAkun == 'guide') {
        //     return $next($request);
        // } else {
        //     return redirect('/')->with('denied', 'You have not guide access');
        // }
    }
}
