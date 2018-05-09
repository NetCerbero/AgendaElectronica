<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensaje;
use App\AlumnoCurso;
use App\Curso;
use App\User;
use App\Persona;
use App\ProfesorCurso;
class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $alumnos = [];
        //dd(auth()->user()->persona->encargadoCursos);
        $i = 0;
        $cursos = auth()->user()->persona->encargadoCursos;
        //dd($cursos);
        foreach ($cursos as $cr) {
            $alumnos[$i] = array($cr->cursos->id , 0, $cr->cursos->nombre, 2);
            $i++;
        }
        foreach ($cursos as $curso ) {
            //dd($curso->cursos->alumnosInscritos);
            //dd($curso->cursos);
            $inscritos = $curso->cursos->alumnosInscritos;            
            foreach ($inscritos as $alumno) {
                /*
                el ultimo parametro especifica el tipo de destino
                1 = alumno
                2 = curso
                */

                $alumnos[$i] = array( $alumno->id,$alumno->alumno_id, $alumno->alumno->nombre. " ".$alumno->alumno->apellido, 1);
                //dd($alumno->alumno);
                $i++;
            }
        }
        //dd($alumnos);
        return view('chat.envio',compact('alumnos'));
        //return view('chat.envio');
    }

    public function Prueba($msg){
         $token ="eytu_m4S61E:APA91bHNesVSTAPq06riaa5GLUdQFGsxhFo79PUltA6MwMWT1tIUkfoLG7GQjj01UUMTFRMvjX8M4iVcr4RG6foswnRAoijDAnsUNZlKgZ9qwqdtlkrEWskBzgz3r9Is_K-TjFHbXYJW";
        $url = "https://fcm.googleapis.com/fcm/send";
        $field = array(
            "to" => $token,
            //"notification" => array('body' =>"El ingeniero padilla" ,"title" => "Se la come"),
            "data" => array(
                            'objeto' =>$msg,
                            'registro' => 215049063
                        ),
        );
        define(
            "GOOGLE_API_KEY",
            "AAAAe_yScdk:APA91bGgCc-uUXnAEgwuDxoT5NVMfaLVsnqLp9czuuZu1u1gQfGryLkqOrmbYPT0Lvtl6sV8IT2sP2nrx_KKIcO6Rg7hI2T_zgV_4FRsMW_ABB0GQpg90lytb-I_XCeF2uIHIDFHJlZD"
        );
        $header = array(
            'Authorization:key='.GOOGLE_API_KEY,
            'Content-Type: application/json',
            //'Content-Length: '.strlen(json_encode($field)),
        );
        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($field),
            CURLOPT_HTTPHEADER => $header,
        ));
        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if($err){
            return "Error: ".$err;
        }
        return $result;

    }

    public function EnviarNotificacion($mensaje, $hora, $token, $id_Receptor, $tipo){
        $url = "https://fcm.googleapis.com/fcm/send";
        $field = array(
            "to" => $token,
            "data" => array(
                            'mensaje' =>$mensaje,
                            'hora' => $hora,
                            'id_Receptor'=> $id_Receptor,
                            'tipo' => $tipo
                        ),
        );
        define(
            "GOOGLE_API_KEY",
            "AAAAe_yScdk:APA91bGgCc-uUXnAEgwuDxoT5NVMfaLVsnqLp9czuuZu1u1gQfGryLkqOrmbYPT0Lvtl6sV8IT2sP2nrx_KKIcO6Rg7hI2T_zgV_4FRsMW_ABB0GQpg90lytb-I_XCeF2uIHIDFHJlZD"
        );
        $header = array(
            'Authorization:key='.GOOGLE_API_KEY,
            'Content-Type: application/json',
        );
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($field),
            CURLOPT_HTTPHEADER => $header,
        ));
        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if($err){
            return "Error: ".$err;
        }
        return $result;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $data = [];
        $tipo = $request->input('tipo');
        if( $tipo == 1){
            $alumnocurso = AlumnoCurso::all()->where('id','=', $request->input('id'));
            //dd($alumnocurso);
            $alumnocurso = $alumnocurso->pop();
            $data["alumnocurso_id"] = $alumnocurso->id;
            $data["alumno_id"] = $alumnocurso->alumno_id;
            $data["mensaje"] = $request->input('mensaje');
            $data["estado"] = 'n'; //n = no leido
            $data["pertenece"] = 1; // 1 = profesor, 2 = alumno, 3 = grupo
            $cursos = auth()->user()->persona->encargadoCursos;

            foreach ($cursos as $cr) {
                if($cr->curso_id == $alumnocurso->curso_id){
                    $data['profesor_curso'] = $cr->id;
                }
            }
            Mensaje::create($data);
            $hora = getdate();
            $hora = $hora['hours'].":".$hora['minutes'];
            $token = $this->GetToken($alumnocurso->alumno_id);
            if( $token != "error"){
                $this->EnviarNotificacion($request->input('mensaje'),$hora,$token, $data["profesor_curso"],1);//ENVIO DE MENSAJE :D
                return "success";
            }
            return "No tiene token el usuario";
        }else if($tipo == 2){
            $data['curso_id'] = $request->input('id');
            $data["mensaje"] = $request->input('mensaje');
            $data["estado"] = 'n'; //n = no leido
            $data["pertenece"] = 1; // 1 = profesor, 2 = alumno, 3 = grupo
            $cursos = auth()->user()->persona->encargadoCursos;
            foreach ($cursos as $cr) {
                if($cr->curso_id == $request->input('id')){
                    $data['profesor_curso'] = $cr->id;
                }
            }
            Mensaje::create($data);
            $ins = AlumnoCurso::all()->where('curso_id',$data["curso_id"]);
            /*$padres = [];
            $i = 0;*/
            foreach ($ins as $dt_ins) {
                $alumno = $dt_ins->alumno;
                $token = $alumno->hijoDePersona->token_firebase;
                if( $token != null){
                    /*$padres[$i] = $token;
                    $i++; */
                    $hora = getdate();
                    $hora = $hora['hours'].":".$hora['minutes'];
                    $this->EnviarNotificacion($request->input('mensaje'),$hora,$token, $data["curso_id"],2);
                }
                
            }
            //dd($padres);
            return "success";
        }
        //Mensaje::create();
        //$msg = $request->input('mensaje');
        //return $this->Prueba($msg);*/
        return "no success";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SetToken(Request $request)
    {
        //$a = User::where('email','=',$request->input('email'))->get();
        $a = User::where('email', $request->input('email'))->get();
        //persona->update(['token' => $request->input('token')]);
        if(count($a)){
            $a = $a->pop()->persona;
            $a->token_firebase = $request->input('token_firebase');
            $a->save();
            return "success";
        }
        return "error";
    }

    public function GetToken($id){
            $a = Persona::find($id);
            $a = $a->hijoDePersona;//->token_firebase;
            return ($a === NULL || $a->token_firebase === NULL)? "error" : $a->token_firebase; 

    }

    public function GetMensaje($Emisor, $Receptor, $tipoR){
        $Encargado = Persona::find($Emisor)->encargadoCursos;//cursos en el que es tutor
    /*
     1 = alumno | 2 = curso
    */  
        //dd($Encargado);
        $receptor = "";
        if($tipoR == 1){
            $receptor = AlumnoCurso::all()->where('id','=', $Receptor);
            $receptor = $receptor->pop();
            $curso = $receptor->curso_id;
            $idProfesor = -1;
            foreach ($Encargado as $cr) {
                if($cr->curso_id == $curso){
                    $idProfesor = $cr->id;
                    break;
                }
            }
            //dd($receptor);

            $msg = Mensaje::all()->where('profesor_curso',$idProfesor)
                                ->where('alumnocurso_id',$Receptor)
                                ->where('estado','n');
            return $msg;
        }else if( $tipoR == 2){
            /*$idProfesor = -1;
            foreach ($Encargado as $cr) {
                if($cr->curso_id == $Receptor){
                    $idProfesor = $cr->id;
                    break;
                }
            }*/
            return Mensaje::all()->where('curso_id',$Receptor)
                                ->where('estado','n');

        }
        //$alumnocurso = AlumnoCurso::all()->where('id',)
    }



    public function GetMensajeLeer($Emisor, $Receptor, $tipoR){
        $Encargado = Persona::find($Emisor)->encargadoCursos;//cursos en el que es tutor
    /*
     1 = alumno | 2 = curso
    */  
        //dd($Encargado);
        $receptor = "";
        if($tipoR == 1){
            $receptor = AlumnoCurso::all()->where('id','=', $Receptor);
            $receptor = $receptor->pop();
            $curso = $receptor->curso_id;
            $idProfesor = -1;
            foreach ($Encargado as $cr) {
                if($cr->curso_id == $curso){
                    $idProfesor = $cr->id;
                    break;
                }
            }
            //dd($receptor);

            $msg = Mensaje::all()->where('profesor_curso',$idProfesor)
                                ->where('alumnocurso_id',$Receptor)
                                ->where('estado','l');
            foreach ($msg as $item) {
                $item->estado = 'n';
                $item->save();
            }
            return $msg;
        }else if( $tipoR == 2){
            /*$idProfesor = -1;
            foreach ($Encargado as $cr) {
                if($cr->curso_id == $Receptor){
                    $idProfesor = $cr->id;
                    break;
                }
            }*/
            $msg = Mensaje::all()->where('curso_id',$Receptor)
                                ->where('estado','l');
            foreach ($msg as $item) {
                $item->estado = 'n';
                $item->save();
            }

            return $msg;
        }
        //$alumnocurso = AlumnoCurso::all()->where('id',)
    }

    public function GetHijoChat($email){
        $a = User::all()->where('email',$email);
        if(count($a)>0){
            $a = $a->pop();
            $hijos = $a->persona->PadreDe;
            $msg = [];
            $idC = [];
            $i=0;
            foreach ($hijos as $hi){
                $dt = $hi->inscritoCursos;
                foreach ($dt as $cr) {
                    $msg[] =array('id' => $cr->curso->id, 'nombre'=>$cr->curso->nombre,'ayuda'=> $hi->nombre,'dst' => 2); // 2 = curso o grupo
                    $idC[$i] = $cr->curso->id;
                    $i++;
                }
                
            }

            foreach ($idC as $idT) {
                $a = Curso::find($idT);
                $en = $a->detalleEncargado;
                foreach ($en as $p) {
                    $msg[] =array('id' => $p->id, 'nombre'=>$p->profesor->nombre." ".$p->profesor->apellido,'ayuda'=> $a->nombre, 'dst' => 1);   
                    $i++;
                }
            }

            return array('resultado' => $msg);
        }
        return -1;
    }

    public function SetMensajeAndroid(Request $request){
        $pa = User::all()->where('email',$request->input('email'));
        $tipo = $request->input('tipo_dst');
        $data = [];
        if( $tipo == 1){
            if(count($pa)>0){
                $pa = $pa->pop();
                $id_inscripcion=-1;
                $hijos = $pa->persona->PadreDe;
                foreach ($hijos as $hi) {
                    $dt = $hi->inscritoCursos->where('curso_id',$request->input('id'));
                    if(count($dt) == 1){
                        $dt = $dt->pop();
                        $data["alumnocurso_id"] = $dt->id;
                        $data["alumno_id"] = $dt->alumno_id;
                        //return $id_inscripcion;
                    }
                }
                $pro = Curso::find($request->input('id'));
                $p = $pro->detalleEncargado->where('curso_id',$request->input('id'))->where('tipo',1);
                if(count($p)){
                    $p = $p->pop();
                    $data["profesor_curso"] = $p->id;
                    $data["pertenece"] = 2;
                    $data["estado"] = "l";
                    $data["mensaje"] = $request->input('mensaje');
                    Mensaje::create($data);
                    return "success";
                }
            }

        }else if( $tipo == 2){
            $data["curso_id"] = $request->input('id');
            $data["estado"] = "l";
            $data["pertenece"] = 2;
            $data["mensaje"] = $request->input("mensaje");
            if(count($pa)>0){
                $pa = $pa->pop();
                $id_inscripcion=-1;
                $hijos = $pa->persona->PadreDe;
                foreach ($hijos as $hi) {
                    $dt = $hi->inscritoCursos->where('curso_id',$request->input('id'));
                    if(count($dt) == 1){
                        $dt = $dt->pop();
                        $data["alumnocurso_id"] = $dt->id;
                        $data["alumno_id"] = $dt->alumno_id;

                        Mensaje::create($data);
                        //Modifique para que se envie a todos los del grupo
                        $ins = AlumnoCurso::all()->where('curso_id',$data["curso_id"]);
                            /*$padres = [];
                            $i = 0;*/
                            foreach ($ins as $dt_ins) {
                                $alumno = $dt_ins->alumno;
                                $token = $alumno->hijoDePersona->token_firebase;
                                if( $token != null){
                                    /*$padres[$i] = $token;
                                    $i++; */
                                    $hora = getdate();
                                    $hora = $hora['hours'].":".$hora['minutes'];
                                    $this->EnviarNotificacion($request->input('mensaje'),$hora,$token, $data["curso_id"],2);
                                }
                                
                            }
                        //Fin de la modificacion
                        //Mensaje::create($data);
                        return "success";
                    }
                }
            }
        }
        return "error mensaje";

    }
}
