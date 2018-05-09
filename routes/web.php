<?php
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('prueba',function(){
	$u = new App\Persona;
	$u->nombre = "Luis Yerko";
	$u->apellido = "Laura Tola";
	$u->tipoAlumno = "f";
	$u->tipoProfesor = "v";
	$u->tipoPadre = "f";
	$u->fechaNacimiento = "1996-10-19";
	//$u->felefono
	//$u->ci
	//$u->direccion
	$u->save();
	$c = DB::table('Persona')->latest('id')->first();
	$u = new App\User;
	$u->email = "luiyer1920@gmail.com";
	$u->password = bcrypt("123456");
	$u->role = 1;
	$u->personaId = $c->id;
	$u->save();
});*/
/*Inicio de Sesion*/
Route::get('/',['as'=>'login','uses'=>'Auth\LoginController@showLoginForm']);
/*Login-Autenticacion*/
Route::post('login','Auth\LoginController@login');
/*Logout*/
Route::get('logout','Auth\LoginController@logout');

Route::get('home',function(){
	return view('layout');//mandar a la pagina de inicio saludos al usuario
});

/*Route::get('/', function () {
    return view('index');
});*/

/*===============================================================
Agenda:
	se adjunto un conjunto de asuntos al alumno
*/
Route::resource('agenda','AgendaController');
Route::get('agendaenviar/{id}/{nombre}',['as'=>'agenda.alumno','uses'=>'AgendaController@CrearContenidoAgendaALumno']);

/*
Asunto:
	- Informacion
	- Evento
	- Avisos
*/
//Route::resource('asunto','AsuntosController');

/*
Contenido:
	adiere contenido a los asuntos que se envian a los alumnos
*/
//Route::resource('contenido','ContenidoController');
Route::post('file-upload/{id}','ContenidoController@store');
/*
Cronograma
	son cronogramas anuales, tambien se podra hacer cronogramas del curso que lo hara el profesor
*/
Route::resource('cronograma','CronogramaController');

/*
Curso
*/
Route::resource('curso','CursoController');
Route::get('cursolista',['as'=>'cursolista','uses' => 'CursoController@ListaCurso']);
/*
Eventos
	kermes
	invitaciones
	otros
*/
//Route::resource('evento','EventosController');

/*
Inscripciones de alumnos en sus respectivos cursos
*/
Route::resource('inscripcion','InscripcionAlumnoController');

/*
Notificacion
	programables como recordatorios
	que necesiten respuesta
	que muestra el estado de la agenda enviada (leido, entregado)
*/
Route::resource('notificacion','NotificacionController');

/*
Usuarios:
	- Profesores
	- ALumnos
	- Padres
*/
Route::resource('usuario','PersonaController');
Route::post('credencial',['as'=>'credencial','uses'=>'PersonaController@Credencial']);
Route::get('persona/{id}',["as"=>"personalista","uses"=>"PersonaController@PersonaLista"]);
Route::get('alumnoget',['as' => 'alumnolista','uses' => 'PersonaController@AlumnoLista']);
Route::get('profesorget',['as' => 'profesorlista','uses' => 'PersonaController@ProfesorLista']);


/*
Tutor:
	-Oficial
	-Auxiliar
*/
Route::resource('tutor','ProfesorCursoController');
Route::get('cursoget',['as'=>'CursoTutor','uses'=>'PersonaController@CursosTutorProfesor']);
Route::get('alumnoscursoget/{idCurso?}',['as'=>'AlumnosInscritos','uses'=>'PersonaController@AlumnoInscritosCurso']);

/*=============================================================*/

Route::resource('mensaje','MensajeController');

/*Route::group(['prefix'=>'pusher','middleware'=>['auth']],function(){
	Route::post('mensaje/{id}',function($id,\Illuminate\Http\Request $request){
			$comment =new \App\Mensaje([
				'mensaje'=>$request>input('comment'),
				'user_id' => auth()->user()->id,
				'post_id' => $id
			]);
			$comment->save();
			broadcast(new \App\Events\FireMensaje($comment))->toOthers();
	})->name('comments.create');

	Route::get('posts/{id}',function($id){
		$post = \App\Mensaje::findOrFail($id);
		return view('chat',compact('post'));
	});

	Route::get('comment/{id}',function($id){
		$comment = \App\Mensaje::where('post_id',$id)->with('user')->get();
		return response()->json($comment);
	})->name('coments.list');
});*/


//Routas ocupadas por android
Route::post('loginAndroid','PersonaController@Verificar');
Route::get('chat','ChatController@Prueba');
Route::post('envioMsg',['as'=>'envioAndroid','uses'=>'ChatController@store']);
Route::get('chatRealTime',['as'=>'contactosChat','uses'=>'ChatController@index']);
Route::get('getMensaje/{Emisor}/{Receptor}/{tipoR}',['as'=>'chatMensaje','uses'=>'ChatController@GetMensaje']);
Route::get('getMensajeLeer/{Emisor}/{Receptor}/{tipoR}',['as'=>'chatMensajeLeer','uses'=>'ChatController@GetMensajeLeer']);
