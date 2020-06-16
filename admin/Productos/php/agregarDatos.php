<?php

include "conexion.php";
$conexion=conexion();

 $datos=array(
 	$conexion->real_escape_string(htmlentities($_POST['idProductos'])), 
    $conexion->real_escape_string(htmlentities($_POST['nombre'])),
    $conexion->real_escape_string(htmlentities($_POST['descripcion'])),
    $conexion->real_escape_string(htmlentities($_POST['valorunitario'])),
    $conexion->real_escape_string(htmlentities($_POST['cantidad']))
);
$sql="INSERT into productos(idProductos,nombre,descripcion,valorunitario,cantidad)values (?,?,?,?,?)";

$query=$conexion->prepare($sql);

$query->bind_param('issii',$datos[0],
								$datos[1],
								$datos[2],
								$datos[3],
								$datos[4];
echo $query->execute();
$query->close();
?>