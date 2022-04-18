<?php
session_start();
include("conexion.php");
conectar_bd();
?>
 
<?php
$perfil=$_SESSION['usuario_a'];

if ($perfil=='')

{
    header('Location: index.php');

}  

if(isset($_POST["id"]))
{

	
  $id = $_POST["id"];

 // echo "$id";


  

  }
 
?>


            <div class="container-fluid">
                <!-- Start Page Content -->
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
                                    
                                     $sqlmenu2 = "select count(*) as total_meses, 'ENERO' as 'mes' from tbconsultaexternadiagnosticos where month(fecha_ingreso)= 1 
                                        and year(fecha_ingreso) = '$id'
                                        union
                                        select count(*) as total_meses, 'FEBRERO' as 'mes' from tbconsultaexternadiagnosticos where month(fecha_ingreso)= 2
                                        and year(fecha_ingreso)= '$id'
                                        UNION 
                                        select count(*) as total_meses, 'MARZO' as 'mes' from tbconsultaexternadiagnosticos where month(fecha_ingreso)= 3
                                        and year(fecha_ingreso)= '$id'
                                        UNION 
                                        select count(*) as total_meses, 'ABRIL' as 'mes' from tbconsultaexternadiagnosticos where month(fecha_ingreso)= 4
                                        and year(fecha_ingreso)= '$id'
                                        UNION 
                                        select count(*) as total_meses, 'MAYO' as 'mes' from tbconsultaexternadiagnosticos where month(fecha_ingreso)= 5
                                        and year(fecha_ingreso)= '$id'
                                        UNION 
                                        select count(*) as total_meses, 'JUNIO' as 'mes' from tbconsultaexternadiagnosticos where month(fecha_ingreso)= 6
                                        and year(fecha_ingreso)= '$id'
                                        UNION 
                                        select count(*) as total_meses, 'JULIO' as 'mes' from tbconsultaexternadiagnosticos where month(fecha_ingreso)= 7
                                        and year(fecha_ingreso)= '$id'
                                        UNION 
                                        select count(*) as total_meses, 'AGOSTO' as 'mes' from tbconsultaexternadiagnosticos where month(fecha_ingreso)= 8 and year(fecha_ingreso) = '$id'
                                        UNION 
                                        select count(*) as total_meses, 'SEPTIEMBRE' as 'mes' from tbconsultaexternadiagnosticos where month(fecha_ingreso)= 9 and year(fecha_ingreso)= '$id'
                                        UNION 
                                        select count(*) as total_meses, 'OCTUBRE' as 'mes' from tbconsultaexternadiagnosticos where month(fecha_ingreso)= 10 and year(fecha_ingreso)= '$id'
                                        UNION 
                                        select count(*) as total_meses, 'NOVIEMBRE' as 'mes' from tbconsultaexternadiagnosticos where month(fecha_ingreso)= 11 and year(fecha_ingreso)= '$id'
                                        UNION 
                                        select count(*) as total_meses, 'DICIEMBRE' as 'mes' from tbconsultaexternadiagnosticos where month(fecha_ingreso)= 12 and year(fecha_ingreso)= '$id'";
                                    // echo "$sqlmenu";
                                     $querymenu2 = mysqli_query($conexion,$sqlmenu2); 


                                     $datos2[0] = array('MES', 'PRODUCCION');
                                 
                                      $i = 1;      
                                      while ($validacion_socio=mysqli_fetch_array($querymenu2))
                                      {
                                        ;
                                        $datos2[$i++] = array($validacion_socio["mes"],(float) $validacion_socio["total_meses"]);
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
                            var anios =  <?php echo json_encode($id); ?>;
                            var datosFinales = google.visualization.arrayToDataTable(cargaDatos);
                            //
                            
                           
                             
                             
                            // var options = {
                            // title: 'CURvA TEMPERATURA Y TALLA',
                            // curveType: 'function',
                            // legend: { position: 'bottom'}
                            
                            //                       };

                            var options = {
                          title: 'Produccion por año '+anios,
                          curveType: 'function',
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


                <!-- End PAge Content -->
            </div>
