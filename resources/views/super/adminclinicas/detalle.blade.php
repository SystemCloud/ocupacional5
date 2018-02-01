<div class="row-fluid">
	
	<div class="row-fluid">
		<div class="span12">
			<form id="detalle_clinica" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" id="codigo" value="{{ $admin->id}}">
					<div class="control-group">
						<label for="nonbreT" class="control-label negrita">Nombre Completo: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$admin->name}} </p>
						</div>
					</div>
					<div class="control-group">
						<label for="tipoT" class="control-label negrita">Correo: </label>
						<div class="controls">
							<p class="pull-left centrar-vertical">{{$admin->email}} </p>
						</div>
					</div>

					<div>
						<p>
							<span class="label label-inverse">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Clinicas Relacionadas</font>
								</font>
							</span>
						</p>
					</div>
					
					<div class="row-fluid">
						<div class="span12">		
							<div class="dataTables_wrapper form-inline" rol="grid">
								<table id="tbTarifas" class="table table-bordered" id="dt_gal" aria-describedby="dt_gal_info">
									<tbody>
										@foreach($clinicas as $clinica)
											@foreach($myclinicas as $myclinica)
												<?php if($clinica->id == $myclinica){?><tr><td> {{$clinica->razon_social}}</td></tr> <?php } ?>
											@endforeach
										@endforeach
									</tbody>
								</table>

							</div>
						</div>
					</div>

				</fieldset>
			</form>
		</div>
	</div>
</div>
