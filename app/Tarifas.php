<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifas extends Model{
	protected $table='tarifas';
  	protected $fillable = [
		'nombre_tarifa','duracion','precio'
  	]; 
  	
  	public function arrendamientos(){
    	return $this->hasMany('App\Arrendamientos');
  	}

	public function permisos(){
		return $this->hasMany('App\Permisos');
	}
}
