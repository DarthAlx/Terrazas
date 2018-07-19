<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;
use App\Venue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HorarioController extends Controller
{
    public function store(Request $request)
    {
    	$horario = new Horario($request->all());
    	$venue=Venue::find($request->venue_id);
    	$horario->tipo=$venue->tipo;
    	$horario->zona=$venue->zona;
    	$horario->capacidad=$venue->capacidad;
    	$horario->user_id=$venue->user_id;


		//guardar
        if ($horario->save()) {
            Session::flash('mensaje', 'Fecha publicada con exito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/fechas'));
            
        }
        else{
            Session::flash('mensaje', 'Hubó un error, por favor, verifica la información.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/fechas'))->withInput();
        }
    }



    public function destroy(Request $request){
	      $horario = Horario::find($request->eliminar);
	      $horario->delete();
	      Session::flash('mensaje', 'horario eliminado con éxito.');
        Session::flash('class', 'success');
        return redirect()->intended(url('/fechas/'))->withInput();
    }


    public function update(Request $request){
    	$horario = Horario::find($request->id);

		$horario->fecha=$request->fecha;
		$horario->hora_inicio=$request->hora_inicio;
		$horario->hora_fin=$request->hora_fin;
		$horario->precio=$request->precio;
		$horario->venue_id=$request->venue_id;
        $venue=Venue::find($request->venue_id);

    	$horario->tipo=$venue->tipo;
    	$horario->zona=$venue->zona;
    	$horario->capacidad=$venue->capacidad;
    	$horario->user_id=$venue->user_id;

		//guardar
        if ($horario->save()) {
            Session::flash('mensaje', 'Fecha actualizada con exito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/fechas/'));
        }
        else{
            Session::flash('mensaje', 'Hubo un error, por favor, verifica la información.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/fechas/'))->withInput();
        }
    }
}
