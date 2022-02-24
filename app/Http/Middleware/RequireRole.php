<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class RequireRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role, $id_course = null)
    {   
        if($id_course){
            $id_master = User::where('id', $id_course)->first()->id_user;
            if(($id_master != $request->user()->id) && ($request->user()->rol != 'admin')){
                abort(403);
            }
        }
        if(($request->user()->rol == $role)||($request->user()->rol == 'admin') ){
             return $next($request);
        }
        
        else{
             abort(403);
        }
    }
}
