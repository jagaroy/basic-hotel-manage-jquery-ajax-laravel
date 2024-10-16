<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Route;
use Auth;
class Permission
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
        $method = $request->method();

        // for readonly. not complete solution. add restriction on model/db for complete solution.
        if($method=="DELETE"){
            return response()->json(['status'=>'error', 'message'=>'Delete option is disabled for demo!']);
        }elseif($method=="PUT"){
            return response()->json(['status'=>'error', 'message'=>'Edit option is disabled for demo!']);
        }

        return $next($request);
    }
}
