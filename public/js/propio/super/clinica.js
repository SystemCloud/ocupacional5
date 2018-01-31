$('#btnModal').click(function() {
	if(!$("#agregar_clinica").length == 0) {
		if(!validator_form('#agregar_clinica')){
			crearClinicas();
		}
	}else if(!$("#editar_clinica").length == 0){
		if(!validator_form('#editar_clinica')){
			console.log("editar");
			editarClinica();
		}
	} else{
		$('#modal_large').modal('hide');
	}	

});

function crearClinicas(){	
	route='clinicas';
	data=$('#agregar_clinica').serialize();	
	var token =$('#token').val();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: data,
		success: function(msj){
			notification('Acabas de crear un nueva clinica','success','2000');
			$('#agregar_clinica')[0].reset();
			cargar_layout('clinicas');
			$('#modal_large').modal('hide');
		},
		error:function(msj){

		}
	});
	
}

function editarClinica(lugar = 0){
	id = $('#codigo').val();
	route='/clinicas/'+id + "";
	data=$('#editar_clinica').serialize();
	var token =$('#token').val();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: data,
		success: function(msj){
			notification('Acabas de atualizar un nueva clinica','success','2000');
			$('#editar_clinica')[0].reset();
			cargar_layout('clinicas');
			$('#modal_large').modal('hide');
			
		},
		error:function(msj){

		}
	});
}

function eliminarClinica(){
	//falta traer el id
	id = $('#codigo').val();
	ruta = '/eliminarClinica/' + id;
	token = $('#token').val();
	eliminar("la clinica", ruta, id, token);

}
