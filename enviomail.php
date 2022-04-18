<html lang="en">

<head><meta charset="gb18030">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> ENVIO DE CORREO</title>

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


</head>

<body>
<?php
// include QR_BarCode class
session_start();
include "QR_BarCode.php";


include("conexion.php");
conectar_bd();

$perfil=$_SESSION['usuario_a'];

if ($perfil=='')

{
    header('Location: index.php');

}

$id=$_REQUEST['id'];

$sqlpaciente = "SELECT d.id, d.fecha_ingreso,concat( p.apellido_paterno,' ' , p.apellido_materno,' ' ,p.primer_nombre,' ' ,
p.segundo_nombre) as 'paciente', d.principal as cod_principal,(select descripcion from tbdiagnostico where codigo =  d.principal) as principal, d.asociado  , p.id as 'id_paciente', d.observacion,p.des_campo2
 FROM tbconsultaexternadiagnosticos d, tbpaciente p where d.paciente = p.id and d.id ='".$id."'";
$resultpaciente = mysqli_query($conexion, $sqlpaciente);
if (mysqli_num_rows($resultpaciente) > 0) {
    while($row_paciente = mysqli_fetch_assoc($resultpaciente))

    {
        $fecha_ingreso = $row_paciente["fecha_ingreso"];
        $observacion = $row_paciente["observacion"];
        $id_paciente = $row_paciente["id_paciente"];
        $des_paciente = $row_paciente["paciente"];
        $id_atencion = $row_paciente["id"];
        $cod_diagnostico1 =$row_paciente["principal"];
        $codigo_p =$row_paciente["cod_principal"]; 
        $cod_diagnostico2 =$row_paciente["asociado"];
        $email =$row_paciente["des_campo2"];
    }
}

if ($email=='.')
{
    ?>
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <form action ="updatecorreo.php"  name="form1" method="post" enctype="multipart/form-data" class="form-horizontal">

                    <div class="form-group">
                       <h1>EL PACIENTE NO CUENTA CON CORREO, FAVOR INGRESAR</h1>
                        <input class="form-control" id="id" name="id" type="text" placeholder="Ingrese email"  step="any" style='display: none'  required="required" value="<?php echo $id_paciente; ?>">
                        <input class="form-control" id="id2" name="id2" type="text" placeholder="Ingrese email"  step="any" style='display: none'  required="required" value="<?php echo $id; ?>">
                        <input class="form-control" id="txtmail" name="txtmail" type="email" placeholder="Ingrese email"  step="any"  required="required" >
                    </div>
                    <div  align="center"  class="form-group" >

                            <button type="submit" class="btn btn-primary btn-circle btn-xl"  id="nuevo">
                                <i class="fa fa-check"></i></button>




                    </div>

                </form>
            </div>
            <!-- /.col-lg-6  fa-edit (nested) -->

        </div>
    </div>

    <hr>
<?php

}
else
{


function limpiarAsunto($asunto)
{
    $cadena = "Subject";
    $longitud = strlen($cadena) + 2;
    return substr(
        iconv_mime_encode(
            $cadena,
            $asunto,
            [
                "input-charset" => "UTF-8",
                "output-charset" => "UTF-8",
            ]
        ),
        $longitud
    );
}

$asunto = limpiarAsunto("Receta Medica - Dr. Nixon Rivas");
$destinatario = $email;

$encabezados = "MIME-Version: 1.0" . "\r\n";

# ojo, es una concatenación:
$encabezados .= "Content-type:text/html; charset=UTF-8" . "\r\n";
 
$w = 100;
$mensaje = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Dr. Nixon Rivas</title>
    <style type="text/css">
        h1{
            color: #0c0c0c;
        }
        p{
            font-size: 1rem;
        }
        img{
            width: 10rem;
            height: 10rem;
        }
    </style>
</head>
<body>
 
<img style="height: 10%;width: 20%" src="https://sisgeho.drnixonrivas.com/imagenes/logo1.png">

<h3 style="LINE-HEIGHT:5px">Paciente : '.$des_paciente.' </h3>
<h3 style="line-height:5px" >Fecha de Atencion : '.$fecha_ingreso.' </h3>
<h3 style="line-height:5px" >Codigo Diagnostico : '.$codigo_p.'-'.$cod_diagnostico1.' </h3>
<h3 style="line-height:5px" >N. de Receta : '.$id_atencion.' </h3>
<hr>
 
  <table  >
    <tr>
                <td >
                <b >Rp.</b>';
                            $sqlpres = "SELECT * FROM `tbconsultaexternaevolucionprescripcion`  where consulta_externa = '".$id."'";
                          $result_pres = mysqli_query($conexion, $sqlpres);
                            if (mysqli_num_rows($result_pres) > 0)
                            {
                              // $mensaje .=  "<br><textarea name='Text1' style='width:auto;text-align:left;border: none'  rows='25'>";
                               while($row_pres = mysqli_fetch_assoc($result_pres))

                               {
                                   $mensaje .=   '<br>MEDICINA: '.utf8_decode($row_pres["descripcion_far"]).chr(10).'CANTIDAD: '.$row_pres["numero"].chr(10).'<br>';

                               }
                               $mensaje .=  "<br>";
                               }


                    $mensaje .=   '</td>
        
                            <td style="width: 40pc"  >
                              <b> Indicaciones:</b>';


                                $sqlpres = "SELECT * FROM `tbconsultaexternaevolucionprescripcion`  where consulta_externa = '".$id."'";
                          $result_pres = mysqli_query($conexion, $sqlpres);
                            if (mysqli_num_rows($result_pres) > 0)
                             {
                              //   $mensaje .=   "<br> <textarea name='Text1' style='width:auto;text-align:left;'  rows='25'>";
                               while($row_pres = mysqli_fetch_assoc($result_pres))

                               {
                                   $mensaje .=   "<br>INDICACIONES: ".$row_pres["observacion"].chr(10).'<br>' ;

                               }$mensaje .=   "<br>";
                               }


                    $mensaje .=  '  </td>
      </tr>
     </table>
</body>';
//$mensaje = wordwrap($mensaje, 70, "\r\n");
/*$resultado = mail($destinatario, $asunto, $mensaje, $encabezados); #Mandar al final los encabezados
if ($resultado) {
    echo "Correo enviado";
} else {
    echo "Correo NO enviado";
}*/




$correoenviar = "http://consultas.drnixonrivas.com/index.php?id=".$id;

//echo $correoenviar;
// QR_BarCode object
$qr = new QR_BarCode();

// create text QR code
$qr->text($correoenviar);

// display QR code image
//$qr->qrCode();
// save QR code image
$qr->qrCode(250,'imagenes/'.$id.'.png');


$mensaje .= '<br>
<div align="center">
    <img style="width:10pc;height: 5pc" src="https://sisgeho.drnixonrivas.com/imagenes/firma.jpg"><br>
    <b>__________________________________</b><br>
    Dr. Nixon Rivas Delgado<br>
    Pediatra Nutriólogo Infantil<br>
    MSP.L.1E.FOLIO VI. N18<br>
    REGISTRO SANITARIO 5928<br>
    Teléfono Para Agendamiento 0991602657<br>
    Teléfono Personal 0988569508<br>
    <a href="https://www.drnixonrivas.com/">https://www.drnixonrivas.com/</a><br>
    <img src="https://sisgeho.drnixonrivas.com/imagenes/'.$id.'.png">

</div>';
 //  echo  $mensaje ;
//$mensaje = wordwrap($mensaje, 70, "\r\n");
$resultado = mail($destinatario, $asunto, $mensaje, $encabezados); #Mandar al final los encabezados
if ($resultado) {
   // echo "Correo enviado";
    ?>
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <form action ="receta_pres.php"  name="form1" method="post" enctype="multipart/form-data" class="form-horizontal">

            <div class="form-group">
                <H1>CORREO ENVIADO DE MANERA EXITOSA, PULSE PARA IMPRIMIR LA RECETA</H1>
                <input class="form-control" id="id" name="id" type="t|" placeholder="Ingrese email" style='display: none' step="any"  required="required" value="<?php echo $id;?>">
            </div>
            <div  align="center"  class="form-group" >
                <button type="submit" class="btn btn-primary btn-circle btn-xl"  id="nuevo">
                    <i class="fa fa-check"></i></button>



            </div>

        </form>
    </div>
</div>
</div>
<?php

} else {
    echo "Correo NO enviado";
}
}
?>
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
</body>
</html>


