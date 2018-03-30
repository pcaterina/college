<?php
require('../PDF/fpdf.php');
class PDF extends FPDF
{
function Header()
{
    // Logo
	$this->Ln(30);
    $this->Image('../imagenes/logo.jpg',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
	$this->SetDrawColor(0,80,180);
    $this->SetFillColor(230,230,0);
    $this->SetTextColor(220,50,50);
    // Ancho del borde (1 mm)
    $this->SetLineWidth(1);
    
    // Título
    $this->Cell(80,10,'Alumnos Registrados',1,0,'C');
    // Salto de línea
    $this->Ln(30);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
	$this->SetTextColor(128);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
function LeerArchivo($file)
{
    // Leer las líneas del fichero
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}
function Tabla($header, $data)
{
    // Anchuras de las columnas
    $w = array(30,30,70,30,55,20,20,15);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],10,$header[$i],1,0,'C');
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        $this->Cell($w[0],10,$row[0],'LR');
        $this->Cell($w[1],10,$row[1],'LR');
		$this->Cell($w[2],10,$row[2],'LR');
		$this->Cell($w[3],10,$row[3],'LR');
        $this->Cell($w[4],10,$row[4],'LR');
		$this->Cell($w[5],10,$row[5],'LR');
        $this->Cell($w[6],10,$row[6],'LR');
        $this->Cell($w[7],10,$row[7],'LR',0,'R');
        $this->Ln(10);
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

}

$pdf = new PDF();
		
$header = array('Nombre', 'Apellido', 'Direccion', 'Telefono', 'E-mail','Edad', 'Sexo', 'Curso');
$data = $pdf->LeerArchivo('../archivoRegistros/usuarios.txt');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Tabla($header,$data);
$pdf->Output();

?>