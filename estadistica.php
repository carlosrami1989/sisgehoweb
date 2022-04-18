<?php
session_start();

$aplicacion= $_SESSION['aplicacion'];
$usuario=$_SESSION['usuario_a'] ;
$razon_Social=$_SESSION['razon_Social'] ;
//$perfil=$_SESSION['user']
$hoy =  date('Y-m-d');

$respuesta  = isset($_REQUEST['respuesta']) ? $_REQUEST['respuesta'] : null ;
$hc_paciente  = isset($_REQUEST['hc_paciente']) ? $_REQUEST['hc_paciente'] : null ;
//$hc_paciente  = isset($_REQUEST['respuesta']) ? $_REQUEST['respuesta'] : null ;

$fecha_desde  = isset($_REQUEST['fecha_desde']) ? $_REQUEST['fecha_desde'] : null ;
$fecha_hasta = isset($_REQUEST['fecha_hasta']) ? $_REQUEST['fecha_hasta'] : null ;

$fecha_desdes  = isset($_REQUEST['fecha_desdes']) ? $_REQUEST['fecha_desdes'] : null ;
$fecha_hastas = isset($_REQUEST['fecha_hastas']) ? $_REQUEST['fecha_hastas'] : null ;
$totall=0;

//echo "resuultad".$id;
$perfil=$_SESSION['usuario'];
include("conexion.php");
include("consultas.php");
conectar_bd();


$perfil=$_SESSION['usuario_a'];

if ($perfil=='')

{
    header('Location: index.php');

}
?>

<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?php echo ($aplicacion);  ?></title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet"/>

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet"/>

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>


    <!-- Bootstrap Core CSS -->


    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>

    <!-- popup -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <style>
        .boton
        {
            border:1px solid #808080;
            especialidadr:pointer;
            padding:2px 5px;
            color:Blue;
            cursor:pointer;
        }
        .boton2
        {
            border:1px solid #808080;
            especialidadr:pointer;
            padding:2px 5px;
            color:Blue;
            cursor:pointer;
        }

        .modal-header {
            background-color: #339BFF;
            color:white !important;
            text-align: center;
            font-size: 30px;
        }
        .modal-footer {
            background-color: #339BFF;
        }
    </style>
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


            });

            /**
             * Funcion para a単adir una nueva columna en la tabla
             */





        });


        function doSearch()
        {
            var tableReg = document.getElementById('dataTables-example');
            var searchText = document.getElementById('txtbusquedapaciente').value.toLowerCase();
            var cellsOfRow="";
            var found=false;
            var compareWith="";

            // Recorremos todas las filas con contenido de la tabla
            for (var i = 1; i < tableReg.rows.length; i++)
            {
                cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                found = false;
                // Recorremos todas las celdas
                for (var j = 0; j < cellsOfRow.length && !found; j++)
                {
                    compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
                    {
                        found = true;
                    }
                }
                if(found)
                {
                    tableReg.rows[i].style.display = '';
                } else {
                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    tableReg.rows[i].style.display = 'none';
                }
            }
        }

        function insertar()
        {
            var id = document.getElementById("hc").value;
            if (id !== "")
            {
                alert('Paciente Registrado');
                return false;
            }
        }
        function modificar()
        {
            var id = document.getElementById("hc").value;
            if (id == "")
            {
                alert('Debe Selecionar Un Paciente');
                return false;
            }
        }

    </script>

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


      
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Paciente Ingresados por Primera Vez
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action =""  name="form1" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                        <label>Desde</label>
                                        <input id="fecha_desde" name="fecha_desde"" type="date" class="form-control" required="required">
                                        </div>
                                        <div class="col-sm-5">
                                        <label>Hasta</label>
                                        <input id="fecha_hasta" name="fecha_hasta" type="date" class="form-control" required="required">
                                        </div>
                                        <div align="center" class="col-sm-2">
                                            <label>Consultar</label>
                                            <button id="btnconsultar" name="btnconsultar" type="submit" class="form-control" placeholder="Con" required="required">
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>Seleccionar</th>
                                                <th>Apellido Paterno</th>
                                                <th>Apellido Materno</th>
                                                <th>Primer Nombre</th>
                                                <th>Segundo Nombre</th>
                                                <th>Fecha Ingreso</th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $results_per_page = 10;
                                            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                                            $start_from = ($page-1) * $results_per_page;
                                            $sqlmenu = "SELECT id ,apellido_paterno,apellido_materno,primer_nombre,segundo_nombre,fecha_ingreso FROM tbpaciente where  fecha_ingreso BETWEEN '".$fecha_desde."' and '".$fecha_hasta."'order by id asc limit $start_from,".$results_per_page;

                                            $querymenu = mysqli_query($conexion,$sqlmenu);
                                            while ($validacion_menu=mysqli_fetch_array($querymenu))
                                            {
                                                echo'<tr>';
                                                echo' <td class="boton2">seleccionar</td>';
                                                echo' <td style="display: none" >'.$validacion_menu["id"].'</td>';
                                                echo' <td>'.utf8_encode($validacion_menu["apellido_paterno"]).'</td>';
                                                echo' <td>'.utf8_encode($validacion_menu["apellido_materno"]).'</td>';
                                                echo' <td>'.utf8_encode($validacion_menu["primer_nombre"]).'</td>';
                                                echo' <td>'.utf8_encode($validacion_menu["segundo_nombre"]).'</td>';
                                                echo' <td>'.utf8_encode($validacion_menu["fecha_ingreso"]).'</td>';
                                                echo' </tr>';
                                            }

                                            ?>
                                            <tfoot>
                                            <tr style="font-size: 40pt">
                                                 <?php
                                                    $sql = "SELECT COUNT(ID) AS total FROM  tbpaciente  where  fecha_ingreso BETWEEN '".$fecha_desde."'and '".$fecha_hasta."'";
                                                    $querymenu = mysqli_query($conexion,$sql);
                                                    $validacion=mysqli_fetch_array($querymenu);
                                                    $totall=$validacion["total"];
                                                   ?>
                                                Pacientes Registrados:
                                                <?php echo "$totall" ?>
                                            </tr>
                                            </tfoot>


                                        </table>
                                        </tbody>
                                        <?php
                                        $sql = "SELECT COUNT(ID) AS total FROM  tbpaciente  where  fecha_ingreso BETWEEN '".$fecha_desde."'and '".$fecha_hasta."'";
                                        $querymenu = mysqli_query($conexion,$sql);
                                        $validacion=mysqli_fetch_array($querymenu);


                                        $total_pages = ceil($validacion["total"] / $results_per_page); // calculate total pages with results

                                        for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                                            echo "<a  href='paciente.php?page=".$i."'";
                                            if ($i==$page)  echo " class='curPage'";
                                            echo ">".$i ."</a> ";
                                        };
                                        ?>
                                    </div>

                                </form>
                            </div>
                            <!-- /.col-lg-6  fa-edit (nested) -->

                        </div>
                    </div>
                </div>
                <div class="panel panel-Red">
                    <div class="panel-heading">
                        Paciente Ingresados por Evolucion
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action =""  name="form1" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <label>Desde</label>
                                            <input id="fecha_desdes" name="fecha_desdes" type="date" class="form-control" required="required">
                                        </div>
                                        <div class="col-sm-5">
                                            <label>Hasta</label>
                                            <input id="fecha_hastas" name="fecha_hastas" type="date" class="form-control" required="required">
                                        </div>
                                        <div align="center" class="col-sm-2">
                                            <label>Consultar</label>
                                            <button id="btnconsultar" name="btnconsultar" type="submit" class="form-control" placeholder="Con" required="required">
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>Seleccionar</th>
                                                <th>Apellido Paterno</th>
                                                <th>Apellido Materno</th>
                                                <th>Primer Nombre</th>
                                                <th>Segundo Nombre</th>
                                                <th>Fecha Ingreso</th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $results_per_page = 10;
                                            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                                            $start_from = ($page-1) * $results_per_page;
                                            $sqlmenu = "SELECT p.id ,p.apellido_paterno,p.apellido_materno,p.primer_nombre,p.segundo_nombre,ce.fecha_ingreso from 
 tbconsultaexternadiagnosticos ce, tbpaciente p where p.id=ce.paciente and  ce.fecha_ingreso BETWEEN '".$fecha_desdes."' and '".$fecha_hastas."'order by id asc limit $start_from,".$results_per_page;

                                            $querymenu = mysqli_query($conexion,$sqlmenu);
                                            while ($validacion_menu=mysqli_fetch_array($querymenu))
                                            {
                                                echo'<tr>';
                                                echo' <td class="boton2">seleccionar</td>';
                                                echo' <td style="display: none" >'.$validacion_menu["id"].'</td>';
                                                echo' <td>'.utf8_encode($validacion_menu["apellido_paterno"]).'</td>';
                                                echo' <td>'.utf8_encode($validacion_menu["apellido_materno"]).'</td>';
                                                echo' <td>'.utf8_encode($validacion_menu["primer_nombre"]).'</td>';
                                                echo' <td>'.utf8_encode($validacion_menu["segundo_nombre"]).'</td>';
                                                echo' <td>'.utf8_encode($validacion_menu["fecha_ingreso"]).'</td>';
                                                echo' </tr>';
                                            }

                                            ?>
                                            <tfoot>
                                            <tr style="font-size: 40pt">
                                                <?php
                                                $sql = "SELECT COUNT(ce.ID) AS total from tbconsultaexternadiagnosticos ce, tbpaciente p where p.id=ce.paciente and  ce.fecha_ingreso BETWEEN '".$fecha_desdes."'and '".$fecha_hastas."'";
                                                $querymenu = mysqli_query($conexion,$sql);
                                                $validacion=mysqli_fetch_array($querymenu);
                                                $totall=$validacion["total"];
                                                ?>
                                                Pacientes Registrados:
                                                <?php echo "$totall" ?>
                                            </tr>
                                            </tfoot>


                                        </table>
                                        </tbody>
                                        <?php
                                        $sql = "SELECT COUNT(ce.ID) AS total from tbconsultaexternadiagnosticos ce, tbpaciente p where p.id=ce.paciente and ce.fecha_ingreso BETWEEN '".$fecha_desdes."'and '".$fecha_hastas."'";
                                        $querymenu = mysqli_query($conexion,$sql);
                                        $validacion=mysqli_fetch_array($querymenu);


                                        $total_pages = ceil($validacion["total"] / $results_per_page); // calculate total pages with results

                                        for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                                            echo "<a  href='paciente.php?page=".$i."'";
                                            if ($i==$page)  echo " class='curPage'";
                                            echo ">".$i ."</a> ";
                                        };
                                        ?>
                                    </div>

                                </form>
                            </div>
                            <!-- /.col-lg-6  fa-edit (nested) -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

 <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        Paciente Ingresados por Primera Vez
                    </div>

                     <div class="form-group">
                                        <label>Seleccione Año</label>
                                        <select class="form-control" id="cmbcultura" name="cmbcultura" onchange="consulta2()">
                                           <option value='2017'>AÑO 2017</option>
                                           <option value='2018'>AÑO 2018</option>
                                            <option value='2019'>AÑO 2019</option>
                                            <option value='2020'>AÑO 2020</option>
                                            <option value='2021'>AÑO 2021</option>
                                             <option value='2022'>AÑO 2022</option>
                                            
                                            

                                        </select>


                                         <?php
                                                            echo "<div id='mostrarDatosMEd'>   
                                                                    <h1> Seleccione el año</>            
                                                                  </div>"   
                                               ?>
                                    </div>

                </div>
                     
                </div>
               
                            <!-- /.col-lg-6  fa-edit (nested) -->

  </div>
        <!-- /.row -->



        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<!-- /#wrapper -->

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });


    $(function () {
        $(document).on('click', '.boton', function (event) {
            event.preventDefault();
            $(this).closest('tr').remove();
        });
    });




    $(document).ready(function(){
        $('#myTable').DataTable();
    });
    
     function consulta2() 
    {
         
        
        var dato = document.getElementById("cmbcultura").value;
        //alert(dato);
         //dato.value = dato.value.toUpperCase();
        $.ajax({
            url: 'mostrarestadistica.php',
            type: 'POST',
            
            data: {id:dato,},

            success: function(datos)
             {
                $("#mostrarDatosMEd").html(datos);
             }
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        }); 
        document.getElementById("txtevolucion").focus();    
     
    }
</script>


</body>

</html>