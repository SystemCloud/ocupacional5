	<div class="row-fluid">
		<div class="span12">
			<form id="editar_examen" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" id="codigo" value="{{ $examen->id}}">
					
					<div class="control-group">
						<label for="nombreC" class="control-label">Nombre Servicio: </label>
						<div class="controls">
							<input value="{{$examen->nombre_servicio}}" type="text" class="span10 required foco" name="nombre_servicio" id="nombreC" focus>							
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
		prevenIntro("#editar_examen");
	})


</script>

