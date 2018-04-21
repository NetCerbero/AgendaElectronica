<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="img/favicon.png">

	<title>Login</title>

	<!-- Fonts -->
	

	<!-- CSS - REQUIRED - START -->
	<!-- Batch Icons -->
	<link rel="stylesheet" href="fonts/batch-icons/css/batch-icons.css">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap/mdb.min.css">
	<!-- Custom Scrollbar -->
	<link rel="stylesheet" href="plugins/custom-scrollbar/jquery.mCustomScrollbar.min.css">
	<!-- Hamburger Menu -->
	<link rel="stylesheet" href="css/hamburgers/hamburgers.css">

	<!-- CSS - REQUIRED - END -->

	<!-- CSS - OPTIONAL - START -->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">

	<!-- CSS - DEMO - START -->
	<link rel="stylesheet" href="demo/css/ui-icons-batch-icons.css">
	<!-- CSS - DEMO - END -->

	<!-- CSS - OPTIONAL - END -->

	<!-- QuillPro Styles -->
	<link rel="stylesheet" href="css/quillpro/quillpro.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="right-column sisu">
				<div class="row mx-0">
					<div class="col-md-7 order-md-2 signin-right-column px-5 bg-dark" data-qp-bg-image="bg-image-1.html">
						<a class="signin-logo d-sm-block d-md-none" href="#">
							<img src="img/logo-white.png" width="145" height="32.3" alt="QuillPro">
						</a>
						<h1 class="display-4">Agenda</h1>
						<p class="lead mb-5">
							Proyecto - Sistemas de Informacion II
						</p>
					</div>
					<div class="col-md-5 order-md-1 signin-left-column bg-white px-5">
						<a class="signin-logo d-sm-none d-md-block" href="#">
							<img src="img/logo-dark.png" width="145" height="32.3" alt="QuillPro">
						</a>
						<form method='POST' action='/login'>
							{!! csrf_field() !!}
							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
								<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
							</div>
							<div class="custom-control custom-checkbox mb-3">
								<input type="checkbox" class="custom-control-input" id="keep-signed-in">
								<label class="custom-control-label" for="keep-signed-in">Keep Me Signed In</label>
							</div>
							<button type="submit" class="btn btn-primary btn-gradient btn-block">
								<i class="batch-icon batch-icon-key"></i>
								Ingresar
							</button>
							<hr>
							<p class="text-center">
								Don't Have An Account? <a href="#">Sign Up here</a>
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- SCRIPTS - REQUIRED START -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- Bootstrap core JavaScript -->
	<!-- JQuery -->
	<script type="text/javascript" src="js/jquery/jquery-3.1.1.min.js"></script>
	<!-- Popper.js - Bootstrap tooltips -->
	<script type="text/javascript" src="js/bootstrap/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="js/bootstrap/mdb.min.js"></script>
	<!-- Velocity -->
	<script type="text/javascript" src="plugins/velocity/velocity.min.js"></script>
	<script type="text/javascript" src="plugins/velocity/velocity.ui.min.js"></script>
	<!-- Custom Scrollbar -->
	<script type="text/javascript" src="plugins/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<!-- jQuery Visible -->
	<script type="text/javascript" src="plugins/jquery_visible/jquery.visible.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script type="text/javascript" src="js/misc/ie10-viewport-bug-workaround.js"></script>

	<!-- SCRIPTS - REQUIRED END -->

	<!-- SCRIPTS - OPTIONAL START -->
	<!-- Image Placeholder -->
	<script type="text/javascript" src="js/misc/holder.min.js"></script>
	<!-- SCRIPTS - OPTIONAL END -->

	<!-- QuillPro Scripts -->
	<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>