<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asunto;
use App\AsuntoDetalle;
use DB;
use App\User;
use App\Persona;
class AgendaController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas = Asunto::all();
        return view('agenda.index',compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        $dato =  new PersonaController;
        $cursos = $dato->CursosTutorProfesor();
        $notificacion = new NotificacionController;
        $tipoNT = $notificacion->tipoNotificacion();
        $t_asunto = new TipoAsuntoController;
        $tipoA = $t_asunto->tipoAsuntos();
        return view('agenda.create',compact('cursos','tipoNT','tipoA'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $curso = auth()->user()->persona->encargadoCursos->where('curso_id','=',$request->input("curso"));
        //dd($curso->pop());
        $datos = [
            "titulo"=>$request->input("titulo"),
            "mensaje"=>$request->input("mensaje"),
            "fecha"=>$request->input('fecha'),
            "profesorcurso_id"=>$curso->pop()->id,
            "notificacion_id"=>$request->input("tipo_notificacion"),
            "tipo_asunto"=>$request->input("tipo_a")
        ];

        if($request->input("options") == 0){
            Asunto::create($datos);
            $cursosTutor = auth()->user()->persona->encargadoCursos;
            for( $i = 0; $i < count($cursosTutor) ;$i++){
                //dd($cursosTutor);
                if( $request->input('curso') == $cursosTutor[$i]->curso_id){
                    //debemos controlar la gestion ya que el mismo alumno puede estar en el mismo curso pero en diferente gestion
                    //dd($cursosTutor[$i]->cursos->alumnosInscritos);
                    $inscritos = $cursosTutor[$i]->cursos->alumnosInscritos->where("alumno_id","=",$request->input('alumno'));/*->
                    where("gestion","=","2019");*/
                    //dd($inscritos);
                    $id_detalle = $inscritos->pop()->id;
                    $asunto_id = DB::table('asuntos')->latest('id')->first();
                    $id_asunto = $asunto_id->id;
                    //dd($id_asunto);
                    AsuntoDetalle::create([
                        "asunto_id" => $id_asunto,
                        "alumnocurso_id" => $id_detalle,
                        "alumno_id" =>$request->input("alumno"),
                        "estado" => "n"
                    ]);
                    /*supondremos que solo nos devulve una coincidencia*/
                    //dd($inscritos);
                }
            }
        }else{
            if($request->input('options') == 1){
                Asunto::create($datos);
                $cursosTutor = auth()->user()->persona->encargadoCursos;
                for( $i = 0; $i < count($cursosTutor) ;$i++){
                    if( $request->input('curso') == $cursosTutor[$i]->curso_id){
                        //debemos controlar la gestion ya que el mismo alumno puede estar en el mismo curso pero en diferente gestion
                        $inscritos = $cursosTutor[$i]->cursos->alumnosInscritos;
                        $asunto_id = DB::table('asuntos')->latest('id')->first();
                        $id_asunto = $asunto_id->id;
                        foreach ($inscritos as $alumno) {   
                            //dd($alumno);                  
                            AsuntoDetalle::create([
                                "asunto_id" => $id_asunto,
                                "alumnocurso_id" => $alumno->id,
                                "alumno_id" => $alumno->alumno_id,
                                "estado" => "n"
                            ]);
                        }
                    }
                }
            }
        }

        return redirect()->route("agenda.index");
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

    public function CrearContenidoAgendaALumno($id,$nombre){
        return view('agenda.create',compact('id','nombre'));
        //return $id.$nombre;
    }


    public function GetAgendas($email){
        $usr = User::all()->where('email',$email);
        if(count($usr)>0){
            $agenda = [];
            $i  = 1;
            $usr = $usr->pop();
            $padre = $usr->persona->PadreDe;
            //dd($padre);
            foreach ($padre as $key => $hijos) {
                $ins = $hijos->inscritoCursos;
                foreach ($ins as $detalle) {
                    //$curso = $detalle->curso->nombre;
                    $infagenda = DB::select("select a.id, a.titulo,a.mensaje, a.fecha, cr.nombre from asunto_detalles s, asuntos a,alumno_cursos al, cursos cr where s.asunto_id = a.id and $detalle->id = s.alumnocurso_id and $detalle->id = al.id and al.curso_id = cr.id");
                    //array_unshift($agenda[$i],$curso);
                    //array_push($agenda[$i],$curso);
                    if(count($infagenda)>0){
                        $agenda[$i] = $infagenda;  
                         $i++; 
                    }
                }
                # code...
            }
            return $agenda;
        }
    }
}
