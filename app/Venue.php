<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $table = 'venues';
	protected $fillable = ['nombre', 'descripcion','direccion', 'latitud', 'longitud','imagen', 'zona_id', 'capacidad', 'tamaño', 'telefono_lugar', 'reglamento', 'servicios','serviciosextra', 'tipo', 'habilitado', 'destacado','user_id'];

	public function galeria(){
	    return $this->hasMany('App\Galeria');
	}
	public function user(){
	    return $this->belongsTo('App\User');
	}
	public function zona(){
	    return $this->belongsTo('App\Zona');
	}
	public function scopeTipo($query, $tipo){
		if (trim($tipo)!="") {
			$query->where('tipo', $tipo);
		}
		
	}
	public function scopeZona($query, $zona){
		if (trim($zona)!="") {
			$query->where('zona', $zona);
		}
		
	}
	public function scopeCapacidad($query, $capacidad){
		if (trim($capacidad)!="") {
			$query->where('capacidad', '>=', $capacidad);
		}
		
	}
	public function scopePrecio($query, $capacidad){
		if (trim($capacidad)!="") {
			$query->where('capacidad', '>', $capacidad);
		}
		
	}
	public function horarios(){
        return $this->hasMany('App\Horario');
    }
}
