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

 }


 ?>

    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Detalle de Pacientes Registrado
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                             <table width="100%" class="table table-striped table-bordered table-hover"  >
                                <thead>
                                    <tr>
                                        <th>SELECCIONAR</th>
                                        <th>ID ATENCION</th>
                                        <th>NOMBRES</th>
                                        <th>PRINCIPAL</th>
                                         <th>ASOCIADO</th>
                                          <th>OBSERVACION</th>
                                          <th>TALLA</th>
                                           <th>TEMPERATURA</th>
                                            <th>PESO</th>
                                            

                                </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    
                                     $sqlmenu = "SELECT d.id, d.fecha_ingreso,concat( p.apellido_paterno,' ' , p.apellido_materno,' ' ,p.primer_nombre,' ' ,p.segundo_nombre) paciente, d.principal,d.asociado,d.observacion,s.talla, s.temperatura, s.peso FROM tbconsultaexternadiagnosticos d, tbpaciente p, tbconsultaexternapreparacion s where d.paciente = p.id and d.id = s.consulta_externa and  concat(p.apellido_paterno,' ',p.apellido_materno) like concat('%', '$id' , '%') order by d.id DESC";
                                     
                                     $querymenu = mysqli_query($conexion,$sqlmenu); 
                                   while ($validacion=mysqli_fetch_array($querymenu))
                                    {
                                        echo'<tr>';
                                     

                                         echo' <td class="boton2" > seleccionar </td>';
                                        echo' <td>'.$validacion["id"].'</td>';
                                         echo' <td>'.utf8_encode($validacion["paciente"]).'</td>';
                                        echo' <td>'.utf8_encode($validacion["principal"]).'</td>';
                                         echo' <td>'.utf8_encode($validacion["asociado"]).'</td>';
                                          echo' <td>'.utf8_encode($validacion["observacion"]).'</td>';
                                            echo' <td>'.$validacion["talla"].'</td>';
                                             echo' <td>'.$validacion["temperatura"].'</td>';
                                            echo' <td>'.$validacion["peso"].'</td>';
                                       echo' </tr>';
                                    }
                                    ?>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

                          <script type="text/javascript">


        
         $(document).ready(function(){

                 $(".boton2").click(function(){
                var valores = new Array();
                i=0;
                // Obtenemos todos los valores contenidos en los <td> de la fila
                // seleccionada
                $(this).parents("tr").find("td").each(function(){
                    valores[i] =$(this).html();
                    i++
                });
               // alert(valores[1]);
                document.getElementById("txtidpaciente").value =  valores[1];
                //txtcodevolucion
                //txtcodigodiagnostico
                 document.getElementById("txtcodevolucion").value = valores[1];
                  document.getElementById("txtcodigodiagnostico").value = valores[3];
                   document.getElementById("txtcodigodiagnostico2").value = valores[4];
                    document.getElementById("txtevolucion").value = valores[5];
                    document.getElementById("txttalla").value = valores[6];
                     document.getElementById("txttemperatura").value = valores[7];
                      document.getElementById("txtpeso").value = valores[8];
                 $("#lbltext").html(valores[2]);
                 document.getElementById("txtevolucion").focus();
               // window.location='paciente.php'
               // document.getElementById("hc").focus();
                //form_grid.action = "paciente.php"
                // document.getElementById("txtnombre").value =  valores[2];
                // document.getElementById("txtcedula").value =  valores[3];
                //  document.getElementById("txtusuario_").value =  valores[4];
                //   document.getElementById("txtpassword_").value =  valores[5];
                //    document.getElementById("cmbperfil").value =  valores[6];
                //    document.getElementById("cmbestado").value =  valores[7];
                // document.getElementById("txtmenu").focus();
            });

            /**
         * Funcion para añadir una nueva columna en la tabla
         */

          
         
 
      
        });
    </script>