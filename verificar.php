<?php
session_start();
$_SESSION['usuario']=$_REQUEST['Usuario'];
$_SESSION['clave']=$_REQUEST['Password'];

 
$user=$_SESSION['usuario'];
$pass=$_SESSION['clave'];
include("conexion.php");
conectar_bd();
$sql = "SELECT * FROM `tbconfig` WHERE user_name='". $user ."' and Pass='". $pass ."' ";
$query = mysqli_query($conexion,$sql);
$validacion=mysqli_fetch_array($query);
$val_user=$validacion["user_name"];
$val_pass=$validacion["Pass"];

//echo "$val_user";


 
	if(!($user==$val_user) && !($pass==$val_pass))
		{
			echo "<script language='javascript'>alert('Error en Usario o Password. Verifique sus datos'); window.location='index.php';</script>";
		}
	else
	{
		
				$_SESSION['aplicacion']=$validacion["aplicacion"];
				$_SESSION['usuario_a']=$validacion["usuario"];
				$_SESSION['razon_Social']=$validacion["razon_Social"];
				$_SESSION['id']=$validacion["id"];
				//$_SESSION['user']=$r["user"];
			
    				echo "<script type='text/javascript'>window.location.href='menu_principal.php';</script>";
	}
				
 
mysqli_close($conexion);
?>

 