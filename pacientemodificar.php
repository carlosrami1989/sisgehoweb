<?php
include("conexion.php");
include("consultas.php");
session_start();
$aplicacion= $_SESSION['aplicacion'];
$usuario=$_SESSION['usuario_a'] ;
$razon_Social=$_SESSION['razon_Social'] ;
//$perfil=$_SESSION['user']
$hoy =  date('Y-m-d');
$hoy =  date('Y-m-d');
$id_usuario=$_SESSION['id'];
conectar_bd();
$txtid=$_POST['hc'];
$txtprimernombre=$_POST['txtprimernombre'];
$txtsegundonombre=$_POST['txtsegundonombre'];
$txtapellidopaterno=$_POST["txtapellidopaterno"];
$txtapellidomaterno=$_POST["txtapellidomaterno"];
$cmbgenero=$_POST["cmbgenero"];
$txtfechanacimiento=$_POST["txtfechanacimiento"];
$txtlugarnacimiento=$_POST["txtlugarnacimiento"];
$cmbestado=$_POST["cmbestado"];
$txtdireccion=$_POST["txtdireccion"];
$cmbpais=$_POST["cmbpais"];
$cmbcultura=$_POST["cmbcultura"];
$txtapellidorepresente=$_POST["txtapellidorepresente"];
$txtnombrerepresentante=$_POST["txtnombrerepresentante"];
$txtdireccion=$_POST["txtdireccion"];
$txttelefono=$_POST["txttelefono"];
$txtprecio=$_POST["txtprecio"];
$txtmailo =$_POST["txtmail"];
$query="UPDATE `tbpaciente` SET primer_nombre='".$txtprimernombre."',segundo_nombre='".$txtsegundonombre."',apellido_paterno='".$txtapellidopaterno."',apellido_materno='".$txtapellidomaterno."' ,genero='".$cmbgenero."',fecha_nacimiento='".$txtfechanacimiento."',telefono='".$txttelefono."', `lugar_nacimiento`='".$txtlugarnacimiento."', `direccion`='".$txtdireccion."', `pais`='".$cmbpais."', `estado_civil`='".$cmbestado."', `etnico`='".$cmbcultura."', `apellido_pat_afi`='".$txtapellidorepresente."', `nombre_pri_afi`='".$txtnombrerepresentante."', `otro`='".$txtprecio."', `des_campo2`='".$txtmailo."' where id='".$txtid."' ";
$result=$conexion->query($query);
if($result){echo "<script language='javascript'>alert('Modificado con Exito');window.location='paciente.php';</script>";} else {echo"No se inserto";}
mysqli_close($conexion);

?>
