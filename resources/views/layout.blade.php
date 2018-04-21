<!DOCTYPE html>
<html>
<head>
	<title>Agenda</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="{{ asset('img/favicon.png')}}">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&amp;subset=latin-ext" rel="stylesheet">

	<!-- CSS - REQUIRED - START -->
	<!-- Batch Icons -->
	<link rel="stylesheet" href="{{ asset('fonts/batch-icons/css/batch-icons.css')}}">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css')}}">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap/mdb.min.css')}}">
	<!-- Custom Scrollbar -->
	<link rel="stylesheet" href="{{ asset('plugins/custom-scrollbar/jquery.mCustomScrollbar.min.css')}}">
	<!-- Hamburger Menu -->
	<link rel="stylesheet" href="{{ asset('css/hamburgers/hamburgers.css')}}">

	<!-- CSS - REQUIRED - END -->

	<!-- CSS - OPTIONAL - START -->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css')}}">
	<!-- JVMaps -->
	<link rel="stylesheet" href="{{ asset('plugins/jvmaps/jqvmap.min.css')}}">
	<!-- CSS - OPTIONAL - END -->

	<!-- QuillPro Styles -->
	<link rel="stylesheet" href="{{ asset('css/quillpro/quillpro.css')}}">


	<!-- CSS - OPTIONAL - START -->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('plugins/datatables/css/responsive.dataTables.min.css')}}">
	<link rel="stylesheet" href="{{ asset('plugins/datatables/css/responsive.bootstrap4.min.css')}}">
	<!-- CSS - OPTIONAL - END -->

	<!-- QuillPro Styles -->
	<link rel="stylesheet" href="{{ asset('css/quillpro/quillpro.css')}}">
	<!-- Sweet Alert
	<link rel="stylesheet" href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css')}}">-->
	@yield('cssPersonalizado')
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<!--BARRA DE NAVEGACION-->
			<nav id="sidebar" class="px-0 bg-dark bg-gradient sidebar">
				<ul class="nav nav-pills flex-column">
					<li class="logo-nav-item">
						<a class="navbar-brand" href="#">
							<img src="{{ asset('img/logo-white.png')}}" width="145" height="32.3" alt="QuillPro">
						</a>
					</li>
					<li>
						<h6 class="nav-header">Administración</h6>
					</li>
					<!--<li class="nav-item">
						<a class="nav-link active" href="index.html">
							<i class="batch-icon batch-icon-browser-alt"></i>
							Dashboard <span class="sr-only">(current)</span>
						</a>
					</li>-->
					<li class="nav-item">
						<a class="nav-link nav-parent" href="#">
							<i class="batch-icon batch-icon-layout-content-left"></i>
							Usuarios
						</a>
						<ul class="nav nav-pills flex-column">
							<li class="nav-item">
								<a class="nav-link" href="{{ route('usuario.index') }}">Profesores</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('usuario.index') }}">Alumnos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('usuario.index') }}">Padres de Familia</a>
							</li>
							<!--<li class="nav-item">
								<a class="nav-link" href="layout-top-menu-normal.html">Top Menu - Normal</a>
							</li>-->
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('curso.index') }}">
							<i class="batch-icon batch-icon-star"></i>
							Cursos
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('inscripcion.index') }}">
							<i class="batch-icon batch-icon-star"></i>
							Inscripciones
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('tutor.index') }}">
							<i class="batch-icon batch-icon-star"></i>
							Tutores
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('cronograma.index') }}">
							<i class="batch-icon batch-icon-star"></i>
							Cronograma
						</a>
					</li>
				</ul>

				<ul class="nav nav-pills flex-column">
					<li>
						<h6 class="nav-header">Apps</h6>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('agenda.index') }}">
							<i class="batch-icon batch-icon-calendar"></i>
							Agenda
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('agenda.index') }}">
							<i class="batch-icon batch-icon-calendar"></i>
							Chat
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-parent" href="{{ route('notificacion.index') }}">
							<i class="batch-icon batch-icon-calendar"></i>
							Notificaciones
						</a>
						<ul class="nav nav-pills flex-column">
							<li class="nav-item">
								<a class="nav-link" href="{{ route('notificacion.index') }}">Eventos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('notificacion.index') }}">Informacion</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('notificacion.index') }}">Avisos</a>
							</li>						
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-parent" href="#">
							<i class="batch-icon batch-icon-search"></i>
							Search Results
						</a>
						<ul class="nav nav-pills flex-column">
							<li class="nav-item">
								<a class="nav-link" href="search-results-normal.html">Normal Search</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="search-results-media.html">Media Search</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
			<!--FIN DE LA BARRA DE NAVEGACION-->

			<!--NAVBAR TOP-->
			<div class="right-column">
				<!--NAVBAR TOP-->
				<nav class="navbar navbar-expand-lg navbar-light bg-white">
					<a class="navbar-brand d-block d-sm-block d-md-block d-lg-none" href="#">
						<img src="img/logo-dark.png" width="145" height="32.3" alt="QuillPro">
					</a>
					<button class="hamburger hamburger--slider" type="button" data-target=".sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle Sidebar">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
					<!-- Added Mobile-Only Menu -->
					<ul class="navbar-nav ml-auto mobile-only-control d-block d-sm-block d-md-block d-lg-none">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="navbar-notification-search-mobile" data-toggle="dropdown" data-flip="false" aria-haspopup="true" aria-expanded="false">
								<i class="batch-icon batch-icon-search"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-fullscreen" aria-labelledby="navbar-notification-search-mobile">
								<li>
									<form class="form-inline my-2 my-lg-0 no-waves-effect">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Search for..." aria-label="Search for..." aria-describedby="basic-addon2">
											<div class="input-group-append">
												<button class="btn btn-primary btn-gradient waves-effect waves-light" type="button">
													<i class="batch-icon batch-icon-search"></i>
												</button>
											</div>
										</div>
									</form>
								</li>
							</ul>
						</li>
					</ul>

					<!--  DEPRECATED CODE:
						<div class="navbar-collapse" id="navbarSupportedContent">
					-->
					<!-- USE THIS CODE Instead of the Commented Code Above -->
					<!-- .collapse added to the element -->
					<div class="collapse navbar-collapse" id="navbar-header-content">
						<ul class="navbar-nav navbar-language-translation mr-auto">
							<li class="nav-item dropdown">
							</li>
						</ul>
						<ul class="navbar-nav navbar-notifications float-right">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" id="navbar-notification-search" data-toggle="dropdown" data-flip="false" aria-haspopup="true" aria-expanded="false">
									<i class="batch-icon batch-icon-search"></i>
								</a>
								<ul class="dropdown-menu dropdown-menu-fullscreen" aria-labelledby="navbar-notification-search">
									<li>
										<form class="form-inline my-2 my-lg-0 no-waves-effect">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Search for..." aria-label="Search for..." aria-describedby="basic-addon2">
												<div class="input-group-append">
													<button class="btn btn-primary btn-gradient waves-effect waves-light" type="button">Search</button>
												</div>
											</div>
										</form>
									</li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle no-waves-effect" id="navbar-notification-calendar" data-toggle="dropdown" data-flip="false" aria-haspopup="true" aria-expanded="false">
									<i class="batch-icon batch-icon-calendar"></i>
									<span class="notification-number">6</span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right dropdown-menu-md" aria-labelledby="navbar-notification-calendar">
									<li class="media">
										<a href="task-list.html">
											<i class="batch-icon batch-icon-calendar batch-icon-xl d-flex mr-3"></i>
											<div class="media-body">
												<h6 class="mt-0 mb-1 notification-heading">Meeting with Project Manager</h6>
												<div class="notification-text">
													Cras sit amet nibh libero
												</div>
												<span class="notification-time">Right now</span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="task-list.html">
											<i class="batch-icon batch-icon-calendar batch-icon-xl d-flex mr-3"></i>
											<div class="media-body">
												<h6 class="mt-0 mb-1 notification-heading">Sales Call</h6>
												<div class="notification-text">
													Nibh amet cras sit libero
												</div>
												<span class="notification-time">One hour from now</span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="task-list.html">
											<i class="batch-icon batch-icon-calendar batch-icon-xl d-flex mr-3"></i>
											<div class="media-body">
												<h6 class="mt-0 mb-1 notification-heading">Email CEO new expansion proposal</h6>
												<div class="notification-text">
													Cras sit amet nibh libero
												</div>
												<span class="notification-time">In 3 days</span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="task-list.html">
											<i class="batch-icon batch-icon-calendar batch-icon-xl d-flex mr-3"></i>
											<div class="media-body">
												<h6 class="mt-0 mb-1 notification-heading">Team building exercise</h6>
												<div class="notification-text">
													Cras sit amet nibh libero
												</div>
												<span class="notification-time">In one week</span>
											</div>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle no-waves-effect" id="navbar-notification-misc" data-toggle="dropdown" data-flip="false" aria-haspopup="true" aria-expanded="false">
									<i class="batch-icon batch-icon-bell"></i>
									<span class="notification-number">4</span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right dropdown-menu-md" aria-labelledby="navbar-notification-misc">
									<li class="media">
										<a href="task-list.html">
											<i class="batch-icon batch-icon-bell batch-icon-xl d-flex mr-3"></i>
											<div class="media-body">
												<h6 class="mt-0 mb-1 notification-heading">General Notification</h6>
												<div class="notification-text">
													Cras sit amet nibh libero
												</div>
												<span class="notification-time">Just now</span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="task-list.html">
											<i class="batch-icon batch-icon-cloud-download batch-icon-xl d-flex mr-3"></i>
											<div class="media-body">
												<h6 class="mt-0 mb-1 notification-heading">Your Download Is Ready</h6>
												<div class="notification-text">
													Nibh amet cras sit libero
												</div>
												<span class="notification-time">5 minutes ago</span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="task-list.html">
											<i class="batch-icon batch-icon-tag-alt-2 batch-icon-xl d-flex mr-3"></i>
											<div class="media-body">
												<h6 class="mt-0 mb-1 notification-heading">New Order</h6>
												<div class="notification-text">
													Cras sit amet nibh libero
												</div>
												<span class="notification-time">Yesterday</span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="task-list.html">
											<i class="batch-icon batch-icon-pull batch-icon-xl d-flex mr-3"></i>
											<div class="media-body">
												<h6 class="mt-0 mb-1 notification-heading">Pull Request</h6>
												<div class="notification-text">
													Cras sit amet nibh libero
												</div>
												<span class="notification-time">3 day ago</span>
											</div>
										</a>
									</li>
								</ul>
							</li>
						</ul>
						<ul class="navbar-nav ml-5 navbar-profile">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" id="navbar-dropdown-navbar-profile" data-toggle="dropdown" data-flip="false" aria-haspopup="true" aria-expanded="false">
									@if(auth()->check())
										<div class="profile-name">
											{{auth()->user()->persona->nombre}}
										</div>
									@endif
									<div class="profile-picture bg-gradient bg-primary has-message float-right">
										<img src="{{asset('img/profile-pic.jpg')}}" width="44" height="44">
									</div>
								</a>
								<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-dropdown-navbar-profile">
									
									@if(auth()->guest())
										<li><a class="dropdown-item" href="profiles-member-profile.html">Profile</a></li>
										<li><a class="dropdown-item" href="profiles-member-profile.html">Settings</a></li>
									@else
										<li><a class="dropdown-item" href="/logout">Logout</a></li>
									@endif
								</ul>
							</li>
						</ul>
					</div>
				</nav>
				<!--FIN NAVBAR TOP-->

				<!--CONTENIDO PRINCIPAL-->
				<main class="main-content p-5" role="main">
					
					<div class="row">
						<div class="col-md-12">
							@yield("Titulo")
						</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header mt-12">
									<div class="row">
										@yield('Botones')
									</div>
									
								</div>
								<div class="card-body">
									@yield('Subtitulo')									
									<div class="row">
										<div class="col-lg-12">
											@yield("ContenidoCasoUso")
										</div>										
									</div>
								</div>
							</div>
						</div>
					</div>
				</main>
				<!--FIN CONTENIDO PRINCIPAL-->
		</div>
			<!--FIN NAVBAR TOP-->
	</div>
</div>

	


	<script type="text/javascript" src="{{asset('js/jquery/jquery-3.1.1.min.js')}}"></script>
	<!-- Popper.js - Bootstrap tooltips -->
	<script type="text/javascript" src="{{asset('js/bootstrap/popper.min.js')}}"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="{{asset('js/bootstrap/mdb.min.js')}}"></script>
	<!-- Velocity -->
	<script type="text/javascript" src="{{asset('plugins/velocity/velocity.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('plugins/velocity/velocity.ui.min.js')}}"></script>
	<!-- Custom Scrollbar -->
	<script type="text/javascript" src="{{asset('plugins/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<!-- jQuery Visible -->
	<script type="text/javascript" src="{{asset('plugins/jquery_visible/jquery.visible.min.js')}}"></script>
	<!-- jQuery Visible -->
	<script type="text/javascript" src="{{asset('plugins/jquery_visible/jquery.visible.min.js')}}"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script type="text/javascript" src="{{asset('js/misc/ie10-viewport-bug-workaround.js')}}"></script>

	<!-- SCRIPTS - REQUIRED END -->

	<!-- SCRIPTS - OPTIONAL START -->
	<!-- ChartJS -->
	<script type="text/javascript" src="{{asset('plugins/chartjs/chart.bundle.min.js')}}"></script>
	<!-- JVMaps -->
	<script type="text/javascript" src="{{asset('plugins/jvmaps/jquery.vmap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('plugins/jvmaps/maps/jquery.vmap.usa.js')}}"></script>
	<!-- Image Placeholder -->
	<script type="text/javascript" src="{{asset('js/misc/holder.min.js')}}"></script>
	<!-- SCRIPTS - OPTIONAL END -->

	<!-- QuillPro Scripts -->
	<script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>
	<!-- Sweet Alert
	<script src="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/pages/sweet-alert.init.js')}}"></script>-->

    @yield('scripts')
</body>
</html>