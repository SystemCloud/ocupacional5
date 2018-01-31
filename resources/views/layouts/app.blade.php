<!DOCTYPE html>
<html lang="en" class="login_page">
<head>
	@include('layouts.head')
</head>
<body>

		@if(count($errors) > 0)
		<div class="login_box" style="border: 0px;">
				<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<ul>
										@foreach($errors->all() as $error)
													<li>{!!$error!!}</li>
										@endforeach
							</ul>
					</div>
					</div>
			@endif
	
	<div class="login_box">
		<form  id="login_form" role="form" method="POST" action="{{ url('/login') }}">
			<div class="top_b">Ingresa al Software</div>
			<div class="alert alert-info alert-login">
				Por favor ingresa tu clave y contraseña.
			</div>
			<div class="cnt_b">
				<div class="formRow">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-user"></i></span><input type="text" id="email" name="email" placeholder="Email o DNI" value="{{ old('email') }}" />
					</div>
				</div>
				<div class="formRow">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-lock"></i></span><input type="password" id="password" name="password" placeholder="Password" value="password" />
					</div>
				</div>
				<div class="formRow clearfix">
					<label class="checkbox"><input type="checkbox" /> Remember me</label>
				</div>
			</div>
			<div class="btm_b clearfix">
				<button class="btn btn-inverse pull-right" type="submit">Iniciar</button>
			</div>
			{{ csrf_field() }}
		</form>
	</div>
	@include('layouts.scripts')


</body>
</html>
