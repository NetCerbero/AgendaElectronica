<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Persona;
class PersonaController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();
        return view('usuario.index',compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dd($request) ;
        $usr = [];
        switch ($request->input('tipo')) {
            case 1:
                $usr['tipoProfesor'] = 'v';
                $usr['tipoPadre'] = 'f';
                $usr['tipoAlumno'] = 'f';
                break;
            case 2:
                $usr['tipoProfesor'] = 'f';
                $usr['tipoPadre'] = 'v';
                $usr['tipoAlumno'] = 'f';
                break;
            case 3:
                $usr['tipoProfesor'] = 'f';
                $usr['tipoPadre'] = 'f';
                $usr['tipoAlumno'] = 'v';
                break;
        }
        $usr["nombre"] = $request->input("nombre");
        $usr["apellido"] = $request->input("apellido");
        $usr["fechaNacimiento"] = $request->input("fechaNacimiento");
        $usr["telefono"] = $request->input("telefono");
        $usr["ci"] = $request->input("ci");
        $usr["direccion"] = $request->input("direccion");
        $usr["created_at"] = Carbon::now();
        $usr["updated_at"] = Carbon::now();
        Persona::Add($usr);
        return redirect()->route("usuario.index");
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
        //
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
        //
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

    public function AlumnoLista(){
        return Persona::listaAlumno();
    }

    public function ProfesorLista(){
        return Persona::listaProfesor();
    }

    public function CursosTutorProfesor(){
        $data = auth()->user()->persona->encargadoCursos;
        $cursos =[];
        for($i = 0 ; $i < count($data); $i++){
            $cursos[$i] = array('id' => $data[$i]->cursos->id,'nombre'=> $data[$i]->cursos->nombre);            
        }
        return $cursos;
    }

    public function AlumnoInscritosCurso($idCurso){
         //auth()->user()->persona->encargadoCursos[0]->cursos->alumnosInscritos;
        $cursosTutor = auth()->user()->persona->encargadoCursos;
        for( $i = 0; $i < count($cursosTutor) ;$i++){
            if( $idCurso == $cursosTutor[$i]->curso_id){
                $inscritos = $cursosTutor[$i]->cursos->alumnosInscritos;
                $alumno = [];
                for( $i = 0; $i < count($inscritos);$i++){
                    $alumno[$i] = array('id' => $inscritos[$i]->alumno->id,'nombrecompleto' => $inscritos[$i]->alumno->nombre." ".$inscritos[$i]->alumno->apellido );
                }
                return $alumno;
            }
        }

        return [];
    }
}