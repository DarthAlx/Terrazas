<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venue;
use App\Galeria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VenueController extends Controller
{
    public function store(Request $request)
    {
        

    	$venue = new Venue($request->all());
        
        

        //categoria
        if (isset($request->servicio)) {
          $venue->servicios=implode(",", $request->servicio);
        }
        else{
            Session::flash('mensaje', 'Selecciona o crea por lo menos un servicio.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/venues/nuevo'))->withInput();
        }

        //habilitado
		if (isset($request->habilitado)) {
			$venue->habilitado=1;
		}
		else{
			$venue->habilitado=0;
		}
       
        if ($request->hasFile('imagen')) {
          $file = $request->file('imagen');
          if ($file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="png") {
            $name = str_slug($request->nombre, '-') . "-". time()."." . $file->getClientOriginalExtension();
            $path = base_path('uploads/venues/');
            $file-> move($path, $name);
            $venue->imagen = $name;
            }


          else{
            Session::flash('mensaje', 'El archivo no es una imagen valida.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/venues/nuevo'))->withInput();
          }

        }
        else{
          Session::flash('mensaje', 'El archivo no es una imagen valida.');
          Session::flash('class', 'danger');
          return redirect()->intended(url('/venues/nuevo'))->withInput();
        }

        //guardar
        if ($venue->save()) {
            Session::flash('mensaje', 'Lugar publicado con exito.');
            Session::flash('class', 'success');
            
        }
        else{
            Session::flash('mensaje', 'Hubó un error, por favor, verifica la información.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/venues/nuevo'))->withInput();
        }

        //poplets
        if (!$request->poplets&&$request->hasFile('poplet1')) {
            $request->poplets=1;
        }
        if ($request->poplets) {
            for ($i=1; $i <= intval($request->poplets); $i++) { 
                $poplet = new Galeria();
               if ($request->hasFile('poplet'.$i)) {
                  $file = $request->file('poplet'.$i);

                  if ($file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="png") {
                    $name = str_slug($request->nombre, '-') . "-" . $i . "-" . time()."." . $file->getClientOriginalExtension();
                    $path = base_path('uploads/venues/poplets/'.$venue->id.'/');
                    $file->move($path, $name);
                    $poplet->imagen = $name;
                    $poplet->venue_id = $venue->id;
                    $poplet->save();
                    }


                  else{
                    Session::flash('mensaje', 'Hubo un error al guardar la galería.');
                    Session::flash('class', 'danger');
                    return redirect()->intended(url('/venue/'.$venue->id))->withInput();
                  }

                }
            }
            
        }

        return redirect()->intended(url('/venues'))->withInput();
        



    }
}
