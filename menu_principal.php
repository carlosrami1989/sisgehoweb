<?php
session_start();

$aplicacion= $_SESSION['aplicacion'];
$usuario=$_SESSION['usuario_a'] ;
$razon_Social=$_SESSION['razon_Social'] ;
//$perfil=$_SESSION['user']
$hoy =  date('Y-m-d');

$perfil=$_SESSION['usuario'];
include("conexion.php");
include("consultas.php");
            conectar_bd();
$perfil=$_SESSION['usuario_a'];

if ($perfil=='')

{
    header('Location: index.php');

}  
            
            /*CONSULTA DOCENTE*/
            $sqlcountpaciente = "select COUNT(*) as 'pacientes' from tbPaciente";
           $querycountpaciente = mysqli_query($conexion,$sqlcountpaciente);    
          $num_countpaciente=mysqli_fetch_array($querycountpaciente);
          $pacientes_count = $num_countpaciente['pacientes'];

          //CONSULTA DE Evoluciones
           $sqlcountevoluciones = "select COUNT(*) as 'evoluciones' from tbConsultaExternaDiagnosticos";
           $querycountevoluciones = mysqli_query($conexion,$sqlcountevoluciones);    
          $num_countevoluciones=mysqli_fetch_array($querycountevoluciones);
          $evoluciones_count = $num_countevoluciones['evoluciones'];
         // echo "$evoluciones_count";

           //CONSULTA DE Evoluciones
           $sqlcountmedicacion = "select COUNT(*) as 'medicacion' from tbConsultaExternaEvolucionPrescripcion";
           $querycounmedicacion = mysqli_query($conexion,$sqlcountmedicacion);    
          $num_countmedicacion=mysqli_fetch_array($querycounmedicacion);
          $medicacion_count = $num_countmedicacion['medicacion'];
            
?>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?php echo ($aplicacion);  ?></title>
<link rel="shortcut icon" href="imagenes/logo1.png" />
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet"/>

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet"/>

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
     
        <!--  AQUI VA EL MENU -->
        <?php 

        menu();

        ?>
    </div>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                  <?php 

                    menu_2();

                    ?>

                <!-- /.row -->

              
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-male fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"> <?php echo "$pacientes_count"; ?></div>
                                        <div>Pacientes</div>
                                    </div>
                                </div>
                            </div>
                            <a href="paciente.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Nuevo Paciente</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-hospital-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo "$evoluciones_count"; ?>  </div>
                                        <div>Evoluciones</div>
                                    </div>
                                </div>
                            </div>
                            <a href="evolucion.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Evolucion</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-medkit fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"> <?php echo "$medicacion_count"; ?>  </div>
                                        <div>Medicamentos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix">Total de Medicamentos</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-search fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Visor</div>
                                        <div>Visor de Historial</div>
                                    </div>
                                </div>
                            </div>
                            <a href="visualizacion.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Visor</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                     <!-- /.row -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-thumb-tack fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"></div>
                                        <div>Visor de Actividades</div>
                                    </div>
                                </div>
                            </div>
                            <a href="estadistica.php">
                                <div class="panel-footer">
                                    <span class="pull-left">actividad</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                </div>
                <!-- /.row -->

                <div class="row">
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>