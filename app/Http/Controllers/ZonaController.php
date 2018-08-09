<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zona;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ZonaController extends Controller
{
    public function store(Request $request)
    {
    	$zona = new Zona($request->all());
    	$zona->nombre=ucfirst($request->nombre);

		//guardar
        if ($zona->save()) {
            Session::flash('mensaje', 'Zona publicada con exito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/zonas'))->withInput();
            
        }
        else{
            Session::flash('mensaje', 'Hubó un error, por favor, verifica la información.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/zonas'))->withInput();
        }
    }



    public function destroy(Request $request){
      $zona = Zona::find($request->eliminar);
      $zona->delete();
      Session::flash('mensaje', 'Zona eliminada con éxito.');
        Session::flash('class', 'success');
        return redirect()->intended(url('/zonas'))->withInput();
    }


    public function update(Request $request){
    	$zona = Zona::find($request->id);
        $zona->nombre=ucfirst($request->nombre);

		//guardar
        if ($zona->save()) {
            Session::flash('mensaje', 'Zona actualizada con exito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/zonas'))->withInput();
        }
        else{
            Session::flash('mensaje', 'Hubo un error, por favor, verifica la información.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/zonas'))->withInput();
        }
    }
}
