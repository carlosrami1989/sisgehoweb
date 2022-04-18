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

<head>

    <meta charset="utf-8">
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
            <input name="txtbusquedapaciente" type="text" id="txtbusquedapaciente" class="form-control" onkeypress="consulta()">
        </div>

           <?php
                                                echo "<div id='mostrarmod'>   
                                                             
                                                      </div>"   
                                            ?>
                
           
           

            <!-- Modal -->
            <div class="row">
               
                   <div class="col-lg-12">
                     <h1><label id="lbltext" name="lbltext"></label></h1>
                    <div class="panel panel-Primary ">
                        <div class="panel-heading">
                            Evolucion del paciente
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                                <!-- /.col-lg-6  fa-edit (nested) -->
                             <!--     <div class="col-lg-6">
                                     <div class="panel panel-Success">
                                        <div class="panel-heading">
                                           Examenes 
                                        </div>
                                    <form role="form" method="post">
                                          <div class="form-group">
                                                <label for="disabledSelect">Historia Clinica</label>
                                                <input class="form-control" id="hc" name="hc" type="text" placeholder="Historia Clinica" disabled="" value="<?php echo($row["id"]); ?>">
                                                <label for="disabledSelect">Historia Clinica</label>
                                                <input class="form-control" id="hc" name="hc" type="text" placeholder="Historia Clinica" disabled="" value="<?php echo($row["id"]); ?>">
                                                <label for="disabledSelect">Historia Clinica</label>
                                                <input class="form-control" id="hc" name="hc" type="text" placeholder="Historia Clinica" disabled="" value="<?php echo($row["id"]); ?>">
                                            </div>
                                       

                                    </form>
                                </div>
                                </div> -->
                                 <div class="col-lg-12" id = "div_evoluciones">
                                     <div class="panel panel-Yellow ">
                                        <div class="panel-heading">
                                           Evoluciones 
                                        </div>
                                          <form action="updateevolucion.php" id="fo3"   method="post" name="fo3">
                                            <div class="form-group">
                                             <label for="disabledSelect">Seleccione el paciente</label>
                                                <input class="form-control" id="txtidpaciente" name="txtidpaciente" type="text" placeholder="Seleccione el paciente" required="required" readonly   >
                                            </div>
                                           
                                            <div class="form-group">
                                             <label for="disabledSelect">Diagnostico Principal</label>
                                                <input class="form-control" id="txtcodigodiagnostico" name="txtcodigodiagnostico" type="text" placeholder="Diagnostico" required="required" onkeypress="consulta(event)"   >
                                            </div>
                                           
                                           <?php
                                                echo "<div id='mostrarDatos'>   
                                                             
                                                      </div>"   
                                            ?>
                                             <div class="form-group">
                                             <label for="disabledSelect">Diagnostico Secundario</label>
                                                <input class="form-control" id="txtcodigodiagnostico2" name="txtcodigodiagnostico2" type="text" placeholder="Diagnostico" required="required" onkeypress="consulta2(event)"   >
                                            </div>
                                           
                                           <?php
                                                echo "<div id='mostrarDatos2'>   
                                                             
                                                      </div>"   
                                            ?>
                                          <div class="form-group">
                                                <label for="disabledSelect">Evolucion</label>
                                                <input class="form-control" id="txtevolucion" name="txtevolucion" type="text" placeholder="Evolucion"  required="required" style="width:100%;height:10%" >
                                            </div>
                                            
                                 
                                            
                                </div>
                                </div>

<!-- 
                                //SIGNOS VITALES -->

                                <div class="col-lg-12"  id = "div_sv" >
                                         <div class="panel panel-Success">
                                            <div class="panel-heading">
                                                Signos Vitales
                                            </div>
                                             
                                                  <div class="form-group">
                                                        <label for="disabledSelect">Temperatura</label>
                                                        <input class="form-control" id="txttemperatura" name="txttemperatura" type="number" step="any"  placeholder="Temperatura"  required="required" >
                                                    </div>
                                                <div class="form-group">
                                                        <label for="disabledSelect">Peso</label>
                                                        <input class="form-control" id="txtpeso" name="txtpeso" type="number" step="any"  placeholder="Peso"   required="required" >
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="disabledSelect">Talla</label>
                                                        <input class="form-control" id="txttalla" name="txttalla" type="number" step="any"  placeholder="Talla"  required="required" >
                                                    </div>
                                                    <input type="checkbox" name="bi" id="bi" class='form-control-sm' >Alergico 

                                                     <div class="form-group">
                                                        <label for="disabledSelect">Alergico</label>
                                                        <input class="form-control" id="txtalergico" name="txtalergico" type="text" placeholder="Alergico"  required="required" >
                                                    </div>

                                             
                                    </div>
                                </div>
                                 <div align="center" >
                                          
                                           
                                            <button   class="btn btn-danger btn-circle btn-lg" id="btningresar" onclick="enviar()"  >
                                            <i class="fa fa-check"></i>
                                            </button>
                                     </div> 
                                 </form>

                                   <div class="col-lg-12" >
                                     <div class="panel panel-Red ">
                                        <div class="panel-heading">
                                           Prescripcion - Famacoterapia 
                                        </div>
                                          
                                          <div class="form-group">
                                             <label for="disabledSelect">CODIGO DE EVOLUCION PARA MEDICINA</label>
                                                <input class="form-control" id="txtcodevolucion" name="txtcodevolucion" type="text" placeholder="CODIGO DE EVOLUCION PARA MEDICINA" required="required" readonly  value="<?php echo($hc_paciente) ?>"  >
                                            </div> 
                                            <div class="form-group">
                                             <label for="disabledSelect">Farmaco</label>
                                                <input class="form-control" id="txtfarmaco" name="txtfarmaco" type="text" placeholder="Farmaco" required="required"    >
                                            </div>
                                            <div class="form-group">
                                             <label for="disabledSelect">Unidades</label>
                                                <input class="form-control" id="txtunidades" name="txtunidades" type="text" placeholder="Unidades" required="required"    >
                                            </div>
                                            <div class="form-group">
                                             <label for="disabledSelect">Prescripcion</label>
                                                <input class="form-control" id="txtprescripcion" name="txtprescripcion" type="text" placeholder="Prescripcion" required="required"     >
                                            </div>
                                            <div  align="center"  class="form-group" >
                                           <button type="submit" class="btn btn-primary btn-circle btn-lg" onclick="consulta_grid()"  >
                                            <i class="fa fa-plus"></i>
                                            </button>
                                            </div>
                                            
                                           


                                             

                                            <?php
                                                            echo "<div id='mostrarDatosMEd'>   
                                                                    <h1> cargando datos......</>            
                                                                  </div>"   
                                               ?>

                                            <?php
                                                            echo "<div id='mostrarDatos3'>   
                                                                        
                                                                  </div>"   
                                               ?>

                                            
                                       
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                <!-- /.col-lg-6  fa-edit (nested) -->
                                 
                            </div>
                        </div>
                         <div class="panel-body">
                            
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
     
    
    function consulta() 
    {
        var dato = document.getElementById("txtbusquedapaciente").value;
       // alert(dato)
        
         //dato.value = dato.value.toUpperCase();
        $.ajax({
            url: 'mostrardatosmodificar.php',
            type: 'POST',
            
            data: {id:dato},

            success: function(datos)
             {
                $("#mostrarmod").html(datos);
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

     function consulta2(e) 
    {
         if (e.keyCode == 13) {
        var dato2 = 1;
        var dato = document.getElementById("txtcodigodiagnostico2").value;
         //dato.value = dato.value.toUpperCase();
        $.ajax({
            url: 'procedimientos.php',
            type: 'POST',
            
            data: {id:dato,cod:dato2},

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