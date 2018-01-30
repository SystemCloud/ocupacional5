<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class PerfilController extends Controller{
	public function __construct(){
		 $this->middleware('auth');
	}
	public function index(){
		$user=Auth::user();
		return view('perfil.index')
		->with('user',$user);
	}
	public function update(Request $request){
		$user=User::find(Auth::user()->id);
		$user->name=$request->name;
		$user->email=$request->email;
		if($user->save()){
			return response()->json([
	        "mensaje" => "1"
	      ]);
		}
	}

	public function password(){
		$user=Auth::user();
		return view('perfil.password')
		->with('user',$user);
	}

}
