<?php 
	include "conexion.php";
	$conexion=conexion();

	$sql="SELECT * from usuarios";
	$result=$conexion->query($sql);

	$tabla="";

	while($datos=$result->fetch_assoc()){
		$tabla=$tabla.'<tr>
							<td>'.$datos['idUsuarios'].'</td>
							<td>'.$datos['nombres'].'</td>
							<td>'.$datos['apellidos'].'</td>
							<td>'.$datos['correo'].'</td>
							<td>'.$datos['clave'].'</td>
							<td>'.$datos['telefono'].'</td>
							<td>'.$datos['direccion'].'</td>
							<td>'.$datos['ciudad'].'</td>
							<td>
								<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizar" onclick="agregaDatosParaEdicion('.$datos['idUsuarios'].')">
									<i class="fas fa-edit"></i>
								</span>
							</td>
							<td>
								<span class="btn btn-danger btn-sm" onclick="eliminarDatos('.$datos['idUsuarios'].')">
									<i class="fas fa-trash-alt"></i>
								</span>
							</td>
					</tr>';
	}

	$conexion->close();

	echo '<table class="table table-stripped">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Correo</th>
					<th>Clave</th>
					<th>Telefono</th>
					<th>Direccion</th>
					<th>Ciudad</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody>'.$tabla.'
				</tbody>
				</table>';

 ?>