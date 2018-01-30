function crearClinicas(){
	conteo=$('#agregar_clinica .required').length;
	variable=0;
	for(i=0;i<conteo;i++){
		if($('#agregar_clinica .required:eq('+i+')').val()==''){
			$('#agregar_clinica .requerido').fadeIn();
			$('#agregar_clinica .required:eq('+i+')').css({'border-color' : 'red'})
			variable=variable+1;
		}else{
			$('#agregar_clinica .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
		}
	}
	if(variable>0){
		notification('¡Los campos marcados en rojo son obligatorios!','error','2000');
		return false;
	}
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
		},
		error:function(msj){

		}
	});

}

function editarClinica(){
	id = $('#id').val();
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
