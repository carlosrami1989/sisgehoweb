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

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">


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
        #table-scroll {

  height:250px;
  overflow:auto;  
  margin-top:20px;

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

                document.getElementById("txtmail").value =  valores[17];
                //txtmail


            });

            /**
             * Funcion para a単adir una nueva columna en la tabla
             */





        });

    function insertar()
        {
            var id = document.getElementById("hc").value;
            if (id != "")
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

        <!-- /.row -->


        <!-- /.row -->

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">PACIENTES REGISTRADOS</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>


        <div class="form-group">
            <label for="disabledSelect">Busqueda Paciente</label>
            <input name="txtbusquedapaciente" type="text" id="txtbusquedapaciente" class="form-control" onkeypress="consulta_grid()">
        </div>

        <div class="row">
            <div class="col-lg-16">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        Detalle de Pacientes Registrado
                    </div>
                    <div class="panel-body" id="table-scroll">
                            <?php
                                                            echo "<div id='mostrarDatosMEd'>   
                                                                    <h1> Busque Paciente ......</>            
                                                                  </div>"   
                                               ?>
                        </tbody>
                        
                    <!-- /.box-header -->

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos basico del Paciente
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action =""  name="form1" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="disabledSelect">Historia Clinica</label>
                                        <input class="form-control" id="hc" name="hc" type="text" placeholder="Historia Clinica" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <input id="txtapellidopaterno" name="txtapellidopaterno" type="text" class="form-control" placeholder="Apellido Paterno" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido Materno</label>
                                        <input id="txtapellidomaterno" name="txtapellidomaterno" type="text" class="form-control" placeholder="Apellido Materno" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Primer Nombre</label>
                                        <input id="txtprimernombre" name="txtprimernombre" type="text" class="form-control" placeholder="Primer Nombre" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Segundo Nombre</label>
                                        <input id="txtsegundonombre" name="txtsegundonombre" type="text" class="form-control" placeholder="Segundo Nombre" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label>Fecha de Nacimiento</label>
                                        <input id="txtfechanacimiento" name="txtfechanacimiento" type="Date" class="form-control" placeholder="Segundo Nombre" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input id="txttelefono" name="txttelefono" type="text" class="form-control" placeholder="Telefono" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label>Lugar de Nacimiento</label>
                                        <input id="txtlugarnacimiento" name="txtlugarnacimiento" type="text" class="form-control" placeholder="Lugar de Nacimiento" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Direcion</label>
                                        <input id="txtdireccion" name="txtdireccion" type="text" class="form-control" placeholder="Direccion" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label>Genero</label>
                                        <select class="form-control"  id="cmbgenero" name="cmbgenero">
                                            <?php

                                            $sqlmenu = "SELECT * FROM `tbgenero`";
                                            $querymenu = mysqli_query($conexion,$sqlmenu);
                                            while ($menus=mysqli_fetch_array($querymenu))
                                            {
                                                echo '<option value='.$menus["codigo"].'>'.$menus["descripcion"].'</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pais</label>
                                        <select class="form-control" id="cmbpais" name="cmbpais">
                                            <?php

                                            $sqlmenu = "SELECT * FROM `tbpais`";
                                            $querymenu = mysqli_query($conexion,$sqlmenu);
                                            while ($menus=mysqli_fetch_array($querymenu))
                                            {
                                                echo '<option value='.$menus["codigo"].'>'.utf8_encode($menus["descripcion"]).'</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <label>Estado Civil</label>
                                        <select class="form-control" id="cmbestado" name="cmbestado">
                                            <?php

                                            $sqlmenu = "SELECT * FROM `tbestadocivil`";
                                            $querymenu = mysqli_query($conexion,$sqlmenu);
                                            while ($menus=mysqli_fetch_array($querymenu))
                                            {
                                                echo '<option value='.$menus["codigo"].'>'.utf8_encode($menus["descripcion"]).'</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Cultura Etnica</label>
                                        <select class="form-control" id="cmbcultura" name="cmbcultura">
                                            <?php

                                            $sqlmenu = "SELECT * FROM `tbtipocultura`";
                                            $querymenu = mysqli_query($conexion,$sqlmenu);
                                            while ($menus=mysqli_fetch_array($querymenu))
                                            {
                                                echo '<option value='.$menus["raza"].'>'.utf8_encode($menus["descripcion"]).'</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>



                                    <div class="panel-heading">
                                        Datos basico del Paciente
                                    </div>
                                    <div class="form-group">
                                        <label>Primer Representante</label>
                                        <input id="txtapellidorepresente" name="txtapellidorepresente" type="text" class="form-control" placeholder="Primer Representante " required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Segundo Representante</label>
                                        <input id="txtnombrerepresentante" name="txtnombrerepresentante" type="text" class="form-control" placeholder="Segundo Representante" required="required">
                                    </div>
                                     <div class="form-group">
                                        <label>Costo de la Consulta</label>
                                        <input class="form-control" id="txtprecio" name="txtprecio" type="number" placeholder="Ingrese el precio"  step="any"  required="required" >
                                    </div>
                                    <div class="form-group">
                                        <label>Correo del Paciente</label>
                                        <input class="form-control" id="txtmail" name="txtmail" type="email" placeholder="Ingrese email"  step="any"  required="required" >
                                    </div>
                                    <div  align="center"  class="form-group" >
                                        <button type="submit" class="btn btn-primary btn-circle btn-xl" onclick="insertar()" formaction="pacienteinsertar.php" id="nuevo">
                                            <i class="fa fa-check"></i></button>
                                        <button type="submit" class="btn btn-success btn-circle btn-xl" onclick="modificar()"formaction="pacientemodificar.php" id="guardar">
                                            <i class="fa fa-edit"></i></button>
                                        <button type="reset" class="btn btn-danger btn-circle btn-xl" id="cancelar">
                                            <i class="fa fa-times"></i></button>


                                    </div>

                                </form>
                            </div>
                            <!-- /.col-lg-6  fa-edit (nested) -->

                        </div>
                    </div>



                </div>
            </div>
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
    
    function consulta_grid() 
    {
         
       
        var dato = document.getElementById("txtbusquedapaciente").value;
       // alert(dato)
        
         //dato.value = dato.value.toUpperCase();
        $.ajax({
            url: 'mostrargrid.php',
            type: 'POST',
            
            data: {id:dato},

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
     //   document.getElementById("txtevolucion").focus();    
    
    }
</script>


</body>

</html>