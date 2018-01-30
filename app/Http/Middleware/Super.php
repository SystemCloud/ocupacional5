<?php
namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Session;
use Closure;;
class Super{
	protected $auth;
	public function __construct(Guard $auth) {
		$this->auth=$auth;
	}
  public function handle($request, Closure $next){
	/*	if($this->auth->user()->tipo!='1'){
			$request->session()->flash('message-error','No tienes acceso a esta area del sistema');
			Auth::logout();
			return redirect()->to('/login');
		}
	/*	if($this->auth->user()->logueado!=csrf_token()){
			$request->session()->flash('message-error','Han ingresado de otra computadora con este usuario');
			Auth::logout();
			return redirect()->to('/login');
		} */
		return $next($request);

  }
}
