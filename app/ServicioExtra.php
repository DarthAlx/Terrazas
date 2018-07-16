<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioExtra extends Model
{
    protected $table = 'serviciosextra';
	protected $fillable = ['nombre', 'descripcion', 'precio','user_id'];

	public function user(){
	    return $this->belongsTo('App\User');
	}
}
