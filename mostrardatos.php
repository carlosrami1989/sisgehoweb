<?php
session_start();
include("conexion.php");
conectar_bd();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8_spanish_ci" />	
  	<meta name="viewport" content="width=device-width, initial-scale=1" />
  	<meta name="viewport" content="width=device-width, initial-scale=1" http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title></title>
	<style type="text/css">
.col-centrada{
    float: none;
    margin: 0 auto;
}
	</style>

</head>
<body>

</body>
</html>
<?php
$perfil=$_SESSION['usuario_a'];

if ($perfil=='')

{
    header('Location: index.php');

}  

if(isset($_POST["id"]))
{
	
  $id = $_POST["id"];

  echo "$id";
 


	$sql = "SELECT * FROM tbpaciente WHERE id = ".$id."";
	$result = mysqli_query($conexion, $sql);
	header("Content-Type: text/html;charset=utf-8");
		if (mysqli_num_rows($result) > 0) {
			 while($row = mysqli_fetch_assoc($result)) 

			 {
			 	?>

<div class="row">
                   <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Datos basico del Paciente
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post">
                                          <div class="form-group">
                                                <label for="disabledSelect">Historia Clinica</label>
                                                <input class="form-control" id="hc" name="hc" type="text" placeholder="Historia Clinica" disabled="" value="<?php echo($row["id"]); ?>">
                                            </div>
                                        <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <input id="txtapellidopaterno" type="text" class="form-control" placeholder="Apellido Paterno" required="required" value="<?php echo($row["apellido_paterno"]); ?>">
                                        </div>
                                         <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <input id="txtapellidomaterno" type="text" class="form-control" placeholder="Apellido Materno" required="required" value="<?php echo($row["apellido_materno"]); ?>">
                                        </div>
                                         <div class="form-group">
                                            <label>Primer Nombre</label>
                                            <input id="txtprimernombre" type="text" class="form-control" placeholder="Primer Nombre" required="required" value="<?php echo($row["primer_nombre"]); ?>">
                                        </div>
                                         <div class="form-group">
                                            <label>Segundo Nombre</label>
                                            <input id="txtsegundonombre" type="text" class="form-control" placeholder="Segundo Nombre" required="required" value="<?php echo($row["segundo_nombre"]); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Fecha de Nacimiento</label>
                                            <input id="txtfechanacimiento" type="Date" class="form-control" placeholder="Segundo Nombre" required="required" value="<?php echo($row["fecha_nacimiento"]); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input id="txttelefono" type="text" class="form-control" placeholder="Telefono" required="required" value="<?php echo($row["telefono"]); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Lugar de Nacimiento</label>
                                            <input id="txtlugarnacimiento" type="text" class="form-control" placeholder="Lugar de Nacimiento" required="required" value="<?php echo($row["lugar_nacimiento"]); ?>">
                                        </div>
                                            
                                         <div class="form-group">
                                            <label>Genero</label>
                                            <select class="form-control"  id="cmbgenero">
                                                 <?php
                                                
                                                $sqlmenu = "SELECT * FROM `tbgenero`";
                                                $querymenu = mysqli_query($conexion,$sqlmenu);
                                                while ($menus=mysqli_fetch_array($querymenu))
                                                {
                                                    echo '<option value='.$menus["codigo"].'>'.$menus["descripcion"].'</option>';
                                                }
                                                ?>
                                                
                                            </select>

                                            <script type="text/javascript">
                                                $(document).ready(function(){
                                                 
                                                  document.getElementById("cmbgenero").value = <?php echo json_encode($row["genero"]); ?>;

                                                }
                                                
                                            </script>
                                        </div>

                                        <div class="form-group">
                                            <label>Pais</label>
                                            <select class="form-control" id="cmbpais">
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
                                            <select class="form-control" id="cmbestado">
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
                                            <select class="form-control" id="cmbcultura">
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
 
                                        <div  align="center"  class="form-group" >
                                         <button type="submit" class="btn btn-primary btn-circle btn-xl" id="guardar">
                                            <i class="fa fa-check"></i></button>
                                            
                                         <button type="submit" class="btn btn-success btn-circle btn-xl" id="guardar">
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
			 	<?php
			 	
						 		 	
					 
			}

		} else {

				}
}	
