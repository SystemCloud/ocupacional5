<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li><a href="#" onclick="cargar_layout('home')"><i class="icon-home"></i></a> </li>
			<li><a href="#" onclick="cargar_layout('tarifas')" > Tarifas</a></li>
			<li>Datos de Tarifas </li>
			<li><a class="text-green" href="#" onclick="add_form('tarifas/create','Crear Tarifa')" > Agregar</a></li>
			<li><a class="text-yellow" href="#" onclick="edit_form('tarifas', 'Editar Tarifa')" > Editar</a></li>
			<li><a class="text-aqua" href="#" onclick="detalles('tarifas', 'Detalles de Tarifa')" > Detalles</a></li>
			<li><a class="text-red" href="#" onclick="eliminarTarifa()" > Eliminar</a></li>
		</ul>
	</div>
</nav>
<div class="row-fluid">
	<div class="span12">		
		<div class="dataTables_wrapper form-inline" rol="grid">
			<table id="tbTarifas" class="table table-bordered" id="dt_gal" aria-describedby="dt_gal_info">

				<thead>
					<tr>
						<th>ID</th>
						<th>NOMBRE</th>
						<th>TIPO</th>
						<th>PRECIO</th>
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
  <script src="{{ asset('/js/propio/super/tarifas.js') }}" type="text/javascript"></script>
  
@show

<script type="text/javascript">
$(document).ready(function(){
	cargar_dataTable();
	$('#tbTarifas tbody').on('click', 'tr', function () {
			fila=$("#tbTarifas tbody tr")[table.row( this ).index()].innerHTML;
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
	table = $('#tbTarifas').DataTable({
		 "destroy": true,
		 "processing" : true,
		 "serverSide" : true,
		 "responsive": true,
		 "sScrollX": "100%",
		 "sScrollXInner": '100%',
		 "bScrollCollapse": true,
		 "columns"    : [
			 {data:'id'},
			 {data:'nombre_tarifa'},
			 {data:'tipo_tarifa',render:function(data){
			 	if(data=='1'){
			 		return 'Mensual'
			 	}else if(data=='2'){
			 		return 'Trimestral'
			 	}else if(data=='3'){
			 		return 'Semestral'
			 	}else if(data=='4'){
			 		return 'Anual'
			 	}
			 }},
			 {data:'precio'},
		 ],
		 ajax: {
			 'url': 'tarifaPagination',
			 'type': 'POST',
			 'headers': {
					 'X-CSRF-TOKEN': '{{ csrf_token() }}'
			 }
		 },
	 });
}
</script>

