<div class="row-fluid">
	
	<div class="row-fluid">
		<div class="span12">
			<form id="editar_tarifa" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" id="id" value="{{ $tarifa->id}}">
					<div class="control-group">
						<label for="nonbreT" class="control-label">Nombre: </label>
						<div class="controls">
							<input value="{{$tarifa->nombre_tarifa}}" name="nombre_tarifa" type="text" class="span10 foco" id="nobreT">							
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label">Duración (meses): </label>
						<div class="controls">
							<input value="{{$tarifa->duracion}}" class="required" type="number" name="duracion" class="span10" id="precioT">							
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label">Precio: </label>
						<div class="controls">
							<input value="{{$tarifa->precio}}" type="text" name="precio" class="span10" id="precioT">							
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