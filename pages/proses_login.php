<?php
session_start();
$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());
$username = $_POST['username'];
$password = $_POST['password'];
$pas = md5($password);
$cekuser = mysqli_query($sambung, "select * from login_krywn where username='$username' AND password='$pas'")or die(mysqli_error());
$hasil = mysqli_fetch_assoc($cekuser);

  if(mysqli_num_rows($cekuser)==1){
  $_SESSION['username']=$username;
  $_SESSION['ID']=$hasil['NIK'];
  echo "<script>alert('Anda Berhasil Masuk, Selamat Datang')</script>";
echo "<meta http-equiv='refresh' content='1 url=pages/dashboard.php'>";
  //header("location:pages/dashboard.php");
  }
   else {
        echo "<script>alert('Pastikan anda mengisinya dengan benar')</script>";
        echo "<meta http-equiv='refresh' content='1 url=index.php'>";
  }
?>