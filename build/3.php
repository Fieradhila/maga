<?php 
// menghubungkan dengan koneksi
include '../../include/koneksi.php';
// menghubungkan dengan library excel reader
include "../../excel-reader/php-excel-reader/excel_reader2.php";

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());
?>
 
<?php
// upload file xls
$target = basename($_FILES['filekrywn']['name']) ;
move_uploaded_file($_FILES['filekrywn']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['filekrywn']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filekrywn']['name'],false);

// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
 
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$NIK     		= $data->val($i, 1);
	$ID   			= $data->val($i, 2);
	$nama_krywn 	= $data->val($i, 3);
	$tgl_lahir 	 	= $data->val($i, 4);
	$status_nikah  	= $data->val($i, 5);
	$alamat  		= $data->val($i, 6);
	$gender  		= $data->val($i, 7);
	$pendidikan  	= $data->val($i, 8);
	$agama  		= $data->val($i, 9);
	$no_hp 			= $data->val($i, 10);
	$tgl_masuk  	= $data->val($i, 11);
	$jabatan 		= $data->val($i, 12);
	$cabang			= $data->val($i, 13);
	$departement  	= $data->val($i, 14);
	$email  		= $data->val($i, 15);
	$status_kerja  	= $data->val($i, 16);
	$status_aktif  	= $data->val($i, 17);
	$file_foto  	= $data->val($i, 18);
	$file_ktp  		= $data->val($i, 19);
	$file_kk  		= $data->val($i, 20);
	$file_nikah  	= $data->val($i, 21);
 
	if($NIK != "" && $ID != "" && $nama_krywn != "" && $tgl_lahir != "" && $status_nikah != "" && $alamat != "" && $gender != "" && $pendidikan != "" && $agama != "" && $no_hp != "" && $tgl_masuk != "" && $jabatan != "" && $cabang != "" && $departement != "" && $email != "" && $status_kerja != "" && $status_aktif != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($sambung, "INSERT into dftr_krywn values('$NIK','$ID','$nama_krywn','$tgl_lahir', '$status_nikah',
															 '$alamat','$gender', '$pendidikan', '$agama', '$no_hp',
															 '$tgl_masuk', '$jabatan', '$cabang', $departement,
															 '$email', '$status_kerja', '$status_aktif',
															'$file_foto', '$file_ktp', '$file_kk', '$file_nikah')");
		$berhasil++;
		header("location:daftar_krywn.php?berhasil=$berhasil");
	}
}
 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filekrywn']['name']);
 
// alihkan halaman ke index.php
header("location:daftar_krywn.php?gagal=$berhasil");
?>