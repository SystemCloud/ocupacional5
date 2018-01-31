<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li><a href="#" onclick="cargar_layout('home')"><i class="icon-home"></i></a> </li>
			<li><a href="#" onclick="cargar_layout('clinicas')" > Clínicas</a></li>
			<li>Datos de Clinicas </li>
			<li><a class="text-green" href="#" onclick="add_form('clinicas/create','Crear Clinica')" > Agregar</a></li>
			<li><a class="text-yellow" href="#" onclick="edit_form('clinicas', 'Editar Clinica')" > Editar</a></li>
			<li><a class="text-aqua" href="#" onclick="detalles('clinicas', 'Detalles de Clinica')" > Detalles</a></li>
			<li><a class="text-red" href="#" onclick="eliminarClinica()" > Eliminar</a></li>
		</ul>
	</div>
</nav>
<div class="row-fluid">
	<div class="span12">
		
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
@include('modal.modal')
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
