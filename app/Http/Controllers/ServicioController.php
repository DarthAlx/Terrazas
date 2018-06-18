<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ServicioController extends Controller
{
    public function store(Request $request)
    {
    	$servicio = new Servicio($request->all());
    	$servicio->nombre=ucfirst($request->nombre);

		//guardar
        if ($servicio->save()) {
            Session::flash('mensaje', 'Servicio publicado con exito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/servicios'))->withInput();
            
        }
        else{
            Session::flash('mensaje', 'Hubó un error, por favor, verifica la información.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/servicios'))->withInput();
        }
    }



    public function destroy(Request $request){
      $servicio = Servicio::find($request->eliminar);
      $servicio->delete();
      Session::flash('mensaje', 'Servicio eliminado con éxito.');
        Session::flash('class', 'success');
        return redirect()->intended(url('/servicios/'))->withInput();
    }


    public function update(Request $request){
    	$servicio = Servicio::find($request->id);
        $servicio->nombre=ucfirst($request->nombre);

		//guardar
        if ($servicio->save()) {
            Session::flash('mensaje', 'Servicio actualizado con exito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/servicios/'))->withInput();
        }
        else{
            Session::flash('mensaje', 'Hubo un error, por favor, verifica la información.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/servicios/'))->withInput();
        }
    }
}
