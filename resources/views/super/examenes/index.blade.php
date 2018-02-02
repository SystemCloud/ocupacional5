<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li><a href="#" onclick="cargar_layout('home')"><i class="icon-home"></i></a> </li>
			<li><a href="#" onclick="cargar_layout('examenes')" > Administradores de Examenes</a></li>
			<li>Datos de Examenes </li>
			<li><a class="text-green" href="#" onclick="add_form('examenes/create','Crear Examen')" > Agregar</a></li>
			<li><a class="text-yellow" href="#" onclick="edit_form('examenes', 'Editar Examen')" > Editar</a></li>
			<li><a class="text-red" href="#" onclick="eliminarExamen()" > Eliminar</a></li>
		</ul>
	</div>
</nav>
<div class="row-fluid">
	<div class="span12">
		
		<div class="dataTables_wrapper form-inline" rol="grid">
			<table id="tbExamenes" class="table table-bordered" id="dt_gal" aria-describedby="dt_gal_info">

				<thead>
					<tr>
						<th>ID</th>
						<th>EXAMEN</th>
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
  	<script src="{{ asset('/js/propio/super/examen.js') }}" type="text/javascript"></script>
@show
<script type="text/javascript">
$(document).ready(function(){
	cargar_dataTable();
	$('#tbExamenes tbody').on('click', 'tr', function () {
			fila=$("#tbExamenes tbody tr")[table.row( this ).index()].innerHTML;
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
	table = $('#tbExamenes').DataTable({
		 "destroy": true,
		 "processing" : true,
		 "serverSide" : true,
		 "responsive": true,
		 "sScrollX": "100%",
		 "sScrollXInner": '100%',
		 "bScrollCollapse": true,
		 "columns"    : [
			 {data:'id'},
			 {data:'nombre_servicio'},
		 ],
		 ajax: {
			 'url': 'examenesPagination',
			 'type': 'POST',
			 'headers': {
					 'X-CSRF-TOKEN': '{{ csrf_token() }}'
			 }
		 },
	 });
}
</script>
