@extends('layout')

@section('cssPersonalizado')
<link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}">
<style type="text/css">
	
	/*.btn-secondary:focus, .btn-secondary.focus, .btn-secondary:hover, .btn-secondary.dropdown-toggle:hover, .btn-secondary.dropdown-toggle:focus {
    background-color: #0404046e !important;
	}*/

	.btn-secondary:focus, .btn-secondary.focus, .btn-secondary:hover, .btn-secondary.dropdown-toggle:hover, .btn-secondary.dropdown-toggle:focus {
    background-color: #080808d4 !important;
	}

	.btn-secondary, .btn-secondary.dropdown-toggle {
    background-color: #4f5b60b0 !important;
	}

	.btn-secondary:not([disabled]):not(.disabled).active, .btn-secondary:not([disabled]):not(.disabled):active, .show > .btn-secondary.dropdown-toggle {
    background-color: #0c0b0b !important;
	}
</style>
@stop
@section('Titulo')
	<h1>Agenda</h1>
@stop

@section('Subtitulo')
@stop


@section('ContenidoCasoUso')
<form method="post" action="{{ route('agenda.store') }}" enctype="multipart/form-data">
	<div class="form-row">
		{{ csrf_field() }}
	    <div class="form-group col-md-6">
	      <label for="inputState">Alumno</label>
	      <select id="alumnos" class="form-control" name="alumno" required>
	        <option selected>Elija el Alumno</option>
	      </select>
	    </div>

	    <div class="form-group col-7 col-md-3">
	      <label for="inputState">Curso</label>
	      <select id="Cursos" class="form-control" name="curso" required>
	      	<option value="-1" selected>Elija el Curso</option>
	        @for ($i = 0; $i < count($cursos); $i++)
			    <option value="{{ $cursos[$i]["id"] }}"> {{ $cursos[$i]["nombre"] }} </option>
			@endfor	        
	      </select>
	    </div>	
		
		<div class="form-group col-5 col-md-3">
	      <label for="inputState">Enviar a todos los alumnos</label>
			<div class="btn-group btn-group-toggle" data-toggle="buttons">
			  <label class="btn btn-secondary active">
			    <input type="radio" id="radiobtnSi" name="options" value="1" id="option1" autocomplete="off"> Si
			  </label>
			  <label class="btn btn-secondary">
			    <input type="radio" id="radiobtnNo" name="options" value="0" id="option2" autocomplete="off" checked> No
			  </label>
			</div>
		</div>
		<div class="form-group col-md-2">
	      <label for="Fecha">Fecha</label>
	      <input type="date" class="form-control" name="fecha" id="inputEmail4" required>
	    </div>
		<div class="form-group col-md-4">
	      <label for="Titulo">Titulo de la Agenda</label>
	      <input type="text" class="form-control" name="titulo" required>
	    </div>
	    <div class="form-group col-md-3">
	      <label for="inputState">Tipo</label>
	      <select id="inputState" class="form-control" name="tipo_a" required>
	        <option selected>Elija el tipo de asunto</option>
	        @foreach ($tipoA as $a)
	        	<option value="{{ $a->id }}"> {{ $a->nombre }}</option>
	        @endforeach	        
	      </select>
	    </div>


	    <div class="form-group col-md-3">
	      <label for="inputState">Notificacion</label>
	      <select id="inputState" class="form-control" name="tipo_notificacion" required>
	        <option selected>Elija la notificacion</option>
	        @foreach ($tipoNT as $nt)
	        	<option value="{{ $nt->id }}"> {{ $nt->nombre }}</option>
	        @endforeach
	      </select>
	    </div>
  	</div>

  	<div class="form-row">
   	 	<div class="form-group col">
  	    	<label for="inputCity">Mensaje</label>
  	    	<textarea class="form-control" name="mensaje"></textarea>
	    </div>
  	</div>
	<button type="submit" class="btn btn-primary">Registrar</button>
</form>
@stop

@section('scripts')
<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
<script>
	var index = 0;
	$(window).on("load",function(){

		$("#Cursos").change(function(){
			index = this.value;
			if( index != -1){
				$.get("{{ route('AlumnosInscritos') }}/"+index ,function(data, status){
							//alert(data.length);
						$("option").remove(".listaPrueba");
						for(var i = 0 ; i < data.length ; i++){
							var opt = "<option class='listaPrueba' value='"+data[i].id + "'>"+data[i].nombrecompleto+"</option>";
							$('#alumnos').append(opt);
						}	
				});
			}
			
		});

		/*$("#Cursos").click(function(){
			//alert("presionaste");
			var indice = document.getElementById("Cursos").selectedIndex;
			//var valor =select.options[indice].value;
			if( indice != 0 ){
				if( indice != index){
					index = indice;
					$.get("{{ route('AlumnosInscritos') }}/"+indice ,function(data, status){
							//alert(data.length);
						$("option").remove(".listaPrueba");
						for(var i = 0 ; i < data.length ; i++){
							var opt = "<option class='listaPrueba' value='"+data[i].id + "'>"+data[i].nombrecompleto+"</option>";
							$('#alumnos').append(opt);
						}	
					});
				}
			}else{
				index = 0;
				$("option").remove(".listaPrueba");
			}
			
		});*/
	});
</script>
@stop