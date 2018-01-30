<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifas extends Model{
	protected $table='tarifas';
  protected $fillable = [
		'nombre_tarifa','tipo_tarifa','precio'
  ];
  public function clinicas(){
    return $this->hasMany('App\Clinica');
  }
	public function permisos(){
		return $this->hasMany('App\Permisos');
	}
}
