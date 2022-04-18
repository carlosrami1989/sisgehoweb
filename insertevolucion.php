<?php
session_start();
include("conexion.php");
conectar_bd();
 
 $perfil=$_SESSION['usuario_a'];

if ($perfil=='')

{
    header('Location: index.php');

}  
 date_default_timezone_set("America/Guayaquil");
$id=$_REQUEST['txtidpaciente'];
$idcodigo=$_REQUEST['txtcodigodiagnostico'];
$idcodigo2=$_REQUEST['txtcodigodiagnostico2'];
$descripcion=$_REQUEST['txtevolucion'];
$temperatura=$_REQUEST['txttemperatura'];
$peso=$_REQUEST['txtpeso'];
$talla=$_REQUEST['txttalla'];
//$bi=$_REQUEST['bi'];
$alergico=$_REQUEST['txtalergico'];
$Hoy = date('Y/m/d g:i:s');
 
 //echo "$id";

 // ver que cb se encuentra lleno 
 if (isset($_POST['bi'])) {
    if($_POST['bi'] ="on")
    {
      $bi=1;
    } else {
      $bd=0;
    }

 } else {
  $bi=0;
 }
 
$sql = "INSERT INTO `tbconsultaexternadiagnosticos`(`id`, `consulta_externa`, `paciente`, `titular`, `principal`, `asociado`, `asociado2`, `principalCiap2`, `asociadoCiap`, `asociadoCiap2`, `observacion`, `des_campo1`, `des_campo2`, `des_campo3`, `usuario_ingreso`, `fecha_ingreso`, `usuario_modificacion`, `fecha_modificacion`, `pcname`, `status`) 
VALUES ('0','0','$id','0','$idcodigo','$idcodigo2','0','0','0','0','$descripcion','0','0','0','0','$Hoy','0','$Hoy','0','1')";
//$result=$conexion->query($sql);

//cho "$sql";
if (mysqli_query($conexion, $sql)) {
    $last_id = mysqli_insert_id($conexion);
    // echo "<script type='text/javascript'>window.location.href='evolucion.php?respuesta=Dato ingresado';</script>";
   // echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    mysqli_error($conexion);
    echo"<script type='text/javascript'>window.location.href='evolucion.php?respuesta=error en el sistema en evolucion';</script>";

    //mysqli_error($conexion);
}

// $temperatura=$_REQUEST['txttemperatura'];
// $peso=$_REQUEST['txtpeso'];
// $talla=$_REQUEST['txttalla'];
 
$sqlsigv = "INSERT INTO `tbconsultaexternapreparacion`(`id`, `consulta_externa`, `paciente`, `titular`, `temperatura`, `pulso`, `presion_arterial`, `respiracion`, `peso`, `estatura`, `talla`, `discapacidad`, `carnet_conais`, `des_campo1`, `des_campo2`, `des_campo3`, `usuario_ingreso`, `fecha_ingreso`, `usuario_modificacion`, `fecha_modificacion`, `pcname`, `status`)
 VALUES ('0','$last_id','$id','0','$temperatura','0','0','0','$peso','0','$talla','0','0','0','0','0','0','$Hoy','0','$Hoy','nixonrivas','1')";
//$result=$conexion->query($sql);

//echo "$sqlsigv";

if (mysqli_query($conexion, $sqlsigv)) {
   // $last_id = mysqli_insert_id($conexion);
  
   // echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
//  echo"<script type='text/javascript'>window.location.href='evolucion.php?respuesta=seleccione paciente&hc_paciente= ';</script>";

  mysqli_error($conexion);
}
 
if ($bi=1)
{


 $sqlaler = "INSERT INTO `tbconsultaexternapreparacionalergia`(`id`, `consulta_externa`, `paciente`, `titular`, `alergico`, `descripcion`, `des_campo1`, `des_campo2`, `des_campo3`, `usuario_ingreso`, `fecha_ingreso`, `usuario_modificacion`, `fecha_modificacion`, `pcname`, `status`) 
VALUES ('0','$last_id','$id','0','$bi','$alergico','0','0','0','0','$Hoy','0','$Hoy','0','1')";
//$result=$conexion->query($sql);

//echo "$sqlsigv";

if (mysqli_query($conexion, $sqlaler)) {
  //  $last_id = mysqli_insert_id($conexion);
  // echo "<script type='text/javascript'>window.location.href='evolucion.php?hc_paciente=$last_id';</script>";
   // echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  // echo"<script type='text/javascript'>window.location.href='evolucion.php?respuesta=error paciente&hc_paciente= ';</script>";

  mysqli_error($conexion);
}

}

echo "<script type='text/javascript'>window.location.href='evolucion.php?hc_paciente=$last_id';</script>";
// if($result)
// {
//  echo "<script type='text/javascript'>window.location.href='evolucion.php?respuesta=Dato ingresado';</script>";
// } 
// else 
//   {
//    echo"<script type='text/javascript'>window.location.href='evolucion.php?respuesta=error en el sistema';</script>";
//   }
 


?>
 
 




   

