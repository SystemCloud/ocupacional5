<nav>
	 <div id="jCrumbs" class="breadCrumb module">
		  <ul>
			   <li><a href="#"><i class="icon-home"></i></a> </li>
			   <li><a href="#" onclick="cargar_layout('miPirfel')" > Mi Perfil</a></li>
			   <li>Cambio de Password</li>
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
				<form class="form-horizontal">
					<fieldset>
						<div class="control-group formSep">
							<label class="control-label">Nombre</label>
							<div class="controls text_line">
								<strong>{{$user->name}}</strong>
							</div>
						</div>

						<div class="control-group formSep">
							<label for="u_password" class="control-label">Password</label>
							<div class="controls">
								<div class="sepH_b">
									<input type="password" id="u_password" class="input-xlarge" value="my_password" />
									<span class="help-block">Enter your password</span>
								</div>
								<input type="password" id="s_password_re" class="input-xlarge" />
								<span class="help-block">Repeat password</span>
							</div>
						</div>


						<div class="control-group">
							<div class="controls">
								<button class="btn btn-gebo" type="submit">Save changes</button>
							<button class="btn">Cancel</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
