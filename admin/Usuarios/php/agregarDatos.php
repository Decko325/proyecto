<?php

include "conexion.php";
$conexion=conexion();

 $datos=array(
 	$conexion->real_escape_string(htmlentities($_POST['idUsuarios'])), 
    $conexion->real_escape_string(htmlentities($_POST['nombres'])),
    $conexion->real_escape_string(htmlentities($_POST['apellidos'])),
    $conexion->real_escape_string(htmlentities($_POST['correo'])),
    $conexion->real_escape_string(htmlentities($_POST['clave'])), 
    $conexion->real_escape_string(htmlentities($_POST['telefono'])), 
    $conexion->real_escape_string(htmlentities($_POST['direccion'])),
    $conexion->real_escape_string(htmlentities($_POST['ciudad']))
);

$sql="INSERT into Usuarios (idUsuarios,nombres,apellidos,correo,clave,telefono,direccion,ciudad)values (?,?,?,?,?,?,?,?)";

$query=$conexion->prepare($sql);

$query->bind_param('isssssss',$datos[0],
								$datos[1],
								$datos[2],
								$datos[3],
								$datos[4],
								$datos[5],
								$datos[6],
								$datos[7]);
echo $query->execute();
$query->close();
?>