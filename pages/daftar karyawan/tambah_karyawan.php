<?php ob_start();
include "../../include/koneksi.php";

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

$NIK = $_POST['NIK'];
$ID = $_POST['ID'];
$nama_krywn = $_POST['nama_krywn'];
$tgl_lahir = $_POST['tgl_lahir'];
$status_nikah = $_POST['status_nikah'];
$alamat = $_POST['alamat'];
$gender = $_POST['gender'];
$pendidikan = $_POST['pendidikan'];
$agama = $_POST['agama'];
$no_hp = $_POST['no_hp'];
$tgl_masuk = $_POST['tgl_masuk'];
$jabatan = $_POST['jabatan'];
$cabang = $_POST['cabang'];
$departement = $_POST['departement'];
$email = $_POST['email'];
$status_kerja = $_POST['status_kerja'];
$status_aktif = $_POST['status_aktif'];
$file_foto=$_FILES['file_foto']['name'];
$file_ktp=$_FILES['file_ktp']['name'];
$file_kk=$_FILES['file_kk']['name'];
$file_nikah=$_FILES['file_nikah']['name'];

// move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name'])or die();
// 	mysql_query("update admin set foto='$foto' where uname='$user'");

$u=mysqli_query($sambung, "SELECT * from dftr_krywn where NIK='$NIK'");
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
				$last_id = mysqli_insert_id($sambung);
				mysqli_query($sambung, "INSERT INTO dftr_krywn (NIK,ID,nama_krywn,tgl_lahir,status_nikah,alamat,gender,pendidikan,agama, no_hp, tgl_masuk, jabatan,cabang, departement, email, status_kerja, status_aktif, file_foto, file_ktp, file_kk, file_nikah) values 
							('$NIK','$ID','$nama_krywn','$tgl_lahir','$status_nikah','$alamat','$gender','$pendidikan','$agama','$no_hp','$tgl_masuk','$jabatan','$cabang','$departement','$email','$status_kerja','$status_aktif', '$namefilefoto','$namefilektp', '$namefilekk', '$namefilenikah')")  or die (mysqli_error());
				  echo "<script>alert('Data Berhasil Disimpan')</script>";
				  echo "<meta http-equiv='refresh' content='1 url=daftar_krywn.php'>";
			}else{
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