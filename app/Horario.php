<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
	protected $fillable = ['fecha', 'hora_inicio','hora_fin', 'precio', 'tipo','zona', 'capacidad', 'venue_id', 'user_id', 'apartador', 'status'];

	public function venue(){
	    return $this->belongsTo('App\Venue');
	}
	public function user(){
	    return $this->belongsTo('App\User');
	}
}
