	<div class="row-fluid">
		<div class="span12">
			<form id="editar_admin_clinica" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" id="codigo" value="{{ $admin->id}}">
					<div class="control-group">
						<label for="nonbreT" class="control-label">Nombre Completo: </label>
						<div class="controls">
							<input value="{{$admin->name}}" type="text" class="span10 required" name="razon_social" id="nobreT">							
						</div>
					</div>
					<div class="control-group">
						<label for="tipoT" class="control-label">Correo: </label>
						<div class="controls">
							<input value="{{$admin->email}}" type="email" class="span10 required" name="ruc" id="tipoT">
						</div>
					</div>

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
									<option @foreach($myclinicas as $myclinica)<?php if($clinica->id == $myclinica){ ?> selected <?php } ?> @endforeach value="{{$clinica->id}}">{{$clinica->razon_social}}</option>			
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
		llamar_chosen('.chzn_a');
		cargar_multiselect('#multiselec');
	});

</script>
@show
