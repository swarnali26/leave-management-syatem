<?php
namespace App\Http\Middleware;
use Closure;
class Cors
{
  public function handle($request, Closure $next)
  {
    $trusted_domains=["http://localhost:4200"];
    if(isset($request->server()['HTTP_ORIGIN'])){
      $origin=$request->server()['HTTP_ORIGIN'];

    
    if(in_array($origin,$trusted_domain)){
      header('Access-Control-Allow-Origin : '.$origin);
      header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
      header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization');
    } 
  }
    return $next($request)
      
  
}