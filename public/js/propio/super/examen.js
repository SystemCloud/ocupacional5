$('#btnModal').click(function() {
	if(!$("#agregar_examen").length == 0) {
		if(!validator_form('#agregar_examen')){
			crearExamen();
		}
	}else if(!$("#editar_examen").length == 0){
		if(!validator_form('#editar_examen')){
			editarExamen();
		}
	} else{
		$('#modal_large').modal('hide');
	}	

});

function crearExamen(){	
	route='examenes';
	data=$('#agregar_examen').serialize();	
	var token =$('#token').val();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: data,
		success: function(msj){
			notification('Acabas de crear un nuevo examen','success','2000');
			$('#agregar_examen')[0].reset();
			cargar_layout('examenes');
			$('#modal_large').modal('hide');
		},
		error:function(msj){

		}
	});
	
}

function editarExamen(){
	id = $('#codigo').val();
	route='/examenes/'+id + "";
	data=$('#editar_examen').serialize();
	var token =$('#token').val();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: data,
		success: function(msj){
			notification('Acabas de atualizar un examen','success','2000');
			$('#editar_examen')[0].reset();
			cargar_layout('examenes');
			$('#modal_large').modal('hide');
			
		},
		error:function(msj){

		}
	});
}

function eliminarExamen(){
	id = $('#codigo').val();
	ruta = '/eliminarExamen/' + id;
	token = $('#token').val();
	eliminar("el examen", ruta, id, token);

}
