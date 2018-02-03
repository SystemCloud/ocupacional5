<a class="brand" href="dashboard.html"><i class="icon-home icon-white"></i> Sistema Ocupacional</a>
<ul class="nav user_menu pull-right">
	<li class="hidden-phone hidden-tablet">
		<div class="nb_boxes clearfix">
			<a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" >{{$clinicas->razon_social}} </a>
			<a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a>
			<a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="New tasks">10 <i class="splashy-calendar_week"></i></a>
		</div>
	</li> 
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
<nav>
	<div class="nav-collapse">
		<ul class="nav">
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> EMPRESAS <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#" onclick="cargar_layout('empresas')">Mantenimiento Empresas</a></li>
					<li><a href="#" onclick="cargar_layout('tarifas')">Mantenimiento Pacientes</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th icon-white"></i> TARIFAS <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#" onclick="cargar_layout('tarifas')">Tarifas</a></li>
					<li><a href="#" onclick="cargar_layout('tarifas')">Cobranzas</a></li>
				</ul>
			</li>

		</ul>
	</div>
</nav>
