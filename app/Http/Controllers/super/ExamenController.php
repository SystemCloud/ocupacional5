<?php

namespace App\Http\Controllers\super;
use Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Examenes;

class ExamenController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); 
    //  $this->middleware('super');
    }

    public function index() 
    {
        return view('super.examenes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super.examenes.create');
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
          Examenes::create($request->all());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examen = Examenes::find($id);
        return view('super.examenes.edit')->with('examen', $examen);
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
        $examen = Examenes::find($id);
        $examen->fill($request->all()); 
        $examen->save();
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

    function eliminarExamen($id){
        $examen = Examenes::find($id);
        $examen->delete();
        return response()->json(["mensaje" => "Eliminado"]);
    }
    
    public function pagination(Request $request){
        if($request->ajax()){
           return Datatables::of(Examenes::all())->make(true);
       }
   }
}
