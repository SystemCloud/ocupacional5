<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrendamientos extends Model
{
	protected $table='arrendamientos';
	protected $fillable = [
		'clinicas_id','fecha_creacion','fecha_vencimiento', 'costo_total', 'tarifas_id',
	];

	public function clinicas(){
		return $this->belongsTo('App\Clinicas');
	}

 	public function tarifas(){
    	return $this->belongsTo('App\Tarifas');
  	}
}
