<div class="row-fluid">	
	<div class="row-fluid">
		<div class="span12">
			<form id="agregar_empresa" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<div class="control-group">
						<label for="nonbreT" class="control-label">Razon Social: </label>
						<div class="controls">
							<input type="text" class="span10 required foco" name="razon_social" id="nobreT">							
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

				</fieldset>
			</form>
		</div>
	</div>
</div>
@section('scripts')
<script type="text/javascript">

	$(document).ready(function() {
		cargar_multiselect('#multiselec');

	});


</script>
@show


