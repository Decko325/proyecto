<?php

include "conexion.php";
$conexion=conexion();

$idUsuarios=$conexion->real_escape_string(htmlentities($_POST['idUsuarios']));

$sql="SELECT idUsuarios,nombres,apellidos,correo,clave,telefono,direccion,ciudad
	FROM usuarios where idUsuarios=?";
$query=$conexion->prepare($sql);
$query->bind_param('i',$idUsuarios);
$query->execute();
$datos=$query->get_result()->fetch_assoc();

echo json_encode($datos);
?>

