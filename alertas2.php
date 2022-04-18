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

  $sqlmenu2 = " SELECT apellido_pat_afi , nombre_pri_afi FROM tbpaciente where id = '".$id."' ";
                                    // echo "$sqlmenu";
                                     $querymenu2 = mysqli_query($conexion,$sqlmenu2); 
                                   while ($validacion2=mysqli_fetch_array($querymenu2))
                                    {

                                    	$des_madre = $validacion2["nombre_pri_afi"];
                                    	$des_padre =$validacion2["apellido_pat_afi"];
                                    	 
                                        
                                    }
 
                                    
                                     $sqlmenu = "SELECT d.consulta_externa, d.fecha_ingreso,concat( p.apellido_paterno,' ' , p.apellido_materno,' ' ,p.primer_nombre,' ' ,p.segundo_nombre) paciente, p.apellido_pat_afi , p.apellido_mat_afi, d.alergico, d.descripcion FROM tbconsultaexternapreparacionalergia d, tbpaciente p where d.paciente = p.id and p.id = '".$id."' order by d.consulta_externa desc LIMIT 1 ";
                                    // echo "$sqlmenu";
                                     $querymenu = mysqli_query($conexion,$sqlmenu); 

                                     if(mysqli_num_rows($querymenu) != 0){ 

                                     	while ($validacion=mysqli_fetch_array($querymenu))
                                    {

                                    	 
                                    	$alergico = $validacion["alergico"];
                                    	$descripcion = utf8_encode($validacion["descripcion"]);
                                        
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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi" > </script>
<script type="text/javascript"
src="https://www.google.com/jsapi?autoload={
'modules':[{
'name':'visualization',
'version':'1',
'packages':['corechart']
}]
}"></script>

 
                
                
                  <div class="row">
                         <!-- /# column -->
                     
                     <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Graficos</h4>
                                <div id="morris-bar-chart" style="width:100%;height:60%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                 <?php 
                                    
                                     $sqlmenu2 = "SELECT d.consulta_externa, d.fecha_ingreso,concat( p.apellido_paterno,' ' , p.apellido_materno,' ' ,p.primer_nombre,' ' ,p.segundo_nombre)  paciente,  d.temperatura, d.peso,d.talla FROM tbconsultaexternapreparacion d, tbpaciente p where d.paciente = p.id and p.id = '".$id."' order by d.fecha_ingreso asc";
                                    // echo "$sqlmenu";
                                     $querymenu2 = mysqli_query($conexion,$sqlmenu2); 


                                     $datos2[0] = array('Fecha', 'Temperatura','Talla','Peso');
						         
						              $i = 1;      
						              while ($validacion_socio=mysqli_fetch_array($querymenu2))
						              {
						                ;
						                $datos2[$i++] = array($validacion_socio["fecha_ingreso"],(float) $validacion_socio["talla"],(float) $validacion_socio["peso"],(float) $validacion_socio["temperatura"]);
						               } 




 
                                    ?>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
                           // google.setOnLoadCallback(drawChart);
                                
                            function drawChart() {
                            	 
                            //cargamos nuestro array $datos creado en PHP para que se puede utilizar en JavaScript
                            var cargaDatos = <?php echo json_encode($datos2); ?>;
                             
                            var datosFinales = google.visualization.arrayToDataTable(cargaDatos);
                            //
                            
                           
                             
                             
                            // var options = {
                            // title: 'CURvA TEMPERATURA Y TALLA',
                            // curveType: 'function',
                            // legend: { position: 'bottom'}
                            
                            //                       };

                            var options = {
				          title: 'Signos Vitales',
				          curveType: 'funct...........ion',
				          legend: { position: 'bottom' }
				        };

				        var chart = new google.visualization.LineChart(document.getElementById('morris-bar-chart'));

				        // chart.draw(data, options);
                             
            //                 var chart = new google.visualization.LineChart(document.getElementById('morris-bar-chart'));
                             //

                             //
                            chart.draw(datosFinales, options);
                             
                            //VAR 2
                            


                            ///
 
                            ////
                                }

                </script>
