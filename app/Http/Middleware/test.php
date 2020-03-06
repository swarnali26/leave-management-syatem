<?php

namespace App\Http\Middleware;
use DB;
use Closure;

class test
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
        $gettoken=$request->header('token');
        
        $empid=DB::table('token')->where('token',$gettoken)->value('empid');
        
        $data= DB::table('employee')->where('empid',$empid);
        
        $request->merge(['empid' => $empid]);
        if($empid==0)
        {
            return response()->json("Unauthorized",401);
        }
        
        return $next($request);
    }
}
