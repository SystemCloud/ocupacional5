<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examenes extends Model
{
	protected $table='examenes';
	protected $fillable = [
		'nombre_servicio'
	];
}
