<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venue;
use App\Galeria;
use App\Horario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class VenueController extends Controller
{
    public function reservar(Request $request){

        $horario=Horario::where('venue_id',$request->venue)->where('fecha',$request->fecha)->first();
        
        if ($horario) {
            return view('reservar-lugar', ['horario'=>$horario]);
        }
        else{
            return redirect()->intended(url('/404'));
        }
    }
    public function store(Request $request)
    {
        

    	$venue = new Venue($request->all());
        $venue->user_id=Auth::user()->id;
        
        

        //servicios
        if (isset($request->servicio)) {
          $venue->servicios=implode(",", $request->servicio);
        }
        else{
            Session::flash('mensaje', 'Selecciona o crea por lo menos un servicio.');
            Session::flash('class', 'danger');
            return redirect()->intended(url('/venues/nuevo'))->withInput();
        }
        //serviciosextra
        if (isset($request->serviciosextra)) {
          $venue->serviciosextra=implode(",", $request->serviciosextra);
        }
        else{
            $venue->serviciosextra=null;
        }

        //habilitado
		/*if (isset($request->habilitado)) {
			$venue->habilitado=1;
		}
		else{
			$venue->habilitado=0;
		}*/
       
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

    public function update(Request $request, $id)
    {
        
        $venue = Venue::find($id);
        $venue->nombre=$request->nombre;
        $venue->descripcion=$request->descripcion;
        $venue->direccion=$request->direccion;
        $venue->latitud=$request->latitud;
        $venue->longitud=$request->longitud;
        $venue->zona_id=$request->zona_id;
        $venue->capacidad=$request->capacidad;
        $venue->reglamento=$request->reglamento;
        $venue->tipo=$request->tipo;
        
        //servicios
        if (isset($request->servicio)) {
          $venue->servicios=implode(",", $request->servicio);
        }
        else{
            Session::flash('mensaje', 'Selecciona o crea por lo menos un servicio.');
            Session::flash('class', 'danger');
            return redirect()->intended(url()->previous())->withInput();
        }

        //serviciosextra
        if (isset($request->serviciosextra)) {
          $venue->serviciosextra=implode(",", $request->serviciosextra);
        }
        else{
            $venue->serviciosextra=null;
        }

        //habilitado

       
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
            return redirect()->intended(url()->previous())->withInput();
          }

        }


        //guardar
        if ($venue->save()) {
            Session::flash('mensaje', 'Lugar actualizado con exito.');
            Session::flash('class', 'success');
            
        }
        else{
            Session::flash('mensaje', 'Hubó un error, por favor, verifica la información.');
            Session::flash('class', 'danger');
            return redirect()->intended(url()->previous())->withInput();
        }

        //poplets
        if (!$request->poplets&&$request->hasFile('poplet1')) {
            $request->poplets=1;
        }
        if ($request->poplets) {
            $path = base_path('uploads/venues/poplets/'.$venue->id.'/');
            $oldpoplets=Galeria::where('venue_id', $venue->id)->get();
            foreach ($oldpoplets as $oldpoplet) {
                File::delete($path . $oldpoplet->imagen);
                $oldpoplet->delete();
            }
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
                    return redirect()->intended(url()->previous())->withInput();
                  }

                }
            }
            
        }

        return redirect()->intended(url('/venues'))->withInput();
        



    }


    public function destroy(Request $request)
        {
          $venue = Venue::find($request->eliminar);
          $dir = base_path('uploads/venues/');
          $path = base_path('uploads/venues/poplets/'.$venue->id.'/');
          //File::delete($dir . $venue->imagen);
            $oldpoplets=Galeria::where('venue_id', $venue->id)->get();
            foreach ($oldpoplets as $oldpoplet) {
                File::delete($path . $oldpoplet->imagen);
                $oldpoplet->delete();
            }
          $venue->delete();
          Session::flash('mensaje', 'Lugar eliminado con éxito.');
            Session::flash('class', 'success');
            return redirect()->intended(url('/venues/'))->withInput();
        }






    public function buscar(Request $request){
        $lugares=Horario::tipo($request->get('que'))->zona($request->get('donde'))->capacidad($request->get('cuantos'))->fecha($request->get('cuando'))->orderBy('nombre','asc')->get();

        return view('lugares',['lugares'=>$lugares]);
    }





    
}
