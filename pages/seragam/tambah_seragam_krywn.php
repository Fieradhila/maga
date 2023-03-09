<?php ob_start();
include "../../include/koneksi.php";

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

	
	$NIK = $_POST['NIK'];
	$id_seragam = $_POST['id_seragam'];
	$jumlah = count((array)$id_seragam);

	for ($i=0; $i < $jumlah; $i++) { 
		mysqli_query($sambung, "INSERT INTO peminjaman values ('', '$NIK', '$id_seragam[$i]')");
	}
		
	echo "<script>alert('Data Berhasil Disimpan')</script>";
	echo "<meta http-equiv='refresh' content='1 url=peminjaman.php'>";
?>