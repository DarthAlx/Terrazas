<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $table = 'venues';
	protected $fillable = ['nombre', 'descripcion','direccion', 'latitud', 'longitud','imagen', 'zona', 'precio', 'capacidad', 'reglamento', 'servicios', 'tipo', 'habilitado', 'destacado'];

	public function galeria(){
	    return $this->hasMany('App\Galeria');
	}
}
