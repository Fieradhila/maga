<?php 
 //koneksi kedatabase
 
$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

 // nama file
 $filename="Data Karyawan-".date('d m Y').".csv";

 //header info for browser
 header("Content-Type:text/x-csv"); 
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //menampilkan data sebagai array dari tabel produk
    $out=array();
 $sql=mysqli_query($sambung,"SELECT * FROM dftr_krywn WHERE cabang='MAGA 1' ");
 while($data=mysqli_fetch_assoc($sql)) $out[]=$data;

 // create a file pointer connected to the output stream
 $fh = fopen( 'php://output', 'w' );
 $heading = false;
 if(!empty($out))
   foreach($out as $row) {
  if(!$heading) {
    //menampilkan nama kolom di baris pertama
    fputcsv($fh, array_keys($row));
    $heading = true;
  }
  // looping data dari database  
   fputcsv($fh, array_values($row));
   }
   fclose($fh);
?>