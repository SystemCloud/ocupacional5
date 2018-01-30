<nav>
	 <div id="jCrumbs" class="breadCrumb module">
		  <ul>
			   <li><a href="#"><i class="icon-home"></i></a> </li>
			   <li><a href="#" onclick="cargar_layout('clinicas')" > Clinicas</a></li>
				 <li class="text-green">Crear Clinicas</li>
		  </ul>
	 </div>
</nav>
<div class="row-fluid">
	<div class="span12">
		<div class="botonera">
			<button onclick="cargar_layout('clinicas')" class="btn btn-lg btn-gebo" type="button" name="button"><i class="ion-android-home"></i></button>
			<button class="btn btn-warning" type="button" name="button"><i class="ion-edit" aria-hidden="true"></i> EDITAR</button>
			<button class="btn btn-info" type="button" name="button"><i class="ion-information-circled" aria-hidden="true"></i> DETALLES</button>
			<button class="btn btn-danger" type="button" name="button"><i class="ion-android-delete" aria-hidden="true"></i> ELIMINAR</button>
		</div>

	</div>
	<div class="row-fluid">
		<div class="span6">
			<form id="agregar_clinica" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<div class="control-group">
						<label for="nonbreT" class="control-label">Razon Social: </label>
						<div class="controls">
							<input type="text" class="span10 required" name="razon_social" id="nobreT">							
						</div>
					</div>
					<div class="control-group">
						<label for="tipoT" class="control-label">RUC: </label>
						<div class="controls">
							<input type="number" class="span10 required" name="ruc" id="tipoT">
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label">Direccion: </label>
						<div class="controls">
							<input type="text" class="span10 required" name="direccion" id="precioT">							
						</div>
					</div>
					<div class="control-group">
						<label for="nonbreT" class="control-label">Telefono: </label>
						<div class="controls">
							<input type="text" class="span10 required" name="telefono" id="nobreT">							
						</div>
					</div>
					<div class="control-group">
						<label for="tipoT" class="control-label">Celular: </label>
						<div class="controls">
							<input type="text" class="span10 required" name="celular" id="tipoT">							
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label">Correo: </label>
						<div class="controls">
							<input type="text" class="span10 required" name="correo" id="precioT">							
						</div>
					</div>
					
					<div class="control-group">
						<label for="precioT" class="control-label">Tarifas: </label>
						<div class="controls">
							<select name="tarifas_id" id="chosen_a" data-placeholder="Seleccinoe una tarifa" class="chzn_a required">
								<option value=""></option>
								@foreach($tarifas as $tarifa)
								<option value="{{$tarifa->id}}">{{$tarifa->nombre_tarifa}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="control-group">
						<div class="controls">
							<button onclick="crearClinicas()" class="btn btn-gebo" type="button">Crear Clinica</button>
						</div>
					</div>
				</fieldset>
			</form>
	    </div>
	</div>
</div>
@section('scripts')
  	<script src="{{ asset('/js/propio/super/clinica.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		llamar_chosen('.chzn_a');
	});

	</script>
@show
