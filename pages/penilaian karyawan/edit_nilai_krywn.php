<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../../dist/img/siaka.png">
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
    <a href="../index.php" class="logo">
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
              $query = mysqli_query($sambung, $q);
              $data = mysqli_fetch_assoc($query);
              ?>
              <span class="hidden-xs"><?php echo $data['nama_krywn']; ?></span>
            </a>
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
            <li><a href="../daftar karyawan/daftar_krywn.php"><i class="fa fa-circle-o"></i> Karyawan</a></li>
            <li><a href="penilaian_krywn.php"><i class="fa fa-circle-o"></i> Kinerja Karyawan</a></li>
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
          <a href="../index.php" onclick="return confirm('Anda yakin ingin Keluar ?')" >
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
      Mutasi Karyawan
      </h1>
    </section>

    <!-- Main content -->
<section class="content">
      <div class="box box-primary">
        <div class="box-header">
          <div class="row">
          <div class="col-xs-12">
                <div class="box-body table-responsive no-padding">
                    <?php
                    include "../../include/koneksi.php";
                    
                    $kd = $_GET['id_nilai'];
                    $query=mysqli_query($sambung, "SELECT * from penilaian_krywn where id_nilai='$kd' ") or die ( mysql_error());
                    $fet=mysqli_fetch_array($query);
                    ?>
                        <form action="proses_edit_nilai.php?id_nilai=<?php echo $_GET['id_nilai']?>" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="form-group">
                            <label class="control-label" for="NIK">NIK</label>
                              <input type="text" name="NIK" value="<?php echo $fet['NIK']?>" autocomplete="off" class="form-control" id="NIK" readonly>
                              <br>
                              <label class="control-label" for="jumlah_sakit">Jumlah Sakit</label>
                              <input type="number" name="jumlah_sakit" value="<?php echo $fet['jumlah_sakit']?>" autocomplete="off" class="form-control" id="tgl_mutasi">
                              <br>
                              <label class="control-label" for="keterangan_sakit">Tanggal Sakit</label>
                              <input type="text" name="keterangan_sakit" value="<?php echo $fet['keterangan_sakit']?>" autocomplete="off" class="form-control" id="NIK">
                              <br>
                              <label class="control-label" for="keterangan_sakit">Keterangan Sakit</label>
                              <input type="text" name="keterangan_sakit" value="<?php echo $fet['keterangan_sakit']?>" autocomplete="off" class="form-control" id="NIK">
                              <br>
                              <label class="control-label" for="file_sakit">Berkas Penunjang</label>
                              <input type="file" name="file_sakit" value="<?php echo $fet['file_sakit']?>" autocomplete="off" class="form-control" id="nama_krywn">
                              <br>
                              <label class="control-label" for="jumlah_izin">Jumlah Izin</label>
                              <input type="number" name="jumlah_izin" value="<?php echo $fet['jumlah_izin']?>" autocomplete="off" class="form-control" id="nama_krywn">
                              <br>
                              <label class="control-label" for="wkt_izin_dari">Waktu Izin Dari</label>
                              <input type="datetime-local" name="wkt_izin_dari" value="<?php echo $fet['wkt_izin_dari']?>" autocomplete="off" class="form-control" id="nama_krywn">
                              <br>
                              <label class="control-label" for="wkt_izin_smp">Waktu Izin Sampai</label>
                              <input type="datetime-local" name="wkt_izin_smp" value="<?php echo $fet['wkt_izin_smp']?>" autocomplete="off" class="form-control" id="nama_krywn">
                              <br>
                              <label class="control-label" for="jumlah_libur">Jumlah Libur</label>
                              <input type="number" name="jumlah_libur" value="<?php echo $fet['jumlah_libur']?>" autocomplete="off" class="form-control" id="nama_krywn">
                              <br>
                              <i class="fa fa-info-circle"></i> <span> Periksa kembali data sebelum menyimpan</span>
                                                
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <input type="submit" class="btn btn-success" value="Simpan">
                          </div>
                        </form>
                </div>
            <!-- /.box-body -->
          <!-- /.box -->
          </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Th.Ajaran</b> 
    </div>
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
