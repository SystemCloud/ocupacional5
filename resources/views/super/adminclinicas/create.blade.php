<div class="row-fluid">	
	<div class="row-fluid">
		<div class="span12">
			<form id="agregar_admin_clinica" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<div class="control-group">
						<label for="nombreC" class="control-label">Nombre Completo: </label>
						<div class="controls">
							<input type="text" class="span10 required" name="name" id="nombreC" focus>							
						</div>
					</div>
					<div class="control-group">
						<label for="email" class="control-label">Correo: </label>
						<div class="controls">
							<input type="email" class="span10 required" name="email" id="email" onblur="buscarCorreo(this)">
						</div>
					</div>
					<div class="control-group">
						<label for="comtrasena" class="control-label">Contraseña: </label>
						<div class="controls">
							<input type="password" class="span10 required" name="password" id="comtrasena">							
						</div>
					</div>
					<!--<div class="control-group">
						<label for="tipoT" class="control-label">Tipo de Usuario: </label>
						<div class="controls" style="margin-bottom:0px;">
							<select name="tipo_tarifa" data-placeholder="Seleccinoe un tipo de tarifa" class="uni_style required ">
								<option value="1">Super Usuario</option>
								<option value="2">Administrador Clinica</option>
								<option value="3">Administrador</option>
							</select>
						</div>
					</div>-->
					<div style="margin-left: 4em;">
						<p>
							<span class="label label-inverse">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Clinicas Relacionadas</font>
								</font>
							</span>
						</p>
					</div>
					<div class="control-group" style="margin-left: 4em;">
						<div id="multiselec" class="controls span12">
							<select name="clinicas_id[]" multiple="multiple" id="searchable-select" class="required">
								@foreach($clinicas as $clinica)
								<option value="{{$clinica->id}}">{{$clinica->razon_social}}</option>
								@endforeach
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
		cargar_multiselect('#multiselec');

	});


</script>
@show


