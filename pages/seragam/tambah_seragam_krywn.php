<?php ob_start();
include "../../include/koneksi.php";

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

	$NIK = $_POST['NIK'];
	$id_seragam = $_POST['id_seragam'];

    mysqli_query($sambung, "INSERT INTO peminjaman (NIK,id_seragam) values 
	('$NIK','$id_seragam')")  or die (mysqli_error());

	//mysqli_query($sambung, "INSERT INTO pengembalian (id,id_seragam) values ('','$id_seragam,$id_seragam,$id_seragam,$id_seragam')");
	
	echo "<script>alert('Data Berhasil Disimpan')</script>";
	echo "<meta http-equiv='refresh' content='1 url=peminjaman.php'>";
?>