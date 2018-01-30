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
									@include('layouts.dashboard.super.menu_header')
								</div>
						  </div>
					 </div>
					 @include('layouts.modal')
				</header>
				<div id="contentwrapper">
					<div class="overlay preload_layout" style="display:none" >
						<img src="img/ajax_loader.gif" alt="" />
					 </div>
					 <div class="main_content" id="contenedor">
						 <nav>
						 	 <div id="jCrumbs" class="breadCrumb module">
						 		  <ul>
						 			   <li><a href="#"><i class="icon-home"></i></a> </li>
						 			   <li>Resumen de Procesos </li>
						 		  </ul>
						 	 </div>
						 </nav>
					 </div>
				</div>
			@include('layouts.dashboard.super.sidebar')
			@include('layouts.scripts')
			<script>
				$(document).ready(function() {
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>
		</div>
	</body>
</html>
