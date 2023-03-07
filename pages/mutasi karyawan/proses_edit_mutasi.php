<?php ob_start();
include "../include/koneksi.php";
	
$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());
	$kode_mutasi = $_GET['kode_mutasi'];
	$tgl_mutasi = $_POST['tgl_mutasi'];
	$NIK = $_POST['NIK'];
	$nama_krywn = $_POST['nama_krywn'];
	$lokasi_lama = $_POST['lokasi_lama'];
	$lokasi_baru = $_POST['lokasi_baru'];
	$departement_lama = $_POST['departement_lama'];
    $departement_baru = $_POST['departement_baru'];
    $jabatan_lama = $_POST['jabatan_lama'];
    $jabatan_baru = $_POST['jabatan_baru'];
    $alasan = $_POST['alasan'];

	$simpan=mysqli_query($sambung, "UPDATE mutasi_krywn set kode_mutasi='$kode_mutasi', 
	tgl_mutasi='$tgl_mutasi', NIK='$NIK', nama_krywn='$nama_krywn', lokasi_lama='$lokasi_lama', lokasi_baru='$lokasi_baru', departement_lama='$departement_lama', departement_baru='$departement_baru', jabatan_lama='$jabatan_lama', jabatan_baru='$jabatan_baru', alasan='$alasan' where kode_mutasi='$kode_mutasi'") or die (mysqli_error());	

	header('location:mutasi_krywn.php');
?>