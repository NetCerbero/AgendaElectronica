@extends('layout')

@section('Titulo')
	<h1>Registrar Usuario</h1>
@stop
@section('Botones')
@stop
@section('Subtitulo')
@stop


@section('ContenidoCasoUso')

<form method="post" action="{{ route('usuario.store') }}">
	<div class="form-row">
		{{ csrf_field() }}
	    <div class="form-group col-md-6">
	      <label for="inputEmail4">Nombre</label>
	      <input type="text" class="form-control" name="nombre" id="inputEmail4" placeholder="Nombre" required>
	    </div>

	    <div class="form-group col-md-6">
	      <label for="inputPassword4">Apellido</label>
	      <input type="text" class="form-control" name="apellido" id="inputPassword4" placeholder="Apellido" required>
	    </div>

	    <div class="form-group col-md-6">
	      <label for="inputState">Tipo</label>
	      <select id="inputState" class="form-control" name="tipo" required>
	        <option selected>Elija el tipo</option>
	        <option value="1">Profesor</option>
	        <option value="2">Padre - Madre</option>
	        <option value="3">Alumno</option>
	      </select>
	    </div>

	    <div class="form-group col-md-6">
	      <label for="Fecha">Fecha de Nacimiento</label>
	      <input type="date" class="form-control" name="fechaNacimiento" id="inputPassword4" required>
	    </div>
  	</div>

  	<div class="form-row">
   	 	<div class="form-group col-md-6">
  	    	<label for="inputCity">Numero de Carnet</label>
  	    	<input type="tel" class="form-control"  name="ci" id="inputCity">
    	</div>
	    
	    <div class="form-group col-md-6">
	      <label for="inputZip">Telefono</label>
	      <input type="tel" class="form-control" name="telefono" id="inputZip">
	    </div>
  	</div>

	<div class="form-group">
	  <label for="inputAddress">Direccion</label>
	  <input type="text" class="form-control" id="inputireccion" name="direccion" placeholder="1234 Main St">
	</div>
	<button type="submit" class="btn btn-primary">Registrar</button>
</form>
@stop