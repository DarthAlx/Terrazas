<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venue;
use App\Galeria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request, $id)
    {
        
        $venue = Venue::find($id);
        $venue->nombre=$request->nombre;
        $venue->descripcion=$request->descripcion;
        $venue->direccion=$request->direccion;
        $venue->latitud=$request->latitud;
        $venue->longitud=$request->longitud;
        $venue->zona=$request->zona;
        $venue->precio=$request->precio;
        $venue->capacidad=$request->capacidad;
        $venue->reglamento=$request->reglamento;
        $venue->tipo=$request->tipo;
        
        //categoria
        if (isset($request->servicio)) {
          $venue->servicios=implode(",", $request->servicio);
        }
        else{
            Session::flash('mensaje', 'Selecciona o crea por lo menos un servicio.');
            Session::flash('class', 'danger');
            return redirect()->intended(url()->previous())->withInput();
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
            $oldpoplets=Galería::where('venue_id', $venue->id)->get();
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
       // dd($request->input('cuantos', "0"));
        /*if($request->cuantos){
            $cuantos=$request->cuantos;
        } 
        else {
            $cuantos=999999999;
        }
        
        if($request->donde){
            $donde=$request->donde;
        } 
        else {
            $donde='';
        }
        if($request->que){
            $que=$request->que;
        } 
        else {
            $que='';
        }
*/

        $lugares=Venue::tipo($request->get('que'))->zona($request->get('donde'))->capacidad($request->get('cuantos'))->orderBy('nombre','asc')->get();
        return view('lugares',['lugares'=>$lugares]);
    }





    
}
