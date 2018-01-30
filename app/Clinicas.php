<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinicas extends Model{
	protected $table='clinicas';
  protected $fillable = [
		'razon_social','ruc','direccion','telefono','celular','correo','tarifas_id',
  ];
  public function tarifas(){
    return $this->belongsTo('App\Tarifas');
  }
	public function user(){
		return $this->belongsToMany('App\User');
	}
}
