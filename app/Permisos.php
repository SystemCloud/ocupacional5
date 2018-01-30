<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model{
	protected $table='permisos';
  protected $fillable = [
		'id','tipo_permiso','tarifas_id','permiso','estado'
  ];
	public function tarifas(){
		return $this->belongsTo('App\Tarifas');
	}
}
