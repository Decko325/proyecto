		<div class="row">
			<div class="col-sm-12">
				<div class="jumbotron">
				<a href="../inicio.php" class="btn btn-danger">* . *ATRAS * . *</a>
				</div>
			</div>
		</div>
<!DOCTYPE html>
<html>
<head>
	<title>Crud PHP Diego Orozco</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script
	src="http://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="js/funciones.js"></script>
	
	<style type="text/css">
		.container{
			margin-top: 6em;
	</style>
</head>
<body style="background-color:#017EA1">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<div class="card bg-light mb-3">
					<div class="card-header">
						<li class="fas fa-lock"></li> <strong>Base De Datos Productos</strong>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<section class="text-right">
									<span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalInsertar">
										<i class="fas fa-plus-circle"></i> agregar nuevo
									</span>
								</section>
								<div id="tablaDatos"></div>
							</div>
						</div>
					</div>
					<div class="card-footer text-muted text-right">
						CRUD Diego Orozco PHP
					</div>
				</div>

			</div>
		</div>
	</div>

	<!--Inicio de modal de insercion-->
	<!-- Modal -->
	<div class="modal fade" id="modalInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Insertar datos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmAgregarDatos">
						<label>IdProducto</label>
						<input type="text" id="idProductos" name="idProductos" class="form-control form-control-sm">
						<label>Nombre</label>
						<input type="text" id="nombre" name="nombre" class="form-control form-control-sm">
						<label>Descripcion</label>
						<input type="text" id="descripcion" name="descripcion" class="form-control form-control-sm">
						<label>Precio Unidad</label>
						<input type="text" id="valorunitario" name="valorunitario" class="form-control form-control-sm">
						<label>Cantidad</label>
						<input type="text" id="cantidad" name="cantidad" class="form-control form-control-sm">
						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btnGuardarDatos" onclick="agregarDatos()">Guardar</button>
				</div>
			</div>
		</div>
	</div>
	<!--Termina modal de insercion-->

	<!--Inicio modal actualizacion-->
	<!-- Button trigger modal -->


	<!-- Modal -->
	<div class="modal fade" id="modalActualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmAgregarDatosu">
						
						<input type="text" id="idProductosu" name="idProductosu" hidden="">
						<label>Nombre</label>
						<input type="text" id="nombreu" name="nombreu" class="form-control form-control-sm">
						<label>Descripcion</label>
						<input type="text" id="descripcionu" name="descripcionu" class="form-control form-control-sm">
						<label>Precio Unidad</label>
						<input type="text" id="valorunitariou" name="valorunitariou" class="form-control form-control-sm">
						<label>Cantidad</label>
						<input type="text" id="cantidadu" name="cantidadu" class="form-control form-control-sm">
						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal" onclick="actualizarDatos()">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
	<!--Termina modal de actualizacion-->
	<script type="text/javascript">
		$(document).ready(function(){
			mostrarDatos();
		});
	</script>
</body>
</html>