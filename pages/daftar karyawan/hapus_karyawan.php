<?php

include "../../include/koneksi.php";

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

$id= $_GET['NIK'];
$u=mysqli_query($sambung, "SELECT * FROM dftr_krywn WHERE NIK='$id'");
$us=mysqli_fetch_array($u);

if(file_exists("../berkas_karyawan/file_foto/".$us['file_foto'])){
	unlink("../berkas_karyawan/file_foto/".$us['file_foto']);
	$temp = explode(".", $_FILES["file_foto"]["name"]);
	$namefilefoto = round(microtime(true)) . '.' . end($temp);
	move_uploaded_file($_FILES["file_foto"]["tmp_name"], "../berkas_karyawan/file_foto/" . $namefilefoto);
		if(file_exists("../berkas_karyawan/file_ktp/".$us['file_ktp'])){
		unlink("../berkas_karyawan/file_ktp/".$us['file_ktp']);
		$temp = explode(".", $_FILES["file_ktp"]["name"]);
		$namefilektp = round(microtime(true)) . '.' . end($temp);
		move_uploaded_file($_FILES["file_ktp"]["tmp_name"], "../berkas_karyawan/file_ktp/" . $namefilektp);
			if(file_exists("../berkas_karyawan/file_kk/".$us['file_kk'])){
			unlink("../berkas_karyawan/file_kk/".$us['file_kk']);
			$temp = explode(".", $_FILES["file_kk"]["name"]);
			$namefilekk = round(microtime(true)) . '.' . end($temp);
			move_uploaded_file($_FILES["file_kk"]["tmp_name"], "../berkas_karyawan/file_kk/" . $namefilekk);
				if(file_exists("../berkas_karyawan/file_nikah/".$us['file_nikah'])){	
				unlink("../berkas_karyawan/file_nikah/".$us['file_nikah']);
				$temp = explode(".", $_FILES["file_nikah"]["name"]);
				$namefilenikah = round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($_FILES["file_nikah"]["tmp_name"], "../berkas_karyawan/file_nikah/" . $namefilenikah);
				mysqli_query($sambung, "DELETE FROM dftr_krywn WHERE NIK='$id'")  or die (mysqli_error());
				echo "<script>alert('Data Berhasil Dihapus')</script>";
				echo "<meta http-equiv='refresh' content='1 url=daftar_krywn.php'>";
				//header("location:daftar_krywn.php?pesan=oke");
			}
			else{
				header("location:daftar_krywn.php?pesan=gagal1");
			}
		}else{
			header("location:daftar_krywn.php?pesan=gagal2");
		}
	}else{
		header("location:daftar_krywn.php?pesan=gagal3");
	}
}else{
	header("location:daftar_krywn.php?pesan=gagal4");
}
?>