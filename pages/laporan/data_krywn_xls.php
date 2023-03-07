<?php 
 //koneksi kedatabase
 $sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

 // nama file
 $filename="Data Karyawan-".date('d m Y').".xls";

 //header info for browser
 header("Content-Type: application/vnd-ms-excel"); 
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //menampilkan data sebagai array dari tabel produk
    $out=array();
 $sql=mysqli_query($sambung,"SELECT * FROM dftr_krywn");
 while($data=mysqli_fetch_assoc($sql)) $out[]=$data;

 $show_coloumn = false;
 foreach($out as $record) {
 if(!$show_coloumn) {
 //menampilkan nama kolom di baris pertama
 echo implode("\t", array_keys($record)) . "\n";
 $show_coloumn = true;
 }
 // looping data dari database
 echo implode("\t", array_values($record)) . "\n";
 } 
 exit;
?>