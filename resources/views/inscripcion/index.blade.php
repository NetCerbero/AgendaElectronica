@extends('layout')
@section('Titulo')
	<h1>Inscripcion</h1>
@stop

@section('Botones')
	<div class="col-12 col-md-4 col-lg-3">
		<button type="button" id="inscripcion" class="btn btn-primary btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Registrar</button>
	</div>
@stop
@section('Subtitulo')
	<h5 class="card-title">Lista de Cursos</h5>
@stop
@section('ContenidoCasoUso')
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	    	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Registrar Curso</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form method="post" action="{{ route('inscripcion.store') }}">
				  <div class="modal-body">
			        
			        {{ csrf_field() }}
			       	<div class="form-row">
			       		<div class="form-group col-md-12 col-lg-5">
			       			<label for="message-text" class="col-form-label">Alumno</label>
							<select id="listaAlumno" class="form-control" name="alumno_id" required>
						        <option selected>Elija el alumno</option>
						    </select>			       							  	  
					    </div>
					  	<div class="form-group col-md-12 col-lg-5">
			       			<label for="message-text" class="col-form-label">Curso</label>
							<select id="listaCurso" class="form-control" name="curso_id" required>
						        <option selected>Elija el curso</option>
						    </select>			       							  	  
					    </div>
					    <div class="form-group col-md-12 col-lg-2">
					        <label for="message-text" class="col-form-label">Gestion</label>
					  	    <input type="tel" class="form-control" name="gestion" id="gestion">
					    </div>		        		
			       	</div> 
			       
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			        <button type="submit" class="btn btn-primary">Registrar</button>
			      </div>
		      </form>
		    </div>
	   	</div>
	  </div>
	</div>

	<!--Tabla de contenido-->
	<div class="col-lg-12 pb-5">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Alumno</th>
						<th>Curso</th>
						<th>Gestion</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($detalles as $dt)
						<tr data-id="{{ $dt->id }}">					
							<td class="py-2">{{ $dt->id }}</td>
							<td class="py-2">{{ $dt->alumno->nombre }}</td>
							<td class="py-2">{{ $dt->curso->nombre }}</td>
							<td class="py-2">{{ $dt->gestion }}</td>
							<td class="py-2">
								<a class=""
									href="{{ route("inscripcion.edit",$dt->id) }}">
									<i class="fa fa-edit" style="font-size:2rem;"></i>
								</a>
								<a class="btn-delete" href="#!">
									<i class="fa fa-trash" style="font-size:2rem;"></i>
								</a>														
							</td>	
						</tr>
					@endforeach					
				</tbody>
			</table>
		</div>
	</div>
@stop

@section('scripts')
<script>
	var sw = true;
	$(window).on("load",function(){
		var fecha = new Date();
		$('#gestion').val(fecha.getFullYear());
	
		$('#inscripcion').click(function(){

			if(sw){
				$.get("{{ route('cursolista') }}",function(data, status){
					//alert(status);
				//alert(data[0].id + data[0].nombre);
					for(var i = 0 ; i < data.length ; i++){
						var opt = "<option value='"+data[i].id + "'>"+data[i].nombre +"</option>";
						$('#listaCurso').append(opt);
					}					
				});

				$.get("{{ route('alumnolista') }}",function(data, status){
					//alert(status);
				//alert(data[0].id + data[0].nombre);
					for(var i = 0 ; i < data.length ; i++){
						var opt = "<option value='"+data[i].id + "'>"+data[i].nombre +" " + data[i].apellido +"</option>";
						$('#listaAlumno').append(opt);
					}					
				});
				sw = false; /*Estamos suponiendo que la conexion con el servidor es estable todo el tiempo*/
			}
			
		});
	});
</script>
@stop