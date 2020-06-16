<?php

include "conexion.php";
$conexion=conexion();

$idProductos=$conexion->real_escape_string(htmlentities($_POST['idProductos']));

$sql="SELECT idProductos,nombre,descripcion,valorunitario,cantidad
	FROM productos where idProductos=?";
$query=$conexion->prepare($sql);
$query->bind_param('i',$idProductos);
$query->execute();
$datos=$query->get_result()->fetch_assoc();

echo json_encode($datos);
?>

