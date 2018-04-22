
@extends('layout')

@section('cssPersonalizado')
	<link href="{{ asset('fonts/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ asset('bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet">
	<link href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
	<link href="{{ asset('bower_components/dropzone/dist/dropzone.css')}}" rel="stylesheet">
	<link href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
	<link href="{{ asset('bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
	<link href="{{ asset('bower_components/slick-carousel/slick/slick.css')}}" rel="stylesheet">
	<link href="{{ asset('css/maince5a.css')}}" rel="stylesheet">
@stop
@section('Titulo')
	<h1>Agenda</h1>
@stop

@section('Subtitulo')
@stop

@section('ContenidoCasoUso')

<div class="content-i">
	<div class="content-box">
		<div class="full-chat-w">
			<div class="full-chat-i">
				<div class="full-chat-left">
					<div class="os-tabs-w">
						<ul class="nav nav-tabs upper centered">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab_overview">
									<i class="os-icon os-icon-mail-14"></i><span>Chats</span>
								</a>
							</li>
							<!--<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab_sales">
									<i class="os-icon os-icon-ui-93"></i><span>Contacts</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab_sales">
									<i class="os-icon os-icon-ui-02"></i><span>Favorites</span>
								</a>
							</li>-->
						</ul>
					</div>
					<!--
					<div class="chat-search">
						<div class="element-search">
							<input placeholder="Search users by name..." type="text">
						</div>
					</div>
				-->
					<div class="user-list">
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
						<div class="user-w">
							<div class="avatar with-status status-green">
								<img alt="" src="img/avatar1.jpg">
							</div>
							<div class="user-info">
								<div class="user-date">12 min</div>
								<div class="user-name">John Mayers</div>
								<div class="last-message">What is going on, are we...</div>
							</div>
						</div>
						<div class="user-w">
							<div class="avatar with-status status-green">
								<img alt="" src="img/avatar2.jpg">
							</div>
							<div class="user-info">
								<div class="user-date">2 hours</div>
								<div class="user-name">Bill Railey</div>
								<div class="last-message">Yes, I&#39;ve sent you details...</div>
							</div>
						</div>
						<div class="user-w">
							<div class="avatar with-status status-green">
								<img alt="" src="img/avatar3.jpg">
							</div>
							<div class="user-info">
							<div class="user-date">24 min</div>
							<div class="user-name">Simon Backs</div>
							<div class="last-message">What is going on, are we...</div>
						</div>
					</div>
					<div class="user-w">
						<div class="avatar with-status status-green">
							<img alt="" src="img/avatar1.jpg">
						</div>
						<div class="user-info">
							<div class="user-date">7 min</div>
							<div class="user-name">Kelley Brooks</div>
							<div class="last-message">Can you send me this...</div>
						</div>
					</div>
					<div class="user-w">
						<div class="avatar with-status status-green">
							<img alt="" src="img/avatar7.jpg">
						</div><div class="user-info">
							<div class="user-date">4 hours</div>
							<div class="user-name">Vinie Jones</div>
							<div class="last-message">What is going on, are we...</div>
						</div>
					</div>
					<div class="user-w">
						<div class="avatar with-status status-green">
							<img alt="" src="img/avatar1.jpg">
						</div><div class="user-info">
							<div class="user-date">2 days</div>
							<div class="user-name">Brad Pitt</div>
							<div class="last-message">They have submitted users...</div>
						</div>
					</div>
				</div>
			</div>
			<div class="full-chat-middle">
				<div class="chat-head">
					<div class="user-info">
						<span>To:</span>
						<a href="#">John Mayers</a>
					</div>
					<div class="user-actions">
						<a href="#">
							<i class="os-icon os-icon-mail-07"></i>
						</a>
						<a href="#">
							<i class="os-icon os-icon-phone-18"></i>
						</a>
						<a href="#">
							<i class="os-icon os-icon-phone-15"></i>
						</a>
					</div>
				</div>
				<div class="chat-content-w">
					<div class="chat-content">
						<div class="chat-message">
							<div class="chat-message-content-w">
								<div class="chat-message-content">
									Hi, my name is Mike, I will be happy to assist you
								</div>
							</div><div class="chat-message-avatar">
								<img alt="" src="img/avatar3.jpg">
							</div>
							<div class="chat-message-date">9:12am</div>
						</div>
						<div class="chat-date-separator">
							<span>Yesterday</span>
						</div>
						<div class="chat-message self">
							<div class="chat-message-content-w">
								<div class="chat-message-content">
									That walls over which the drawers. Gone studies to titles have audiences of and concepts was motivator
								</div>
							</div>
							<div class="chat-message-date">1:23pm</div>
							<div class="chat-message-avatar">
								<img alt="" src="img/avatar1.jpg">
							</div>
						</div>
						<div class="chat-message">
							<div class="chat-message-content-w">
								<div class="chat-message-content">
									Slept train nearby a its is design size agreeable. And check cons, but countries the was to such any founding company
								</div>
							</div>
							<div class="chat-message-avatar">
								<img alt="" src="img/avatar3.jpg">
							</div>
							<div class="chat-message-date">3:45am</div>
						</div>
					</div>
				</div>
				<div class="chat-controls">
					<div class="chat-input">
						<input placeholder="Type your message here..." type="text">
					</div>
					<div class="chat-input-extra">
						<div class="chat-extra-actions">
							<a href="#">
								<i class="os-icon os-icon-mail-07"></i>
							</a>
							<a href="#">
								<i class="os-icon os-icon-phone-18"></i>
							</a>
							<a href="#">
								<i class="os-icon os-icon-phone-15"></i>
							</a>
						</div>
						<div class="chat-btn">
							<a class="btn btn-primary btn-sm" href="#">Reply</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('scripts')

<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('bower_components/moment/moment.js') }}"></script>
<script src="{{ asset('bower_components/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-validator/dist/validator.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('bower_components/dropzone/dist/dropzone.js') }}"></script>
<script src="{{ asset('bower_components/editable-table/mindmup-editabletable.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<script src="{{ asset('bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/tether/dist/js/tether.min.js') }}"></script>
<script src="{{ asset('bower_components/slick-carousel/slick/slick.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/js/dist/util.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/js/dist/alert.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/js/dist/button.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/js/dist/carousel.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/js/dist/collapse.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/js/dist/dropdown.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/js/dist/modal.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/js/dist/tab.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/js/dist/tooltip.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/js/dist/popover.js') }}"></script>
<script src="{{ asset('js/demo_customizerce5a.js?version=4.4.1') }}"></script>
<script src="{{ asset('js/maince5a.js') }}"></script>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','../www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-42863888-9', 'auto');
	ga('send', 'pageview');


	$('.enviar-mensaje').click(function(){
			var d = $(this);
			var id = d.data('id');
			alert(id);
	});
</script>
@stop