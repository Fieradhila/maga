<?php

include "../../include/koneksi.php";

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

$id= $_GET['id_nilai'];
$u=mysqli_query($sambung, "SELECT * FROM penilaian_krywn WHERE id_nilai='$id'");
$us=mysqli_fetch_array($u);

				if(file_exists("../berkas_karyawan/file_sakit/".$us['file_sakit'])==1){	
				unlink("../berkas_karyawan/file_sakit/".$us['file_sakit']);
				$temp = explode(".", $_FILES["file_sakit"]["name"]);
				$namefilenikah = round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($_FILES["file_sakit"]["tmp_name"], "../berkas_karyawan/file_sakit/" . $namefilenikah);
				mysqli_query($sambung, "DELETE FROM penilaian_krywn WHERE id_nilai='$id'")  or die (mysqli_error());
				echo "<script>alert('Data Berhasil Dihapus')</script>";
				echo "<meta http-equiv='refresh' content='1 url=penilaian_krywn.php'>";
				//header("location:penilaian_krywn.php?pesan=oke");
			}
			else{
				header("location:penilaian_krywn.php?pesan=gagal1");
			}
?>