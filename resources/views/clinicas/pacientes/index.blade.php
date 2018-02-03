<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li><a href="#" onclick="cargar_layout('home')"><i class="icon-home"></i></a> </li>
			<li><a href="#" onclick="cargar_layout('adminClinicas')" > Administradores de Clinicas</a></li>
			<li>Datos de Administradores </li>
			<li><a class="text-green" href="#" onclick="add_form('adminClinicas/create','Crear Usuario Administrador')" > Agregar</a></li>
			<li><a class="text-yellow" href="#" onclick="edit_form('adminClinicas', 'Editar Usuario Administrador')" > Editar</a></li>
			<li><a class="text-aqua" href="#" onclick="detalles('adminClinicas', 'Detalles de Usuario Administrador')" > Detalles</a></li>
			<li><a class="text-red" href="#" onclick="eliminarUser()" > Eliminar</a></li>
		</ul>
	</div>
</nav>
<div class="row-fluid">
	<div class="span12">
		
		<div class="dataTables_wrapper form-inline" rol="grid">
			<table id="tbAdminClinicas" class="table table-bordered" id="dt_gal" aria-describedby="dt_gal_info">

				<thead>
					<tr>
						<th>ID</th>
						<th>NOMBRE</th>
						<th>CORREO</th>
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
  	<script src="{{ asset('/js/propio/super/adminclinica.js') }}" type="text/javascript"></script>
@show
<script type="text/javascript">
$(document).ready(function(){
	cargar_dataTable();
	$('#tbAdminClinicas tbody').on('click', 'tr', function () {
			fila=$("#tbAdminClinicas tbody tr")[table.row( this ).index()].innerHTML;
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
	table = $('#tbAdminClinicas').DataTable({
		 "destroy": true,
		 "processing" : true,
		 "serverSide" : true,
		 "responsive": true,
		 "sScrollX": "100%",
		 "sScrollXInner": '100%',
		 "bScrollCollapse": true,
		 "columns"    : [
			 {data:'id'},
			 {data:'name'},
			 {data:'email'},
		 ],
		 ajax: {
			 'url': 'adminClinicasPagination',
			 'type': 'POST',
			 'headers': {
					 'X-CSRF-TOKEN': '{{ csrf_token() }}'
			 }
		 },
	 });
}
</script>
