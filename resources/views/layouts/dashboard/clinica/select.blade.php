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
						<a class="brand" href="dashboard.html"><i class="icon-home icon-white"></i> Sistema Ocupacional</a>
						<ul class="nav user_menu pull-right">
							<li class="divider-vertical hidden-phone hidden-tablet"></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#" onclick="cargar_layout('miPirfel')">Mi perfil</a></li>
									<li><a href="#" onclick="cargar_layout('miPirfel.changePassword')">Cambiar Contraseña</a></li>
									<li class="divider"></li>
									<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									Salir del Sistema
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</ul>
						</li>
					</ul>
					<a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
						<span class="icon-align-justify icon-white"></span>
					</a>
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
						<li>Seleccione una Empresa </li>

					</ul>
				</div>
			</nav>
			<div class="row-fluid">
				<div class="span12">

					<div class="dataTables_wrapper form-inline" rol="grid">
						<table id="tbClinicas" class="table table-bordered" id="dt_gal" aria-describedby="dt_gal_info">

							<thead>
								<tr>
									<th>ID</th>
									<th>EMPRESA</th>
								</tr>
							</thead>
							<tbody>
								@foreach($clinicas as $clinica)
								<tr>									
									<td>{{$clinica->id}}</td>
									<td>{{$clinica->razon_social}}</td>
									
								</tr>
								@endforeach
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<form method="post" action="/validar">
				<div style="margin-top: 30px; float: right; margin-right: 30px;">
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<input type="text" readonly name="codigo" id="codigo"  value="0" >
					<button  class="btn btn-gebo">Ingresar al Sistema</button>
				</div>
			</form>

		</div>
	</div>
	
	@include('layouts.scripts')
	<script>
		$(document).ready(function() {
			setTimeout('$("html").removeClass("js")',1000);
			tabla();
		});


		function tabla(){
			$('#tbClinicas').DataTable({
				paging: false,
				searching:false,
				bInfo:false,
				ordering: false
			});
			var table = $('#tbClinicas').DataTable();

			$('#tbClinicas tbody').on('click', 'tr', function () {
				fila=$("#tbClinicas tbody tr")[table.row( this ).index()].innerHTML;
				codigo=$(fila)[0].innerHTML;
				$('#codigo').val(codigo);
				if ( $(this).hasClass('selected') ) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
			
				}
			});
		}
	</script>
</div>
</body>
</html>
