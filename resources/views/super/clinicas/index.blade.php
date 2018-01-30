<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li><a href="#" onclick="cargar_layout('home')"><i class="icon-home"></i></a> </li>
			<li><a href="#" onclick="cargar_layout('clinicas')" > Clínicas</a></li>
			<li>Datos de Clinicas </li>
		</ul>
	</div>
</nav>
<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">
			Clínicas del Sistema
		</h3>
		<div class="botonera">
			<div class="span10">
				<button onclick="cargar_layout('clinicas')" class="btn btn-lg btn-gebo" type="button" name="button"><i class="ion-android-home"></i></button>
				<button onclick="cargar_layout('clinicas/create')" class="btn btn-success" type="button" name="button"><i class="ion-android-add-circle" aria-hidden="true"></i> AGREGAR</button>
				<button onclick="edit_form('clinicas')" class="btn btn-warning" type="button" name="button"><i class="ion-edit" aria-hidden="true"></i> EDITAR</button>
				<button class="btn btn-info" type="button" name="button"><i class="ion-information-circled" aria-hidden="true"></i> DETALLES</button>
				<button onclick="eliminarClinica()" class="btn btn-danger" type="button" name="button"><i class="ion-android-delete" aria-hidden="true"></i> ELIMINAR</button>
			</div>
		</div>
		<div class="dataTables_wrapper form-inline" rol="grid">
			<table id="tbClinicas" class="table table-bordered" id="dt_gal" aria-describedby="dt_gal_info">

				<thead>
					<tr>
						<th>ID</th>
						<th>RAZON SOCIAL</th>
						<th>RUC</th>
						<th>DIRECCION</th>
						<th>TELEFONO</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			
		</div>
	</div>
</div>
<input type="hidden" readonly name="codigo" id="codigo" value="">
@section('scripts')
  	<script src="{{ asset('/js/propio/super/clinica.js') }}" type="text/javascript"></script>
	
@show
<script type="text/javascript">
$(document).ready(function(){
	cargar_dataTable();
	$('#tbClinicas tbody').on('click', 'tr', function () {
			fila=$("#tbClinicas tbody tr")[table.row( this ).index()].innerHTML;
			codigo=$(fila)[0].innerHTML;
			if ( $(this).hasClass('selected') ) {
				$(this).removeClass('selected');
				$('#codigo').val('');
			}
			else {
			table.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
				$('#codigo').val(codigo);
			}
	}); 
});
function cargar_dataTable(){
	table = $('#tbClinicas').DataTable({
		 "destroy": true,
		 "processing" : true,
		 "serverSide" : true,
		 "responsive": true,
		 "sScrollX": "100%",
		 "sScrollXInner": '100%',
		 "bScrollCollapse": true,
		 "columns"    : [
			 {data:'id'},
			 {data:'razon_social'},
			 {data:'ruc'},
			 {data:'direccion'},
			 {data:'telefono'},
		 ],
		 ajax: {
			 'url': 'clinicaPagination',
			 'type': 'POST',
			 'headers': {
					 'X-CSRF-TOKEN': '{{ csrf_token() }}'
			 }
		 },
	 });
}
</script>
