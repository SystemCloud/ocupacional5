<nav>
	 <div id="jCrumbs" class="breadCrumb module">
		  <ul>
			   <li><a href="#"><i class="icon-home"></i></a> </li>
			   <li><a href="#" onclick="cargar_layout('miPirfel')" > Mi Perfil</a></li>
			   <li>Actualizacion de Datos </li>
		  </ul>
	 </div>
</nav>
<div class="row-fluid" >
	<div class="span12">
		<h3 class="heading">
			Perfil de
			<b class="text-blue"><?php
			$tipo=$user->tipo;
			if($tipo==1){
				echo 'SUPERUSUARIO ';
			}else if($tipo==2){
				echo ' ADMINISTRADOR DE CLINICA';
			}else if($tipo==3){
				echo ' ADMINISTRADOR DE EMPRESA';
			}
			?></b>
		</h3>
		<div class="row-fluid">
			<div class="span8">
				<form class="form-horizontal" id="myProfile">
					<input type="hidden" id="token" name="token" readonly="true" value="{{csrf_token()}}">
					<fieldset>
						<div class="control-group formSep">
							<label class="control-label">Nombre</label>
							<div class="controls text_line">
								<strong>{{$user->name}}</strong>
							</div>
						</div>
						<div class="control-group formSep">
							<label for="fileinput" class="control-label">Foto de Usuario</label>
							<div class="controls">
								<div data-fileupload="image" class="fileupload fileupload-new">
									<input type="hidden" />
									<div style="width: 80px; height: 80px;" class="fileupload-new thumbnail"><img src="http://www.placehold.it/80x80/EFEFEF/AAAAAA" alt="" /></div>
									<div style="width: 80px; height: 80px; line-height: 80px;" class="fileupload-preview fileupload-exists thumbnail"></div>
									<span class="btn btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Cambiar Imagen</span><input type="file" id="fileinput" name="fileinput" /></span>
									<a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Quitar Imagen</a>
								</div>
							</div>
						</div>
						<div class="control-group formSep">
							<label for="u_fname" class="control-label">Nombre Completo</label>
							<div class="controls">
								<input type="text" id="u_fname" name="name"class="input-xlarge" value="{{$user->name}}" />
							</div>
						</div>
						<div class="control-group formSep">
							<label for="u_email" class="control-label">Email</label>
							<div class="controls">
								<input type="text" id="u_email" name="email" class="input-xlarge"  value="{{$user->email}}" />
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button class="btn btn-gebo" type="button" onclick="updateProfile()">Guardar Cambios</button>
								<button class="btn">Cancelar</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
