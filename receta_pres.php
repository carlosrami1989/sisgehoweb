<?php 
session_start();

 include("conexion.php");
conectar_bd();

$perfil=$_SESSION['usuario_a'];

if ($perfil=='')

{
    header('Location: index.php');

}  

$id=$_REQUEST['id'];

$sqlpaciente = "SELECT d.id, d.fecha_ingreso,concat( p.apellido_paterno,' ' , p.apellido_materno,' ' ,p.primer_nombre,' ' ,p.segundo_nombre) as 'paciente', 
d.principal, d.asociado , p.id as 'id_paciente', d.observacion, di.descripcion as 'des_s' FROM tbconsultaexternadiagnosticos d, tbpaciente p, tbdiagnostico di 
where d.paciente = p.id and d.principal = di.codigo and d.id ='".$id."'";
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
                 $cod_diagnostico2 =$row_paciente["asociado"];
                 $des_diag = $row_paciente["des_s"];
               }
               }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
        <head id="Head1" runat="server"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title></title>
            <style type="text/css">
            .border{
                  border: solid 1px ;
                }
                .style1
                {
                    width: 100%;
                }
                .style3
                {            height: 31px;
                }
                .style8
                {
                    width: 829px;
                }
                .style9
                {
                    width: 200px;
                }
                .style12
                {
                    width: 1px;
                }
                .style15
                {
                    width: 580px;
                    height: 31px;
                }
                .style17
                {
                    height: 16px;
                }
                .style18
                {
                    width: 600px;
                    height: 16px;
                }
                .style19
                {
                    width: 314px;
                    height: 30px;
                }
                .style20
                {
                    width: 829px;
                    height: 30px;
                }
                .style21
                {
                    width: 300px;
                    height: 36px;
                }
                .style22
                {
                    width: 829px;
                    height: 36px;
                }
                #form1
                {
                    width: 1014px;
                }
                .style23
                {
                    width: 100px;
                    height: 31px;
                }
                .style24
                {
                    width: 1px;
                }
            </style>
        </head>

        <BODY>  
            <form id="form1"  >
        <div>
        <!-- Aqui va todo lo chachi -->  


            <table  class="style1" 
                style="border-style: solid; border-width: medium; " >
                <tr>
                    <td class="style24" style="font-weight: bold" align="center" rowspan="3">
                      <img src="imagenes/logo1.png" style="height:100px;width:200px">
                        
                        </td>
                    <td class="style23" style="font-weight: bold" align="center">
                        Dr. Nixon Rivas Delgado</td>
                    <td wclass="style12" style="font-weight: bold"  rowspan="3">
                 
                   
                    </td>
                    <td width="50" rowspan="3" align="center"   style="font-weight: bold">
                        <img src="imagenes/logo1.png" style="height:100px;width:200px"  >
                    </td>
                   
                    <td   style="font-weight: bold" align="center">

                        Dr. Nixon Rivas Delgado</td>
                </tr>
                <tr>
                    <td class="style18" style="font-weight: bold" align="center">
                      Pediatra Nutriólogo Infantil </td>
                    <td class="style17" style="font-weight: bold" align="center">
                      Pediatra Nutriólogo Infantil </td>
                </tr>
                <tr>
                    <td class="style23" style="font-weight: bold" align="center">
                        MSP.L.1E.FOLIO VI. N18
                        <br />
                        REGISTRO SANITARIO 5928
                        <br />
                        Teléfono Para Agendamiento 0991602657<br />
                        Teléfono Personal 0988569508 <br />
                       <p style="color:blue;"> https://www.drnixonrivas.com/ </p></td>
                    <td class="style15" style="font-weight: bold" align="center">
                        MSP.L.1E.FOLIO VI. N18
                        <br />
                        REGISTRO SANITARIO 5928
                        <br />
                         Teléfono Para Agendamiento 0991602657<br />
                        Teléfono Personal 0988569508<br />
                        <b>N° Receta:  <?php echo "$id_atencion"; ?></b>
                    <p style="color:blue;"> https://www.drnixonrivas.com/ </p></td>
                </tr>
                <tr>
                    <td class="style19" style="font-weight: bold" align="left" colspan="3">
                       Fecha: <?php echo "$fecha_ingreso"; ?> <br/>  Nombre :

                     </td>
                    <td class="style20"  style="font-weight: bold" align="left" colspan="2">
                        Fecha:<?php echo "$fecha_ingreso"; ?> <br/>  Nombre :</td>
                </tr>
                <tr>
                    <td class="style21"   colspan="3">
                        <input type="text" style="width:98%" name="" value='<?php echo "$des_paciente"; ?> '            class="border" >

                        <br/>
                         <br/>
                      <b >    Rp.</b>
                      
                        <?php 

                        $sqlpres = "SELECT * FROM `tbconsultaexternaevolucionprescripcion`  where consulta_externa = '".$id."'";
                  $result_pres = mysqli_query($conexion, $sqlpres);
                    if (mysqli_num_rows($result_pres) > 0) 
                    {
                         echo " <textarea name='Text1' style='width:98%;text-align:left;'  rows='25'>";
                       while($row_pres = mysqli_fetch_assoc($result_pres)) 
                      
                       {
                        echo  'MEDICINA: '.utf8_decode($row_pres["descripcion_far"]).chr(10).'CANTIDAD: '.$row_pres["numero"].chr(10).chr(10);
                        
                       }
                        echo "</textarea>";
                       }

                        ?>
                       <input type="text" style="width:98%" name="" value='Diagnostico Principal:<?php echo "$cod_diagnostico1"." - "."$des_diag"; ?> '  >
                     
                    </td>
                    <td class="style22" style="font-weight: bold" align="left" colspan="3">
                       <input type="text" style="width:100%" name="" value='<?php echo "$des_paciente"; ?> '            class="border" >
                        <br/>
                         <br/>
                         
                         <b> Indicaciones:</b>
                          
                    <?php 

                        $sqlpres = "SELECT * FROM `tbconsultaexternaevolucionprescripcion`  where consulta_externa = '".$id."'";
                  $result_pres = mysqli_query($conexion, $sqlpres);
                    if (mysqli_num_rows($result_pres) > 0)
                     {
                          echo " <textarea name='Text1' style='width:100%;text-align:left;'  rows='25'>";
                       while($row_pres = mysqli_fetch_assoc($result_pres)) 

                       {
                      echo "INDICACIONES: ".$row_pres["observacion"].chr(10).chr(10).chr(10);
                        
                       }
                        echo "</textarea>";
                       }

                        ?>
                      <input type="text" style="width:98%" name="" value='dfsdfsdfsd'             >
                    </td>

                </tr>

                <tr>

                   
                </tr>

                </table>
           
            </div>
            </form>
        </BODY> 
</html>
