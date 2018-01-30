function cargar_layout(ruta){
	$('.preload_layout').show();
	$.get(ruta,function(data){
		$('.preload_layout').hide();
		$('#contenedor').html(data);
	})
}
function edit_form(ruta){ 
	codigo=$('#codigo').val();
	if(codigo==''){
		notification('Para editar un registro, primero debes seleccionar uno de la tabla.','warning','2000');
	}
	$.get(ruta+'/'+codigo+'/edit',function(data){ 
		$('.preload_layout').hide();
		$('#contenedor').html(data);
	})
}

function eliminar(tipo, ruta, id, token){
	if(id ==''){
		notification('Para eliminar un registro, primero debes seleccionar uno de la tabla.','warning','2000');
	}else{
		var n = new Noty({
			text: '¿Desea eliminar '+ tipo +'?',
			buttons: [
			Noty.button('SI', 'btn btn-success', function () {
				$.ajax({
					url: ruta,
					headers:{'X-CSRF-TOKEN': token},
					type: 'GET',
					dataType: 'json',
					success: function(){
						notification('Acabas de eliminar un ' + tipo,'success','2000');
						cargar_dataTable();
						n.close();
					},
					error:function(msj){
						n.close();
						//este mensaje solo es para los registros relacionados, no es un error general solo es para determinados casos
						notification('¡Este registro esta relacionado con otras tablas! ' ,'error','2000');
					}
				});
			}, {id: 'button1', 'data-status': 'ok'}),

			Noty.button('NO', 'btn btn-error', function () {

				n.close();
			})
			]
		}).show();
	}
}

function updateProfile(){
	$('.preload_layout').show();
	form=$('#myProfile').serialize();
	token=$('#token').val();
	route='perfil.update'
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: form,
		success: function(msj){
			if(msj.mensaje==1){
				$('.preload_layout').hide();
				notification('Acabas de actualizar los datos del perfil','success','2000');
			}else{

			}
		},
		error:function(msj){
			$('.preload_layout').hide();
		}
	});
}
function notification(texto,tipo,time){
	new Noty({
		text: texto,
		type: tipo,
		theme: 'metroui',
		timeout: time,
		animation: {
			open: function (promise) {
				var n = this;
				var Timeline = new mojs.Timeline();
				var body = new mojs.Html({
					el        : n.barDom,
					x         : {500: 0, delay: 0, duration: 500, easing: 'elastic.out'},
					isForce3d : true,
					onComplete: function () {
						promise(function(resolve) {
							resolve();
						})
					}
				});

				var parent = new mojs.Shape({
					parent: n.barDom,
					width      : 200,
					height     : n.barDom.getBoundingClientRect().height,
					radius     : 0,
					x          : {[150]: -150},
					duration   : 1.2 * 500,
					isShowStart: true
				});

				n.barDom.style['overflow'] = 'visible';
				parent.el.style['overflow'] = 'hidden';

				var burst = new mojs.Burst({
					parent  : parent.el,
					count   : 10,
					top     : n.barDom.getBoundingClientRect().height + 75,
					degree  : 90,
					radius  : 75,
					angle   : {[-90]: 40},
					children: {
						fill     : '#EBD761',
						delay    : 'stagger(500, -50)',
						radius   : 'rand(8, 25)',
						direction: -1,
						isSwirl  : true
					}
				});

				var fadeBurst = new mojs.Burst({
					parent  : parent.el,
					count   : 2,
					degree  : 0,
					angle   : 75,
					radius  : {0: 100},
					top     : '90%',
					children: {
						fill     : '#EBD761',
						pathScale: [.65, 1],
						radius   : 'rand(12, 15)',
						direction: [-1, 1],
						delay    : .8 * 500,
						isSwirl  : true
					}
				});

				Timeline.add(body, burst, fadeBurst, parent);
				Timeline.play();
			},
			close: function (promise) {
				var n = this;
				new mojs.Html({
					el        : n.barDom,
					x         : {0: 500, delay: 10, duration: 500, easing: 'cubic.out'},
					skewY     : {0: 10, delay: 10, duration: 500, easing: 'cubic.out'},
					isForce3d : true,
					onComplete: function () {
						promise(function(resolve) {
							resolve();
						})
					}
				}).play();
			}
		}
	}).show();

}
function llamar_chosen(selector){
	$(selector).chosen({
		allow_single_deselect: true
	});
}