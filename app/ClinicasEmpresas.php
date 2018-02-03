<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicasEmpresas extends Model
{
    protected $table='clinicas_empresas';
	protected $fillable = [
		'empresas_id','clinicas_id'
	];
	public function clinicas(){
		return $this->belongsTo('App\Clinicas');
	}
	public function empresas(){
		return $this->belongsTo('App\Empresas');
	} 
}
