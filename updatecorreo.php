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
$id2=$_REQUEST['id2'];
$txtmail=$_REQUEST['txtmail'];

$sql = "UPDATE  `tbpaciente` SET `des_campo2` = '$txtmail'  WHERE `id` = '$id' ";
//$result=$conexion->query($sql);

//echo "$sql";
if (mysqli_query($conexion, $sql)) {
    //  $last_id = mysqli_insert_id($conexion);
    // echo "<script type='text/javascript'>window.location.href='evolucion.php?respuesta=Dato ingresado';</script>";
    // echo "New record created successfully. Last inserted ID is: " . $last_id;
    echo"<script type='text/javascript'>window.location.href='enviomail.php?id=$id2';</script>";
} else {


    //mysqli_error($conexion);
}