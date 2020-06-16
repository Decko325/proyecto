<?php 

if (isset($_REQUEST['Iniciar_sesion'])) {
	session_start();

	$cedula = $_POST['cedula'];

	$contraseña = $_POST['contraseña'];

	include("conexion.php");

	$sql = "SELECT * FROM usuarios WHERE us_ID ='$cedula' AND contraseña='$contraseña'";

$resultado = mysqli_query($conexion, $sql);


while($fila = mysqli_fetch_assoc($resultado)){

    //echo $fila['cedula']." ".$fila['nom']." ".$fila['correo']." ".$fila['rol']."<br><br>";
	$_SESSION["cedula"]=$fila["cedula"];

	$_SESSION["nombre"]=$fila["nombre"];

	$_SESSION["correo"]=$fila["correo"];

	$_SESSION["roles"]=$fila["roles"];

	
	header("location:user/index.php");
	exit;

}

         
header("location:registro.php");


       
         mysqli_close($conexion);
}



//-------------------------------------------------------------------registro de usuario---------------------------------------------------


if (isset($_REQUEST['registro'])) {
	

	include("conexion.php");


	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$contraseña=$_POST['contraseña'];
	$cedula=$_POST['cedula'];
	$correo=$_POST['correo'];
	$barrio=$_POST['barrio'];
	$direccion=$_POST['direccion'];
	$ciudad=$_POST['ciudad'];


	$roles=101;
	$estado="activo";



	$sql = "INSERT INTO `usuarios`(`us_ID`, `contraseña`, `us_nombres`, `us_apellidos`, `us_email`, `us_estado`, `us_direccion`, `us_barrio`, `us_ciudad`, `ro_codigo`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])";
    
    $resultado= mysqli_query($conexion,$sql);

    if ($resultado) {
    
    header("location:ingresar.php");

    }else {

      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);


      echo "no pudo";
}

}



 ?>