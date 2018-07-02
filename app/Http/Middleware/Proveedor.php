<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Proveedor
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
        if (Auth::guest()) {
                return redirect()->intended(url('/entrar'));
          }
          else  {
            $usuario=User::find(Auth::user()->id);
            if ($usuario->role!="proveedor") {
              Session::flash('mensaje', 'No tienes permisos para ver esta página');
              Session::flash('class', 'warning');
              return redirect()->intended(url('/404'));
            }
          }
        return $next($request);
    }
}
