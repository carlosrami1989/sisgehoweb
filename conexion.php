<?php
 	
 

function conectar_bd()
{
	global $conexion;
 
	//=array();
	$server = 'Localhost';
	$user = 'drnixonrivas_admin';
	$password = 'sistemas@2018*';
	$database= 'drnixonrivas_sisgehoconsultaexterna2';
	$conexion = mysqli_connect($server,$user,$password,$database) or die("Un error occurrió durante la conexión " . mysqli_error($conexion));
}
?>
 