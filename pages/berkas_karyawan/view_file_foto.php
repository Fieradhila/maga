<?php
$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());
?>
<!DOCTYPE html>
</head>
<body>
<?php
$id    = mysqli_real_escape_string($sambung, $_GET['NIK']);
$query = mysqli_query($sambung, "SELECT file_foto FROM dftr_krywn WHERE NIK='$id'");
$data  = mysqli_fetch_array($query);
?>
 <embed src="file_foto/<?php echo $data['file_foto']; ?>" width='100px' height='100px'/>
</body>
</html>