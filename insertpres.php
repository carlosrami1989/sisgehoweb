<?php
session_start();
include("conexion.php");
conectar_bd();
$Hoy = date('Y-m-d');
?>
 
<?php
$perfil=$_SESSION['usuario_a'];

if ($perfil=='')

{
    header('Location: index.php');

}  
 //$datos2 ;
if(isset($_POST["id"]))
{
	
  $id = $_POST["id"];
 
   $farmacos = $_POST["farmacos"];
   $unidades = $_POST["unidades"];
   $prescripcion = $_POST["prescripcion"];
echo "$id";

   $sql2 = "SELECT paciente FROM `tbconsultaexternadiagnosticos` WHERE id  = '".$id."'";
          $result2 = mysqli_query($conexion, $sql2);
            if (mysqli_num_rows($result2) > 0) {
               while($row2 = mysqli_fetch_assoc($result2)) 

               {
                $id_paciente = $row2["paciente"];
               }
               }
//echo "$sql2";

               //INSERT EVOLUCION

               $sqlsigv = "INSERT INTO `tbconsultaexternaevolucionprescripcion`(`id`, `consulta_externa`, `paciente`, `titular`, `codigo_far`, `descripcion_far`, `linea_far`, `observacion`, `des_campo1`, `des_campo2`, `des_campo3`, `usuario_ingreso`, `fecha_ingreso`, `usuario_modificacion`, `fecha_modificacion`, `pcname`, `status`, `numero`) 
                    VALUES ('0','$id','$id_paciente','0','0','$farmacos','0','$prescripcion','0','0','0','0','$Hoy','0','$Hoy','0','1','$unidades')";
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


  // echo "$id";
  // echo "  COD ";
  // echo "$id2";
 //CONSULTADIAGNOSTICO
  
        	$sql = "SELECT * FROM tbconsultaexternaevolucionprescripcion WHERE consulta_externa  = '".$id."'";
        	$result = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($result) > 0) 
            {
              
                ?>

                  <table width="100%" class="table table-striped table-bordered table-hover" id="tabla2">
                                         <thead>
                                    <tr>
                                       <th>seleccionar</th>
                                       <th>ID</th>
                                       <th>ID_ATENCION</th>
                                        <th>FARMACO</th>
                                        <th>UNIDAD</th>
                                        <th>PRESCRIPCION</th>
                                    </tr>
                                </thead>
                                <tbody>


                <?php
                
                          
                   
            

        			 while($validacion = mysqli_fetch_assoc($result)) 

        			 {
                echo'<tr>';
                                       echo "<td>
                                                        <a href='#' class='boton' id='modal' data-toggle='modal' data-target='#myModal' onclick='consulta_del(".$validacion['id'].");'>Eliminar</a>
                                                    </td>"; 

                                       //  echo' <td   class="boton" >seleccionar</td>';
                                        echo' <td>'.$validacion["id"].'</td>';
                                        echo' <td>'.$validacion["consulta_externa"].'</td>';
                                        echo' <td>'.utf8_encode($validacion["descripcion_far"]).'</td>';
                                       echo' <td>'.utf8_encode($validacion["numero"]).'</td>';
                                        echo' <td>'.$validacion["observacion"].'</td>';
                                        echo' </tr>';

                                        }
        			 	?>
              

                                   

                                </tbody>

                            </table>

         
                    
                                                   
                                                
        			 	<?php
        			 	  }
        					 else
                  {
                     
                  }

        
}    
 

?>
