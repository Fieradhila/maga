<?php
$sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());
?>
<!DOCTYPE html>
</head>
<body>
<?php
$id    = mysqli_real_escape_string($sambung, $_GET['id_nilai']);
$query = mysqli_query($sambung, "SELECT file_sakit FROM penilaian_krywn WHERE id_nilai='$id'");
$data  = mysqli_fetch_array($query);
?>
 <embed src="file_sakit/<?php echo $data['file_sakit']; ?>" type="application/pdf" width='100%' height='950px'/>
</body>
</html>