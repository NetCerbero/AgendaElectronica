@extends('layout')
@section('Titulo')
	<h1>Usuarios</h1>
@stop

@section('Botones')
	<div class="col-12 col-md-4 col-lg-3">
		<a class="btn btn-primary btn-lg btn-block" href="{{route('usuario.create')}}">
			</i>Registrar
		</a>
	</div>
@stop
@section('Subtitulo')
	<h5 class="card-title">{{ $titulo }}</h5>
@stop
@section('ContenidoCasoUso')

	<div class="col-lg-12 pb-5">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Tipo</th>
						<th>Fecha Nacimiento</th>
						<th>Telefono</th>
						<th>ci</th>
						<th>Direccion</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($personas as $pr)	
						<tr data-id="{{ $pr->id }}">
							<td>{{$pr->id}}</td>
							<td>{{$pr->nombre}}</td>
							<td>{{$pr->apellido}}</td>
							@if($pr->tipoProfesor === 'v')
								<td>Profesor</td>
							@else
								@if($pr->tipoPadre === 'v')
									<td>Padre</td>
								@else
									@if($pr->tipoAlumno === 'v')
										<td>Alumno</td>
									@endif
								@endif
							@endif
							<td>{{$pr->fechaNacimiento}}</td>
							<td>{{$pr->telefono}}</td>
							<td>{{$pr->ci}}</td>
							<td>{{$pr->direccion}}</td>
							<td class="py-1">
								<a class=""
										href="{{ route("usuario.edit",$pr->id) }}">
									<i class="fa fa-edit" style="font-size:2rem;"></i>
								</a>

								<a class=""
									href="{{ route("usuario.destroy",$pr->id) }}">
									<i class="fa fa-trash" style="font-size:2rem;"></i>
								</a>
								@if($pr->tipoAlumno === 'v')
									<a href="{{ route('agenda.alumno', ['id'=>$pr->id,'nombre'=>$pr->nombre." ".$pr->apellido]) }}">
										<i class="fa fa-book" style="font-size:2rem;"></i>
									</a>
								@endif
								<a class="registrarCredencial-btn"
										href="{{ route("usuario.edit",$pr->id) }}"
										data-toggle="modal" data-target=".bd-example-modal-lg">
									<i class="fa fa-external-link" style="font-size:2rem;"></i>
								</a>

									<!---
									<form style="display: inline;"
										method="POST"
										action="{{ route("usuario.destroy",$pr->id) }}">
										{{ csrf_field() }}
										{{ method_field("DELETE")}}
										<button class="" type="submit">
											<i class="fa fa-trash" style="font-size:2rem;"></i>
										</button>									
									</form>	
									-->							
							</td>
						</tr>
					@endforeach									
				</tbody>
			</table>
		</div>
	</div>


	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	    	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Registrar Curso</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form method="post" id="addCredencial" action="{{ route('credencial',':USER_ID') }}">
				  <div class="modal-body">
			        {{ csrf_field() }}
			        <input type="hidden" name="id_persona" id="persona_id">
			       	<div class="form-row">
			       		<div class="form-group col-md-12 col-lg-4">
			       			<label for="Email" class="col-form-label">Email</label>
							<input class="form-control" type="email" id="email" name="email" placeholder="Email">			       							  	  
					    </div>
					  	<div class="form-group col-md-12 col-lg-4">
			       			<label for="password" class="col-form-label">Contraseña</label>
							<input class="form-control" type="text" id="password" name="password" placeholder="Contraseña">	  	  
					    </div>	        

					    <div class="form-group col-md-12 col-lg-4">		
					    	<label for="inputState" class="col-form-label">Rol</label>
						      <select id="role" class="form-control" name="rol" required>
						      	<option value="1">Administrador del Sistema</option>
						      	<option value="2" selected>Profesor</option>						        
						      	<option value="3">Alumno</option>
						      </select>
						</div>
			       	</div> 
			       
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" id="cerrarModal" data-dismiss="modal">Cerrar</button>
			        <button type="submit" class="btn btn-primary" id="registrarCredencial">Registrar</button>
			      </div>
		      </form>
		    </div>
	   	</div>
	  </div>
	</div>
@stop

@section('scripts')

<script type="text/javascript">
	var id = -1;
	$(window).on("load",function(){
		//alert("prueba ajax");
		$('.registrarCredencial-btn').click(function(e){
			e.preventDefault();
			var row = $(this).parents('tr');
			id = row.data('id');
			var inp = $('#persona_id');
			inp.val(id);
			//alert(id);
		});

		$('#registrarCredencial').click(function(e){
			e.preventDefault();
			var form = $("#addCredencial");
			var url = form.attr('action');
			var data = form.serialize();
			//alert(data);
			$.post(url,data,function(rsp_server){
				//row.fadeOut();
				if(rsp_server == "ok"){
					$('#email').val("");
					$("#password").val("");
					$('#cerrarModal').click();
				}
				//alert(rsp_server);
			}).fail(function(){/*si dio fallas en el servidor*/
				alert("error en el servidor");
			});
		});
	});
</script>
@stop