-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 03:06 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maga_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dftr_krywn`
--

CREATE TABLE `dftr_krywn` (
  `NIK` int(20) NOT NULL,
  `ID` varchar(20) NOT NULL,
  `nama_krywn` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status_nikah` enum('Menikah','Belum Menikah','Duda','Janda') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `gender` enum('P','L','lainnya') NOT NULL,
  `pendidikan` enum('TK','SD','SMP','SMA/SMK','D2','D3','D4','S1','S2','S3') NOT NULL,
  `agama` enum('Islam','Konghuchu','Kristen','Katolik','Hindu','Budha','Lainnya') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jabatan` enum('Manager','Assistant Manager','Supervisor','Staf Pusat','Koordinator','HRD','Karyawan') NOT NULL,
  `cabang` enum('MAGA 1','MAGA 2','MAGA 3','MAGA 4','MAGA 5') NOT NULL,
  `departement` enum('IT','Security','Pramuniaga','Kasir','Gudang','MD','Keuangan','Pemasaran','SDM','KRT','Data Entry') NOT NULL,
  `email` varchar(20) NOT NULL,
  `status_kerja` enum('Training','Kontrak','Tetap','PKL') NOT NULL,
  `status_aktif` enum('Aktif','Tidak Aktif') NOT NULL,
  `file_foto` varchar(100) DEFAULT NULL,
  `file_ktp` varchar(100) DEFAULT NULL,
  `file_kk` varchar(100) DEFAULT NULL,
  `file_nikah` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dftr_krywn`
--

INSERT INTO `dftr_krywn` (`NIK`, `ID`, `nama_krywn`, `tgl_lahir`, `status_nikah`, `alamat`, `gender`, `pendidikan`, `agama`, `no_hp`, `tgl_masuk`, `jabatan`, `cabang`, `departement`, `email`, `status_kerja`, `status_aktif`, `file_foto`, `file_ktp`, `file_kk`, `file_nikah`) VALUES
(89458, 'KRYWN_MG4_29', 'Fulanah', '2020-12-04', 'Belum Menikah', 'Yogyakarta', 'P', 'S1', 'Islam', '8645373', '2023-03-31', 'Karyawan', 'MAGA 3', 'Data Entry', 'Fulanah@g.com', 'Training', 'Aktif', '1677915183.png', '1677915183.pdf', '1677915183.pdf', '1677915183.pdf'),
(548789, 'ADMIN', 'Admin', '1980-02-01', 'Menikah', 'Yogyakarta', 'P', 'SMA/SMK', 'Islam', '087855454', '2015-02-01', 'Karyawan', 'MAGA 5', 'Data Entry', 'admin@gmail.com', 'Training', 'Aktif', '1677293778.png', '1677293778.png', '1677293778.png', '1677293778.jpg'),
(886893, '9645863', 'Eli', '1997-03-01', 'Menikah', 'Semarang', 'P', 'SMP', 'Islam', '6277495378', '2010-02-08', 'Karyawan', 'MAGA 4', 'Kasir', 'eli@g.com', 'Training', 'Aktif', '', '', '', ''),
(1234567, 'KRYWN_MG_1', 'Wawan', '1990-01-01', 'Menikah', 'YOGYAKARTA', 'L', 'S2', 'Islam', '+628898989696', '2023-02-01', 'Koordinator', 'MAGA 1', 'MD', 'wawan.w@gmail.com', 'Tetap', 'Aktif', '1677137691.png', '1677137691.pdf', '1677137691.pdf', '1677137691.pdf'),
(6576755, '38924168', 'Upi', '0000-00-00', 'Menikah', 'Semarang', 'P', 'SMP', 'Islam', '6277495378', '0000-00-00', 'Karyawan', 'MAGA 4', 'Kasir', 'eli@g.com', 'Training', 'Aktif', '', '', '', ''),
(12181610, 'KRYWN_MG2_39', 'Putri', '2000-03-07', 'Belum Menikah', 'Yogyakarta', 'P', 'TK', 'Islam', '+6281245886852', '2023-03-07', 'Manager', 'MAGA 4', 'Data Entry', 'Putri@gmail.com', 'Tetap', 'Aktif', '1678173804.png', '1678173804.pdf', '1678173804.pdf', '1678173804.pdf'),
(34021559, 'KRYWN_MG4_25', 'Fieradhila', '1999-05-01', 'Belum Menikah', 'Krapyak Yogyakarta', 'P', 'SMA/SMK', 'Islam', '0895806681674', '2019-02-01', 'Karyawan', 'MAGA 1', 'IT', 'fieradhila@gmail.com', 'Training', 'Aktif', '1677138071.jpg', '1677138071.png', '1677138071.png', '1677138071.jpg'),
(69686979, '9464564', 'Lia', '1995-03-31', 'Menikah', 'Bekasi', 'P', 'S1', 'Islam', '627654', '2023-03-31', 'Karyawan', 'MAGA 2', 'Gudang', 'lia@g.com', 'Tetap', 'Tidak Aktif', '', '', '', ''),
(97686246, '36548973', 'Lala', '0000-00-00', 'Menikah', 'Bekasi', 'P', 'S1', 'Islam', '627654', '0000-00-00', 'Karyawan', 'MAGA 2', 'Gudang', 'lia@g.com', 'Tetap', 'Tidak Aktif', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `keluar_krywn`
--

CREATE TABLE `keluar_krywn` (
  `kode_keluar` int(20) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `NIK` int(20) NOT NULL,
  `lokasi` enum('MAGA 1','MAGA 2','MAGA 3','MAGA 4','MAGA 5') NOT NULL,
  `departement` enum('IT','Security','Pramuniaga','Kasir','Gudang','MD','Keuangan','Pemasaran','SDM','KRT','Data Entry') NOT NULL,
  `jabatan` enum('Manager','Supervisor','Assistant Manager','Staf Pusat','Koordinator','HRD','Karyawan') NOT NULL,
  `alasan_keluar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluar_krywn`
--

INSERT INTO `keluar_krywn` (`kode_keluar`, `tgl_keluar`, `NIK`, `lokasi`, `departement`, `jabatan`, `alasan_keluar`) VALUES
(2, '2023-04-30', 340215590, 'MAGA 1', 'IT', 'Karyawan', '-');

-- --------------------------------------------------------

--
-- Table structure for table `login_krywn`
--

CREATE TABLE `login_krywn` (
  `ID` int(20) NOT NULL,
  `NIK` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_krywn`
--

INSERT INTO `login_krywn` (`ID`, `NIK`, `username`, `password`) VALUES
(1, 34021559, 'fieradhila', '0da8aa3bd068cba3573b11329f9b8248'),
(3, 548789, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_krywn`
--

CREATE TABLE `mutasi_krywn` (
  `kode_mutasi` int(20) NOT NULL,
  `tgl_mutasi` date NOT NULL,
  `NIK` int(20) NOT NULL,
  `nama_krywn` varchar(50) NOT NULL,
  `lokasi_lama` enum('MAGA 1','MAGA 2','MAGA 3','MAGA 4','MAGA 5') NOT NULL,
  `lokasi_baru` enum('MAGA 1','MAGA 2','MAGA 3','MAGA 4','MAGA 5') NOT NULL,
  `departement_lama` enum('IT','Security','Pramuniaga','Kasir','Gudang','MD','Keuangan','Pemasaran','SDM','KRT','Data Entry') NOT NULL,
  `departement_baru` enum('IT','Security','Pramuniaga','Kasir','Gudang','MD','Keuangan','Pemasaran','SDM','KRT','Data Entry') NOT NULL,
  `jabatan_lama` enum('Manager','Assistant Manager','Koordinator','Supervisor','Staf Pusat','HRD','Karyawan') NOT NULL,
  `jabatan_baru` enum('Manager','Assistant Manager','Koordinator','Supervisor','Staf Pusat','HRD','Karyawan') NOT NULL,
  `alasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mutasi_krywn`
--

INSERT INTO `mutasi_krywn` (`kode_mutasi`, `tgl_mutasi`, `NIK`, `nama_krywn`, `lokasi_lama`, `lokasi_baru`, `departement_lama`, `departement_baru`, `jabatan_lama`, `jabatan_baru`, `alasan`) VALUES
(8, '2023-02-16', 34021559, 'Fieradhila', 'MAGA 1', 'MAGA 5', 'IT', 'Kasir', 'Karyawan', 'Koordinator', '-'),
(9, '2023-03-01', 34021559, 'Fieradhila', 'MAGA 5', 'MAGA 3', 'Kasir', 'Pramuniaga', 'Koordinator', 'Karyawan', '-'),
(10, '2023-02-22', 548789, 'Admin', 'MAGA 1', 'MAGA 5', 'IT', 'IT', 'Manager', 'Manager', 'ok'),
(12, '2023-03-06', 89458, 'Fulanah', 'MAGA 4', 'MAGA 3', 'Kasir', 'Data Entry', 'Karyawan', 'Karyawan', 'opopop');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `NIK` int(20) NOT NULL,
  `id_seragam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `NIK`, `id_seragam`) VALUES
(78996, 34021559, 2),
(78997, 1234567, 2),
(79000, 89458, 2),
(79001, 6576755, 3),
(79006, 886893, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `id_seragam` set('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `id_seragam`) VALUES
(69, '1,2,3,4');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_krywn`
--

CREATE TABLE `penilaian_krywn` (
  `id_nilai` int(5) NOT NULL,
  `NIK` int(20) NOT NULL,
  `jumlah_sakit` int(5) DEFAULT NULL,
  `tgl_sakit` date DEFAULT NULL,
  `keterangan_sakit` varchar(200) DEFAULT NULL,
  `file_sakit` varchar(200) DEFAULT NULL,
  `jumlah_izin` int(5) DEFAULT NULL,
  `wkt_izin_dari` datetime DEFAULT NULL,
  `wkt_izin_smp` datetime DEFAULT NULL,
  `keterangan_izin` varchar(200) DEFAULT NULL,
  `jumlah_libur` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian_krywn`
--

INSERT INTO `penilaian_krywn` (`id_nilai`, `NIK`, `jumlah_sakit`, `tgl_sakit`, `keterangan_sakit`, `file_sakit`, `jumlah_izin`, `wkt_izin_dari`, `wkt_izin_smp`, `keterangan_izin`, `jumlah_libur`) VALUES
(98, 548789, 1, '2023-03-09', '-', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seragam`
--

CREATE TABLE `seragam` (
  `id_seragam` int(11) NOT NULL,
  `nama_seragam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seragam`
--

INSERT INTO `seragam` (`id_seragam`, `nama_seragam`) VALUES
(1, 'Seragam Merah'),
(2, 'Seragam Hijau'),
(3, 'Seragam Abu'),
(4, 'Seragam Kuning'),
(5, 'HP'),
(6, 'Laptop'),
(7, 'Sepeda Motor'),
(8, 'Seragam Biru');

-- --------------------------------------------------------

--
-- Table structure for table `surat_mutasi`
--

CREATE TABLE `surat_mutasi` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `hal` varchar(50) NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  `kode_mutasi` int(20) NOT NULL,
  `NIK` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dftr_krywn`
--
ALTER TABLE `dftr_krywn`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `keluar_krywn`
--
ALTER TABLE `keluar_krywn`
  ADD PRIMARY KEY (`kode_keluar`);

--
-- Indexes for table `login_krywn`
--
ALTER TABLE `login_krywn`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NIK` (`NIK`);

--
-- Indexes for table `mutasi_krywn`
--
ALTER TABLE `mutasi_krywn`
  ADD PRIMARY KEY (`kode_mutasi`),
  ADD KEY `NIK` (`NIK`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `id_seragam` (`id_seragam`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian_krywn`
--
ALTER TABLE `penilaian_krywn`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `NIK` (`NIK`);

--
-- Indexes for table `seragam`
--
ALTER TABLE `seragam`
  ADD PRIMARY KEY (`id_seragam`);

--
-- Indexes for table `surat_mutasi`
--
ALTER TABLE `surat_mutasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar_krywn`
--
ALTER TABLE `keluar_krywn`
  MODIFY `kode_keluar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_krywn`
--
ALTER TABLE `login_krywn`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mutasi_krywn`
--
ALTER TABLE `mutasi_krywn`
  MODIFY `kode_mutasi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79009;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `penilaian_krywn`
--
ALTER TABLE `penilaian_krywn`
  MODIFY `id_nilai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `seragam`
--
ALTER TABLE `seragam`
  MODIFY `id_seragam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `surat_mutasi`
--
ALTER TABLE `surat_mutasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_krywn`
--
ALTER TABLE `login_krywn`
  ADD CONSTRAINT `login_krywn_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `dftr_krywn` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mutasi_krywn`
--
ALTER TABLE `mutasi_krywn`
  ADD CONSTRAINT `mutasi_krywn_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `dftr_krywn` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`NIK`) REFERENCES `dftr_krywn` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_seragam`) REFERENCES `seragam` (`id_seragam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_krywn`
--
ALTER TABLE `penilaian_krywn`
  ADD CONSTRAINT `penilaian_krywn_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `dftr_krywn` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
