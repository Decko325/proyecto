<?php

include "conexion.php";
$conexion=conexion();

$idVentas=$conexion->real_escape_string(htmlentities($_POST['idVentas']));

$sql="SELECT idVentas,fecha,cantidad,valorapagar
	FROM ventas where idVentas=?";
$query=$conexion->prepare($sql);
$query->bind_param('i',$idVentas);
$query->execute();
$datos=$query->get_result()->fetch_assoc();

echo json_encode($datos);
?>

