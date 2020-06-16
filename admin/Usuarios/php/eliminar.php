<?php
	include "conexion.php";
	$conexion=conexion();
	$idUsuarios=$conexion->real_escape_string(htmlentities($_POST['idUsuarios']));

	$sql="DELETE from usuarios where idUsuarios=?";
	$query=$conexion->prepare($sql);
	$query->bind_param("i", $idUsuarios);
	echo $query->execute();
	$query->close();

?>