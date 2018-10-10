<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = 'zonas';
    protected $fillable = ['nombre'];
    public function venues(){
        return $this->hasMany('App\Galeria');
	    return $this->hasMany('App\Venue');
	}
}
