<?php

namespace App\Http\Controllers\super;
use App\Http\Controllers\Controller;
use Datatables;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Clinicas;

use Auth;

class ClinicasController extends Controller{
	public function __construct(){
		$this->middleware('auth'); 
	}
  public function index(){ 
    $clinicas=Clinicas::paginate(10);
    return view('super.clinicas.index')
    ->with('clinicas',$clinicas);
  }
  public function create(){
    return view('super.clinicas.create');
  }
  public function store(Request $request){
    if($request->ajax()){
      Clinicas::create($request->all());
      return response()->json([
        "mensaje" => "creado"
      ]); 
    }
  }
  public function show($id){    
    $clinica = Clinicas::find($id);
    return view('super.clinicas.detalle')->with('clinica', $clinica);
  }
  public function edit($id){
    $clinica = Clinicas::find($id);
    return view('super.clinicas.edit')->with('clinica', $clinica);
  }
  public function update(Request $request, $id){
    $clinica = Clinicas::find($id);
    $clinica->fill($request->all()); 
    $clinica->save();
    return response()->json([
      "mensaje" => "listo" 
    ]);
  }
  public function destroy($id){

  }
  function eliminarClinica($id){
    $clinica = Clinicas::find($id);
    $clinica->delete();
    return response()->json(["mensaje" => "Eliminado"]);
  }
  public function pagination(Request $request){
    if($request->ajax()){
     return Datatables::of(Clinicas::all())->make(true);
   }
 }
}
