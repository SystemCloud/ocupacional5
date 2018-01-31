$('#btnModal').click(function() {
	if(!$("#agregar_tarifa").length == 0) {
		if(!validator_form('#agregar_tarifa')){
			crearTarifas();
		}
	}else if(!$("#editar_tarifa").length == 0){
		if(!validator_form('#editar_tarifa')){
			console.log("editar");
			editarTarifa();
		}
	} else{
		$('#modal_large').modal('hide');
	}
});

function crearTarifas(){
	route='tarifas';
	data=$('#agregar_tarifa').serialize();	
	var token =$('#token').val();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: data,
		success: function(msj){
			notification('Acabas de crear un nueva tarifa','success','2000');
			$('#agregar_tarifa')[0].reset();
			cargar_layout('tarifas');
			$('#modal_large').modal('hide');
		},
		error:function(msj){

		}
	});
	
}

function editarTarifa(){
	id = $('#id').val();
	route='/tarifas/'+id + "";
	data=$('#editar_tarifa').serialize();
	var token =$('#token').val();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: data,
		success: function(msj){
			notification('Acabas de atualizar un nueva tarifa','success','2000');
			cargar_layout('tarifas');
			$('#modal_large').modal('hide');
		},
		error:function(msj){
			
		}
	});
}

function eliminarTarifa(){
	//falta traer el id
	id = $('#codigo').val();
	ruta = '/eliminarTarifa/' + id;
	token = $('#token').val();
	eliminar("la tarifa", ruta, id, token);
}
