<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../dist/img/siaka.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MAGA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">MAGA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php
              session_start();

              $sambung = mysqli_connect('localhost','root','','maga_karyawan') or die (mysqli_error());
              $q = "SELECT * FROM dftr_krywn where NIK='".$_SESSION['ID']."'";
              $query = mysqli_query($sambung,$q);
              $data = mysqli_fetch_assoc($query);
              ?>
              <span class="hidden-xs"><?php echo $data['nama_krywn']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="bt n btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../index.php" onclick="return confirm('Anda yakin ingin Keluar ?')" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
          <img src="../berkas_karyawan/file_foto/<?php echo $data['file_foto']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $data['nama_krywn']; ?></p>
          <p><i class="fa fa-laptop"></i>&nbsp;<?php echo $data['jabatan']; ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li>
          <a href="../dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="daftar_krywn.php"><i class="fa fa-circle-o"></i> Karyawan</a></li>
            <li><a href="../penilaian karyawan/penilaian_krywn.php"><i class="fa fa-circle-o"></i> Kinerja Karyawan</a></li>
            <li><a href="../mutasi karyawan/mutasi_krywn.php"><i class="fa fa-circle-o"></i> Mutasi</a></li>
            <li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-circle-o"></i> <span>Fasilitas</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="../seragam/dftr_fasilitas.php"><i class="fa fa-circle-o"></i> Daftar Fasilitas</a></li>
                  <li><a href="../seragam/peminjaman.php"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
                </ul>
              </li>
            </li>
          </ul>
        </li>
        <li>
          <a href="../laporan/laporan_mutasi.php">
            <i class="fa fa-user"></i> <span>Laporan</span>
          </a>
        </li>
        <li>
          <a href="../../index.php" onclick="return confirm('Anda yakin ingin Keluar ?')" >
            <i class="fa fa-sign-out"></i> <span>Keluar</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Detail Data Karyawan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header">
          <div class="row">
            <div class="col-xs-12">
            <?php
                    include "../../include/koneksi.php";
                    
                    $kd = $_GET['NIK'];
                    $query=mysqli_query($sambung, "SELECT * FROM dftr_krywn WHERE NIK='$kd' ") or die (mysql_error());
                    $fet=mysqli_fetch_array($query);
                    ?>
              <img src="../berkas_karyawan/file_foto/<?php echo $fet['file_foto']; ?>" align="right" alt="User Image" width='100px' height='100px'>
              <table border=0 width="80%">
              <tr>
                <td>NIK</td>
                <td>&nbsp;:&nbsp;</td>
                <td><?php echo $fet['NIK']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>ID</td>
                <td>&nbsp;:&nbsp;</td>
                <td><?php echo $fet['ID']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Nama Lengkap</td>
                <td>&nbsp;:&nbsp;</td>
                <td><?php echo $fet['nama_krywn']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td>&nbsp;:&nbsp;</td>
                <td><?php echo $fet['tgl_lahir']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <td>Status Nikah</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?php echo $fet['status_nikah']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <td>Alamat</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?php echo $fet['alamat']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <td>Jenis Kelamin</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?php echo $fet['gender']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <td>Pendidikan</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?php echo $fet['pendidikan']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <td>Agama</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?php echo $fet['agama']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <td>No. Hp</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?php echo $fet['no_hp']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <td>Tanggal Masuk</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?php echo $fet['tgl_masuk']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <td>Jabatan</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?php echo $fet['jabatan']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <td>Cabang</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?php echo $fet['cabang']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <td>Departement</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?php echo $fet['departement']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <td>Email</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?php echo $fet['email']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <td>Status Kerja</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?php echo $fet['status_kerja']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <td>Status Aktif</td>
              <td>&nbsp;:&nbsp;</td>
              <td><?php echo $fet['status_aktif']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>File KTP</td>
                <td>&nbsp;:&nbsp;</td>
                <td><a href="../berkas_karyawan/view_file_ktp.php?NIK=<?php echo $fet['NIK']; ?>"><?php echo $fet['file_ktp']; ?></a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>File KK</td>
                <td>:</td>
                <td><a href="../berkas_karyawan/view_file_kk.php?NIK=<?php echo $fet['NIK']; ?>"><?php echo $fet['file_kk']; ?></a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>File Nikah</td>
                <td>:</td>
                <td><a href="../berkas_karyawan/view_file_nikah.php?NIK=<?php echo $fet['NIK']; ?>"><?php echo $fet['file_nikah']; ?></a></td>
              </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
