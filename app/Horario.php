<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
	protected $fillable = ['nombre', 'fecha', 'hora_inicio','hora_fin', 'precio', 'tipo','zona', 'capacidad', 'venue_id', 'user_id', 'apartador', 'status'];

	public function venue(){
	    return $this->belongsTo('App\Venue');
	}
	public function user(){
	    return $this->belongsTo('App\User');
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
	public function scopePrecio($query, $precio){
		if (trim($precio)!="") {
			$query->where('precio', $precio);
		}
		
	}
	public function scopeFecha($query, $fecha){
		if (trim($fecha)!="") {
			$query->where('fecha', $fecha);
		}
		
	}
}
