<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/', function () {
	$venues=App\Venue::where('destacado', 1)->get();
    return view('inicio',['venues'=>$venues]);
});


Route::get('/perfil', function () {
	$user=App\User::find(Auth::user()->id);
	return view('perfil', ['user'=>$user]);
})->middleware('auth');

Route::get('activacion/{token}/{email}', 'HomeController@activacion');

Route::get('/terraza', function () {
    return view('terraza');
});

// Authentication routes...
Route::get('entrar', 'Auth\LoginController@showLoginForm');
Route::post('entrar', 'Auth\LoginController@login');

Route::get('acceso', 'RolesController@index');

Route::get('/salir', function () {
    Auth::logout();
    return redirect()->intended('/');
})->middleware('auth');

// Registration routes...
Route::get('registro', 'Auth\RegisterController@showRegistrationForm');
Route::post('registro', 'Auth\RegisterController@register');


Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// Facebook

Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('auth/facebook/retorno', 'Auth\LoginController@handleProviderCallback');
/*
Route::get('/lugares', function () {
	$lugares=App\Horario::orderBy('nombre','asc')->get();
	dd($lugares);
    return view('lugares',['lugares'=>$lugares]);
});*/

Route::get('lugares', 'VenueController@buscar');


Route::get('/nuevo-proveedor', function () {
	$servicios=App\Servicio::orderBy('nombre','asc')->get();
	$zonas=App\Zona::orderBy('nombre','asc')->get();
    return view('auth.proveedores', ['servicios'=>$servicios,'zonas'=>$zonas]);
});
Route::post('nuevo-proveedor', 'ProveedoresController@store');


Route::get('/lugar/{id}', function ($id) {
	$venue=App\Venue::find($id);
	$horarios=$venue->horarios;
	if($horarios){
		$min=$horarios->min('precio');
	}else{
		$min="-";
	}
	
	
	
	if ($venue) {
		return view('terraza', ['venue'=>$venue,'min'=>$min]);
	}
	else{
		return redirect()->intended(url('/404'));
	}
    
});

Route::get('reservar-lugar', 'VenueController@reservar');

Route::post('pagar','OrdenController@pagar');

Route::group(['middleware' => 'proveedor'], function(){

	Route::get('/panel', function () {
		return view('panel');
	}); 

	Route::get('/venues', function () {
		$user=App\User::find(Auth::user()->id);
		$venues=$user->venues;
		$servicios=App\Servicio::orderBy('nombre','asc')->get();
		$zonas=App\Zona::orderBy('nombre','asc')->get();
	    return view('admin.venues', ['venues'=>$venues,'servicios'=>$servicios,'zonas'=>$zonas]);
	});

	Route::get('/venues/nuevo', function () {
		$servicios=App\Servicio::orderBy('nombre','asc')->get();
		$serviciosextra=App\ServicioExtra::where('user_id',Auth::user()->id)->orderBy('nombre','asc')->get();
		$zonas=App\Zona::orderBy('nombre','asc')->get();
	    return view('admin.venuenuevo', ['servicios'=>$servicios,'serviciosextra'=>$serviciosextra,'zonas'=>$zonas]);
	});
	Route::post('agregar-venue', 'VenueController@store');

	Route::delete('eliminar-venue', 'VenueController@destroy');


	Route::get('/venue/{id}', function ($id) {
		$venue=App\Venue::find($id);
		$servicios=App\Servicio::orderBy('nombre','asc')->get();
		$serviciosextra=App\ServicioExtra::where('user_id',Auth::user()->id)->orderBy('nombre','asc')->get();
		$zonas=App\Zona::orderBy('nombre','asc')->get();
		if ($venue) {
			return view('admin.actualizarvenue', ['servicios'=>$servicios,'venue'=>$venue,'serviciosextra'=>$serviciosextra,'zonas'=>$zonas]);
		}
		else{
			return redirect()->intended(url('/404'));
		}
	});
	Route::post('venue/{id}', 'VenueController@update');





	Route::get('/fechas', function () {
		$user=App\User::find(Auth::user()->id);
		$fechas=$user->horarios;
		$venues=$user->venues;
	    return view('admin.fechas', ['fechas'=>$fechas,'venues'=>$venues]);
	});

		Route::post('agregar-fecha', 'HorarioController@store');

		Route::post('actualizar-fecha', 'HorarioController@update');

	Route::delete('eliminar-fecha', 'HorarioController@destroy');


		Route::get('/servicios-extra', function () {
			$user=App\User::find(Auth::user()->id);
			$serviciosextra=$user->serviciosextra;
		    return view('admin.servicios-extra', ['serviciosextra'=>$serviciosextra]);
		});

		Route::post('agregar-servicioextra', 'ServicioController@storex');

		Route::post('actualizar-servicioextra', 'ServicioController@updatex');

		Route::delete('eliminar-servicioextra', 'ServicioController@destroyx');



});

Route::group(['middleware' => 'admin'], function(){
	Route::get('/crm', function () {
			$usuarios=App\User::where('is_admin',0)->where('status','Activo')->orderBy('name','asc')->get();
		    return view('admin.usuarios', ['usuarios'=>$usuarios]);
		}); 

	Route::get('/admin', function () {
			$month = date('m');
		      $year = date('Y');
		      $day = date('d');
		      $from= date('Y-m-d', mktime(0,0,0, 1, 1, $year));
		      $day = date("d", mktime(0,0,0, 12, 31, $year+1));
		      $to = date('Y-m-d', mktime(0,0,0, 12, 31, $year));

			
			$usuarios=App\User::whereBetween('created_at', array($from, $to))->where('is_admin',0)->where('status','Activo')->count();
			$mujeres=App\User::whereBetween('created_at', array($from, $to))->where('is_admin',0)->where('status','Activo')->where('genero','Femenino')->count();
			$hombres=App\User::whereBetween('created_at', array($from, $to))->where('is_admin',0)->where('status','Activo')->where('genero','Masculino')->count();
			
				
		
	    	return view('admin', ['usuarios'=>$usuarios,'mujeres'=>$mujeres,'hombres'=>$hombres,'from'=>$from,'to'=>$to]);
		});

	Route::post('admin', 'HomeController@admin');



	
	

	Route::get('/servicios', function () {
		$servicios=App\Servicio::orderBy('nombre','asc')->get();
	    return view('admin.servicios', ['servicios'=>$servicios]);
	});

	Route::post('agregar-servicio', 'ServicioController@store');

	Route::delete('eliminar-servicio', 'ServicioController@destroy');

	Route::post('actualizar-servicio', 'ServicioController@update');

	Route::get('/peticiones', function () {
		$peticiones=App\Venue::where('habilitado',0)->orderBy('nombre','asc')->get();
	    return view('admin.peticiones', ['peticiones'=>$peticiones]);
	});
	Route::delete('eliminar-peticion', 'ProveedoresController@destroy');
	
	Route::post('aceptar-peticion', 'ProveedoresController@accept');


	Route::get('/peticiones', function () {
		$peticiones=App\Venue::where('habilitado',0)->orderBy('nombre','asc')->get();
	    return view('admin.peticiones', ['peticiones'=>$peticiones]);
	});


	Route::get('/zonas', function () {
		$zonas=App\Zona::orderBy('nombre','asc')->get();
	    return view('admin.zonas', ['zonas'=>$zonas]);
	});

	Route::post('agregar-zona', 'ZonaController@store');

	Route::delete('eliminar-zona', 'ZonaController@destroy');

	Route::post('actualizar-zona', 'ZonaController@update');


});