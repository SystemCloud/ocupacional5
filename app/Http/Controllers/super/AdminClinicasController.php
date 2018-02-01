<?php

namespace App\Http\Controllers\super;
use Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Clinicas;
use App\ClinicasUser;
use Auth;

class AdminClinicasController extends Controller
{
    public function __construct(){
        $this->middleware('auth'); 
    //  $this->middleware('super');
    }

    public function index()
    {
        //$admin=User::paginate(10);
        return view('super.adminclinicas.index');
        //->with('admin',$admin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinicas = Clinicas::all();
        return view('super.adminclinicas.create')
        ->with('clinicas',$clinicas);
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
            $user = new User();
            $user->fill($request->all());
            $user->tipo = '2';
            $user->password=bcrypt($request->password);
            

            if($user->save()){
                $user->clinicas()->attach($request->clinicas_id);
                return response()->json([
                    "mensaje" => "creado"
                ]);

            }            
            
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
        $admin = User::find($id);
        $clinica = Clinicas::all();
        $myclinicas=$admin->clinicas->pluck('id')->ToArray();
        return view('super.adminclinicas.detalle')
        ->with('admin', $admin)
        ->with('clinicas', $clinica)
        ->with('myclinicas', $myclinicas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clinicas = Clinicas::all();
        $admin = User::find($id);
        $myclinicas=$admin->clinicas->pluck('id')->ToArray();
        return view('super.adminclinicas.edit')
        ->with('admin', $admin)
        ->with('clinicas', $clinicas)
        ->with('myclinicas', $myclinicas);
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
        $admin = User::find($id);
        $admin->fill($request->all());
        if($admin->save()){
            $admin->clinicas()->sync($request->clinicas_id);
            return response()->json([
                "mensaje" => "listo" 
            ]);
        }
        

        
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

    function eliminarAdminClinica($id){
        $admin = User::find($id);
        if($admin->delete()){
            $admin->clinicas()->detach($admin->clinicas->user_id);
            return response()->json(["mensaje" => "Eliminado"]);
        }
        
    }
    public function pagination(Request $request){
        if($request->ajax()){
         return Datatables::of(User::all())->make(true);
         //return app('datatables')->eloquent(Clinicas::all())->make(true);
        // return $datatables->eloquent(User::where('tipo','2'))->make(true);
     }
 }

 function validarCorreo(Request $request){
    $correo = $request->correo;
    $correo=User::BuscarCorreo($correo)->get();
    if(count($correo)>0){
        return response()->json([
            "mensaje" => "2"
        ]);
    }else{
        return response()->json([
            "mensaje" => "1"
        ]);
    }
}
}
