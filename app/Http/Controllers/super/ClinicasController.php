<?php

namespace App\Http\Controllers\super;
use App\Http\Controllers\Controller;
use Datatables;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Clinicas;
use App\Tarifas;

use Auth;

class ClinicasController extends Controller{
	public function __construct(){
		$this->middleware('auth');
	//	$this->middleware('super');
	}
  public function index(){ 
    $clinicas=Clinicas::paginate(10);
    return view('super.clinicas.index')
    ->with('clinicas',$clinicas);
  }
  public function create(){
    $tarifas = Tarifas::all();
    return view('super.clinicas.create')
    ->with('tarifas',$tarifas);
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
    $tarifa = Tarifas::find($clinica->tarifas_id);
    return view('super.clinicas.detalle')->with('clinica', $clinica)->with('tarifa', $tarifa->nombre_tarifa);
  }
  public function edit($id){
    $tarifas = Tarifas::all();
    $clinica = Clinicas::find($id);
    return view('super.clinicas.edit')->with('clinica', $clinica)->with('tarifas', $tarifas);
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
         //return app('datatables')->eloquent(Clinicas::all())->make(true);
        // return $datatables->eloquent(User::where('tipo','2'))->make(true);
   }
 }
}
