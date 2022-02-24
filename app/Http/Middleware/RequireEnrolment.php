<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\enrolment;

class RequireEnrolment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id_course = $request->segments()[1];
        $enrolments = enrolment::all();
        foreach($enrolments as $enrolment){
            if($enrolment->id_user == $request->user()->id){
                
                return $next($request);
            }
        }
       
        abort(403);
       
    }
}
