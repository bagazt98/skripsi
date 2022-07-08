-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 03:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul_kegiatan` varchar(128) NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time DEFAULT NULL,
  `narasumber` varchar(128) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_agenda`
--

INSERT INTO `tb_agenda` (`id`, `id_jenis`, `id_user`, `tanggal`, `judul_kegiatan`, `mulai`, `selesai`, `narasumber`, `keterangan`) VALUES
(2, 2, 20, '2022-07-08', 'BTA', '16:00:00', '17:00:00', 'Ust. Ahmad Satiri', 'baca tulis al-qur\'an');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bener`
--

CREATE TABLE `tb_bener` (
  `id` int(11) NOT NULL,
  `judul_bener` varchar(128) NOT NULL,
  `isi_bener` text NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bener`
--

INSERT INTO `tb_bener` (`id`, `judul_bener`, `isi_bener`, `gambar`) VALUES
(5, 'Pengabdian Masyarakat Nusa Mandiri', 'Pengabdian Masyarakat Nusa Mandiri Periode 2022', '20220627_135429.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul_berita` varchar(128) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `id_kategori`, `judul_berita`, `isi_berita`, `gambar`, `id_user`, `tanggal`) VALUES
(16, 8, 'Hewan kurban', '“Qurban‎” yang berarti dekat atau mendekatkan atau disebut juga Udhhiyah atau Dhahiyyah secara harfiah berarti hewan sembelihan.', 'hewan-kurban1.jpg', 20, '1657235580');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita_kategori`
--

CREATE TABLE `tb_berita_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita_kategori`
--

INSERT INTO `tb_berita_kategori` (`id_kategori`, `kategori`) VALUES
(2, 'Pengajian Ibu-Ibu'),
(3, 'Pengajian Remaja'),
(8, 'Qurban'),
(9, 'pengajian mingguan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bk`
--

CREATE TABLE `tb_bk` (
  `id` int(11) NOT NULL,
  `kd_barang` varchar(128) NOT NULL,
  `tgl_pendataan` varchar(128) NOT NULL,
  `petugas` varchar(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `kuantitas_keluar` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bk`
--

INSERT INTO `tb_bk` (`id`, `kd_barang`, `tgl_pendataan`, `petugas`, `nama_barang`, `kuantitas_keluar`, `keterangan`) VALUES
(1, '567', '1656455716', 'bag', 'Karpet Masjid', 15, 'Sudah Usang'),
(2, '785', '1656455708', 'bag', 'Mic', 5, 'Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bm`
--

CREATE TABLE `tb_bm` (
  `id` int(11) NOT NULL,
  `kd_barang` varchar(128) NOT NULL,
  `tgl_pendataan` varchar(128) NOT NULL,
  `petugas` varchar(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `kuantitas_masuk` int(11) NOT NULL,
  `kuantitas_keluar` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bm`
--

INSERT INTO `tb_bm` (`id`, `kd_barang`, `tgl_pendataan`, `petugas`, `nama_barang`, `kuantitas_masuk`, `kuantitas_keluar`, `keterangan`) VALUES
(1, '567', '1656453729', 'bag', 'Pengeras Suara', 10, 0, 'Dari RT'),
(2, '785', '1656454602', 'bag', 'Radio', 5, 0, 'Dari Pemerintah'),
(3, '768', '1656453845', 'bag', 'Karpet Masjid', 20, 0, 'Hamba Allah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dm`
--

CREATE TABLE `tb_dm` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telpon` varchar(128) NOT NULL,
  `petugas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dm`
--

INSERT INTO `tb_dm` (`id`, `nama`, `kategori`, `alamat`, `no_telpon`, `petugas`) VALUES
(5, 'ibu siti', 'janda', 'kp.stangkle', '0212345678', 'Irvan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fitrah`
--

CREATE TABLE `tb_fitrah` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` char(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `status` enum('masuk','keluar') NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_telepon` varchar(128) NOT NULL,
  `bentuk_zakat` enum('beras','uang tunai','gandum','emas','perak') NOT NULL,
  `satuan_zakat` enum('RUPIAH','KILOGRAM','GRAM','LITER') NOT NULL,
  `jumlah_jiwa` int(11) NOT NULL,
  `jumlah_zakat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fitrah`
--

INSERT INTO `tb_fitrah` (`id_transaksi`, `kode_transaksi`, `id_user`, `date`, `status`, `nama`, `alamat`, `no_telepon`, `bentuk_zakat`, `satuan_zakat`, `jumlah_jiwa`, `jumlah_zakat`) VALUES
(11, 'ZF', 20, '2022-07-07', 'masuk', 'irvan', 'kp.stangkle', '087777321', 'uang tunai', 'RUPIAH', 1, '75000'),
(18, 'ZF', 20, '2022-07-08', 'keluar', 'diki', '12', '78979798', 'uang tunai', 'RUPIAH', 1, '5000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventaris`
--

CREATE TABLE `tb_inventaris` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pendataan` date NOT NULL,
  `nama_barang` text NOT NULL,
  `kuantitas_masuk` varchar(128) DEFAULT NULL,
  `kuantitas_keluar` varchar(128) DEFAULT NULL,
  `satuan` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `dokumentasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_inventaris`
--

INSERT INTO `tb_inventaris` (`id_barang`, `kode_barang`, `id_user`, `tgl_pendataan`, `nama_barang`, `kuantitas_masuk`, `kuantitas_keluar`, `satuan`, `keterangan`, `dokumentasi`) VALUES
(37, 'KB', 20, '2022-07-07', 'kipas angin', '3', '0', 'SATUAN', 'dari pak rt', ''),
(40, 'BK', 20, '2022-07-08', 'kipas angin', '0', '1', 'SATUAN', 'Rusak', 'alhidayah.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_kegiatan`
--

CREATE TABLE `tb_jenis_kegiatan` (
  `id_jenis` int(11) NOT NULL,
  `jenis_kegiatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_kegiatan`
--

INSERT INTO `tb_jenis_kegiatan` (`id_jenis`, `jenis_kegiatan`) VALUES
(1, 'Kajian Subuh'),
(2, 'Kegiatan Rohis'),
(5, 'Khutbah Jum\'at'),
(6, 'Ta\'lim Mingguan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kas`
--

CREATE TABLE `tb_kas` (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(128) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `pemasukan` varchar(128) DEFAULT NULL,
  `pengeluaran` varchar(128) DEFAULT NULL,
  `dokumentasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kas`
--

INSERT INTO `tb_kas` (`id`, `kd_transaksi`, `id_barang`, `id_kategori`, `id_user`, `keterangan`, `date`, `pemasukan`, `pengeluaran`, `dokumentasi`) VALUES
(32, '0131', NULL, 1, 20, 'Hamba Allah', '2022-07-07', '150000', NULL, 'alhidayah.png'),
(33, '0152', NULL, 1, 20, 'membeli pralatan kebersihan', '2022-07-07', NULL, '55000', 'alhidayah1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kas_kategori`
--

CREATE TABLE `tb_kas_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kas_kategori`
--

INSERT INTO `tb_kas_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Dana Umum'),
(2, 'Infaq Jum\'at'),
(3, 'santunan Anak Yatim'),
(5, 'kebersihan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `judul_kegiatan` varchar(128) NOT NULL,
  `narasumber` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mal`
--

CREATE TABLE `tb_mal` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `status` enum('masuk','keluar') NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_telepon` varchar(128) NOT NULL,
  `bentuk_zakat` varchar(128) NOT NULL,
  `satuan_zakat` enum('RUPIAH','KILOGRAM','EKOR','LITER','GRAM') NOT NULL,
  `jumlah_jiwa` int(11) NOT NULL,
  `jumlah_zakat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mal`
--

INSERT INTO `tb_mal` (`id_transaksi`, `kode_transaksi`, `id_user`, `date`, `status`, `nama`, `alamat`, `no_telepon`, `bentuk_zakat`, `satuan_zakat`, `jumlah_jiwa`, `jumlah_zakat`) VALUES
(7, 'ZM', 20, '2022-07-08', 'masuk', 'irvan', 'kp.stangkle', '0212345678', 'uang tunai', 'RUPIAH', 1, '230000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id_roles` int(5) NOT NULL,
  `nama_roles` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_roles`
--

INSERT INTO `tb_roles` (`id_roles`, `nama_roles`) VALUES
(1, 'Admin'),
(6, 'Ketua DKM'),
(7, 'Sekertaris'),
(8, 'Seksi Dakwah'),
(9, 'Bendahara'),
(10, 'Seksi Pembangunan'),
(11, 'Seksi Humas'),
(12, 'Seksi Pemudaan'),
(13, 'Ketua karangtaruna');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `img` varchar(128) NOT NULL,
  `password` varchar(256) DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `id_roles` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name`, `email`, `img`, `password`, `id_roles`, `is_active`, `date_created`) VALUES
(20, 'Irvan', 'iqbalsatrio12@ymail.com', 'fb1.png', '$2y$10$9Sefo7XR4S2yBWFBDoFib.nCTAwdjLOrXmK7wOqHq0PT/cDuAp6rW', '1', 1, 1656419582),
(25, 'H. Amin Fauzi, S.Pdi', 'bag1@gmail.com', 'WhatsApp_Image_2022-06-09_at_23_33_11.jpg', '$2y$10$kQIP1hA7xjYZgIB6yWPuDOmleXdDFEHMUjJ7KTM8vdg.alfsS7CL2', '6', 1, 1656817571),
(26, 'Irfansyah, SE', 'infansyah@gmail.com', 'WhatsApp_Image_2022-06-09_at_23_33_111.jpg', '$2y$10$lMEZFnzrAznM0ze95AF.K.wFpOwFww9PdKhSnMr5HMoFWqPt/CU82', '7', 1, 1656817637),
(27, 'Rohmat', 'rohmat@gmail.com', 'WhatsApp_Image_2022-06-09_at_23_33_112.jpg', '$2y$10$DOVL1cez4DxvAX9zRPNjBOmCh4C/NM/Yz7EC896xyrdMjPKfa9.ue', '9', 1, 1656817661),
(28, 'Kiki Dwi', 'kikidwi@gmail.com', 'WhatsApp_Image_2022-06-09_at_23_33_113.jpg', '$2y$10$4DHhoF.2u0TVm02HxtLrvuRyzfYJa4hqsai1X2exm8qOIad.sWFTS', '11', 1, 1656817697),
(29, 'Irwan', 'irwan@gmail.com', 'WhatsApp_Image_2022-06-09_at_23_33_114.jpg', '$2y$10$BUGAioZFO.mjuGrNRwsa8OIxOiwzhg42xrpH5T6Y/Sm3xIaXwFf5a', '10', 1, 1656817903),
(30, 'Ust. Sholeh, S.Pd', 'Sholeh@gmail.com', 'WhatsApp_Image_2022-06-09_at_23_33_115.jpg', '$2y$10$qIDBBiUXLI3kBbyKHIjVBuonlHCKmAowSlhscGirDulQG4RprqJqi', '8', 1, 1656817980),
(31, 'Ust. Ahmad Satiri', 'ahmadsatiri@gmail.com', 'WhatsApp_Image_2022-06-09_at_23_33_116.jpg', '$2y$10$LyJju/qE/K.i69hkrHpWB.aQhAfmEnxeyIFtlIBHnS1SCqLpELIRG', '8', 1, 1656818053),
(32, 'Humaidi Imron, S.Ag', 'humaidiimron@gmail.com', 'WhatsApp_Image_2022-06-09_at_23_33_117.jpg', '$2y$10$YFWJCc.sAdE4KjL1REXicOmj.91jwf95NAxHS//I2t.sULYgvzA2W', '8', 1, 1656818113),
(33, 'Kiyai Amir Mahmud', 'amirmahmud@gmail.com', 'WhatsApp_Image_2022-06-09_at_23_33_118.jpg', '$2y$10$nKmNfQByRbx2lalCdQWUtemoHFfCh8qRCtIUO258pD/uCwB/IX9Hy', '8', 1, 1656818198),
(34, 'Kiyai Salman Mai', 'salmanmai@gmail.com', 'WhatsApp_Image_2022-06-09_at_23_33_119.jpg', '$2y$10$OKaDKN0mYc4UCUD6mQP65uOtzus06YS3Z/PUwl1LulWe7gbHoQwSS', '8', 1, 1656818226),
(36, 'diki', 'dikicobamasuk@gmail.com', 'diki_remove.png', '$2y$10$COnnIn41yKe3dGQumOLM6eXcNgWkFFaJEdK6jqayLSXXyf4adEgjm', '13', 1, 1657241140);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `id_roles`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 12),
(7, 1, 9),
(8, 1, 10),
(9, 1, 11),
(10, 1, 8),
(11, 1, 13),
(12, 1, 14),
(14, 1, 15),
(15, 1, 16),
(16, 9, 2),
(17, 9, 8),
(18, 9, 15),
(19, 9, 16),
(22, 6, 2),
(23, 6, 17),
(25, 6, 8),
(26, 6, 9),
(27, 6, 10),
(28, 6, 11),
(29, 6, 14),
(30, 6, 13),
(31, 6, 16),
(32, 6, 15),
(33, 7, 2),
(34, 7, 8),
(35, 7, 9),
(36, 7, 10),
(37, 7, 11),
(38, 7, 14),
(39, 9, 9),
(40, 10, 2),
(41, 10, 9),
(42, 8, 2),
(43, 8, 11),
(44, 8, 10),
(45, 11, 10),
(46, 11, 2),
(47, 11, 11),
(48, 12, 2),
(49, 12, 10),
(50, 12, 11),
(51, 12, 13),
(53, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Dashboard'),
(2, 'Keuangan'),
(3, 'menu'),
(8, 'Zakat Fitrah'),
(9, 'Zakat Mal'),
(10, 'Agenda'),
(11, 'Inventaris'),
(13, 'Mustahik'),
(14, 'Post'),
(15, 'Utilitas'),
(16, 'Admin'),
(17, 'Utilitas');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `id_menu`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'dashboard', 'fas fa-chart-line', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 0),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 0),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 16, 'Jabatan', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 0),
(17, 16, 'Tambah User', 'admin/group', 'fas fa-fw fa-users', 1),
(22, 2, 'kas masuk', 'keuangan/masuk', 'fas fa-money-bill-wave', 1),
(23, 11, 'Barang Masuk', 'inventaris/masuk', 'fas fa-fw fa-box', 1),
(24, 11, 'Barang Keluar', 'inventaris/keluar', 'fas fa-fw fa-box', 1),
(26, 13, 'Daftar Mustahik', 'mustahik/daftar', 'fas fa-fw fa-users', 1),
(27, 2, 'Kas Keluar', 'keuangan/keluar', 'fas fa-coins', 1),
(28, 2, 'Saldo Kas', 'keuangan/saldo', 'fas fa-money-check-alt', 1),
(29, 8, 'Data Muzakki', 'zakat/fitrah', 'fas fa-fw fa-briefcase', 1),
(30, 8, 'Data Mustahik', 'zakat/keluar', 'fas fa-fw fa-briefcase', 1),
(31, 8, 'Rekap Zakat Fitrah', 'zakat/rekap', 'fas fa-fw fa-tachometer-alt', 0),
(32, 9, 'Zakat Mal Masuk', 'zakat/mal', 'fas fa-fw fa-briefcase', 1),
(33, 9, 'Zakat Mal Keluar', 'zakat/malkeluar', 'fas fa-fw fa-briefcase', 1),
(34, 9, 'Rekap Zakat Mal', 'Zakat/malrekap', 'fas fa-fw fa-tachometer-alt', 0),
(35, 14, 'Berita', 'post/berita', 'fas fa-fw fa-folder-open', 1),
(36, 10, 'Agenda Kegiatan', 'agenda/kegiatan', 'fas fa-fw fa-newspaper', 1),
(37, 11, 'Stok barang', 'inventaris/stok', 'fas fa-fw fa-box', 1),
(38, 14, 'Banner', 'post/banner', 'fas fa-fw fa-folder-open', 1),
(39, 15, 'Kategori Kas', 'keuangan/kategori', 'fas fa-fw fa-file', 1),
(40, 15, 'Kategori Berita', 'post/kategori', 'fas fa-fw fa-file', 1),
(41, 15, 'Jenis Kegiatan', 'agenda/jenis', 'fas fa-fw fa-file', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(5, 'elokelikccc@gmail.com', 'isJaNeFp5mVkktMf4OKey8xO0KsPQCaw1x1KxV+WRtw=', 1619504042),
(6, 'elokelikccc@gmail.com', 'HqylqHu10DiYjbkIgY/+n2YA/ToFx4xEwSFmXqnOaXc=', 1619504075),
(7, 'bagazttkc98@gmail.com', 'KhXpmEIFeUn6YQ3IyQOvkYr8bvXtg2BirFa5wGyhkv4=', 1619504274),
(8, 'bagazttkc98@gmail.com', 'Zy0nPU1LekkzsfNqDzSmiI5BECGHTNzqvlf/93RM6xs=', 1619505311);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bener`
--
ALTER TABLE `tb_bener`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita_kategori`
--
ALTER TABLE `tb_berita_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_bk`
--
ALTER TABLE `tb_bk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bm`
--
ALTER TABLE `tb_bm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dm`
--
ALTER TABLE `tb_dm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_fitrah`
--
ALTER TABLE `tb_fitrah`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_jenis_kegiatan`
--
ALTER TABLE `tb_jenis_kegiatan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_kas`
--
ALTER TABLE `tb_kas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_kas_kategori`
--
ALTER TABLE `tb_kas_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tb_mal`
--
ALTER TABLE `tb_mal`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_bener`
--
ALTER TABLE `tb_bener`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_berita_kategori`
--
ALTER TABLE `tb_berita_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_bk`
--
ALTER TABLE `tb_bk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_bm`
--
ALTER TABLE `tb_bm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_dm`
--
ALTER TABLE `tb_dm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_fitrah`
--
ALTER TABLE `tb_fitrah`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_jenis_kegiatan`
--
ALTER TABLE `tb_jenis_kegiatan`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kas`
--
ALTER TABLE `tb_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_kas_kategori`
--
ALTER TABLE `tb_kas_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mal`
--
ALTER TABLE `tb_mal`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id_roles` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
