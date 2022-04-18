<?php
session_start();
include("conexion.php");
conectar_bd();
$Hoy = date('Y-m-d');
?>
 
<?php
 //$datos2 ;
if(isset($_POST["id"]))
{
	
  $id = $_POST["id"];
   $id2 = $_POST["id2"];
 
    
 

               //INSERT EVOLUCION

               $sqlsigv = "DELETE FROM `tbconsultaexternaevolucionprescripcion` WHERE id = '$id'";
//$result=$conexion->query($sql);

//echo "$sqlsigv";

                if (mysqli_query($conexion, $sqlsigv)) 
                {
                   // $last_id = mysqli_insert_id($conexion);
                  
                   // echo "New record created successfully. Last inserted ID is: " . $last_id;
                } else {
                //  echo"<script type='text/javascript'>window.location.href='evolucion.php?respuesta=seleccione paciente&hc_paciente= ';</script>";

                  mysqli_error($conexion);
                }

} ?>
  