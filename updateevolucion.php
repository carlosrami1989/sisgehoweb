<?php
session_start();
include("conexion.php");
conectar_bd();
 
 $perfil=$_SESSION['usuario_a'];

if ($perfil=='')

{
    header('Location: index.php');

}  
 
$id=$_REQUEST['txtidpaciente'];
$idcodigo=$_REQUEST['txtcodigodiagnostico'];
$idcodigo2=$_REQUEST['txtcodigodiagnostico2'];
$descripcion=$_REQUEST['txtevolucion'];
$temperatura=$_REQUEST['txttemperatura'];
$peso=$_REQUEST['txtpeso'];
$talla=$_REQUEST['txttalla'];
//$bi=$_REQUEST['bi'];
$alergico=$_REQUEST['txtalergico'];
$Hoy = date('Y-m-d');
 
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
 //(`id`, `consulta_externa`, `paciente`, `titular`, 
$sql = "UPDATE  `tbconsultaexternadiagnosticos` SET `principal` = '$idcodigo',
 `asociado` = '$idcodigo2', `observacion` = '$descripcion' WHERE `id` = '$id' ";
//$result=$conexion->query($sql);

//cho "$sql";
if (mysqli_query($conexion, $sql)) {
  //  $last_id = mysqli_insert_id($conexion);
    // echo "<script type='text/javascript'>window.location.href='evolucion.php?respuesta=Dato ingresado';</script>";
   // echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo"<script type='text/javascript'>window.location.href='evolucion.php?respuesta=error en el sistema en evolucion';</script>";

    //mysqli_error($conexion);
}

// $temperatura=$_REQUEST['txttemperatura'];
// $peso=$_REQUEST['txtpeso'];
// $talla=$_REQUEST['txttalla'];
 
$sqlsigv = "UPDATE `tbconsultaexternapreparacion` SET `temperatura`='$temperatura',  `peso`='$peso',   `talla`='$talla' WHERE  `consulta_externa` = $id";
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


 $sqlaler = "UPDATE `tbconsultaexternapreparacionalergia`  SET `alergico`='$alergico', `descripcion`='$alergico' WHERE  `consulta_externa` = '$id'";
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

echo "<script type='text/javascript'>window.location.href='evolucionupdate.php';</script>";
// if($result)
// {
//  echo "<script type='text/javascript'>window.location.href='evolucion.php?respuesta=Dato ingresado';</script>";
// } 
// else 
//   {
//    echo"<script type='text/javascript'>window.location.href='evolucion.php?respuesta=error en el sistema';</script>";
//   }
 


?>
 
 




   

