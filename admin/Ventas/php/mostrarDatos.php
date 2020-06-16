<?php 
	include "conexion.php";
	$conexion=conexion();

	$sql="SELECT * from ventas";
	$result=$conexion->query($sql);

	$tabla="";

	while($datos=$result->fetch_assoc()){
		$tabla=$tabla.'<tr>
							<td>'.$datos['idVentas'].'</td>
							<td>'.$datos['Usuarios_idUsuarios'].'</td>
							<td>'.$datos['Productos_idProductos'].'</td>
							<td>'.$datos['fecha'].'</td>
							<td>'.$datos['cantidad'].'</td>
							<td>'.$datos['valorapagar'].'</td>
							<td>
								<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizar" onclick="agregaDatosParaEdicion('.$datos['idVentas'].')">
									<i class="fas fa-edit"></i>
								</span>
							</td>
							<td>
								<span class="btn btn-danger btn-sm" onclick="eliminarDatos('.$datos['idVentas'].')">
									<i class="fas fa-trash-alt"></i>
								</span>
							</td>
					</tr>';
	}

	$conexion->close();

	echo '<table class="table table-stripped">
				<thead>
					<th>IdVentas</th>
					<th>Usuarios_idUsuarios</th>
					<th>Productos_idProductos</th>
					<th>Fecha</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody>'.$tabla.'
				</tbody>
				</table>';

 ?>