<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li><a href="#" onclick="cargar_layout('home')"><i class="icon-home"></i></a> </li>
			<li><a href="#" onclick="cargar_layout('arrendamientos')" > Arrendamientos</a></li>
			<li>Datos de Arrendamientos </li>
			<li><a class="text-green" href="#" onclick="add_form('arrendamientos/create','Crear Arrendamiento')" > Agregar</a></li>
			<li><a class="text-aqua" href="#" onclick="detalles('arrendamientos', 'Detalles de Tarifa')" > Detalles</a></li>
			<li><a class="text-red" href="#" onclick="eliminarArrendamiento()" > Eliminar</a></li>
		</ul>
	</div>
</nav>
<div class="row-fluid">
	<div class="span12">		
		<div class="dataTables_wrapper form-inline" rol="grid">
			<table id="tbArrendamientos" class="table table-bordered" id="dt_gal" aria-describedby="dt_gal_info">

				<thead>
					<tr>
						<th>ID</th>
						<th>CLINICA</th>
						<th>FECHA DE CREACION</th>
						<th>FECHA DE VENCIMIENTO</th>
						<th>COSTO TOTAL</th>
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
  <script src="{{ asset('/js/propio/super/arrendamiento.js') }}" type="text/javascript"></script>
  
@show

<script type="text/javascript">
$(document).ready(function(){
	cargar_dataTable();
	$('#tbArrendamientos tbody').on('click', 'tr', function () {
			fila=$("#tbArrendamientos tbody tr")[table.row( this ).index()].innerHTML;
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
	table = $('#tbArrendamientos').DataTable({
		 "destroy": true,
		 "processing" : true,
		 "serverSide" : true,
		 "responsive": true,
		 "sScrollX": "100%",
		 "sScrollXInner": '100%',
		 "bScrollCollapse": true,
		 "columns"    : [
			 {data:'id'},
			 {data:'clinicas.razon_social'},
			 {data:'fecha_creacion'},
			 {data:'fecha_vencimiento'},
			 {data:'costo_total'},
		 ],
		 ajax: {
			 'url': 'arrendamientosPagination',
			 'type': 'POST',
			 'headers': {
					 'X-CSRF-TOKEN': '{{ csrf_token() }}'
			 }
		 },
	 });
}
</script>

