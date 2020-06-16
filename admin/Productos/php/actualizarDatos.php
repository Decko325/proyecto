<?php

include "conexion.php";
$conexion=conexion();

 $datos=array(
 	
    $conexion->real_escape_string(htmlentities($_POST['nombreu'])),
    $conexion->real_escape_string(htmlentities($_POST['descripcionu'])),
    $conexion->real_escape_string(htmlentities($_POST['valorunitariou'])),
    $conexion->real_escape_string(htmlentities($_POST['cantidadu']))
);

$sql="UPDATE productos set nombre=?,descripcion=?,valorunitario=?,cantidad=?";

$query=$conexion->prepare($sql);

$query->bind_param('ssiis',$datos[0],$datos[1],$datos[2],$datos[3],$datos[4]);
echo $query->execute();
$query->close();
?>