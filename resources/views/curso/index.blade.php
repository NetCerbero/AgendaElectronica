@extends('layout')
@section('Titulo')
	<h1>Cursos</h1>
@stop

@section('Botones')
	<div class="col-12 col-md-4 col-lg-3">
		<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Registrar</button>
	</div>
@stop
@section('Subtitulo')
	<h5 class="card-title">Lista de Cursos</h5>
@stop
@section('ContenidoCasoUso')
	<div class="col-lg-12 pb-5">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Capacidad</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($cursos as $cr)
						<tr data-id="{{ $cr->id }}">					
							<td class="py-2">{{ $cr->id }}</td>
							<td class="py-2">{{ $cr->nombre }}</td>
							<td class="py-2">{{ $cr->capacidad }}</td>
							<td class="py-2">
								<a class=""
									href="{{ route("curso.edit",$cr->id) }}">
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

	<form id="curso-delete" method="post" action="{{ route('curso.destroy',':USER_ID') }}">
		{{ csrf_field() }}
		{{ method_field('DELETE') }}
	</form>
	

	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	    	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Registrar Curso</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form method="post" action="{{ route('curso.store') }}">
				  <div class="modal-body">
			        
			        	{{ csrf_field() }}
			       	<div class="form-row">
			       		<div class="form-group col-md-12 col-lg-6">
					  	    <label for="recipient-name" class="col-form-label">Nombre</label>
					  	    <input type="text" class="form-control" name="nombre" id="recipient-name">
					    </div>
					  	<div class="form-group col-md-12 col-lg-6">
					        <label for="message-text" class="col-form-label">Capacidad</label>
					  	    <input type="text" class="form-control" name="capacidad" id="recipient-name">
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


@stop
@section('scripts')
<script>
	$(window).on("load",function(){
		//alert("prueba ajax");
		$('.btn-delete').click(function(e){
			/*Evita que el navegador envia la accion del enlace <a>*/
			e.preventDefault();
			if(!confirm("¿Está seguro de eliminar?")){
				return false;
			}
			var row = $(this).parents('tr');
			var id = row.data('id');
			var form = $('#curso-delete');
			var url = form.attr('action').replace(':USER_ID',id);
			/*Sacamos los datos del formulario*/
			var data = form.serialize();
			/*Enviando la peticion POST con ajax*/
			$.post(url,data,function(rsp_server){
				row.fadeOut();
				//alert(rsp_server.Luis);
				//alert(rsp_server);
			}).fail(function(){/*si dio fallas en el servidor*/
				alert("error en el servidor");
			});
		});
	});
</script>
@stop