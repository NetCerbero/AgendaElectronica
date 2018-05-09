@section('cssPersonalizado')
<style type="text/css">
	.pack:hover, .card:focus {
    	box-shadow: 0 9px 23px rgba(0, 0, 0, 0.8), 0 5px 5px rgba(0, 0, 0, 0.12) !important;
	}
</style>
@stop
@extends('layout')

@section('Titulo')
	<h1>Agenda de Alumnos</h1>
@stop

@section('Botones')
	<div class="col-12 col-md-4 col-lg-3">
		<a class="btn btn-primary btn-lg btn-block" href="{{route('agenda.create')}}">
			</i>Registrar
		</a>
	</div>
@stop
@section('Subtitulo')
	<h5 class="card-title">Agendas enviadas por {{ auth()->user()->persona->nombre }}</h5>
@stop

@section('ContenidoCasoUso')
	<div class="row">

		@foreach ($agendas as $a)
			<div class="col-md-12 mb-5">
				<div class="pack card border-primary mb-3">
				  <div class="card-header">{{ $a->titulo }}</div>
				  <div class="card-body text-primary py-1">
				    <h6 class="card-title">{{ $a->tipoAsunto->nombre }}</h6>
				    <p class="card-text">{{ $a->mensaje }}</p>
				    <div class="card-footer bg-transparent py-1 d-flex justify-content-between">
				    	<div>{{ $a->fecha }}</div>
				    	<!--<a href="#" class="btn btn-primary d-flex align-items-end">Agregar contenido</a>-->
				    </div>
				  </div>

				</div>	
			</div>	
		@endforeach
		
	</div>
	
@stop