
<div class="row-fluid">
	
	<div class="row-fluid">
		<div class="span12">
			<form id="agregar_tarifa" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<div class="control-group">
						<label for="nombreT" class="control-label">Nombre: </label>
						<div class="controls">
							<input class="span10 required foco" type="text" name="nombre_tarifa" id="nombreT">							
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label">Precio: </label>
						<div class="controls">
							<input class="required span10" type="number" name="precio" id="precioT">							
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label">Duración (meses): </label>
						<div class="controls">
							<input class="required span10" type="number" name="duracion" id="precioT">							
						</div>
					</div>
					<!--<div class="control-group">
						<label for="tipoT" class="control-label">Tipo: </label>
						<div class="controls">
							<select name="tipo_tarifa" id="chosen_a" data-placeholder="Seleccinoe un tipo de tarifa" class="uni_style required ">
								<option value="1">Mensual</option>
								<option value="2">Trimestral</option>
								<option value="3">Semestral</option>
								<option value="4">Anual</option>
							</select>
						</div>
					</div>-->
					
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