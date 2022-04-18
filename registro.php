<?php 
session_start();

$aplicacion= $_SESSION['aplicacion'];
$usuario=$_SESSION['usuario_a'] ;
$razon_Social=$_SESSION['razon_Social'] ;
//$perfil=$_SESSION['user']
$hoy =  date('Y-m-d');

$perfil=$_SESSION['usuario'];
include("conexion.php");
            conectar_bd();
$perfil=$_SESSION['usuario_a'];

if ($perfil=='')

{
    header('Location: index.php');

}  

function edad($fecha){
    $fecha = str_replace("/","-",$fecha);
    $fecha = date('Y/m/d',strtotime($fecha));
    $hoy = date('Y/m/d');
    $edad = $hoy - $fecha;
    return $edad;
    }

            ?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?php echo($aplicacion);  ?></title>
    
    <!-- CALENDARIO -->
    <script src="Script/jquery-1.4.1.min.js" type="text/javascript"></script>
  <script src="Scripts/jquery-1.4.1.min.js" type="text/javascript"></script> 
    <script src="Script/jquery.dynDateTime.min.js" type="text/javascript"></script>
    <script src="Scripts/jquery.dynDateTime.min.js" type="text/javascript"></script>   
    <script src="Script/calendar-en.min.js" type="text/javascript"></script>
    <link href="Styles/calendar-blue.css" rel="stylesheet" type="text/css" />
     <link href="Styles/calendar-blue.css" rel="stylesheet" type="text/css" /> 

   
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
     
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet"/>

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet"/>

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

   
 
    <style type="text/css">

        body *
{
	text-shadow: none;
    margin-left: 0px;
    margin-right: 0px;
}
        .style2
        {
            width: 200px;
        }
        .style3
        {
            width: 250px;
        }
    </style>



</head>

<body>

    <form id="form1" runat="server">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button> 
                <a class="navbar-brand" href=" "> <?php echo "$aplicacion"; ?></a>
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
                        <a href="Default.aspx"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
                    </li>
                    <li>
                        <a href="Wbfrmvisor_hc.aspx"><i class="fa fa-fw fa-bar-chart-o"></i> Visor de Pacientes</a>
                    </li>
                    <li>
                        <a href="WbfrmAdmisionPaciente.aspx"><i class="fa fa-fw fa-table"></i> Admision de Pacientes</a>
                    </li>
                    <li>
                        <a href="WbFrmEvolucion.aspx"><i class="fa fa-fw fa-edit"></i> Notas de Evolucion</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Modificar Elemento</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Configuracion</a>
                    </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
             </div>
                <!-- /.sidebar-collapse -->
          
        </nav>
          </div>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Bienvenido : <?php echo($razon_Social);  ?> <small>.</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> <%= Session("nombre")%> 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <?php echo($hoy);  ?> <class="alert-link">
                        </div>
                    </div>

                    &nbsp;<br />
                    <br />
                
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Busqueda de Paciente
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Historia Clinica</th>
                                        <th>Nombre del Paciente</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Edad</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                <?php 

                                $sqlpaciente = "SELECT * FROM `tbpaciente`";
           $querypaciente = mysqli_query($conexion,$sqlpaciente);
           while ($validacion_paciente=mysqli_fetch_array($querypaciente))
            {
               
                
                    echo'<tr  class="odd gradeX" >';   
                   // echo' <td class="boton">seleccionar</td>';
                        echo' <td>'.$validacion_paciente["id"].'</td>';
                         echo' <td>'.$validacion_paciente["apellido_paterno"].' '.$validacion_paciente["apellido_materno"].' '.$validacion_paciente["primer_nombre"].' '.$validacion_paciente["segundo_nombre"].'</td>';
                    echo' <td>'.$validacion_paciente["fecha_nacimiento"].'</td>';
                    echo' <td>'.edad($validacion_paciente["fecha_nacimiento"]).'</td>';
                    
                                        echo' </tr>';
            
                    
            }    
         

                                ?>
                               
                                    
                                   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                &nbsp;<%--<asp:ScriptManager ID="ScriptManager1" runat="server">
                    </asp:ScriptManager>--%>
                    <br />
                <div class="col-lg-12">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            Ingreso de Paciente
                        </div>
                        <div align="center" >
                            <!-- /.row (nested) -->
                                                       <table width= "100%">
                                <tr>
                                    <td class="style22">
                                                                    <%=Session("nombre") %>
                                                                <div id="popupPaciente">
                                                                    &nbsp;<img src="Handler1.ashx" /><br />
                                                                    <asp:FileUpload ID="FileUpload1" runat="server" />
                                                                    <br />
                                                                    <asp:ImageButton ID="ImageButton5" runat="server" Height="27px" 
                                                                        ImageUrl="~/Imagenes/AddRow.png" Width="26px" />
                                                                    <br />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="style2">
                                        <%--  <asp:UpdatePanel ID="UpdatePanel1" runat="server" >
                                            <ContentTemplate>--%>
                                            <div align="center" >
                                                <table width = "100%">
                                                    <tr>
                                                        <td class="style26" colspan="4">
                                                            <caption>
                                                                Información General del Paciente</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        Historia Clinica</td>
                                                                    <td class="style28" colspan="3">
                                                                        
                                                                        <asp:TextBox ID="TxtHC" runat="server"   
                                                                             TabIndex="1" Width="100%" class="form-control" ReadOnly="True"></asp:TextBox>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        Apellidos Paterno</td>
                                                                    <td class="style28" colspan="3">
                                                                        <asp:TextBox ID="TxtApellido_Paterno" runat="server" 
                                                                              TabIndex="2" Width="100%" class="form-control" placeholder="Apellidos Paterno"></asp:TextBox>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        Apellido Materno
                                                                    </td>
                                                                    <td class="style28" colspan="3">
                                                                        <asp:TextBox ID="TxtApellido_Materno" runat="server" 
                                                                            TabIndex="3" Width="100%" class="form-control"
                                                                             placeholder="Apellido Materno"></asp:TextBox>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        Primer Nombre</td>
                                                                    <td class="style28" colspan="3">
                                                                        <asp:TextBox ID="TxtPrimer_Nombre" runat="server" 
                                                                              TabIndex="4" Width="100%" class="form-control"
                                                                               placeholder="PRIMER NOMBRE"></asp:TextBox>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        Segundo Nombre</td>
                                                                    <td class="style28" colspan="3">
                                                                        <asp:TextBox ID="TxtSegundo_Nombre" runat="server" 
                                                                             TabIndex="5" Width="100%" class="form-control"
                                                                              placeholder=""></asp:TextBox>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <%--  FECHA NACIMEINT
--%>
                                                                    <td class="style3">
                                                                        Fecha de Nacimiento</td>
                                                                    <td class="style28" colspan="3">
                                                                    &nbsp;<%--   <DateTime:DateTimePicker ID="DateTimePicker" runat="server" ClientIDMode="Inherit" 
                                                                            Visible="True" />--%><div id="Div1" class="input-append date">
                                                            <asp:TextBox ID="txtDateTime"  runat="server" TextMode="Date"></asp:TextBox>
                                    
                                                                            <asp:CheckBox ID="chkmodificarnacimiento" runat="server" />
&nbsp;</span><div>
                                                                                <%--    <input type="text" id="Text1">
                                                                        <input type="text" id="datepicker" runat="server"/>--%>
                                                                                <asp:Label ID="lblfechanacimiento" runat="server" Text="."></asp:Label>
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        Direccion</td>
                                                                    <td class="style28" colspan="3">
                                                                        <asp:TextBox ID="TxtDireccion" runat="server" 
                                                                              Width="100%" class="form-control"
                                                                               placeholder="DIRECCION"></asp:TextBox>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        Genero</td>
                                                                    <td class="style28" colspan="3">
                                                                        <asp:DropDownList ID="DrpGenero" runat="server"  ViewStateMode="Enabled" Width="100%" class="form-control">
                                                                        </asp:DropDownList>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        Nacionalidad</td>
                                                                    <td class="style28" colspan="3">
                                                                        <asp:DropDownList ID="DrpNacionalidad" runat="server" Font-Bold="True" 
                                                                            Width="100%" class="form-control">
                                                                        </asp:DropDownList>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        &nbsp;</td>
                                                                    <td class="style28" colspan="3">
                                                                        &nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        Lugar de Nacimiento</td>
                                                                    <td class="style28" colspan="3">
                                                                        <asp:TextBox ID="TxtLugar_Nacimiento" runat="server"   Width="100%" class="form-control"
                                                                         placeholder="LUGAR DE NACIMIENTO"></asp:TextBox>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        Telefono</td>
                                                                    <td class="style28" colspan="3">
                                                                        <asp:TextBox ID="txtelefono" runat="server"  Width="100%" class="form-control"
                                                                         placeholder="TELEFONO"></asp:TextBox>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        Estado Civil</td>
                                                                    <td class="style28" colspan="3">
                                                                        <asp:DropDownList ID="ddlestadocivil" runat="server"   Width="100%" class="form-control"
                                                                        >
                                                                        </asp:DropDownList>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        Cultura Etnica</td>
                                                                    <td class="style28" colspan="3">
                                                                        <asp:DropDownList ID="DrpCultura_Etnica" runat="server"   Width="100%" class="form-control"
                                                                         placeholder="Apellido Materno">
                                                                        </asp:DropDownList>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style17" colspan="4" style="border-style: solid">
                                                                        INFORMACION DEL REPRESENTANTE</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        PRIMER REPRESENTANTE</td>
                                                                    <td class="style25" colspan="3">
                                                                        <asp:TextBox ID="TxtApellido_Pat_Afi" runat="server"   Width="100%" class="form-control"
                                                                         placeholder="PRIMER REPRESENTANTE"></asp:TextBox>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        SEGUNDO REPRESENTANTE</td>
                                                                    <td class="style25" colspan="3">
                                                                        <asp:TextBox ID="TxtPrimer_Nombre_Afi" runat="server"  Width="100%" class="form-control"
                                                                         placeholder="SEGUNDO REPRESENTANTE"></asp:TextBox>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        &nbsp;</td>
                                                                    <td class="style18" colspan="3">
                                                                        &nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        &nbsp;</td>
                                                                    <td class="style28">
                                                                    </td>
                                                                    <td class="style31">
                                                                        &nbsp;</td>
                                                                    <td>
                                                                        &nbsp;</td>
                                                                </tr>
                                                            </caption>
                                                </table>
                                                </div>
                                        <%-- </ContentTemplate>
                                        </asp:UpdatePanel>--%>
                                    </td>
                                </tr>
                            </table>
                            </div>
                            <br />
                            <div align="center">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <asp:ImageButton ID="btnnuevo" runat="server" Height="51px" 
                                            ImageUrl="~/Imagenes/Nuevo32x32.png" Width="53px" />
                                    </td>
                                    <td>
                                        <asp:ImageButton ID="btnguardar" runat="server" Height="51px" 
                                            ImageUrl="~/Imagenes/Guardar32x32.png" Width="53px" />
                                    </td>
                                    <td>
                                        <asp:ImageButton ID="btnmodificar" runat="server" Height="51px" 
                                            ImageUrl="~/Imagenes/Actualizar32x32.png" Width="53px" />
                                    </td>
                                </tr>
                            </table>
                            </div>
                        </div>

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                </div>
                <!-- /.row -->

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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    </form>

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
    </script>
</body>

</html>