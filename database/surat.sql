-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 06:30 AM
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
  `tanggal` date NOT NULL,
  `jenis_kegiatan` varchar(128) NOT NULL,
  `judul_kegiatan` varchar(128) NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `narasumber` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Moch. Dicky Oktavian', 'janda', 'Kp.Stangkle', '081234567890', 'bag'),
(3, 'Muhammad Iqbal', 'riqab', 'Kp.Stangkle', '081234567890', 'bag');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fitrah`
--

CREATE TABLE `tb_fitrah` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `beras` varchar(128) NOT NULL,
  `uang` varchar(128) NOT NULL,
  `tanggal_input` varchar(128) NOT NULL,
  `dibuat_oleh` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fitrah`
--

INSERT INTO `tb_fitrah` (`id`, `nama`, `beras`, `uang`, `tanggal_input`, `dibuat_oleh`) VALUES
(2, 'Muhammad Bilal', '50KG', '', '1656447823', 'bag'),
(4, 'Muhammad Iqbal', '50KG', '100000', '1656447697', 'bag');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kas`
--

CREATE TABLE `tb_kas` (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `pemasukan` varchar(128) NOT NULL,
  `pengeluaran` varchar(128) NOT NULL,
  `dokumentasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Infaq Jum\'at');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mal`
--

CREATE TABLE `tb_mal` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `beras` varchar(128) NOT NULL,
  `uang` varchar(128) NOT NULL,
  `tanggal_input` varchar(128) NOT NULL,
  `dibuat_oleh` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mal`
--

INSERT INTO `tb_mal` (`id`, `nama`, `beras`, `uang`, `tanggal_input`, `dibuat_oleh`) VALUES
(1, 'Irvan Adam Permana', '', '100000', '1656447907', 'bag'),
(3, 'Muhammad Bilal', '100KG', '', '1656448671', 'bag'),
(4, 'Muhammad Bilal', '', '100000', '1656447670', 'bag');

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
(12, 'Seksi Pemudaan');

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
(20, 'bag', 'iqbalsatrio12@ymail.com', 'Screenshot_(4).png', '$2y$10$9Sefo7XR4S2yBWFBDoFib.nCTAwdjLOrXmK7wOqHq0PT/cDuAp6rW', '1', 1, 1656419582),
(22, 'Muhammad Bilal', 'bag1@gmail.com', '060018100_1450349237-masjid_1.jpg', '$2y$10$PK/j56rrEBXwTIwVD0GvKeIwb4iyea05neWFxW.DeQf.bWNCU.Xsa', '6', 1, 1656470885),
(23, 'Moch. Dicky Oktavian', 'bagazttkc98@gmail.com', 'Screenshot_(36).png', '$2y$10$4uFkU73cBIunzf6PQzDYmehufQhwwN6nnNI3sO1gcJ61YL8BlvTgy', '1', 1, 1656587674);

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
(5, 1, 3),
(6, 1, 5),
(7, 1, 9),
(8, 1, 10),
(9, 1, 11),
(10, 1, 8),
(11, 1, 13),
(12, 1, 14);

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
(1, 'Admin'),
(2, 'User'),
(3, 'menu'),
(5, 'Zakat'),
(6, 'Jis'),
(8, 'Keuangan'),
(9, 'Inventaris'),
(10, 'Donatur'),
(11, 'Waqaf'),
(12, 'Agenda Kegiatan'),
(13, 'Mustahik'),
(14, 'Dashboard');

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
(1, 14, 'Dashboard', 'dashboard', 'fas fa-chart-line', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 5, 'Zakat Fitrah', 'zakat/fitrah', 'fas fa-fw fa-envelope', 1),
(10, 5, 'Zakat Mal', 'zakat/mal', 'far fa-fw fa-envelope', 1),
(11, 6, 'Surat Keluar', 'penomoran/keluar', 'far fa-fw fa-envelope', 1),
(12, 6, 'Surat Undangan', 'penomoran/undangan', 'fas fa-fw fa-envelope-open-text\"', 1),
(13, 6, 'Berita Acara', 'penomoran/acara', 'fab fa-fw fa-mailchimp', 1),
(14, 6, 'Kontrak', 'penomoran/kontrak', 'fas fa-fw fa-file-signature', 1),
(15, 6, 'BARIK', 'penomoran/barik', 'fas fa-fw fa-mail-bulk', 1),
(16, 6, 'Penilaian Kinerja Rekanan', 'penomoran/kinerja', 'fas fa-fw fa-star', 1),
(17, 1, 'Tambah User', 'admin/group', 'fas fa-fw fa-users', 1),
(22, 8, 'kas masuk', 'keuangan/masuk', 'fas fa-fw fa-tachometer-alt', 1),
(23, 9, 'Barang Masuk', 'inventaris/masuk', 'fas fa-fw fa-box-circle-check', 1),
(24, 9, 'Barang Keluar', 'inventaris/keluar', 'fas fa-fw fa-box-circle-check', 1),
(25, 12, 'Tabel Kegiatan', 'kegiatan/kegiatan', 'fas fa-fw fa-tachometer-alt', 1),
(26, 13, 'Daftar Mustahik', 'mustahik/daftar', 'fas fa-fw fa-tachometer-alt', 1),
(27, 8, 'Kas Keluar', 'keuangan/kaskeluar', 'fas fa-coins', 1);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kas`
--
ALTER TABLE `tb_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kas_kategori`
--
ALTER TABLE `tb_kas_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_mal`
--
ALTER TABLE `tb_mal`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_fitrah`
--
ALTER TABLE `tb_fitrah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kas`
--
ALTER TABLE `tb_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kas_kategori`
--
ALTER TABLE `tb_kas_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_mal`
--
ALTER TABLE `tb_mal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id_roles` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
