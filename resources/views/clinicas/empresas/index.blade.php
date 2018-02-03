<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li><a href="#" onclick="cargar_layout('home')"><i class="icon-home"></i></a> </li>
			<li><a href="#" onclick="cargar_layout('empresas')" > Empresas</a></li>
			<li>Datos de Empresas </li>
			<li><a class="text-green" href="#" onclick="add_form('empresas/create','Crear Empresa')" > Agregar</a></li>
			<li><a class="text-yellow" href="#" onclick="edit_form('empresas', 'Editar Empresa')" > Editar</a></li>
			<li><a class="text-aqua" href="#" onclick="detalles('empresas', 'Detalles de Empresa')" > Detalles</a></li>
			<li><a class="text-red" href="#" onclick="eliminarUser()" > Eliminar</a></li>
		</ul>
	</div>
</nav>
<div class="row-fluid">
	<div class="span12">
		
		<div class="dataTables_wrapper form-inline" rol="grid">
			<table id="tbEmpresas" class="table table-bordered" id="dt_gal" aria-describedby="dt_gal_info">

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
  	<script src="{{ asset('/js/propio/clinicas/empresas.js') }}" type="text/javascript"></script>
@show
<script type="text/javascript">
$(document).ready(function(){
	cargar_dataTable();
	$('#tbEmpresas tbody').on('click', 'tr', function () {
			fila=$("#tbEmpresas tbody tr")[table.row( this ).index()].innerHTML;
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
	table = $('#tbEmpresas').DataTable({
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
			 'url': 'empresasPagination',
			 'type': 'POST',
			 'headers': {
					 'X-CSRF-TOKEN': '{{ csrf_token() }}'
			 }
		 },
	 });
}
</script>
