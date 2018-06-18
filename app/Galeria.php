<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = 'galeria';
	protected $fillable = ['venue_id', 'imagen1', 'imagen2', 'imagen3', 'imagen4', 'imagen5'];

	public function venue(){
	    return $this->belongsTo('App\Venue');
	}
}
