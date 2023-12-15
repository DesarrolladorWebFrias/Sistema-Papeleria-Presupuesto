<?php

namespace App\Http\Middleware;

use Closure;

class Role
{

    protected $jerarquia = [
        1   =>  10,
        2   =>  20,
        3   =>  30,
        4   =>  40,
        5   =>  50,
        6   =>  60,
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = auth()->user();

        if( $this->jerarquia[$user->role_id] != $this->jerarquia[$role] ){
            return abort(404);
        }
        return $next($request);
    }
}
