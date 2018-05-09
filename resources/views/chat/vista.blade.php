@extends('layout')

@section('cssPersonalizado')
@stop
@section('Titulo')
	<h1>Agenda</h1>
@stop

@section('Subtitulo')
@stop

@section('ContenidoCasoUso')
<h1>EJEMPLO</h1>

<form action="{{ route('envioAndroid') }}" method="post" class="form">
	{{ csrf_field() }}
	<label>ProfesorCurso</label>
	<input type="text" name="profesor_curso" class="form-control">
	<label>AlumnoCurso_id</label>
	<input type="text" name="alumnocurso_id" class="form-control">
	<label>Alumno_id</label>
	<input type="text" name="alumno_id" class="form-control">
	<label>Curso_id</label>
	<input type="text" name="curso_id" class="form-control">
	<label>Estado</label>
	<input type="text" name="estado" class="form-control" value="0">
	<label>Mensaje</label>
	<textarea class="form-control" name="mensaje">
	</textarea>
	<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@stop

@section('scripts')
@stop