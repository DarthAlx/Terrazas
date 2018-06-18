<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $table = 'venues';
	protected $fillable = ['nombre', 'descripcion','direccion', 'latitud', 'longitud', 'zona', 'precio', 'precio_especial', 'capacidad', 'reglamento', 'servicios', 'tipo'];

	public function galeria(){
	    return $this->hasMany('App\Galeria');
	}
}
