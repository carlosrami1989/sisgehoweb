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

 //SELECT apellido_pat_afi , apellido_mat_afi FROM tbpaciente where id = 36

  $sqlmenu2 = " SELECT apellido_pat_afi , nombre_pri_afi, otro FROM tbpaciente where id = '".$id."' ";
                                    // echo "$sqlmenu";
                                     $querymenu2 = mysqli_query($conexion,$sqlmenu2); 
                                   while ($validacion2=mysqli_fetch_array($querymenu2))
                                    {

                                    	$des_madre = $validacion2["nombre_pri_afi"];
                                    	$des_padre =$validacion2["apellido_pat_afi"];
                                    	$otro =$validacion2["otro"];
                                    	 
                                        
                                    }
 
                                    
                                     $sqlmenu = "SELECT d.consulta_externa, d.fecha_ingreso,concat( p.apellido_paterno,' ' , p.apellido_materno,' ' ,p.primer_nombre,' ' ,p.segundo_nombre) paciente, 
                            p.apellido_pat_afi , p.apellido_mat_afi, d.alergico, d.descripcion ,TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,curdate()) AS edad
                            FROM tbconsultaexternapreparacionalergia d, 
                            tbpaciente p where d.paciente = p.id and p.id = '".$id."' 
                            order by d.consulta_externa desc LIMIT 1 ";
                                   //  echo "$sqlmenu";
                                     $querymenu = mysqli_query($conexion,$sqlmenu); 

                                     if(mysqli_num_rows($querymenu) != 0){ 

                                     	while ($validacion=mysqli_fetch_array($querymenu))
                                    {

                                    	 
                                    	$alergico = $validacion["alergico"];
                                    	$descripcion = utf8_encode($validacion["descripcion"]);
                                        $edadconsulta = utf8_encode($validacion["edad"]);
                                        
                                    }
                            
											     // Hubieron resultados
											     // Aqui ya puedo utilizar el mysql_fetch_array() sin reparo
								}else
								{
									$alergico = "0";
                                    	$descripcion  = "no hay alergias";
											     // No hubieron resultados
								}



                                   

// SELECT d.consulta_externa, d.fecha_ingreso,concat( p.apellido_paterno,' ' , p.apellido_materno,' ' ,p.primer_nombre,' ' ,p.segundo_nombre) paciente, p.apellido_pat_afi , p.apellido_mat_afi, d.alergico, d.descripcion FROM tbconsultaexternapreparacionalergia d, tbpaciente p where d.paciente = p.id and p.id = 36 order by d.consulta_externa desc LIMIT 1

 ?>


     <!-- popup -->   

    


<div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <?php echo "Madre : $des_madre , Padre : $des_padre	, alergico	: $descripcion	";?> <class="alert-link">
                        </div>
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <?php echo "COSTO DE CONSULTA POR PACIENTE : $otro";?> <class="alert-link">
                        </div>
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <?php echo "EDAD DEL PACIENTE : $edadconsulta";?> <class="alert-link">
                        </div>
                    </div>
                </div>
                
                   <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Detalle de Signos Vitales Anteriores
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                         <th>Fecha</th>
                                        <th>Paciente</th>
                                        <th>Temperatura</th>
                                        <th>Peso</th>
                                        <th>Talla</th>
                                        
                                </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    
                                     $sqlmenu = "SELECT d.consulta_externa, d.fecha_ingreso,concat( p.apellido_paterno,' ' , p.apellido_materno,' ' ,p.primer_nombre,' ' ,p.segundo_nombre)  paciente,
  d.temperatura, d.peso,d.talla FROM tbconsultaexternapreparacion d, tbpaciente p where d.paciente = p.id and p.id = '".$id."' order by d.fecha_ingreso desc";
                                    // echo "$sqlmenu";
                                     $querymenu = mysqli_query($conexion,$sqlmenu); 
                                   while ($validacion=mysqli_fetch_array($querymenu))
                                    {
                                        echo'<tr>';
                                         
                                        echo' <td>'.$validacion["fecha_ingreso"].'</td>';
                                         echo' <td>'.$validacion["paciente"].'</td>';
                                        echo' <td>'.utf8_encode($validacion["temperatura"]).'</td>';
                                        echo' <td>'.utf8_encode($validacion["peso"]).'</td>';
                                        echo' <td>'.utf8_encode($validacion["talla"]).'</td>';
                                       echo' </tr>';
                                    }
                                    ?>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

                       <?php
                       if ($alergico==0)
                       {

                      ?>
                       <div class="col-lg-12"  id = "div_sv" >
                           <div class="panel panel-Success">
                               <div class="panel-heading">
                                   Alergias
                               </div>


                               <input type="checkbox" name="bi" id="bi" class="form-control-sm" >Alergico

                               <div class="form-group">
                                   <label for="disabledSelect">Alergico</label>
                                   <input class="form-control" id="txtalergico" name="txtalergico" type="text" placeholder="Alergico"  required="required" value="No hay Alergias / Puede ingresar en caso que se requiera" >
                               </div>


                           </div>
                       </div>
                       <?php
                       }
                       else
                       {
                           ?>
                       <div class="col-lg-12"  id = "div_sv" >
                           <div class="panel panel-Success">
                               <div class="panel-heading">
                                   Alergias
                               </div>


                               <input type="checkbox" name="bi" id="bi" class="form-control-sm" checked="checked" >Alergico

                               <div class="form-group">
                                   <label for="disabledSelect">Alergico</label>
                                   <input class="form-control" id="txtalergico" name="txtalergico" type="text" placeholder="Alergico"  required="required" value="<?php echo $descripcion;?>" >
                               </div>


                           </div>
                       </div>
                       <?php

                       }



                       ?>
            </div>