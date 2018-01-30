function crearTarifas(){
	conteo=$('#agregar_tarifa .required').length;
	variable=0;
	for(i=0;i<conteo;i++){
		if($('#agregar_tarifa .required:eq('+i+')').val()==''){
			$('#agregar_tarifa .requerido').fadeIn();
			$('#agregar_tarifa .required:eq('+i+')').css({'border-color' : 'red'})
			variable=variable+1;
		}else{
			$('#agregar_tarifa .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
		}
	}
	if(variable>0){
		notification('¡Los campos marcados en rojo son obligatorios!','error','2000');
		return false;
	}
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
		},
		error:function(msj){

		}
	});
	
}

function editarTarifa(){
	id = $('#id').val();
	route='/tarifas/'+id + "";
	data=$('#editar_tarifa').serialize();
	alert(data);
	var token =$('#token').val();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: data,
		success: function(msj){
			notification('Acabas de atualizar un nueva tarifa','success','2000');
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
