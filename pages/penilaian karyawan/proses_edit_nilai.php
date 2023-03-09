<?php ob_start();
include "../../include/koneksi.php";
	
$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());
	$id_nilai = $_GET['id_nilai'];
	$NIK = $_POST['NIK'];
	$jumlah_sakit = $_POST['jumlah_sakit'];
	$tgl_sakit = $_POST['tgl_sakit'];
	$keterangan_sakit = $_POST['keterangan_sakit'];
	$file_sakit = $_FILES['file_sakit']['name'];
	$jumlah_izin = $_POST['jumlah_izin'];
	$wkt_izin_dari = $_POST['wkt_izin_dari'];
	$wkt_izin_smp = $_POST['wkt_izin_smp'];
	$keterangan_izin = $_POST['keterangan_izin'];
	$jumlah_libur = $_POST['jumlah_libur'];

	
	$u=mysqli_query($sambung, "SELECT * from penilaian_krywn where NIK='$NIK'");
	$us=mysqli_fetch_array($u);
	if(file_exists("../berkas_karyawan/file_sakit/".$us['file_sakit'])){
		//unlink("../berkas_karyawan/file_sakit/".$us['file_sakit']);
		$temp = explode(".", $_FILES["file_sakit"]["name"]);
		$namefilesakit = round(microtime(true)) . '.' . end($temp);
		move_uploaded_file($_FILES["file_sakit"]["tmp_name"], "../berkas_karyawan/file_sakit/" . $namefilesakit);;
		mysqli_query($sambung, "UPDATE penilaian_krywn SET NIK='$NIK', jumlah_sakit='$jumlah_sakit', tgl_sakit='$tgl_sakit',
															keterangan_sakit='$keterangan_sakit', file_sakit='$namefilesakit',
															jumlah_izin='$jumlah_izin', wkt_izin_dari='$wkt_izin_dari',
															wkt_izin_smp='$wkt_izin_smp', keterangan_izin='$keterangan_izin',
															jumlah_libur='$jumlah_libur' WHERE id_nilai='$id_nilai'");
		echo "<script>alert('Data Berhasil Diedit')</script>";
		echo "<meta  http-equiv='refresh' content='1 url=penilaian_krywn.php?berhasil1'>";
	}elseif($us['file_sakit']){
		mysqli_query($sambung, "UPDATE penilaian_krywn SET NIK='$NIK', jumlah_sakit='$jumlah_sakit', tgl_sakit='$tgl_sakit',
															keterangan_sakit='$keterangan_sakit', file_sakit='$file_sakit',
															jumlah_izin='$jumlah_izin', wkt_izin_dari='$wkt_izin_dari',
															wkt_izin_smp='$wkt_izin_smp', keterangan_izin='$keterangan_izin',
															jumlah_libur='$jumlah_libur' WHERE id_nilai='$id_nilai'");
		echo "<script>alert('Data Berhasil Diedit')</script>";
		echo "<meta  http-equiv='refresh' content='1 url=penilaian_krywn.php?berhasil1'>";
	}elseif(empty($file_sakit)){
		mysqli_query($sambung, "UPDATE penilaian_krywn SET NIK='$NIK', jumlah_sakit='$jumlah_sakit', tgl_sakit='$tgl_sakit', 
																		keterangan_sakit='$keterangan_sakit',
																		file_sakit='$file_sakit',
																		jumlah_izin='$jumlah_izin',
																		wkt_izin_dari='$wkt_izin_dari',
																		wkt_izin_smp='$wkt_izin_smp',
																		keterangan_izin = '$keterangan_izin',
																		jumlah_libur='$jumlah_libur' where id_nilai='$id_nilai");
		echo "<script>alert('Data Berhasil Diedit')</script>";
		echo "<meta  http-equiv='refresh' content='1 url=penilaian_krywn.php?berhasil4'>";
	}
	else{
		header("location:penilaian_krywn.php?pesan=gagal1");
	}
?>