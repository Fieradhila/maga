<?php

$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());

try{
    $dtbs = "mysql: dbname=maga_karyawan; host=localhost";
    $user = "root";
    $pswd = "";

    $conn = new PDO($dtbs, $user, $pswd);

    $conn->query("USE maga_karyawan");
}
catch(PDOException $e){
    die("Error Connecting: ".$e->getMessage());
}
?>