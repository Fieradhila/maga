<?php ob_start();
include "../../include/koneksi.php";

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

$NIK = $_POST['NIK'];
$jumlah_sakit = $_POST['jumlah_sakit'];
$tgl_sakit = $_POST['tgl_sakit'];
$keterangan_sakit = $_POST['keterangan_sakit'];
$file_sakit = $_FILES['file_sakit']['name'];
$jumlah_izin = $_POST['jumlah_izin'];
$wkt_izin_dari = $_POST['wkt_izin_dari'];
$keterangan_izin = $_POST['keterangan_izin'];
$wkt_izin_smp = $_POST['wkt_izin_smp'];
$jumlah_libur = $_POST['jumlah_libur'];

$u=mysqli_query($sambung, "SELECT * FROM penilaian_krywn where NIK='$NIK'");
$us=mysqli_fetch_array($u);
if(empty($file_sakit)){
  mysqli_query($sambung, "INSERT INTO penilaian_krywn (NIK, jumlah_sakit, tgl_sakit, keterangan_sakit, file_sakit, jumlah_izin, wkt_izin_dari, wkt_izin_smp, keterangan_izin, jumlah_libur) values 
  ('$NIK','$jumlah_sakit','$tgl_sakit','$keterangan_sakit','$file_sakit','$jumlah_izin','$wkt_izin_dari','$wkt_izin_smp', '$keterangan_izin', '$jumlah_libur')")  or die (mysqli_error());
  echo "<script>alert('Data Berhasil Disimpan')</script>";
  echo "<meta http-equiv='refresh' content='1 url=penilaian_krywn.php'>";
}elseif(file_exists("../berkas_karyawan/file_sakit/")){
//unlink("../berkas_karyawan/file_sakit/".$us['file_sakit']);
$temp = explode(".", $_FILES["file_sakit"]["name"]);
$namefilesakit2 = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["file_sakit"]["tmp_name"], "../berkas_karyawan/file_sakit/" . $namefilesakit2);
  mysqli_query($sambung, "INSERT INTO penilaian_krywn (NIK, jumlah_sakit, tgl_sakit, keterangan_sakit, file_sakit, jumlah_izin, wkt_izin_dari, wkt_izin_smp, keterangan_izin, jumlah_libur) values 
			('$NIK','$jumlah_sakit','$tgl_sakit','$keterangan_sakit','$namefilesakit2','$jumlah_izin','$wkt_izin_dari','$wkt_izin_smp', '$keterangan_izin', '$jumlah_libur')")  or die (mysqli_error());
  echo "<script>alert('Data Berhasil Disimpan')</script>";
  echo "<meta http-equiv='refresh' content='1 url=penilaian_krywn.php'>";
}else{
	header("location:penilaian_krywn.php?pesan=gagal1");
}
		
?>