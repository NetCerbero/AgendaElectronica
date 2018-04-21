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
	<h5 class="card-title">Lista de Estudiantes</h5>
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
						<tr>
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
@stop