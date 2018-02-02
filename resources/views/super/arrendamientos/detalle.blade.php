
<div class="row-fluid">
	
	<div class="row-fluid">
		<div class="span12">
			<form id="editar_clinica" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<div class="control-group">
						<label for="nonbreT" class="control-label negrita">Clinica:: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$arrendamiento->clinicas->razon_social}} </p>
						</div>
					</div>
					<div class="control-group">
						<label for="tipoT" class="control-label negrita">Fecha Creacion: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$arrendamiento->fecha_creacion}} </p>
						</div>
					</div>
					<div class="control-group">
						<label for="tipoT" class="control-label negrita">Fecha Vencimiento: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$arrendamiento->fecha_vencimiento}} </p>
						</div>
					</div>
					<div class="control-group">
						<label for="tipoT" class="control-label negrita">Tarifa: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$arrendamiento->tarifas->nombre_tarifa}} </p>
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label negrita">Costo Total: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$arrendamiento->costo_total}} </p>
						</div>
					</div>
				</fieldset>
			</form>
	    </div>
	</div>
</div>