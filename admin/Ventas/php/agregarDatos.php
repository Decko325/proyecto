<?php

include "conexion.php";
$conexion=conexion();

 $datos=array(
 	$conexion->real_escape_string(htmlentities($_POST['idVentas'])), 
    $conexion->real_escape_string(htmlentities($_POST['fecha'])),
    $conexion->real_escape_string(htmlentities($_POST['cantidad'])),
    $conexion->real_escape_string(htmlentities($_POST['valorapagar']))
);

$sql="INSERT into ventas (idVentas,fecha,cantidad,valorapagar)values (?,?,?,?)";

$query=$conexion->prepare($sql);

$query->bind_param('isis',$datos[0],
								$datos[1],
								$datos[2],
								$datos[3]);
echo $query->execute();
$query->close();
?>