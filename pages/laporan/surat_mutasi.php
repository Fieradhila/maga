<?php
require('../../fpdf185/fpdf.php');

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());
$kd = $_GET['kode_mutasi'];
$Lapor = "SELECT * FROM mutasi_krywn WHERE kode_mutasi='$kd' ";
$Hasil = mysqli_query($sambung, $Lapor);
while($row = mysqli_fetch_array($Hasil)){
    $kode_mutasi = $row["kode_mutasi"];
    $nama_krywn = $row["nama_krywn"];

    //$Body=array($kode_mutasi);
}

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../../image/logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Surat Mutasi Karyawan',0,0,'C');
    // Line break
    $this->Ln(20);
}

function Body(){
    
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
//Cell('width', 'height', 'txt', 'border', 'ln', 'align', 'fill', 'link');
$pdf->Cell(0,20,'No                        :  ','0',0,1);
$pdf->SetY(40);
$pdf->setX(10);
$pdf->Cell(0,15,'Hal                       :  ','0',2,1);
$pdf->SetY(48);
$pdf->Cell(0,15,'Lamp                    :  ','0',2,1);
$pdf->setX(10);
$pdf->Cell(0, 35,"Kepada Sdr/i.,");
$pdf->SetX(10);
$pdf->Cell(0, 80,"Assalamu'alaikum,");
$pdf->Cell(0, 0,"Dengan Hormat,");

$pdf->Output();
?>