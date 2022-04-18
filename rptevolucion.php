<?php

 //include_once"consultas.php";
//ini_set("session.auto_start", 0);
	$server = 'Localhost';
	$user = 'drnixonrivas_admin';
	$password = 'sistemas@2018*';
	$database= 'drnixonrivas_sisgehoconsultaexterna2';
	$conexion = mysqli_connect($server,$user,$password,$database) or die("Un error occurri贸 durante la conexi贸n " . mysqli_error($conexion));
 //include_once"consultas.php";
//ini_set("session.auto_start", 0);

 require'fpdf/fpdf.php';
 session_start();

 

$id=$_REQUEST['id'];

$perfil=$_SESSION['usuario_a'];

if ($perfil=='')

{
    header('Location: index.php');

}  

//PACIENTE
$sqlpaciente = "SELECT d.id, d.fecha_ingreso,concat( p.apellido_paterno,' ' , p.apellido_materno,' ' ,p.primer_nombre,' ' ,p.segundo_nombre) as 'paciente', d.principal, d.asociado  , p.id as 'id_paciente', d.observacion FROM tbconsultaexternadiagnosticos d, tbpaciente p where d.paciente = p.id and d.id ='".$id."'";
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
                 $cod_diagnostico1 =$row_paciente["asociado"];
               }
               }

//Numero atencion
$sqlnumeroatencion = "select count(*) as total from tbconsultaexternadiagnosticos where paciente ='".$id_paciente."'";
          $result_numero = mysqli_query($conexion, $sqlnumeroatencion);
            if (mysqli_num_rows($result_numero) > 0) {
               while($row_numero = mysqli_fetch_assoc($result_numero)) 

               {
                $numero_atencion = $row_numero["total"];
                 
               }
               }




//select concat('medicina :',descripcion_far,' cantidad: ', numero, ' prescripcion: ', observacion) as 'des' from tbconsultaexternaevolucionprescripcion where consulta_externa = 884

               //Numero atencion
$sqlpres = "select concat('medicina :',descripcion_far,' cantidad: ', numero, ' prescripcion: ', observacion) as 'des' from tbconsultaexternaevolucionprescripcion where consulta_externa = '".$id."'";
          $result_pres = mysqli_query($conexion, $sqlpres);
            if (mysqli_num_rows($result_pres) > 0) {
               while($row_pres = mysqli_fetch_assoc($result_pres)) 

               {
                $des_prescripcion = $row_pres["des"];
                 
               }
               }

//conectar_bd();

  //echo "'$fecha_orden'";
 
class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
  //Set the array of column widths
  $this->widths=$w;
}

function SetAligns($a)
{
  //Set the array of column alignments
  $this->aligns=$a;
}

function Row($data)
{
  //Calculate the height of the row
  $nb=0;
  for($i=0;$i<count($data);$i++)
    $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
  $h=5*$nb;
  //Issue a page break first if needed
  $this->CheckPageBreak($h);
  //Draw the cells of the row
  for($i=0;$i<count($data);$i++)
  {
    $w=$this->widths[$i];
    $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
    //Save the current position
    $x=$this->GetX();
    $y=$this->GetY();
    //Draw the border
    
    $this->Rect($x,$y,$w,$h);

    $this->MultiCell($w,5,$data[$i],0,$a,'true');
    //Put the position to the right of the cell
    $this->SetXY($x+$w,$y);
  }
  //Go to the next line
  $this->Ln($h);
}

function CheckPageBreak($h)
{
  //If the height h would cause an overflow, add a new page immediately
  if($this->GetY()+$h>$this->PageBreakTrigger)
    $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
  //Computes the number of lines a MultiCell of width w will take
  $cw=&$this->CurrentFont['cw'];
  if($w==0)
    $w=$this->w-$this->rMargin-$this->x;
  $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
  $s=str_replace("\r",'',$txt);
  $nb=strlen($s);
  if($nb>0 and $s[$nb-1]=="\n")
    $nb--;
  $sep=-1;
  $i=0;
  $j=0;
  $l=0;
  $nl=1;
  while($i<$nb)
  {
    $c=$s[$i];
    if($c=="\n")
    {
      $i++;
      $sep=-1;
      $j=$i;
      $l=0;
      $nl++;
      continue;
    }
    if($c==' ')
      $sep=$i;
    $l+=$cw[$c];
    if($l>$wmax)
    {
      if($sep==-1)
      {
        if($i==$j)
          $i++;
      }
      else
        $i=$sep+1;
      $sep=-1;
      $j=$i;
      $l=0;
      $nl++;
    }
    else
      $i++;
  }
  return $nl;
}



function Footer()
{
  $this->SetY(-15);
  $this->SetFont('Arial','B',8);
  $this->Cell(100,10,'Dr. Nixon Rivas Delgado ',0,0,'L');

}

}
	
	// Creación del objeto de la clase heredada
	// $pdf = new PDF();
	// $pdf->AliasNbPages();
	// $pdf->AddPage();
	// $pdf->SetFont('Times','',12);
	// for($i=1;$i<=400;$i++)
 //        $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
	// $pdf->Output();


 /******/

$pdf = new PDF('P','mm',array(210,210));
 //$pdf = new PDF('L','mm',array(297,350));
 // $pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
// for($i=1;$i<=400;$i++)
 //        $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
//$pdf->Cell(100,10, $fecha_orden ,0,1,'L');
 $pdf->Image('imagenes/imagen_logo.jpeg', 0,22, 35 , 38,'JPEG');
 

   $pdf->Ln(15);
   $pdf->SetXY(35, 22);
 $pdf->Cell(35,10,'Dr. Nixon Rivas Delgado ',0,1,'L');
$pdf->SetFont('Arial','',10);
$y = $pdf->GetY();
$pdf-> SetY($y-5);
 $pdf->SetXY(35, 27);
$pdf->Cell(35,10,utf8_decode('Nutriólogo Pediatra Infantil'),0,1,'L');
$y = $pdf->GetY();
$pdf-> SetY($y-5);
 $pdf->SetXY(35, 32);	
$pdf->Cell(35,10,'MSP.L.1E.FOLIO VI. N18 ',0,1,'L');	
$y = $pdf->GetY();
$pdf-> SetY($y-5);
 $pdf->SetXY(35, 37);
$pdf->Cell(35,10,'REGISTRO SANITARIO 5928',0,1,'L');	
$y = $pdf->GetY();
$pdf-> SetY($y-5);
 $pdf->SetXY(35, 42);
$pdf->Cell(35,10,utf8_decode('Teléfonos 6046010 - 0988569508'),0,1,'L');	
$y = $pdf->GetY();
$pdf-> SetY($y+5);
 
//$pdf->Cell(280,10,$des_paciente,1,1,'C',1);
 
$y = $pdf->GetY();
$pdf-> SetY($y-15);

// $pdf->Cell(30,6,utf8_decode('INGREDIENTES'),1,0,'',1);
// $pdf->Cell(50,6,'CODIGO PRODUCTOR',1,0,'C',1);
// $pdf->Cell(60,6,utf8_decode('N° LOTE DE ORGIGEN'),1,0,'C',1);
// $pdf->Cell(40,6,'FECHA DE CADUCIDAD',1,0,'C',1);
// $pdf->Cell(55,6,'CANDITDAD UTILIZADA',1,1,'C',1);
// $pdf->Cell(45,6,'U',1,1,'C',1);
// $pdf->Cell(30,6,'CANTIDAD RESULTANTE',1,1,'C',1);
// $pdf->Cell(30,6,'U',1,1,'C',1);
// $pdf->Cell(70,6,utf8_decode('CANTIDAD SOBRANTE'),1,1,'C',1);
// $pdf->Cell(40,6,'U',1,1,'',1);
// $pdf->Cell(55,6,'DESPERDICIO',1,1,'C',1);
// $pdf->Cell(45,6,'U',1,1,'C',1);
// $pdf->Cell(30,6,'NUMERO DE LOTE ASIGNADO',1,1,'C',1);
  
  $pdf->Ln(20);
 
  $pdf->SetWidths(array(60, 40, 30, 30, 30,30));
  $pdf->SetFont('Arial','B',8 );
  $pdf->SetFillColor(232,232,232);
   // $pdf->SetTextColor(255);

    for($i=0;$i<1;$i++)
      {
        $pdf->Row(array('NOMBRES Y APELLIDOS', 'NUMERO DE ATENCION', 'SEXO','N HOJA','N HC'));
      }
//$i = 1;
       $pdf->SetFillColor(255,255,255);
 //while ($validacion_menu2=mysqli_fetch_array($querymenu2))
  // {

         // $id_paciente = $row_paciente["id_paciente"];
         //         $des_paciente = $row_paciente["paciente"];
         //          $id_atencion = $row_paciente["id"];
         //        $cod_diagnostico1 =$row_paciente["principal"];
         //         $cod_diagnostico1 =$row_paciente["asociado"];




    $pdf->Row(array($des_paciente,  $numero_atencion, ' ',  '0',$id_paciente));
 // }
   $pdf->Ln(10);
    $pdf->SetWidths(array(20, 90, 80));
    $pdf->SetFont('Arial','B',8 );
    $pdf->SetFillColor(232,232,232);
    for($i=0;$i<1;$i++)
      {
        $pdf->Row(array('FECHA', 'EVOLUCION', 'PRESCRIPCION'));
      }
   $pdf->Ln(10);
 $pdf->SetFillColor(255,255,255);
    $pdf->Row(array($fecha_ingreso, $observacion ,$des_prescripcion));

$pdf->Output();
?>