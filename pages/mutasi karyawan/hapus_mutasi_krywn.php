<?php

include "../include/koneksi.php";

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

$id= $_GET['kode_mutasi'];
$query = mysqli_query($sambung, "delete from mutasi_krywn WHERE kode_mutasi='$id'");
if ($query) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; '>";
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";
		echo "<meta http-equiv='refresh' content='0; '>";
	}

header('location:mutasi_krywn.php');
?>