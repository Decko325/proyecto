<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<?php require_once "scripts.php"; ?>
</head>
<left><body background="img/photo2.jpg"></left>
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel panel-heading"><b>Inicio De Sesión</b></div>
				<div class="panel panel-body">
					<div style="text-align: center;">
						<img src="img/logo_size.jpg" height="250">
					</div>
					<p></p>
					<form method="POST" action="control.php">
					<label>id</label>
					<input type="text" id="id" class="form-control input-sm" name="cedula">
					<label>Password</label>
					<input type="password" id="password" class="form-control input-sm" name="contraseña">
					<p></p>
					<input type="submit" name="Iniciar_sesion" id="entrarSistema" value="Ingresar" class="btn btn-primary">
					<a href="registro.php" class="btn btn-danger">Registrar</a>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){
			if($('#id').val()==""){
				alertify.alert("Debes agregar el id");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

			cadena="id=" + $('#id').val() + 
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/login.php",
						data:cadena,
						success:function(r){
							if(r==1){
								window.location="user/index.html";
							}else{
								alertify.alert("Fallo al entrar :(");
							}
						}
					});
		});	
	});
</script>