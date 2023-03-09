<?php ob_start();
include "../../include/koneksi.php";

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

	$NIK = $_POST['NIK'];
	$id_seragam = $_POST['id_seragam'];
	$jumlah = count($id_seragam);

	for ($i=0; $i < $jumlah; $i++) { 
		mysqli_query($sambung, "DELETE from peminjaman where id_seragam='$id_seragam[$i]'");
	}

//mysqli_query($sambung, "DELETE from peminjaman where id_seragam='$id'");
	
	echo "<script>alert('Data Berhasil Disimpan')</script>";
	echo "<meta http-equiv='refresh' content='1 url=peminjaman.php'>";
?>