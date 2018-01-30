<!DOCTYPE html>
<html lang="es">
	<head>
		@include('layouts.head')
		<script>
			document.documentElement.className += 'js';
		</script>
	</head>
	<body>
		<div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>
		<div id="maincontainer" class="clearfix">
				<header>
					 <div class="navbar navbar-fixed-top">
						  <div class="navbar-inner">
								<div class="container-fluid">
									@include('layouts.dashboard.clinica.menu_header')
								</div>
						  </div>
					 </div>
					 @include('layouts.modal')
				</header>
				<div id="contentwrapper">
					 <div class="main_content">
						  <nav>
								<div id="jCrumbs" class="breadCrumb module">
									 <ul>
										  <li><a href="#"><i class="icon-home"></i></a> </li>
										  <li><a href="#">Menu1</a></li>
										  <li><a href="#">Submenu1</a></li>
										  <li><a href="#">Tremenu1</a></li>
										  <li><a href="#">Ultima</a> </li>
										  <li>Telescope 3735SX </li>
									 </ul>
								</div>
						  </nav>
						  <div class="row-fluid">
							  <!--  aqui va el contenido-->
						  </div>
					 </div>
				</div>
			@include('layouts.dashboard.clinica.sidebar')
			@include('layouts.scripts')
			<script>
				$(document).ready(function() {
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>
		</div>
	</body>
</html>
