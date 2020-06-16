<?php 
	include "conexion.php";
	$conexion=conexion();

	$sql="SELECT * from productos";
	$result=$conexion->query($sql);

	$tabla="";

	while($datos=$result->fetch_assoc()){
		$tabla=$tabla.'<tr>
							<td>'.$datos['idProductos'].'</td>
							<td>'.$datos['nombre'].'</td>
							<td>'.$datos['descripcion'].'</td>
							<td>'.$datos['valorunitario'].'</td>
							<td>'.$datos['cantidad'].'</td>
							<td>
								<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizar" onclick="agregaDatosParaEdicion('.$datos['idProductos'].')">
									<i class="fas fa-edit"></i>
								</span>
							</td>
							<td>
								<span class="btn btn-danger btn-sm" onclick="eliminarDatos('.$datos['idProductos'].')">
									<i class="fas fa-trash-alt"></i>
								</span>
							</td>
					</tr>';
	}

	$conexion->close();

	echo '<table class="table table-stripped">
				<thead>
					<th>idProductos</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Precio Unidad</th>
					<th>Cantidad</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody>'.$tabla.'
				</tbody>
				</table>';

 ?>