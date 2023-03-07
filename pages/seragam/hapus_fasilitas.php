<?php ob_start();
include "../../include/koneksi.php";

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

	$id = $_GET['id_seragam'];

mysqli_query($sambung, "DELETE from seragam where id_seragam='$id'");
	
	echo "<script>alert('Data Berhasil Disimpan')</script>";
	echo "<meta http-equiv='refresh' content='1 url=dftr_fasilitas.php'>";
?>