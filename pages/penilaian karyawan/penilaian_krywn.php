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
    <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
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
      <!-- mini logo for sidebar mini 50x50 pixels -->
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
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-users"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../daftar karyawan/daftar_krywn.php"><i class="fa fa-circle-o"></i> Karyawan</a></li>
            <li class="active"><a href="penilaian_krywn.php"><i class="fa fa-circle-o"></i> Kinerja Karyawan</a></li>
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
      Kinerja Karyawan
      </h1>
    </section>

    <!-- Main content -->
<section class="content">
      <div class="box box-primary">
        <div class="box-header">
          <table border="0" align="left">
          <tr>
          <td><button type="submit" data-toggle="modal" data-target="#tambah" value="simpan" class="btn btn-block btn-primary btn-sm"><i class="fa fa-user-plus"> Tambah</i></button></a>
          </td>
          </tr>
          </table>
          <div class="row">
          <div class="col-xs-12">
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered">
                    <br>
                <tr align="center" valign="middle">
                  <td><b>NIK</b></td>
                  <td><b>Jml Sakit</b></td>
                  <td><b>Tgl Sakit</b></td>
                  <td><b>Ket Sakit</b></td>
                  <td><b>Berkas</b></td>
                  <td><b>Jml Izin</b></td>
                  <td><b>Waktu Izin Dari</b></td>
                  <td><b>Waktu Izin Sampai</b></td>
                  <td><b>Jumlah Libur</b></td>
                  <td colspan="2"><b>Aksi</b></td>
                </tr>
                <?php
                $i=1;

                $sql = "SELECT * from penilaian_krywn";
                $result = mysqli_query($sambung, $sql);

                while ($abc = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                  <td><?php echo $abc['NIK']; ?></td>
                  <td><?php echo $abc['jumlah_sakit']; ?></td>
                  <td><?php echo $abc['tgl_sakit']; ?></td>
                  <td><?php echo $abc['keterangan_sakit']; ?></td>
                  <td><?php echo $abc['file_sakit']; ?></td>
                  <td><?php echo $abc['jumlah_izin']; ?></td>
                  <td><?php echo $abc['wkt_izin_dari']; ?></td>
                  <td><?php echo $abc['wkt_izin_smp']; ?></td>
                  <td><?php echo $abc['jumlah_libur']; ?></td>
                  <td><a href=hapus_nilai_krywn.php?id_nilai=<?php echo $abc['id_nilai'];?> onclick="return confirm('Hapus Kinerja?')"><button type="button" class="btn btn-block btn-primary btn-sm"><i class="fa fa-trash"></i></button></a></td>
                  <td><a href=edit_nilai_krywn.php?id_nilai=<?php echo $abc['id_nilai'];?> onclick="return confirm('Edit Kinerja?')"><button type="button" class="btn btn-block btn-primary btn-sm"><i class="fa fa-edit"></i></button></a></td>
                </tr>
                <?php } ?>
                  </table>
                  <br>
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
      <div id="tambah" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Tambah Nilai Karyawan</h4>
                    </div>
                      <form action="tambah_penilaian_krywn.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="form-group">
                            <label class="control-label" for="NIK">NIK</label>
                            <select name="NIK" id="NIK" class="form-control"><option>Pilih NIK</option>
                            <?php
                            $sql="SELECT NIK, nama_krywn from dftr_krywn";
                            $hasil=mysqli_query($sambung, $sql);
                            while($baris=mysqli_fetch_row($hasil)) { ?>
                            <option name="NIK" value=<?=$baris[0];?>><?=$baris[1]?> - <?=$baris[0]?></option>
                            <?php } ?></select>
                            <br>
                            <label class="control-label" for="jumlah_sakit">Jumlah Sakit</label>
                            <input type="number" name="jumlah_sakit" autocomplete="off" id="jumlah_sakit" class="form-control">
                            <br>
                            <label class="control-label" for="tgl_sakit">Tanggal Sakit</label>
                            <input type="date" name="tgl_sakit" autocomplete="off" id="tgl_sakit" class="form-control">
                            <br>
                            <label class="control-label" for="keterangan_sakit">Keterangan Sakit</label>
                            <input type="text" name="keterangan_sakit" autocomplete="off" id="keterangan_sakit" class="form-control">
                            <br>
                            <label class="control-label" for="file_sakit">Berkas Penunjang</label>
                            <input type="file" name="file_sakit" autocomplete="off" id="file_sakit" class="form-control">
                            <br>
                            <label class="control-label" for="jumlah_izin">Jumlah Izin</label>
                            <input type="number" name="jumlah_izin" autocomplete="off" id="jumlah_izin" class="form-control">
                            <br>
                            <label class="control-label" for="wkt_izin_dari">Waktu Izin Dari</label>
                            <input type="datetime-local" name="wkt_izin_dari" autocomplete="off" id="wkt_izin_dari" class="form-control">
                            <br>
                            <label class="control-label" for="wkt_izin_smp">Waktu Izin Sampai</label>
                            <input type="datetime-local" name="wkt_izin_smp" autocomplete="off" id="wkt_izin_smp" class="form-control">
                            <br>
                            <label class="control-label" for="jumlah_libur">Jumlah Libur</label>
                            <input type="number" name="jumlah_libur" autocomplete="off" id="jumlah_libur" class="form-control">
                          </div>
                        </div>
                      <div class="modal-footer">
                      <button type="reset" class="btn btn-danger">Reset</button>
                      <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

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
<!-- jQuery UI 1.11.4 -->
<script src="../../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../bower_components/raphael/raphael.min.js"></script>
<script src="../../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
</body>
</html>
