<?php
	include "conexion.php";
	$conexion=conexion();
	$idVentas=$conexion->real_escape_string(htmlentities($_POST['idVentas']));

	$sql="DELETE from ventas where idVentas=?";
	$query=$conexion->prepare($sql);
	$query->bind_param("i", $idVentas);
	echo $query->execute();
	$query->close();

?>