<?php

namespace App\Http\Controllers\clinicas;
use Datatables;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresas;
use Auth;

class EmpresasController extends Controller
{

    public function __construct(){
        $this->middleware('auth');  
    }

    public function index()
    {
        $clinica_id=Session::get('clincias_id');
        return view('clinicas.empresas.index')
        ->with('clinicas_id',$clinica_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clinicas.empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $empresas = new Empresas();
            $empresas->fill($request->all());     

            if($empresas->save()){
                $empresas->clinicas()->attach($request->clinicas_id);
                return response()->json([
                    "mensaje" => "creado"
                ]);

            }     


            Empresas::create($request->all());
            return response()->json([
                "mensaje" => "creado"
            ]); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresas::find($id);
        return view('clinicas.empresas.detalle')->with('empresa', $empresa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresas::find($id);
        return view('clinicas.empresas.edit')->with('empresa', $empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empresa = Empresas::find($id);
        $empresa->fill($request->all()); 
        $empresa->save();
        return response()->json([
            "mensaje" => "listo" 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function eliminarEmpresa($id){
        $empresa = Empresas::find($id);
        $empresa->delete();
        return response()->json(["mensaje" => "Eliminado"]);
    }

    public function pagination(Request $request){
        if($request->ajax()){
           return Datatables::of(Empresas::all())->make(true);
        }
    }
}