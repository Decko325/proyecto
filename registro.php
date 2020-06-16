<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<?php require_once "scripts.php"; ?>
</head>
<body background="img/photo2.jpg">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-danger">
				<div class="panel panel-heading">Registro de id</div>
				<div class="panel panel-body">
					<form id="frmRegistro" method="POST" action="control.php">
					<label>Id</label>
					<input type="number" class="form-control input-sm" id="id" name="cedula">
					<label>Nombre</label>
					<input type="text" class="form-control input-sm" id="nombre" name="nombre">
					<label>Apellido</label>
					<input type="text" class="form-control input-sm" id="apellido" name="apellido">
					<label>Email</label>
					<input type="text" class="form-control input-sm" id="email" name="correo">
					<label>Direccion</label>
					<input type="text" class="form-control input-sm" id="direccion" name="direccion">
					<label>Barrio</label>
					<input type="text" class="form-control input-sm" id="barrio" name="barrio">
					<label>Ciudad</label>
					<input type="text" class="form-control input-sm" id="ciudad" name="ciudad">
					<label>Password</label>
					<input type="number" class="form-control input-sm" id="password" name="contraseña">
					<p></p>
					<input type="submit" name="registro" id="registrarNuevo" class="btn btn-primary" value="Registro">
					</form>
					<div style="text-align: right;">
						<a href="index.php" class="btn btn-default">Login</a>
					</div>
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
		$('#registrarNuevo').click(function(){

			if($('#nombre').val()==""){
				alertify.alert("Debes agregar el nombre");
				return false;
			}else if($('#apellido').val()==""){
				alertify.alert("Debes agregar el apellido");
				return false;
			}else if($('#id').val()==""){
				alertify.alert("Debes agregar el id");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

			cadena="nombre=" + $('#nombre').val() +
					"&apellido=" + $('#apellido').val() +
					"&id=" + $('#id').val() + 
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/registro.php",
						data:cadena,
						success:function(r){

							if(r==2){
								alertify.alert("Este id ya existe, prueba con otro :)");
							}
							else if(r==1){
								$('#frmRegistro')[0].reset();
								alertify.success("Agregado con exito");
							}else{
								alertify.error("Fallo al agregar");
							}
						}
					});
		});
	});
</script>

