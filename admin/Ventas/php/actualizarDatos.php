<?php

include "conexion.php";
$conexion=conexion();

 $datos=array(
 	
    $conexion->real_escape_string(htmlentities($_POST['idVentasu'])),
    $conexion->real_escape_string(htmlentities($_POST['fechau'])),
    $conexion->real_escape_string(htmlentities($_POST['cantidadu'])),
    $conexion->real_escape_string(htmlentities($_POST['valorapagaru']))
);

$sql="UPDATE ventas set fecha=?,cantidad=?,valorapagar=?,idVentas=?";

$query=$conexion->prepare($sql);

$query->bind_param('s,i,s,i',$datos[0],$datos[1],$datos[2],$datos[3]);
echo $query->execute();
$query->close();
?>