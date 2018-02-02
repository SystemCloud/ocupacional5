
<div class="row-fluid">
	
	<div class="row-fluid">
		<div class="span12">
			<form id="editar_clinica" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" id="codigo" value="{{ $tarifa->id}}">
					<div class="control-group">
						<label for="nonbreT" class="control-label negrita">Nombre:: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$tarifa->nombre_tarifa}} </p>
						</div>
					</div>
					<div class="control-group">
						<label for="tipoT" class="control-label negrita">Duración: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$tarifa->duracion}} </p>
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label negrita">Precio: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$tarifa->precio}} </p>
						</div>
					</div>
				</fieldset>
			</form>
	    </div>
	</div>
</div>