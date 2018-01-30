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
}
