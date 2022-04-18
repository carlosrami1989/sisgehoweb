<?php
//session_start();


    global $conexion2;
   	$server = 'Localhost';
	$user = 'drnixonrivas_admin';
	$password = 'sistemas@2018*';
	$database= 'drnixonrivas_sisgehoconsultaexterna2';
    $conexion2 = mysqli_connect($server,$user,$password,$database) or die("Un error occurrió durante la conexión " . mysqli_error($conexion));
    $GLOBALS['conexion'] = $conexion2;

function menu()
{
    $aplicacion= $_SESSION['aplicacion'];
    $usuario=$_SESSION['usuario_a'] ;
    $razon_Social=$_SESSION['razon_Social'] ;

	?>
       <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button> 
                
              <a class="navbar-brand" href=" ">  <?php echo($aplicacion);  ?></a> 
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <ul class="dropdown-menu dropdown-messages">
                      
                    </ul>
                </li>
                <li class="dropdown">
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

              <div class="navbar-default sidebar" role="navigation">
                            <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li class="active">
                                    <a href="menu_principal.php"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
                                </li>
                                <li>
                                    <a href="visualizacion.php"><i class="fa fa-fw fa-bar-chart-o"></i> Visor de Pacientes</a>
                                </li>
                                <li>
                                    <a href="paciente.php"><i class="fa fa-fw fa-table"></i> Admision de Pacientes</a>
                                </li>
                                <li>
                                    <a href="evolucion.php"><i class="fa fa-fw fa-edit"></i> Notas de Evolucion</a>
                                </li>
                                <li>
                                    <a href="evolucionupdate.php"><i class="fa fa-fw fa-desktop"></i> Modificar Elemento</a>
                                </li>
                                 <li>
                                    <a href="cerra_session.php"><i class="fa fa-fw fa-desktop"></i> Cerrar Session</a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/codeveloper.ec"><i class="fa fa-fw fa-wrench"></i> Configuracion</a>
                                </li>
                               
                                  </ul>
                             </div>
                        <!-- /.navbar-collapse -->
                         </div>

	<?php
}

function menu_2()
{
    $aplicacion= $_SESSION['aplicacion'];
    $usuario=$_SESSION['usuario_a'] ;
    $razon_Social=$_SESSION['razon_Social'] ;
    $hoy =  date('Y-m-d');
       ?>

         <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         <!--//  Bienvenido :<?php echo "$razon_Social"; ?> <small>.</small>//-->
                         <img src="imagenes/logo1.png" style="width:30%;height: auto">
                        </h1>
                        <!--<ol class="breadcrumb">
                            <li class="active">
                             <!--   <i class="fa fa-dashboard"></i>    
                            </li>
                        </ol>-->
                    </div>
                </div>
                  <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <?php echo "$hoy";?> <class="alert-link">
                        </div>
                    </div>
                </div>

    <?php

}

 
function buscar_paciente()
{
 $con = $GLOBALS['conexion'];
 $sqlmenu = "SELECT id, concat(apellido_paterno,' ', apellido_materno ,' ',primer_nombre,' ', segundo_nombre) as 'nombres',   fecha_nacimiento, lugar_nacimiento,  direccion,  apellido_pat_afi, apellido_mat_afi, nombre_pri_afi, nombre_seg_afi, direccion_afi, telefono_afi, telefono FROM tbpaciente ";
 
 $querymenu = mysqli_query($con,$sqlmenu);
 return $querymenu;
}

function buscar_paciente_nuevo()
{
 $con = $GLOBALS['conexion'];
 $sqlmenu = "SELECT id,  apellido_paterno,' ', apellido_materno ,' ',primer_nombre,' ', segundo_nombre ,   fecha_nacimiento, lugar_nacimiento,  direccion,  apellido_pat_afi, apellido_mat_afi, nombre_pri_afi, nombre_seg_afi, direccion_afi, telefono_afi, telefono, genero, pais FROM tbpaciente ";
 
 $querymenu = mysqli_query($con,$sqlmenu);
 return $querymenu;
}
?> 