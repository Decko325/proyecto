<?php

include "conexion.php";
$conexion=conexion();

 $datos=array(
 	
    $conexion->real_escape_string(htmlentities($_POST['nombresu'])),
    $conexion->real_escape_string(htmlentities($_POST['apellidosu'])),
    $conexion->real_escape_string(htmlentities($_POST['correou'])),
    $conexion->real_escape_string(htmlentities($_POST['claveu'])), 
    $conexion->real_escape_string(htmlentities($_POST['telefonou'])), 
    $conexion->real_escape_string(htmlentities($_POST['direccionu'])),
    $conexion->real_escape_string(htmlentities($_POST['ciudadu'])),
    $conexion->real_escape_string(htmlentities($_POST['idUsuariosu']))
);

$sql="UPDATE usuarios set nombres=?,apellidos=?,correo=?,clave=?,telefono=?,direccion=?,ciudad=? where idUsuarios=?";

$query=$conexion->prepare($sql);

$query->bind_param('sssssssi',$datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7]);
echo $query->execute();
$query->close();
?>