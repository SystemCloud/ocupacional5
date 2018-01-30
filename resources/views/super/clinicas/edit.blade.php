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
			<button onclick="cargar_layout('clinicas/create')" class="btn btn-success" type="button" name="button"><i class="ion-android-add-circle" aria-hidden="true"></i> AGREGAR</button>
			<button class="btn btn-info" type="button" name="button"><i class="ion-information-circled" aria-hidden="true"></i> DETALLES</button>
			<button class="btn btn-danger" type="button" name="button"><i class="ion-android-delete" aria-hidden="true"></i> ELIMINAR</button>
		</div> 

	</div>
	<div class="row-fluid">
		<div class="span6">
			<form id="editar_clinica" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" id="id" value="{{ $clinica->id}}">
					<div class="control-group">
						<label for="nonbreT" class="control-label">Razon Social: </label>
						<div class="controls">
							<input value="{{$clinica->razon_social}}" type="text" class="span10 required" name="razon_social" id="nobreT">							
						</div>
					</div>
					<div class="control-group">
						<label for="tipoT" class="control-label">RUC: </label>
						<div class="controls">
							<input value="{{$clinica->ruc}}" type="number" class="span10 required" name="ruc" id="tipoT">
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label">Direccion: </label>
						<div class="controls">
							<input value="{{$clinica->direccion}}" type="text" class="span10 required" name="direccion" id="precioT">							
						</div>
					</div>
					<div class="control-group">
						<label for="nonbreT" class="control-label">Telefono: </label>
						<div class="controls">
							<input value="{{$clinica->telefono}}" type="text" class="span10 required" name="telefono" id="nobreT">							
						</div>
					</div>
					<div class="control-group">
						<label for="tipoT" class="control-label">Celular: </label>
						<div class="controls">
							<input value="{{$clinica->celular}}" type="text" class="span10 required" name="celular" id="tipoT">							
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label">Correo: </label>
						<div class="controls">
							<input value="{{$clinica->correo}}" type="text" class="span10 required" name="correo" id="precioT">							
						</div>
					</div>
					
					<div class="control-group">
						<label for="precioT" class="control-label">Tarifas: </label>
						<div class="controls">
							<select name="tarifas_id" id="chosen_a" data-placeholder="Seleccione una opcion..." class="chzn_a required">
								<option value=""></option>
								@foreach($tarifas as $tarifa)
								<option <?php if($tarifa->id == $clinica->tarifas_id){ ?> selected <?php } ?> value="{{$tarifa->id}}">{{$tarifa->nombre_tarifa}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="control-group">
						<div class="controls">
							<button onclick="editarClinica()" class="btn btn-gebo" type="button">Editar Clinica</button>
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
