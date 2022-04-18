<?php
session_start();
include("conexion.php");
conectar_bd();
?>
 
<?php
 //$datos2 ;

$perfil=$_SESSION['usuario_a'];

if ($perfil=='')

{
    header('Location: index.php');

}  


if(isset($_POST["id"]))
{
	
  $id = $_POST["id"];

   $id2 = $_POST["cod"];
   // $farmacos = $_POST["farmaco"];
   // $unidades = $_POST["unidades"];
   // $prescripcion = $_POST["prescripcion"];


  // echo "$id";
  // echo "  COD ";
  // echo "$id2";
 //CONSULTADIAGNOSTICO
 if ($id2 == 1 )
 {
        	$sql = "SELECT * FROM `tbdiagnostico` where codigo  = '".$id."'";
        	$result = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($result) > 0) {
        			 while($row = mysqli_fetch_assoc($result)) 

        			 {
        			 	?>

         
                    
                                                  <div class="form-group">
                                                        <label for="disabledSelect"></label>
                                                        <input class="form-control" id="hc" name="hc" type="text" placeholder="Historia Clinica" disabled="" value="<?php echo($row["descripcion"]); ?>">
                                                    </div>
                                                
        			 	<?php
        			 	
        						 		 	
        					 
        			}

        		} 
                 
                  else
                  {
                    ?>
                    <div class="form-group">
                                                                        <label for="disabledSelect"></label>
                                                                        <input class="form-control" id="hc" name="hc" type="text" placeholder="Historia Clinica" disabled="" value="NO EXISTE">
                                                                    </div>
                  <?php
         }

          }

    




   

     
}

?>


