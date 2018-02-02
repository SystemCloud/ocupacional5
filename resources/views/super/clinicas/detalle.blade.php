<div class="row-fluid">
	
	<div class="row-fluid">
		<div class="span12">
			<form id="detalle_clinica" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" id="codigo" value="{{ $clinica->id}}">
					<div class="control-group">
						<label for="nonbreT" class="control-label negrita">Razon Social: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$clinica->razon_social}} </p>
						</div>
					</div>
					<div class="control-group">
						<label for="tipoT" class="control-label negrita">RUC: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$clinica->ruc}} </p>
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label negrita">Direccion: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$clinica->direccion}} </p>
						</div>
					</div>
					<div class="control-group">
						<label for="nonbreT" class="control-label negrita">Telefono: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$clinica->telefono}} </p>
						</div>
					</div>
					<div class="control-group">
						<label for="tipoT" class="control-label negrita">Celular: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$clinica->celular}} </p>
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label negrita">Correo: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$clinica->correo}} </p>
						</div>
					</div>
					

				</fieldset>
			</form>
	    </div>
	</div>
</div>
