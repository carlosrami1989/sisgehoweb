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

   <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Seleccionar</th>
                                <th>HISTORIA CLINICA</th>
                                <th>NOMBRES</th>
                                <th>FECHA DE NACIMIENTO</th>
                                <th>LUGAR DE NACIMIENTO</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            
                            $sqlmenu = "SELECT id ,apellido_paterno,apellido_materno,primer_nombre,segundo_nombre, concat(apellido_paterno,' ', apellido_materno ,' ',primer_nombre,' ', segundo_nombre) as 'nombres',convert(fecha_nacimiento,date) as 'fecha_nacimiento' , lugar_nacimiento, direccion, apellido_pat_afi, apellido_mat_afi, nombre_pri_afi, nombre_seg_afi, direccion_afi, telefono_afi, telefono,otro , genero ,`pais`,`estado_civil`,etnico,des_campo2 FROM tbpaciente where concat(apellido_paterno,' ',apellido_materno) like concat('%', '$id' , '%') order by id asc";

                            $querymenu = mysqli_query($conexion,$sqlmenu);
                            while ($validacion_menu=mysqli_fetch_array($querymenu))
                            {
                                echo'<tr>';
                                echo' <td class="boton2">seleccionar</td>';
                                echo' <td>'.$validacion_menu["id"].'</td>';
                                echo' <td style="display: none">'.utf8_encode($validacion_menu["apellido_paterno"]).'</td>';
                                echo' <td style="display: none">'.utf8_encode($validacion_menu["apellido_materno"]).'</td>';
                                echo' <td style="display: none">'.utf8_encode($validacion_menu["primer_nombre"]).'</td>';
                                echo' <td style="display: none">'.utf8_encode($validacion_menu["segundo_nombre"]).'</td>';
                                echo' <td>'.utf8_encode($validacion_menu["nombres"]).'</td>';
                                echo' <td>'.$validacion_menu["fecha_nacimiento"].'</td>';
                                echo' <td >'.$validacion_menu["lugar_nacimiento"].'</td>';
                                echo' <td style="display: none">'.$validacion_menu["direccion"].'</td>';
                                echo' <td style="display: none">'.$validacion_menu["genero"].'</td>';
                                echo' <td style="display: none">'.$validacion_menu["pais"].'</td>';
                                echo' <td style="display: none">'.$validacion_menu["estado_civil"].'</td>';
                                echo' <td style="display: none">'.$validacion_menu["etnico"].'</td>';
                                echo' <td style="display: none">'.$validacion_menu["apellido_pat_afi"].'</td>';
                                echo' <td style="display: none">'.$validacion_menu["nombre_pri_afi"].'</td>';
                                echo' <td style="display: none">'.$validacion_menu["telefono"].'</td>';
                                 echo' <td style="display: none">'.$validacion_menu["otro"].'</td>';
                                echo' <td style="display: none">'.$validacion_menu["des_campo2"].'</td>';
                                echo' </tr>';
                            }
                            ?>


                        </table>
                        
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
                document.getElementById("hc").value =  valores[1];
                document.getElementById("txtapellidopaterno").value =  valores[2];
                document.getElementById("txtapellidomaterno").value =  valores[3];
                document.getElementById("txtprimernombre").value =  valores[4];
                document.getElementById("txtsegundonombre").value =  valores[5];
                document.getElementById("txtfechanacimiento").value =  valores[7];
                document.getElementById("txtlugarnacimiento").value =  valores[8];
                document.getElementById("txtdireccion").value =  valores[9];
                document.getElementById("cmbgenero").value =  valores[10];
                document.getElementById("cmbpais").value =  valores[11];
                document.getElementById("cmbestado").value =  valores[12];
                document.getElementById("cmbcultura").value =  valores[13];
                document.getElementById("txtapellidorepresente").value =  valores[14];
                document.getElementById("txtnombrerepresentante").value =  valores[15];
                document.getElementById("txttelefono").value =  valores[16];
                document.getElementById("txtprecio").value =  valores[17];
                document.getElementById("txtmail").value =  valores[18];


            });

            /**
             * Funcion para a単adir una nueva columna en la tabla
             */





        });

   
    </script>