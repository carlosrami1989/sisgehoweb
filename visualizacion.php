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

<head><meta charset="euc-jp">

    
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
                document.getElementById("txtidpaciente").value =  valores[1];
                //txtcodevolucion
                 document.getElementById("txtcodevolucion").value = "";
                 $("#lbltext").html(valores[2]);
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
         * Funcion para a??adir una nueva columna en la tabla
         */

          
         
 
      
        });
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
                    <h1 class="page-header">PACIENTES ATENDIDOS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

           
                
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Detalle de Pacientes Atendidos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                          <th>Signos Vitales</th>
                                        <th>Evolucion</th>
                                        <th>Receta</th>

                                        <th>FECHA DE ATENCION</th>
                                        <th>NOMBRES</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    
                                     $sqlmenu = "SELECT d.id, d.fecha_ingreso,concat( p.apellido_paterno,' ' , p.apellido_materno,' ' ,p.primer_nombre,' ' ,p.segundo_nombre) paciente
                                      ,p.id as 'cod_pas' FROM tbconsultaexternadiagnosticos d, tbpaciente p where d.paciente = p.id order by d.id desc ";
                                     
                                     $querymenu = mysqli_query($conexion,$sqlmenu); 
                                   while ($validacion=mysqli_fetch_array($querymenu))
                                    {
                                        echo'<tr>';
                                          echo " <td>
                                    <form action='signos_vitales.php' method='post'target='_blank' >
                                    <button type='submit' class='btn btn-link'>Signos Vitales</button>
                                     <input style='display: none' type='text' name='id' id='id' value='".$validacion['cod_pas']."'>
                                                        </form>
                                                    </td>";
                                    echo " <td>
                                    <form action='rptevolucion.php' method='post' target='_blank' >
                                    <button type='submit' class='btn btn-link'>Evolucion</button>
                                     <input style='display: none' type='text' name='id' id='id' value='".$validacion['id']."'>
                                                        </form>
                                                    </td>";

                                        echo "<td>  
                                        <form action='enviomail.php' method='post' target='_blank'>
                                        <button type='submit' class='btn btn-link'>Receta Electronica</button>
                                        <input style='display: none' type='text' name='id' id='id' value='".$validacion['id']."'>
                                                        </form>
                                                    </td>";

                                       // echo' <td>'.$validacion["id"].'</td>';
                                         echo' <td>'.$validacion["fecha_ingreso"].'</td>';
                                        echo' <td>'.$validacion["paciente"].'</td>';
                                       echo' </tr>';
                                    }
                                    ?>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
             
                         
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

    </div>
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

function valida(f) {
     div = document.getElementById('flotante');
            div.style.display = 'none';
        
                }
     
    
    function consulta(e) 
    {
         if (e.keyCode == 13) {
        var dato2 = 1;
        var dato = document.getElementById("txtcodigodiagnostico").value;
         //dato.value = dato.value.toUpperCase();
        $.ajax({
            url: 'procedimientos.php',
            type: 'POST',
            
            data: {id:dato,cod:dato2},

            success: function(datos)
             {
                $("#mostrarDatos").html(datos);
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
    }

    function consulta_grid() 
    {
         
       
        var dato = document.getElementById("txtcodevolucion").value;
       // alert(dato)
        if (dato=="")
        {
           alert('Debe haber realizado una evolucion'); 
           return false;   

        }
        var farmacos_ = document.getElementById("txtfarmaco").value;
        if (farmacos_=="")
        {
           alert('Ingreser Farmacos'); 
           return false;   

        }
        var unidades_ = document.getElementById("txtunidades").value;
         if (unidades_=="")
        {
           alert('Ingreser Unidades'); 
           return false;   

        }
        var prescripcion_ = document.getElementById("txtprescripcion").value;
         if (prescripcion_=="")
        {
           alert('Ingreser Prescripcion'); 
           return false;   

        }

         //dato.value = dato.value.toUpperCase();
        $.ajax({
            url: 'insertpres.php',
            type: 'POST',
            
            data: {id:dato,farmacos:farmacos_,unidades:unidades_,prescripcion:prescripcion_},

            success: function(datos)
             {
                $("#mostrarDatos2").html(datos);
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
    $(function () {
    $(document).on('click', '.boton', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    });
});



        function consulta_del(id) 
        {
            
            //document.getElementById("tabla2").deleteRow(id);


        var dato = id;
          var dato2 = document.getElementById("txtcodevolucion").value;

           if (dato2=="")
        {
           alert('Debe seleccionar para eliminar'); 
           return false;   

        }
        $.ajax({
            url: 'eliminarpres.php',
            type: 'POST',
            
            data: {id:dato,id2:dato2},

            success: function(datos)
             {
                $("#mostrarDatos3").html(datos);
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
    }
     

        function Imprimir(id) {
        var dato = id;
        $.ajax({
            url: 'imprimir.php',
            type: 'POST',
            
            data: {id:dato},

            success: function()
             {
                alert(dato);
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
    }

    $(document).ready(function(){
    $('#myTable').DataTable();
    });
</script>


</body>

</html>