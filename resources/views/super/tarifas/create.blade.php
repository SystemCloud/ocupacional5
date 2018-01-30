<nav>
	 <div id="jCrumbs" class="breadCrumb module">
		  <ul>
			   <li><a href="#"><i class="icon-home"></i></a> </li>
			   <li><a href="#" onclick="cargar_layout('tarifas')" > Tarifas</a></li>
				 <li class="text-green">Crear Tarifas</li>
		  </ul>
	 </div>
</nav>
<div class="row-fluid">
	<div class="span12">
		<div class="botonera">
			<button onclick="cargar_layout('tarifas')" class="btn btn-lg btn-gebo" type="button" name="button"><i class="ion-android-home"></i></button>
			<button class="btn btn-warning" type="button" name="button"><i class="ion-edit" aria-hidden="true"></i> EDITAR</button>
			<button class="btn btn-info" type="button" name="button"><i class="ion-information-circled" aria-hidden="true"></i> DETALLES</button>
			<button class="btn btn-danger" type="button" name="button"><i class="ion-android-delete" aria-hidden="true"></i> ELIMINAR</button>
		</div>

	</div>
	<div class="row-fluid">
		<div class="span6">
			<form id="agregar_tarifa" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<div class="control-group">
						<label for="nombreT" class="control-label">Nombre: </label>
						<div class="controls">
							<input class="required" type="text" class="span10" name="nombre_tarifa" id="nombreT">							
						</div>
					</div>
					<div class="control-group">
						<label for="tipoT" class="control-label">Tipo: </label>
						<div class="controls">
							<input class="required" type="number" name="tipo_tarifa" class="span10" id="tipoT">							
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label">Precio: </label>
						<div class="controls">
							<input class="required" type="number" name="precio" class="span10" id="precioT">							
						</div>
					</div>
					
					<div class="control-group">
						<div class="controls">
							<button onclick="crearTarifas()" class="btn btn-gebo" type="button">Crear Tarifa</button>
						</div>
					</div>
				</fieldset>
			</form>
	    </div>
	</div>
</div>
@section('scripts')
  <script src="{{ asset('/js/propio/super/tarifas.js') }}" type="text/javascript"></script>
  
@show
