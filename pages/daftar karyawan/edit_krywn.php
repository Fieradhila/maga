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
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  <?php echo $data['nama_krywn']; ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
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
      Edit Data Karyawan
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
                    
                    $kd = $_GET['NIK'];
                    $query=mysqli_query($sambung, "SELECT * from dftr_krywn where NIK='$kd' ") or die ( mysql_error());
                    $fet=mysqli_fetch_array($query);
                    ?>
                        <form action="proses_edit_krywn.php?NIK=<?php echo $_GET['NIK']?>" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="form-group">
                              <label class="control-label" for="NIK">NIK</label>
                              <input type="text" name="NIK" value="<?php echo $fet['NIK']?>" autocomplete="off" class="form-control" id="NIK" readonly>
                              <br>
                              <label class="control-label" for="ID">ID Karyawan</label>
                              <input type="text" name="ID" value="<?php echo $fet['ID']?>" autocomplete="off" class="form-control" id="ID" required>
                              <br>
                              <label class="control-label" for="nama_krywn">Nama Karyawan</label>
                              <input type="text" name="nama_krywn" value="<?php echo $fet['nama_krywn']?>" autocomplete="off" class="form-control" id="nama_krywn" required>
                              <br>
                              <label class="control-label" for="tgl_lahir">Tanggal Lahir</label>
                              <input type="date" name="tgl_lahir" value="<?php echo $fet['tgl_lahir']?>" autocomplete="off" class="form-control" id="tgl_lahir" required>
                              <br>
                              <label class="control-label" for="status_nikah">Status Nikah</label>
                              <select name="status_nikah" id="status_nikah" class="form-control">
                              <option value="<?=$fet['status_nikah'];?>" selected="selected"><?=$fet['status_nikah']?></option>
                              <option value="Menikah">Menikah</option>
                              <option value="Belum Menikah">Belum Menikah</option>
                              <option value="Duda">Duda</option>
                              <option value="Janda">Janda</option>
                              </select>
                              <br>
                              <label class="control-label" for="alamat">Alamat</label>
                              <input type="text" name="alamat" value="<?php echo $fet['alamat']?>" autocomplete="off" class="form-control" id="alamat" required>
                              <br>
                              <label class="control-label" for="gender">Jenis Kelamin</label>
                              <select name="gender" id="gender" class="form-control">
                              <option value="<?=$fet['gender'];?>" selected="selected"><?=$fet['gender']?></option>
                                <option value="P">P</option>
                                <option value="L">L</option>
                            </select>
                              <br>
                              <label class="control-label" for="pendidikan">Pendidikan</label>
                              <select name="pendidikan" id="pendidikan" class="form-control" value="<?php echo $fet['pendidikan']?>">
                              <option value="<?=$fet['pendidikan'];?>" selected="selected"><?=$fet['pendidikan']?></option>
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
                            <option value="<?=$fet['agama'];?>" selected="selected"><?=$fet['agama']?></option>
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
                            <input type="text" name="no_hp" value="<?php echo $fet['no_hp']?>" autocomplete="off" id="no_hp" class="form-control" required>
                            <br>
                            <label class="control-label" for="tgl_masuk">Tanggal Masuk</label>
                            <input type="date" name="tgl_masuk" autocomplete="off" value="<?php echo $fet['tgl_masuk']?>" id="tgl_masuk" class="form-control" required>
                            <br>
                            <label class="control-label" for="jabatan">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control">
                            <option value="<?=$fet['jabatan'];?>" selected="selected"><?=$fet['jabatan']?></option>
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
                            <option value="<?=$fet['cabang'];?>" selected="selected"><?=$fet['cabang']?></option>
                            <option value="MAGA 1">Maga 1
                            <option value="MAGA 2">Maga 2
                            <option value="MAGA 3">Maga 3
                            <option value="MAGA 4">Maga 4
                            <option value="MAGA 5">Maga 5
                            </select>
                            <br>
                            <label class="control-label" for="departement">Departement</label>
                            <select name="departement" id="departement" class="form-control">
                            <option value="<?=$fet['departement'];?>" selected="selected"><?=$fet['departement']?></option>
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
                            <input type="text" name="email" placeholder="@example.com" autocomplete="off" pattern="[^ @]*@[^ @]*" value="<?php echo $fet['email']?>" autocomplete="off" id="email" class="form-control" required>
                            <br>
                            <label class="control-label" for="status_kerja">Status Kerja</label>
                            <select name="status_kerja" id="status_kerja" class="form-control">
                            <option value="<?=$fet['status_kerja'];?>" selected="selected"><?=$fet['status_kerja']?></option>
                            <option value="Training">Training
                            <option value="Kontrak">Kontrak
                            <option value="Tetap">Tetap
                            <option value="PKL">PKL
                            </select>
                            <br>
                            <label class="control-label" for="status_aktif">Status Aktif</label>
                            <select name="status_aktif" id="status_aktif" class="form-control">
                            <option value="<?=$fet['status_aktif'];?>" selected="selected"><?=$fet['status_aktif']?></option>
                            <option value="Aktif">Aktif
                            <option value="Tidak Aktif">Tidak Aktif
                            </select>
                            <br>
                            <label class="control-label" for="file_foto">File Foto</label>
                            <input type="file" name="file_foto" id="file_foto" value="<?php echo $fet['file_foto']?>">
                            <br>
                            <img src="../berkas_karyawan/file_foto/<?php echo $fet['file_foto']; ?>" alt="User Image" width='100px' height='100px'>
                            <!--<a href="../berkas_karyawan/view_file_foto.php?NIK=<?php echo $fet['NIK']; ?>"><?php echo $fet['file_foto']; ?></a>-->
                            </br>
                            <label class="control-label" for="file_ktp">File KTP</label>
                            <input type="file" name="file_ktp" id="file_ktp" value="<?php echo $fet['file_ktp']?>">
                            <a href="../berkas_karyawan/view_file_ktp.php?NIK=<?php echo $fet['NIK']; ?>">Open File KTP</a>
                            </br>
                            <label class="control-label" for="file_kk">File KK</label>
                            <input type="file" name="file_kk" id="file_kk" value="<?php echo $fet['file_kk']?>">
                            <a href="../berkas_karyawan/view_file_kk.php?NIK=<?php echo $fet['NIK']; ?>">Open File KK</a>
                              <br>
                              <label class="control-label" for="file_nikah">File Nikah</label>
                            <input type="file" name="file_nikah" id="file_nikah" value="<?php echo $fet['file_nikah']?>">
                            <a href="../berkas_karyawan/view_file_nikah.php?NIK=<?php echo $fet['NIK']; ?>">Open File Nikah</a>
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
