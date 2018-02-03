<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable{
	protected $table = "users";
	protected $fillable = [
		'id','tipo', 'name', 'email', 'password',
	];
	protected $hidden = [
		'password', 'remember_token',
	];
	public function clinicas(){
		return $this->belongsToMany('App\Clinicas');
	}

	//----------------------SCOPE
	public function scopeBuscarCorreo($query,$correo){
		$query->where('email',$correo);
	}
	public function scopeValidarIngreso($query,$codigo,$user_id){
		$query->where('id',$user_id)
		->whereHas('clinicas',function($q) use($codigo){
			$q->where('clinicas_id',$codigo);
		});
	}
}
