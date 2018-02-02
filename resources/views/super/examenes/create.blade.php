<div class="row-fluid">	
	<div class="row-fluid">
		<div class="span12">
			<form id="agregar_examen" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<div class="control-group">
						<label for="nombreC" class="control-label">Nombre Servicio: </label>
						<div class="controls">
							<input type="text" class="span10 required foco" name="nombre_servicio" id="nombreC">							
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		//para prevenir el intro en los formularios
		prevenIntro("#agregar_examen");
	})


</script>