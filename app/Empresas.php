<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $table='empresas';
  	protected $fillable = [
		'razon_social','ruc','direccion','telefono','celular','correo',
  	];

  	public function clinicas(){
		return $this->belongsToMany('App\Clinicas');
	}
}
