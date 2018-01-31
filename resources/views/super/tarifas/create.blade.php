
<div class="row-fluid">
	
	<div class="row-fluid">
		<div class="span12">
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
						<label for="precioT" class="control-label">Precio: </label>
						<div class="controls">
							<input class="required" type="number" name="precio" class="span10" id="precioT">							
						</div>
					</div>
					<!--<div class="control-group">
						<label for="tipoT" class="control-label">Tipo: </label>
						<div class="controls">
							<input class="required" type="number" name="tipo_tarifa" class="span10" id="tipoT">							
						</div>
					</div>-->
					<div class="control-group">
						<label for="tipoT" class="control-label">Tipo: </label>
						<div class="controls">
							<select name="tipo_tarifa" id="chosen_a" data-placeholder="Seleccinoe un tipo de tarifa" class="uni_style required ">
								<option value="1">Mensual</option>
								<option value="2">Trimestral</option>
								<option value="3">Semestral</option>
								<option value="4">Anual</option>
							</select>
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
		$(".uni_style").uniform();
	});
</script>
@show