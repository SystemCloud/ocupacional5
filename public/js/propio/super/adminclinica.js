$('#btnModal').click(function() {
	if(!$("#agregar_admin_clinica").length == 0) {
		if(!validator_form('#agregar_admin_clinica')){
			crearUser();
		}
	}else if(!$("#editar_admin_clinica").length == 0){
		if(!validator_form('#editar_admin_clinica')){
			console.log("editar");
			editarUser();
		}
	} else{
		$('#modal_large').modal('hide');
	}	

});
 
function crearUser(){	
	route='adminClinicas';
	data=$('#agregar_admin_clinica').serialize();	
	var token =$('#token').val();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: data,
		success: function(msj){
			notification('Acabas de crear un nuevo usuario','success','2000');
			$('#agregar_admin_clinica')[0].reset();
			cargar_layout('adminClinicas');
			$('#modal_large').modal('hide');
		},
		error:function(msj){

		}
	});
	
}

$('input[id=inputcorreo]').blur(function(){
	correo=$('#inputcorreo').val();
	alert(correo)
	buscarCorreo(correo);
});

function buscarCorreo(este){
	correo=este.value;
	if(correo!=''){
		data='correo='+correo,
		$('.preload_layout').show();
		var route='adminClinicas/validarCorreo';
		var token =$('#token').val();
		 $.ajax({
		   url: route,
		   headers: {'X-CSRF-TOKEN': token},
		   type: 'POST',
		   dataType: 'json',
		   data: data,
		   success: function(msj){
				 $('.preload_layout').hide();
				 if(msj.mensaje=='2'){
					 notification('Este correo ya se encuentra registrado','error','2000');
					 $('#email').val('');
					 $('#email').focus();
				 }
		   },
		   error:function(msj){
				 $('.preload_layout').hide();
		   }
		 });
	}

}

function editarUser(lugar = 0){
	id = $('#codigo').val();
	route='/adminClinicas/'+id + "";
	data=$('#editar_admin_clinica').serialize();
	var token =$('#token').val();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: data,
		success: function(msj){
			notification('Acabas de atualizar un un usuario','success','2000');
			$('#editar_admin_clinica')[0].reset();
			cargar_layout('clinicas');
			$('#modal_large').modal('hide');
			
		},
		error:function(msj){

		}
	});
}

function eliminarUser(){
	//falta traer el id
	id = $('#codigo').val();
	ruta = '/eliminarAdminClinicas/' + id;
	token = $('#token').val();
	eliminar("el usuario", ruta, id, token);

}
