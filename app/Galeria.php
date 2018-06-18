<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = 'galeria';
	protected $fillable = ['venue_id', 'imagen'];

	public function venue(){
	    return $this->belongsTo('App\Venue');
	}
}
