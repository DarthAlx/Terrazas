<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class RolesController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuario=User::find(Auth::user()->id);
        if ($usuario->habilitado) {
            if ($usuario->role=="admin") {
                return redirect()->intended(url('/admin'));
            }
            else if ($usuario->role=="proveedor") {
                return redirect()->intended(url('/panel'));
            }
            else{
                return redirect()->intended(url('/perfil'));
            }
        }
        else{
            Auth::logout();
            Session::flash('mensaje', 'Cuenta no activada.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/entrar'));
        }
        
    }
}
