<?php
	include "conexion.php";
	$conexion=conexion();
	$idProductos=$conexion->real_escape_string(htmlentities($_POST['idProductos']));

	$sql="DELETE from productos where idProductos=?";
	$query=$conexion->prepare($sql);
	$query->bind_param("i", $idProductos);
	echo $query->execute();
	$query->close();

?>