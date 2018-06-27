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
    return view('inicio');
});


Route::get('/perfil', function () {
		dd("Perfil de usuario");

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

Route::get('/lugares', function () {
	$lugares=App\Venue::where('habilitado',1)->orderBy('nombre','asc')->get();
    return view('lugares',['lugares'=>$lugares]);
});

Route::get('lugares', 'VenueController@buscar');


Route::get('/nuevo-proveedor', function () {
	$servicios=App\Servicio::orderBy('nombre','asc')->get();
    return view('auth.proveedores', ['servicios'=>$servicios]);
});
Route::post('nuevo-proveedor', 'ProveedoresController@store');



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



	Route::get('/venues', function () {
		$venues=App\Venue::orderBy('nombre','asc')->get();
		$servicios=App\Servicio::orderBy('nombre','asc')->get();
	    return view('admin.venues', ['venues'=>$venues,'servicios'=>$servicios]);
	});
	Route::get('/venues/nuevo', function () {
		$servicios=App\Servicio::orderBy('nombre','asc')->get();
	    return view('admin.venuenuevo', ['servicios'=>$servicios]);
	});
	Route::post('agregar-venue', 'VenueController@store');

	Route::delete('eliminar-venue', 'VenueController@destroy');


	Route::get('/venue/{id}', function ($id) {
		$venue=App\Venue::find($id);
		$servicios=App\Servicio::orderBy('nombre','asc')->get();
		if ($venue) {
			return view('admin.actualizarvenue', ['servicios'=>$servicios,'venue'=>$venue]);
		}
		else{
			return redirect()->intended(url('/404'));
		}
	    
	});
	Route::post('venue/{id}', 'VenueController@update');

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

});