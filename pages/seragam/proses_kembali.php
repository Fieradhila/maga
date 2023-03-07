<?php ob_start();
include "../../include/koneksi.php";

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

	$NIK = $_POST['NIK'];
	$id = $_POST['id_seragam'];

    //mysqli_query($sambung, "INSERT INTO pengembalian (NIK,id) values ('$NIK','$id')");

mysqli_query($sambung, "DELETE from peminjaman where id_seragam='$id'");
	
	echo "<script>alert('Data Berhasil Disimpan')</script>";
	echo "<meta http-equiv='refresh' content='1 url=peminjaman.php'>";
?>