<nav>
	 <div id="jCrumbs" class="breadCrumb module">
		  <ul>
			   <li><a href="#"><i class="icon-home"></i></a> </li>
			   <li><a href="#" onclick="cargar_layout('tarifas')" > Tarifas</a></li>
				 <li class="text-green">Editar Tarifa</li>
		  </ul>
	 </div>
</nav>
<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">
			Editar Tarifas
		</h3>
		<div class="botonera">
			<button onclick="cargar_layout('tarifas')" class="btn btn-lg btn-gebo" type="button" name="button"><i class="ion-android-home"></i></button>
			<button onclick="cargar_layout('tarifas/create')" class="btn btn-success" type="button" name="button"><i class="ion-android-add-circle" aria-hidden="true"></i> AGREGAR</button>
			<button class="btn btn-info" type="button" name="button"><i class="ion-information-circled" aria-hidden="true"></i> DETALLES</button>
			<button class="btn btn-danger" type="button" name="button"><i class="ion-android-delete" aria-hidden="true"></i> ELIMINAR</button>
		</div>

	</div>
	<div class="row-fluid">
		<div class="span6">
			<form id="editar_tarifa" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" id="id" value="{{ $tarifa->id}}">
					<div class="control-group">
						<label for="nonbreT" class="control-label">Nombre: </label>
						<div class="controls">
							<input value="{{$tarifa->nombre_tarifa}}" name="nombre_tarifa" type="text" class="span10" id="nobreT">							
						</div>
					</div>
					<div class="control-group">
						<label for="tipoT" class="control-label">Tipo: </label>
						<div class="controls">
							<input value="{{$tarifa->tipo_tarifa}}" name="tipo_tarifa" type="text" class="span10" id="tipoT">							
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label">Precio: </label>
						<div class="controls">
							<input value="{{$tarifa->precio}}" type="text" name="precio" class="span10" id="precioT">							
						</div>
					</div>
					
					<div class="control-group">
						<div class="controls">
							<button onclick="editarTarifa()" class="btn btn-gebo" type="button">Editar Tarifa</button>
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
