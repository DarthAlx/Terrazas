<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Venue;
use App\User;
use App\Servicio;
use App\Galeria;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProveedoresController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => 'min:6|confirmed',
        ]);
    }
    public function store(Request $request){


        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            Session::flash('mensaje', 'Hubo un error al guardar la información.');
            Session::flash('class', 'danger');
            return redirect()->intended(url()->previous())->withInput();
        }
        else{
            $user = new User($request->all());
            $venue = new Venue($request->all());
            $user->role="proveedor";
            $user->password=bcrypt('$request->password');
            $user->habilitado=0;
            $venue->habilitado=0;

            //categoria
            if (isset($request->servicio)) {
              $venue->servicios=implode(",", $request->servicio);
            }
            else{
                Session::flash('mensaje', 'Selecciona o crea por lo menos un servicio.');
                Session::flash('class', 'danger');
                return redirect()->intended(url()->previous())->withInput();
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
            else{
              Session::flash('mensaje', 'El archivo no es una imagen valida.');
              Session::flash('class', 'danger');
              return redirect()->intended(url()->previous())->withInput();
            }

            //guardar
            $user->save();
            $venue->user_id=$user->id;
            if ($venue->save()) {
                Session::flash('mensaje', 'Solicitud enviada.');
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

            return redirect()->intended(url('/entrar'))->withInput();
        }
    	
    }
    public function destroy(Request $request){
      $venue = Venue::find($request->eliminar);
      $user=$venue->user;
      $user->delete();
      $venue->delete();
      Session::flash('mensaje', 'Peticion eliminada con éxito.');
        Session::flash('class', 'success');
        return redirect()->intended(url('/peticiones/'))->withInput();
    }

    public function accept(Request $request){
      $venue = Venue::find($request->aceptar);
      $user=$venue->user;
      $user->habilitado=1;
      $venue->habilitado=1;
      $user->save();
      $venue->save();
      Session::flash('mensaje', 'Peticion aceptada con éxito.');
        Session::flash('class', 'success');
        return redirect()->intended(url('/peticiones/'))->withInput();
    }
}
