<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
  public function handle(Request $request, Closure $next)
  {
    if (!session('is_admin')) {
      return redirect()->route('login')->with('error', 'Unauthorized');
    }
    return $next($request);
  }
}