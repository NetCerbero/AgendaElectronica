@extends('layout')

@section('cssPersonalizado')
 
@stop
@section('Titulo')
	<h1>Agenda</h1>
@stop

@section('Subtitulo')
@stop

@section('ContenidoCasoUso')

@foreach ($alumnos as $a)
	<div class="user-w enviar-mensaje" data-id="{{ $a[0] }}">
		<div class="avatar with-status status-green">
			<img alt="" src="img/avatar1.jpg">
		</div>
		<div class="user-info">
			<div class="user-date">7 min</div>
			<div class="user-name">{{ $a[1] }}</div>
			<div class="last-message">Can you send me this...</div>
		</div>
	</div>
@endforeach

@stop

@section('scripts')
<script type="text/javascript">
	$(function(){
    $(".chat-list-wrapper, .message-list-wrapper").niceScroll();
});
@stop