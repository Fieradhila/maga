<?php
// memanggil library FPDF
require('../../fpdf185/fpdf.php');
include '../../include/koneksi.php';
$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('L','mm','legal');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(350  ,10,'DATA KARYAWAN',0,0,'C');
$pdf->Image('../../image/logo.png',10,6,30);
$pdf->Ln();
$tgl= "Date : ".date("l, d F Y");

//font tgl
$pdf->SetFont('times','i','9');
$pdf->Cell(0, 10, $tgl, '0', 1, 'P');
 
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(20,7,'NIK' ,1,0,'C');
$pdf->Cell(35,7,'ID',1,0,'C');
$pdf->Cell(35,7,'NAMA KARYAWAN',1,0,'C');
$pdf->Cell(20,7,'TGL LAHIR',1,0,'C');
$pdf->Cell(30,7,'STATUS NIKAH',1,0,'C');
$pdf->Cell(35,7,'ALAMAT',1,0,'C');
$pdf->Cell(20,7,'GENDER',1,0,'C');
$pdf->Cell(25,7,'PENDIDIKAN',1,0,'C');
$pdf->Cell(20,7,'AGAMA',1,0,'C');
$pdf->Cell(30,7,'NO. HP',1,0,'C');
$pdf->Cell(20,7,'TGL MASUK',1,0,'C');
$pdf->Cell(20,7,'JABATAN',1,0,'C');
$pdf->Cell(20,7,'CABANG',1,0,'C');


$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($sambung,"SELECT  * FROM dftr_krywn WHERE cabang='MAGA 4' ");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(20,6, $d['NIK'],1,0);
  $pdf->Cell(35,6, $d['ID'],1,0);
  $pdf->Cell(35,6, $d['nama_krywn'],1,0);
  $pdf->Cell(20,6, $d['tgl_lahir'],1,0);
  $pdf->Cell(30,6, $d['status_nikah'],1,0);
  $pdf->Cell(35,6, $d['alamat'],1,0);
  $pdf->Cell(20,6, $d['gender'],1,0);
  $pdf->Cell(25,6, $d['pendidikan'],1,0);
  $pdf->Cell(20,6, $d['agama'],1,0);
  $pdf->Cell(30,6, $d['no_hp'],1,0);
  $pdf->Cell(20,6, $d['tgl_masuk'],1,0);
  $pdf->Cell(20,6, $d['jabatan'],1,0);
  $pdf->Cell(20,6, $d['cabang'],1,1);
  
}
 
$pdf->Output();
 
?>