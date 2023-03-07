<?php ob_start();
include "../../include/koneksi.php";

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

	$nama_seragam = $_POST['nama_seragam'];

    mysqli_query($sambung, "INSERT INTO seragam (id_seragam,nama_seragam) values 
	('','$nama_seragam')")  or die (mysqli_error());

	//mysqli_query($sambung, "INSERT INTO pengembalian (id,id_seragam) values ('','$id_seragam,$id_seragam,$id_seragam,$id_seragam')");
	
	echo "<script>alert('Data Berhasil Disimpan')</script>";
	echo "<meta http-equiv='refresh' content='1 url=dftr_fasilitas.php'>";
?>