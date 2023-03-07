<?php ob_start();
include "../../include/koneksi.php";

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

	$kode_mutasi = $_POST['kode_mutasi'];
	$tgl_mutasi = $_POST['tgl_mutasi'];
	$NIK = $_POST['NIK'];
	$nama_krywn = $_POST['nama_krywn'];
	$lokasi_lama = $_POST['lokasi_lama'];
	$departement_lama = $_POST['departement_lama'];
	$jabatan_lama = $_POST['jabatan_lama'];
	$lokasi_baru = $_POST['lokasi_baru'];
	$departement_baru = $_POST['departement_baru'];
	$jabatan_baru = $_POST['jabatan_baru'];
	$alasan = $_POST['alasan'];

    mysqli_query($sambung, "INSERT INTO mutasi_krywn (kode_mutasi,tgl_mutasi,NIK,nama_krywn,lokasi_lama,departement_lama,jabatan_lama,lokasi_baru,departement_baru,jabatan_baru, alasan) values 
	('$kode_mutasi','$tgl_mutasi','$NIK','$nama_krywn','$lokasi_lama','$departement_lama','$jabatan_lama','$lokasi_baru','$departement_baru','$jabatan_baru','$alasan')")  or die (mysqli_error());

	mysqli_query($sambung, "UPDATE dftr_krywn SET jabatan='$jabatan_baru', cabang='$lokasi_baru', departement='$departement_baru' where NIK='$NIK'") or die (mysqli_error());
	
	header('location:mutasi_krywn.php');
?>