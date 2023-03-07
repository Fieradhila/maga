<?php
// memanggil library FPDF
require('../../fpdf185/fpdf.php');
include '../../include/koneksi.php';
$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('L','mm','legal');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(350  ,10,'DATA MUTASI KARYAWAN',0,0,'C');
$pdf->Image('../../image/logo.png',10,6,30);
$pdf->Ln();
$tgl= "Date : ".date("l, d F Y");

//font tgl
$pdf->SetFont('times','i','9');
$pdf->Cell(0, 10, $tgl, '0', 1, 'P');
 
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(25,7,'TGL MUTASI' ,1,0,'C');
$pdf->Cell(20,7,'NIK',1,0,'C');
$pdf->Cell(40,7,'NAMA KARYAWAN',1,0,'C');
$pdf->Cell(30,7,'LOKASI LAMA',1,0,'C');
$pdf->Cell(30,7,'LOKASI BARU',1,0,'C');
$pdf->Cell(40,7,'DEPARTEMENT LAMA',1,0,'C');
$pdf->Cell(40,7,'DEPARTEMENT BARU',1,0,'C');
$pdf->Cell(30,7,'JABATAN LAMA',1,0,'C');
$pdf->Cell(30,7,'JABATAN BARU',1,0,'C');
$pdf->Cell(40,7,'ALASAN',1,0,'C');
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($sambung,"SELECT  * FROM mutasi_krywn");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(25,6, $d['tgl_mutasi'],1,0);
  $pdf->Cell(20,6, $d['NIK'],1,0);  
  $pdf->Cell(40,6, $d['nama_krywn'],1,0);
  $pdf->Cell(30,6, $d['lokasi_lama'],1,0);
  $pdf->Cell(30,6, $d['lokasi_baru'],1,0);
  $pdf->Cell(40,6, $d['departement_lama'],1,0);
  $pdf->Cell(40,6, $d['departement_baru'],1,0);
  $pdf->Cell(30,6, $d['jabatan_lama'],1,0);
  $pdf->Cell(30,6, $d['jabatan_baru'],1,0);
  $pdf->Cell(40,6, $d['alasan'],1,1);
}
 
$pdf->Output();
 
?>