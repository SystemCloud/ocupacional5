
<div class="row-fluid">
	
	<div class="row-fluid">
		<div class="span12">
			<form id="agregar_arrendamiento" class="form-horizontal well">
				<fieldset>
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					
					<div class="control-group">
						<label for="precioT" class="control-label">Clinica: </label>
						<div class="controls">
							<select name="clinicas_id" id="chosen_a" data-placeholder="Seleccinoe una clinica" class="uni_style required foco">
								@foreach($clinicas as $clinica)
								<option value="{{$clinica->id}}">{{$clinica->razon_social}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label">Tarifas: </label>
						<div class="controls">
							<select onchange="fechaTermino()" name="tarifas_id" id="chosen_a" data-placeholder="Seleccinoe una tarifa" class="uni_style required selector">
								@foreach($tarifas as $tarifa)
								<option value="{{$tarifa->id}}">{{$tarifa->nombre_tarifa}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="control-group">
						<label for="fechai" class="control-label">Fecha de Inicio: </label>
						<div class="controls">
							<input type="date" class="span10 required" name="fecha_creacion" id="fechai" readonly>
						</div>
					</div>
					<div class="control-group">
						<label for="fechaf" class="control-label">Fecha de Termino: </label>
						<div class="controls">
							<input type="date" class="span10 required" name="fecha_vencimiento" id="fechaf" readonly>
						</div>
					</div>
					<div class="control-group">
						<label for="precioT" class="control-label">Precio Total: </label>
						<div class="controls">
							<input type="number" name="costo_total" class="span10 required" id="precioT" readonly>					
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

		var f = new Date();
		dia = f.getDate();
		mes = (f.getMonth() +1);
		if(dia<10){
			dia = "0" + dia.toString();
		}
		if(mes<10){
			mes = "0" + mes.toString();
		}
		$('#fechai').val(f.getFullYear() + "-" + mes + "-" + dia);

		fechaTermino();
	});

	function fecha(){
		$('#dp1').datepicker();
		$('#dp2').datepicker();

		$('#dp_start').datepicker({format: "mm/dd/yyyy"}).on('changeDate', function(ev){
			var dateText = $(this).data('date');

			var endDateTextBox = $('#dp_end input');
			if (endDateTextBox.val() != '') {
				var testStartDate = new Date(dateText);
				var testEndDate = new Date(endDateTextBox.val());
				if (testStartDate > testEndDate) {
					endDateTextBox.val(dateText);
				}
			}
			else {
				endDateTextBox.val(dateText);
			};
			$('#dp_end').datepicker('setStartDate', dateText);
			$('#dp_start').datepicker('hide');
		});
		$('#dp_end').datepicker({format: "mm/dd/yyyy"}).on('changeDate', function(ev){
			var dateText = $(this).data('date');
			var startDateTextBox = $('#dp_start input');
			if (startDateTextBox.val() != '') {
				var testStartDate = new Date(startDateTextBox.val());
				var testEndDate = new Date(dateText);
				if (testStartDate > testEndDate) {
					startDateTextBox.val(dateText);
				}
			}
			else {
				startDateTextBox.val(dateText);
			};
			$('#dp_start').datepicker('setEndDate', dateText);
			$('#dp_end').datepicker('hide');
		});
		$('#dp_modal').datepicker();
	}

</script>
@show