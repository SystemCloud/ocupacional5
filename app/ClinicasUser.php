<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicasUser extends Model{
	protected $table='clinicas_users';
	protected $fillable = [
		'id','clinicas_id','user_id'
	];
	public function clinicas(){
		return $this->belongsTo('App\Clinicas');
	}
	public function user(){
		return $this->belongsTo('App\User');
	}
}
