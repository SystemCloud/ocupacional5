function fechaTermino(){
	select = $('.selector').val();
	buscarTarifa(select);
}

function buscarTarifa(id){
	var ruta='arrendamiento/' + id;
	$.get(ruta,function(data){
		$('#precioT').val(data.precio * data.duracion);
		calcularFechaFin(data.duracion);
	})
}

function calcularFechaFin(meses){
	fecha = $('#fechai').val();
	separado = fecha.split("-");
	ano = parseInt(separado[0]);
	mes = parseInt(separado[1]);
	dia = parseInt(separado[2]);
	mesd = mes + meses;
	if(mesd > 12){
		ano = ano + 1;
		mesd = mesd - 12;
	}
	if(parseInt(dia)<10){
		dia = "0" + dia.toString();
	}
	if(parseInt(mesd)<10){
		mesd = "0" + mesd.toString();
	}
	$('#fechaf').val(ano + "-" + mesd + "-" + dia);
}

$('#btnModal').click(function() {
	if(!$("#agregar_arrendamiento").length == 0) {
		if(!validator_form('#agregar_arrendamiento')){
			crearArrendamiento();
		} 
	} else{
		$('#modal_large').modal('hide');
	}	

});

function crearArrendamiento(){	
	route='arrendamientos';
	data=$('#agregar_arrendamiento').serialize();	
	var token =$('#token').val();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: data,
		success: function(msj){
			notification('Acabas de crear un nuevo arrendamiento','success','2000');
			$('#agregar_arrendamiento')[0].reset();
			cargar_layout('arrendamientos');
			$('#modal_large').modal('hide');
		},
		error:function(msj){

		}
	});
	
}


function eliminarArrendamiento(){
	//falta traer el id
	id = $('#codigo').val();
	ruta = '/eliminarArrendamiento/' + id;
	token = $('#token').val();
	eliminar("el arrendamiento", ruta, id, token);

}
