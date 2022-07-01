-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 10:19 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

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
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `tgl` varchar(128) NOT NULL,
  `disposisi_kepada` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `hasil_disposisi` varchar(128) NOT NULL,
  `sesuai disposisi` varchar(128) NOT NULL,
  `teruskan kepada` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dept`
--

CREATE TABLE `tb_dept` (
  `id_dept` int(11) NOT NULL,
  `kd_surat` varchar(128) NOT NULL,
  `nama_dept` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dept`
--

INSERT INTO `tb_dept` (`id_dept`, `kd_surat`, `nama_dept`) VALUES
(1, 'B1', 'Operation Management'),
(2, '', 'Traffic Information Center'),
(3, '', 'Traffic Service System & Security'),
(4, '', 'Transaction & Invironment Service'),
(5, '', 'Customer Service'),
(6, '', 'Advisor Customer Service'),
(7, '', 'Finance & Accounting'),
(8, '', 'IT Planning & Development'),
(9, '', 'IT Infrastruktur & Service'),
(10, '', 'Human Capital'),
(11, '', 'General Affair'),
(12, '', 'Legal And Office Administration'),
(13, '', 'Procurement & Assets'),
(14, '', 'Governance, Risk & Compliance');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dir`
--

CREATE TABLE `tb_dir` (
  `id_dir` int(11) NOT NULL,
  `kd_surat` varchar(128) NOT NULL,
  `nama_dir` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dir`
--

INSERT INTO `tb_dir` (`id_dir`, `kd_surat`, `nama_dir`) VALUES
(1, 'B7.A', 'Direktur Utama'),
(2, '', 'Direktur Teknologi Informasi'),
(3, '', 'Direktur Human Capital'),
(4, '', 'Direktur Keuangan'),
(6, 'A1', 'Direktur Operasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_p_ba`
--

CREATE TABLE `tb_p_ba` (
  `id` int(11) NOT NULL,
  `id_dept` int(11) DEFAULT NULL,
  `no_surat` varchar(128) DEFAULT NULL,
  `tgl` varchar(128) DEFAULT NULL,
  `kepada` varchar(128) DEFAULT NULL,
  `perihal` varchar(128) DEFAULT NULL,
  `ket` varchar(128) DEFAULT NULL,
  `dibuat` varchar(128) DEFAULT NULL,
  `dibuat_oleh` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_p_ba`
--

INSERT INTO `tb_p_ba` (`id`, `id_dept`, `no_surat`, `tgl`, `kepada`, `perihal`, `ket`, `dibuat`, `dibuat_oleh`) VALUES
(1, 5, '001/BA/V/2021', '2021-05-19', 'Manager', 'Pengadaan', 'Penting', '1621502554', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_p_barik`
--

CREATE TABLE `tb_p_barik` (
  `id` int(11) NOT NULL,
  `id_dir` int(11) DEFAULT NULL,
  `id_sec` int(11) DEFAULT NULL,
  `id_dept` int(11) DEFAULT NULL,
  `no_barik` varchar(128) DEFAULT NULL,
  `tgl` varchar(128) DEFAULT NULL,
  `penyedia` varchar(128) DEFAULT NULL,
  `no_spk` varchar(128) DEFAULT NULL,
  `pekerjaan` varchar(128) DEFAULT NULL,
  `nilai` varchar(128) DEFAULT NULL,
  `dibuat` varchar(128) NOT NULL,
  `dibuat_oleh` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_p_barik`
--

INSERT INTO `tb_p_barik` (`id`, `id_dir`, `id_sec`, `id_dept`, `no_barik`, `tgl`, `penyedia`, `no_spk`, `pekerjaan`, `nilai`, `dibuat`, `dibuat_oleh`) VALUES
(1, 0, 0, 2, '001/BARIK/V/2021', '2021-05-15', 'dir', '12180017', 'gantung', '1000000', '1621239801', 'Administrator'),
(2, NULL, NULL, 1, '001/BARIK/VIII/2021', '2021-08-31', 'JMTO', '12180017', 'Pembangunan Jalan', '1000000000', '1630392488', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_p_kontrak`
--

CREATE TABLE `tb_p_kontrak` (
  `id` int(11) NOT NULL,
  `nomor` varchar(128) DEFAULT NULL,
  `id_dept` int(11) DEFAULT NULL,
  `kepada` varchar(128) DEFAULT NULL,
  `tgl` varchar(128) DEFAULT NULL,
  `perihal` varchar(128) DEFAULT NULL,
  `ket` varchar(128) DEFAULT NULL,
  `nilai` varchar(128) DEFAULT NULL,
  `tgl_input` varchar(128) DEFAULT NULL,
  `dibuat_oleh` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_p_kontrak`
--

INSERT INTO `tb_p_kontrak` (`id`, `nomor`, `id_dept`, `kepada`, `tgl`, `perihal`, `ket`, `nilai`, `tgl_input`, `dibuat_oleh`) VALUES
(1, 'Kontrak/001/V/2021', 1, 'Manager', '2021-05-08', 'Kerja Sama', 'sudah', '1000000000', '1621243260', 'Administrator'),
(2, '001/Kontrak/V/2021', 7, 'Manager', '2021-05-15', 'Kerja Sama', 'sudah', '1000000000', '1621243360', 'Administrator'),
(3, '002/Kontrak/V/2021', 11, 'Manager', '2021-05-15', 'Kerja Sama', 'sudah', '1000000000', '1621243381', 'Administrator'),
(4, '003/SP-JMTO/V/2021', 7, 'Manager', '2021-05-17', 'pengadaan', 'penting', '600000', '1621334321', 'Administrator'),
(5, '004/SIPP-JMTO/V/2021', 5, 'SO', '2021-05-17', 'Sewa Kendaraan', 'penting', '20000000', '1621334355', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_p_pkr`
--

CREATE TABLE `tb_p_pkr` (
  `id` int(11) NOT NULL,
  `id_dept` int(11) DEFAULT NULL,
  `no_surat` varchar(128) DEFAULT NULL,
  `pekerjaan` varchar(128) DEFAULT NULL,
  `penyedia` varchar(128) DEFAULT NULL,
  `no_perjanjian` varchar(128) DEFAULT NULL,
  `periode` varchar(128) DEFAULT NULL,
  `tgl` varchar(128) DEFAULT NULL,
  `masa_kontrak` varchar(128) DEFAULT NULL,
  `nilai_kontrak` varchar(128) DEFAULT NULL,
  `dibuat` varchar(128) DEFAULT NULL,
  `dibuat_oleh` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_p_pkr`
--

INSERT INTO `tb_p_pkr` (`id`, `id_dept`, `no_surat`, `pekerjaan`, `penyedia`, `no_perjanjian`, `periode`, `tgl`, `masa_kontrak`, `nilai_kontrak`, `dibuat`, `dibuat_oleh`) VALUES
(1, 11, '001/PKR/V/2021', 'Pembangunan Jalan', 'JMTM', '123456', '2021', '2021-05-24', 'Direktur', '1000000000', '1621828135', 'Administrator'),
(2, 1, '001/PKR/VIII/2021', 'Pembangunan Jalan', 'JMTM', '123456', '2021', '2021-08-30', '12 bulan', '1000000000', '1630384816', 'Administrator'),
(3, 5, '002/PKR/VIII/2021', 'Pembangunan Jalan', 'JMTO', '123456', '2021', '2021-08-30', '12 bulan', '20000000', '1630384846', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_p_sk`
--

CREATE TABLE `tb_p_sk` (
  `id` int(11) NOT NULL,
  `id_dept` int(11) DEFAULT NULL,
  `no_surat` varchar(128) DEFAULT NULL,
  `tgl` varchar(128) DEFAULT NULL,
  `kepada` varchar(128) DEFAULT NULL,
  `ket` varchar(128) DEFAULT NULL,
  `dibuat` varchar(128) DEFAULT NULL,
  `dibuat_oleh` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_p_sk`
--

INSERT INTO `tb_p_sk` (`id`, `id_dept`, `no_surat`, `tgl`, `kepada`, `ket`, `dibuat`, `dibuat_oleh`) VALUES
(1, 5, '001/SK/VIII/2021', '2021-08-03', 'Manager', 'Segera', '1628056231', 'Administrator'),
(2, 5, '002/SK/VIII/2021', '2021-08-23', 'Manager', 'Kelar', '1629815386', 'Administrator'),
(3, 6, '003/SK/VIII/2021', '2021-08-30', 'Manager', 'penting', '1630385124', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_p_su`
--

CREATE TABLE `tb_p_su` (
  `id` int(11) NOT NULL,
  `id_dept` int(11) DEFAULT NULL,
  `no_surat` varchar(128) DEFAULT NULL,
  `tgl` varchar(128) DEFAULT NULL,
  `kepada` varchar(128) DEFAULT NULL,
  `perihal` varchar(128) DEFAULT NULL,
  `ket` varchar(128) DEFAULT NULL,
  `dibuat` varchar(128) DEFAULT NULL,
  `dibuat_oleh` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_p_su`
--

INSERT INTO `tb_p_su` (`id`, `id_dept`, `no_surat`, `tgl`, `kepada`, `perihal`, `ket`, `dibuat`, `dibuat_oleh`) VALUES
(1, NULL, '1234', '2021-04-30', 'dir', 'masuk', 'blas', '1620010788', NULL),
(2, 2, 'UND/001/V/2021', '2021-05-05', 'dir', 'masuk', 'salah', '1620400450', 'Administrator'),
(3, 3, 'UND/002/V/2021', '2021-05-14', 'dir', 'masuk', 'blas', '1620400495', 'Administrator'),
(4, 3, '001/UND/V/2021', '2021-05-05', 'VP', 'Acara Pembukaan', 'Penting', '1620405016', 'Administrator'),
(5, 1, '002/UND/V/2021', '2021-05-07', 'Manager', 'Peresmian Gedung', 'Penting', '1620405403', 'BAGAZT SETYO NUGROHO'),
(6, 12, '003/UND/V/2021', '2021-05-07', 'maager', 'pengadaan', 'penting', '1621235960', 'Administrator'),
(7, 14, '004/UND/V/2021', '2021-05-15', 'Manager', 'pengadaan', 'penting', '1621236339', 'Administrator'),
(8, 6, '005/UND/V/2021', '2021-05-16', 'SO', 'Barang Masuk', 'biasa', '1621334231', 'Administrator'),
(9, 5, '001/UND/VIII/2021', '2021-08-23', 'Manager', 'Kerja Sama', 'Segera', '1629810354', 'Administrator');

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
(6, 'Direktorat'),
(7, 'Department'),
(8, 'Section'),
(9, 'Senior Officer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_section`
--

CREATE TABLE `tb_section` (
  `id_sec` int(11) NOT NULL,
  `kd_surat` varchar(128) NOT NULL,
  `nama_sec` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_section`
--

INSERT INTO `tb_section` (`id_sec`, `kd_surat`, `nama_sec`) VALUES
(1, '', 'Corporate Planing Section'),
(2, '', 'Risk and Quality Section'),
(3, '', 'Traffic Information Center Section'),
(4, '', 'Costumer Service Area Section'),
(5, '', 'Traffic Service System & Security Section'),
(6, '', 'Transation & Environment Service Section'),
(7, '', 'Settlement & Reconciliation Area Section'),
(8, '', 'IT Transaction System Planning Section'),
(9, '', 'IT Strategy & Planning Section'),
(10, 'B7.A', 'IT Application & Development Section'),
(11, '', 'Technology Innovation Section'),
(12, '', 'IT Network & Infrastructure Section'),
(13, '', 'IT Service & Operation Section'),
(14, '', 'Human Capital Planning Section'),
(15, '', 'Human Capital Development Section'),
(16, '', 'Human Capital Administration Section'),
(17, '', 'Human Capital Industrial Relation Section'),
(18, '', 'Legal & Office Administration Section'),
(19, '', 'Procurement & Asset Section'),
(20, '', 'Accounting & Tax Section'),
(21, '', 'Finance Section'),
(22, '', 'Bussiness Planning & Market Research Section'),
(23, '', 'Marketing & Costumer Relation Section');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sk`
--

CREATE TABLE `tb_sk` (
  `id` int(11) NOT NULL,
  `id_dir` int(11) DEFAULT NULL,
  `id_dept` int(11) DEFAULT NULL,
  `id_sec` int(11) DEFAULT NULL,
  `no_surat` varchar(128) DEFAULT NULL,
  `jenis_surat` varchar(128) DEFAULT NULL,
  `dari` varchar(128) DEFAULT NULL,
  `sifat` varchar(128) DEFAULT NULL,
  `tgl` varchar(128) DEFAULT NULL,
  `berkas` varchar(128) DEFAULT NULL,
  `note` varchar(128) DEFAULT NULL,
  `dibuat` varchar(128) NOT NULL,
  `dibuat_oleh` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sk`
--

INSERT INTO `tb_sk` (`id`, `id_dir`, `id_dept`, `id_sec`, `no_surat`, `jenis_surat`, `dari`, `sifat`, `tgl`, `berkas`, `note`, `dibuat`, `dibuat_oleh`) VALUES
(1, NULL, 6, NULL, '001/SK/VI/2021', 'Penting', 'Alendro', 'Rahasia', '2021-06-13', 'abc.pdf', 'Segera', '1623661137', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sm`
--

CREATE TABLE `tb_sm` (
  `id` int(11) NOT NULL,
  `id_dept` int(11) DEFAULT NULL,
  `id_dir` int(11) DEFAULT NULL,
  `id_sec` int(11) DEFAULT NULL,
  `no_surat` varchar(128) DEFAULT NULL,
  `tgl_surat` varchar(128) DEFAULT NULL,
  `pengirim` varchar(128) DEFAULT NULL,
  `perihal` varchar(128) DEFAULT NULL,
  `ket` varchar(128) DEFAULT NULL,
  `berkas` varchar(128) DEFAULT NULL,
  `tgl_disposisi` varchar(128) DEFAULT NULL,
  `dibuat` varchar(128) DEFAULT NULL,
  `dibuat_oleh` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sm`
--

INSERT INTO `tb_sm` (`id`, `id_dept`, `id_dir`, `id_sec`, `no_surat`, `tgl_surat`, `pengirim`, `perihal`, `ket`, `berkas`, `tgl_disposisi`, `dibuat`, `dibuat_oleh`) VALUES
(1, 5, 0, 0, '001/SM/VI/2021', '2021-06-12', 'Agus', 'Pambangunan', 'Penting', NULL, NULL, '1623310255', 'Administrator'),
(3, 0, 2, 0, '001/SM/VII/2021', '2021-07-07', 'Agus', 'Pambangunan', 'penting', 'CE_DoC_Acer_1_0_A_A.pdf', NULL, '1625748358', 'Administrator'),
(4, 5, 0, 0, '002/SM/VII/2021', '2021-07-12', 'Agus', 'Pengadaan', 'Penting', '01_TKD_TIU_CPNS.pdf', NULL, '1626148706', 'Administrator'),
(5, 0, NULL, NULL, '003/SM/VII/2021', '2021-07-14', 'Agus', 'Pengadaan', 'sudah', 'kartukendali_mop1.pdf', NULL, '1626338615', 'Administrator'),
(6, 0, 0, 0, '004/SM/VII/2021', '2021-07-18', 'Agus', 'Pengadaan', 'sudah', 'kartukendali_mop2.pdf', NULL, '1626668550', 'Administrator'),
(7, 0, 1, 0, '005/SM/VII/2021', '2021-07-18', 'Agus', 'Pengadaan', 'sudah', 'kartukendali_mop3.pdf', NULL, '1626677235', 'Administrator'),
(8, 7, 0, 0, '006/SM/VII/2021', '2021-07-19', 'Agus', 'Pengadaan', 'Penting', 'kartukendali_mop4.pdf', NULL, '1626677280', 'Administrator'),
(9, 3, 0, 0, '003/masuk/IX/2022', '2021-08-01', 'Agus', 'Pambangunan', 'Kelar', 'Internship Final Report JSMR.pdf', NULL, '1627888060', 'Administrator'),
(10, 8, 0, 0, '005/mas/VIII/2023', '2021-08-01', 'ASI', 'Pengadaan', 'Segera', 'Internship Final Report JSMR.pdf', NULL, '1627888364', 'BAGAZT SETYO NUGROHO'),
(11, 1, 0, 0, '123/JM/VIII/2021', '2021-08-30', 'Andre', 'Pengaduan', 'penting', 'kartukendali_mop6.pdf', NULL, '1630386115', 'Administrator');

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
(9, 'Administrator', 'derytkc@yahoo.co.id', 'logo-universitas-nusa-mandiri.png', '$2y$10$GjJnEFyRLpwk52pm4A/qYeUSB2mjsiFc.T8EZFCivJjhNxUQjcOR6', '1', 1, 1621828135),
(17, 'BAGAZT SETYO NUGROHO', 'bagazttkc98@gmail.com', 'Penguins.jpg', '$2y$10$17or2sqJGPKYzjBiOnDfleSccC3MsSW7vnon50evKnuM0/TYKZ.Sm', '2', 1, 0),
(19, 'nusa mandiri', 'bagazttkc@yahoo.com', 'Screenshot_(15).png', '$2y$10$NOn87gLLZ7XVVRcwivCqY.MMYyIJEcb7BUgtERi.p6J3ecUzqYHgi', '3', 1, 1623929901);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_dept`
--

CREATE TABLE `user_access_dept` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dept` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_dept`
--

INSERT INTO `user_access_dept` (`id`, `id_user`, `id_dept`) VALUES
(10, 9, 5),
(11, 9, 6),
(12, 9, 7),
(27, 9, 1),
(28, 9, 3),
(30, 17, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_dir`
--

CREATE TABLE `user_access_dir` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_dir`
--

INSERT INTO `user_access_dir` (`id`, `id_user`, `id_dir`) VALUES
(1, 9, 1),
(2, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `id_roles`, `id_menu`) VALUES
(1, 1, 1),
(7, 1, 5),
(8, 1, 6),
(12, 2, 2),
(14, 2, 5),
(20, 1, 3),
(22, 4, 6),
(23, 4, 5),
(24, 4, 2),
(25, 3, 6),
(26, 3, 2),
(27, 3, 5),
(28, 1, 2),
(29, 5, 5),
(30, 5, 2),
(31, 6, 5),
(32, 6, 2),
(33, 7, 5),
(34, 7, 2),
(35, 8, 5),
(36, 8, 2),
(37, 9, 6),
(38, 9, 5),
(39, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_sec`
--

CREATE TABLE `user_access_sec` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_sec`
--

INSERT INTO `user_access_sec` (`id`, `id_user`, `id_sec`) VALUES
(1, 9, 1),
(2, 9, 2),
(3, 9, 3),
(6, 9, 10),
(8, 17, 9),
(9, 17, 10),
(10, 17, 11);

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
(5, 'Surat'),
(6, 'Penomoran');

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
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 5, 'Surat Masuk', 'surat/masuk', 'fas fa-fw fa-envelope', 1),
(10, 5, 'Surat Keluar', 'surat/keluar', 'far fa-fw fa-envelope', 1),
(11, 6, 'Surat Keluar', 'penomoran/keluar', 'far fa-fw fa-envelope', 1),
(12, 6, 'Surat Undangan', 'penomoran/undangan', 'fas fa-fw fa-envelope-open-text\"', 1),
(13, 6, 'Berita Acara', 'penomoran/acara', 'fab fa-fw fa-mailchimp', 1),
(14, 6, 'Kontrak', 'penomoran/kontrak', 'fas fa-fw fa-file-signature', 1),
(15, 6, 'BARIK', 'penomoran/barik', 'fas fa-fw fa-mail-bulk', 1),
(16, 6, 'Penilaian Kinerja Rekanan', 'penomoran/kinerja', 'fas fa-fw fa-star', 1),
(17, 1, 'Group User', 'admin/group', 'fas fa-fw fa-users', 1),
(18, 1, 'Department', 'admin/dept', 'fas fa-fw fa-teeth', 1),
(19, 1, 'Section', 'admin/section', 'fas fa-fw fa-teeth', 1),
(20, 1, 'Direktorat', 'admin/dir', 'fas fa-fw fa-briefcase', 1);

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
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dept`
--
ALTER TABLE `tb_dept`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indexes for table `tb_dir`
--
ALTER TABLE `tb_dir`
  ADD PRIMARY KEY (`id_dir`);

--
-- Indexes for table `tb_p_ba`
--
ALTER TABLE `tb_p_ba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_p_barik`
--
ALTER TABLE `tb_p_barik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_p_kontrak`
--
ALTER TABLE `tb_p_kontrak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_p_pkr`
--
ALTER TABLE `tb_p_pkr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_p_sk`
--
ALTER TABLE `tb_p_sk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_p_su`
--
ALTER TABLE `tb_p_su`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indexes for table `tb_section`
--
ALTER TABLE `tb_section`
  ADD PRIMARY KEY (`id_sec`);

--
-- Indexes for table `tb_sk`
--
ALTER TABLE `tb_sk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sm`
--
ALTER TABLE `tb_sm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_dept`
--
ALTER TABLE `user_access_dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_dir`
--
ALTER TABLE `user_access_dir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_sec`
--
ALTER TABLE `user_access_sec`
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
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_dept`
--
ALTER TABLE `tb_dept`
  MODIFY `id_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_dir`
--
ALTER TABLE `tb_dir`
  MODIFY `id_dir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_p_ba`
--
ALTER TABLE `tb_p_ba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_p_barik`
--
ALTER TABLE `tb_p_barik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_p_kontrak`
--
ALTER TABLE `tb_p_kontrak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_p_pkr`
--
ALTER TABLE `tb_p_pkr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_p_sk`
--
ALTER TABLE `tb_p_sk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_p_su`
--
ALTER TABLE `tb_p_su`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id_roles` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_section`
--
ALTER TABLE `tb_section`
  MODIFY `id_sec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_sk`
--
ALTER TABLE `tb_sk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sm`
--
ALTER TABLE `tb_sm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_access_dept`
--
ALTER TABLE `user_access_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_access_dir`
--
ALTER TABLE `user_access_dir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_access_sec`
--
ALTER TABLE `user_access_sec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
