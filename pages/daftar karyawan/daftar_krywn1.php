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
            <li class="active"><a href="daftar_krywn.php"><i class="fa fa-circle-o"></i> Karyawan</a></li>
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
            <i class="fa fa-user"></i><span>Laporan</span>
          </a>
        </li>
        <li>
          <a href="../../index.php" onclick="return confirm('Anda yakin ingin Keluar?')" >
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
      Daftar Karyawan
      </h1>
    </section>

    <!-- Main content -->
<section class="content">
      <div class="box box-primary">
        <div class="box-header">
          <table border="0" align="left">
          <tr>
            <td>
              <button type="submit" data-toggle="modal" data-target="#tambah" value="simpan" class="btn btn-block btn-primary btn-sm"><i class="fa fa-user-plus"> Tambah</i></button></a>
            </td>
            <td>&nbsp;&nbsp;</td>
            <td>
              <div class="input-group-btn">
              <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-print"> Ekspor</i></button>
              <ul class="dropdown-menu">
                <li><a target="_blank" href="../laporan/data_krywn_xls.php">Excel (.xlsx)</a></li>
                <li><a target="_blank" href="../laporan/data_krywn_csv.php">CSV (.csv)</a></li>
                <li><a href="../laporan/data_krywn_pdf1.php">PDF (.pdf)</a></li>
              </ul>
              </div>
            </td>
          
          </tr>
          </table>

          <table border="0" align="right">
          <tr>
            <td>
              <div class="input-group">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-filter"></i> Filter</a>
                <ul class="dropdown-menu">
                <li><a href="daftar_krywn.php">ALL</a></li>
                  <li><a href="daftar_krywn1.php">MAGA 1</a></li>
                  <li><a href="daftar_krywn2.php">MAGA 2</a></li>
                  <li><a href="daftar_krywn3.php">MAGA 3</a></li>
                  <li><a href="daftar_krywn4.php">MAGA 4</a></li>
                  <li><a href="daftar_krywn5.php">MAGA 5</a></li>
                </ul>
              </div>
            </td>
            <td>&nbsp;&nbsp;</td>
          <form action="#" method="GET">
          <td><input type="text" class="form-control" name="cari" autocomplete="off"></td>
          <td>&nbsp;</td>
          <td><input type="submit" class="btn btn-block btn-primary btn-sm" value="Cari"></td>
          </tr>
          </form>
          </table>

          <?php
          if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
          }
          ?>

          <div class="row">
          <div class="col-xs-12">
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered">
                    <br>
                <tr align="center" valign="middle">
                  <td><b>ID</b></td>
                  <td><b>NIK</b></td>
                  <td><b>Nama Karyawan</b></td>
                  <td><b>Tgl Lahir</b></td>
                  <td><b>Alamat</b></td>
                  <td><b>Email</b></td>
                  <td><b>Jabatan</b></td>
                  <td><b>Cabang</b></td>
                  <td><b>Departement</b></td>
                  <td colspan="3"><b>Aksi</b></td>
                </tr>
                <?php
                if(isset($_GET['cari'])){
                  $cari = $_GET['cari'];
                  $search = mysqli_query($sambung, "SELECT * FROM dftr_krywn WHERE cabang='MAGA 1' AND nama_krywn like '%".$cari."%' OR 
                                                                                    ID like '%".$cari."%' OR
                                                                                    NIK like '%".$cari."%' OR
                                                                                    tgl_lahir like '%".$cari."%' OR
                                                                                    status_nikah like '%".$cari."%' OR
                                                                                    alamat like '%".$cari."%' OR
                                                                                    gender like '%".$cari."%' OR
                                                                                    pendidikan like '%".$cari."%' OR
                                                                                    agama like '%".$cari."%' OR
                                                                                    no_hp like '%".$cari."%' OR
                                                                                    tgl_masuk like '%".$cari."%' OR
                                                                                    jabatan like '%".$cari."%' OR
                                                                                    cabang like '%".$cari."%' OR
                                                                                    departement like '%".$cari."%' OR
                                                                                    email like '%".$cari."%' OR
                                                                                    status_kerja like '%".$cari."%' OR
                                                                                    status_aktif like '%".$cari."%'
                                                                                    ");
                }else{
                  $search = mysqli_query($sambung, "SELECT * FROM dftr_krywn WHERE cabang='MAGA 1'");
                }
                while($abc=mysqli_fetch_array($search)){
                  ?>
                <tr>
                  <td><?php echo $abc['ID']; ?></td>
                  <td align="center"><?php echo $abc['NIK']; ?></td>
                  <td><?php echo $abc['nama_krywn']; ?></td>
                  <td><?php echo $abc['tgl_lahir']; ?></td>
                  <td><?php echo $abc['alamat']; ?></td>
                  <td><?php echo $abc['email']; ?></td>
                  <td><?php echo $abc['jabatan']; ?></td>
                  <td><?php echo $abc['cabang']; ?></td>
                  <td><?php echo $abc['departement']; ?></td>
                  <!--<td><input type="checkbox"></td>-->
                  <td><a href=hapus_karyawan.php?NIK=<?php echo $abc['NIK'];?> onclick="return confirm('Anda yakin ingin menghapus data ini?')"><button type="button" class="btn btn-block btn-primary btn-sm"><i class="fa fa-trash-o"></i></button></a></td>
                  <td><a href=edit_krywn.php?NIK=<?php echo $abc['NIK'];?> onclick="return confirm('Anda yakin ingin mengedit data ini?')"><button type="button" class="btn btn-block btn-primary btn-sm"><i class="fa fa-edit"></i></button></a></td>
                  <td><a href=detail_krywn.php?NIK=<?php echo $abc['NIK'];?>><button type="button" class="btn btn-block btn-primary btn-sm"><i class="fa fa-info-circle"></i></button></a></td>
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
                  <h4 class="modal-title">Tambah Data Karyawan</h4>
                    </div>
                      <form action="tambah_karyawan.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="form-group">
                            <label class="control-label" for="NIK">NIK</label>
                            <input type="number" name="NIK" autocomplete="off" id="NIK" class="form-control" required>
                            <br>
                            <label class="control-label" for="ID">ID Karyawan</label>
                            <input type="text" name="ID"  value="KRYWN_MG1_" autocomplete="off" id="ID" class="form-control" required>
                            <br>
                            <label class="control-label" for="nama_krywn">Nama Karyawan</label>
                            <input type="text" name="nama_krywn" autocomplete="off" id="nama_krywn" class="form-control" required>
                            <br>
                            <label class="control-label" for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" placeholder="yyyy-mm-dd" autocomplete="off" id="ttl" class="form-control" required>
                            <br>
                            <label class="control-label" for="status_nikah">Status Nikah</label>
                            <select name="status_nikah" id="status_nikah" class="form-control">
                            <option value="Menikah">Menikah
                            <option value="Belum Menikah">Belum Menikah
                            <option value="Duda">Duda
                            <option value="Janda">Janda
                            </select>
                            <br>
                            <label class="control-label" for="alamat">Alamat</label>
                            <br>
                            <textarea rows="2" cols="78" name="alamat" autocomplete="off" id="alamat" class="form-control" required></textarea>
                            <br>
                            <label class="control-label" for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                              <option value="L">L
                                <option value="P">P
                                  <option value="Lainnya">Lainnya
                              </Label>
                            </select>
                            <br>
                            <label class="control-label" for="pendidikan">Pendidikan</label>
                            <select name="pendidikan" id="pendidikan" class="form-control">
                            <option value="TK">TK
                            <option value="SD">SD
                            <option value="SMP">SMP
                            <option value="SMA/SMK">SMA/SMK
                            <option value="D2">D2
                            <option value="D3">D3
                            <option value="D4">D4
                            <option value="S1">S1
                            <option value="S2">S2
                            <option value="S3">S3
                            </select>
                            <br>
                            <label class="control-label" for="agama">Agama</label>
                            <select name="agama" id="agama" class="form-control">
                            <option value="Islam">Islam
                            <option value="Kristen">Kristen
                            <option value="Katolik">Katolik
                            <option value="Hindu">Hindu
                            <option value="Budha">Budha
                            <option value="Konghuchu">Kong Hu Cu
                            <option value="Lainnya">Lainnya
                            </select>
                            <br>
                            <label class="control-label" for="no_hp">No. Hp</label>
                            <input type="text" name="no_hp" value="+628" autocomplete="off" id="no_hp" class="form-control" required>
                            <br>
                            <label class="control-label" for="tgl_masuk">Tanggal Masuk</label>
                            <input type="date" name="tgl_masuk" autocomplete="off" id="tgl_masuk" class="form-control" required>
                            <br>
                            <label class="control-label" for="jabatan">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control">
                            <option value="Manager">Manager
                            <option value="Assistent Manager">Assistent Manager
                            <option value="Supervisor">Supervisor
                            <option value="Staf Pusat">Staf Pusat
                            <option value="Koordinator">Koordinator
                            <option value="HRD">HRD
                            <option value="Karyawan">Karyawan
                            </select>
                            <br>
                            <label class="control-label" for="cabang">Cabang</label>
                            <select name="cabang" id="cabang" class="form-control">
                            <option value="MAGA 1">Maga 1
                            <option value="MAGA 2">Maga 2
                            <option value="MAGA 3">Maga 3
                            <option value="MAGA 4">Maga 4
                            <option value="MAGA 5">Maga 5
                            </select>
                            <br>
                            <label class="control-label" for="departement">Departement</label>
                            <select name="departement" id="departement" class="form-control">
                            <option value="IT">IT
                            <option value="Security">Security
                            <option value="Pramuniaga">Pramuniaga
                            <option value="Kasir">Kasir
                            <option value="Gudang">Gudang
                            <option value="MD">MD
                            <option value="Keuangan">Keuangan
                            <option value="Pemasaran">Pemasaran
                            <option value="SDM">SDM
                            <option value="KRT">KRT
                            <option value="Data Entry">Data Entry
                            </select>
                            <br>
                            <label class="control-label" for="email">Email</label>
                            <input type="text" name="email" pattern="[^ @]*@[^ @]*" placeholder="@example.com" autocomplete="off" id="email" class="form-control" required>
                            <br>
                            <label class="control-label" for="status_kerja">Status Kerja</label>
                            <select name="status_kerja" id="status_kerja" class="form-control">
                            <option value="Training">Training
                            <option value="Kontrak">Kontrak
                            <option value="Tetap">Tetap
                            </select>
                            <br>
                            <label class="control-label" for="status_aktif">Status Aktif</label>
                            <select name="status_aktif" id="status_aktif" class="form-control">
                            <option value="Aktif">Aktif
                            <option value="Tidak Aktif">Tidak Aktif
                            </select>
                            <br>
                            <label class="control-label" for="file_ktp">Upload File KTP (File PDF Max 5MB)</label>
                            <input type="file" name="file_ktp" id="file_ktp">
                            <br>
                            <label class="control-label" for="file_kk">Upload File KK (File PDF Max 5MB)</label>
                            <input type="file" name="file_kk" id="file_kk">
                            <br>
                            <label class="control-label" for="file_nikah">Upload File Nikah (File PDF Max 5MB)</label>
                            <input type="file" name="file_nikah" id="file_nikah">
                            <br>
                          </div>
                        </div>
                      <div class="modal-footer">
                      <button type="reset" class="btn btn-danger">Hapus</button>
                      <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Th.Ajaran</b> 2017-2018
    </div>
    <strong>Copyright Fieradhila 
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
<script>
  <script>
</body>
</html>
