<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Clinicas;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo=Auth::user()->tipo;
         $variablex='Un String';
         if($tipo=='1'){
             return view('layouts.dashboard.super.index');
         }else if($tipo=='2'){

            if(Session::get('clincias_id')){
                $clincias_id=Session::get('clincias_id');
                $clinicas=Clinicas::find($clincias_id);
                return view('layouts.dashboard.clinica.index')->with("clinicas", $clinicas);
            }else{

                $user=User::find(Auth::user()->id);
                $clinicas=$user->clinicas->all();

                if(count($clinicas)>1){
                  return view('layouts.dashboard.clinica.select')->with('clinicas', $clinicas);                   
                }else{
                    Session::put('clincias_id',$clinicas[0]->id);
                    $clincias_id=Session::get('clincias_id');
                    $clinicas=Clinicas::find($clincias_id);
                    return view('layouts.dashboard.clinica.index')->with("clinicas", $clinicas);
                }

            }
         }else if($tipo=='3'){
             return view('layouts.dashboard.admin.index');
         }
    }
    public function validar(Request $request){
        $codigo=$request->codigo;
        $user_id=Auth::user()->id;
        if($codigo==0){
         return redirect('/');
        }else{
            $validar=User::ValidarIngreso($codigo,$user_id)->get();
            
            if(count($validar)==0){
                return redirect('/');
            }else{
                $clincias_id=Session::get('clincias_id');
                $clinicas=Clinicas::find($clincias_id);
                Session::put('clincias_id',$codigo);
                return view('layouts.dashboard.clinica.index')->with("clinicas", $clinicas);
            }
        }


    }
}
