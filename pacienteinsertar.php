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
$cmbpais=$_POST["cmbpais"];
$txtprecio=$_POST["txtprecio"];
$txtmailo =$_POST["txtmail"];

if ($txtid==''){
$query="INSERT INTO `tbpaciente`(`id`, `cedula`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `genero`, `fecha_nacimiento`, `lugar_nacimiento`,
 `ocupacion`, `estado_civil`, `direccion`, `des_campo2`, `pais`, `celular`, `etnico`, `cedula_titular`, `apellido_pat_afi`, `apellido_mat_afi`, `nombre_pri_afi`, `nombre_seg_afi`, `direccion_afi`, `telefono_afi`, `usuario_ingreso`, `fecha_ingreso`, `usuario_modificacion`, `fecha_modificacion`, `pcname`, `status`, `tipo_sangre`, `nacionalidad`, `provincia`, `ciudad`, `telefono`, `otro`, `observacion`, `lugar_trabajo`, `tipo_parentesco`, `tipo_beneficiario`, `tipo_seguro`, `des_campo1`, `des_campo3`, `status_discapacidad`, `carnet_conadis`, `status_otro_seguro`, `tipo_seguro_iess`, `descripcion_otro_seguro`, `tipo_identificacion`)  
                           VALUES (0,0,'$txtprimernombre','$txtsegundonombre','$txtapellidopaterno','$txtapellidomaterno','$cmbgenero','$txtfechanacimiento',
                           '$txtlugarnacimiento','','$cmbestado','$txtdireccion','$txtmailo','$cmbpais',1,'$cmbcultura',0,'$txtapellidorepresente',0,'$txtnombrerepresentante',0,0,0,'$id_usuario','$hoy','$id_usuario','$hoy','',1,0,'$cmbpais',0,0,'$txttelefono','$txtprecio',0,0,0,0,0,0,0,0,0,0,0,0,1)";
$result=$conexion->query($query);
if($result){echo "<script language='javascript'>alert('Guardado con Exito');window.location='paciente.php';</script>";} else {echo"No se inserto";}
mysqli_close($conexion);
}
else
{
    {echo "<script language='javascript'>window.location='paciente.php';</script>";}
}
?>

