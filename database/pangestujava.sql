-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 01:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pangestujava`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(125) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `akses_level` varchar(255) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `username`, `password`, `tanggal_lahir`, `akses_level`, `gambar`, `tgl_update`) VALUES
(15, 'Rahmat Hidayat', 'hidayatr1234@gmail.com', 'iyan', '70f32b0989903de63dde4ea96d5d4000', '11/07/1999', 'Admin', 'IMG_20200206_144745.jpg', '2021-01-29 13:02:49'),
(16, 'Nadia Aulia Rahmah', 'nadia.auliarahmah.nar@gmail.com', 'nadiarhmh_', '3bfdf9c0d4511805323dc22852501516', '11/15/2000', 'Admin', 'Cinemagraph Eksposur Ganda.png', '2021-01-29 13:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id_biodata` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `panggilan` varchar(50) NOT NULL,
  `saya` text NOT NULL,
  `ahli` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telpon` varchar(14) NOT NULL,
  `fb` varchar(300) NOT NULL,
  `ig` varchar(300) NOT NULL,
  `linked` varchar(300) NOT NULL,
  `github` varchar(300) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id_biodata`, `nama`, `panggilan`, `saya`, `ahli`, `alamat`, `email`, `telpon`, `fb`, `ig`, `linked`, `github`, `gambar`, `tanggal_update`) VALUES
(1, 'Rahmat Hidayat', 'Rahmat', '<p class=\"MsoNormal\" style=\"text-align:justify;line-height:115%\"><span lang=\"ms\" style=\"font-size:12.0pt;line-height:115%;font-family:\" times=\"\" new=\"\" roman\",serif\"=\"\"><span style=\"font-family: Verdana;\">I\r\ngraduated school in 2018 which is continuing Education to a higher level. I\r\ntake majoring in Information Systems, when my last GPA was 3.52 majoring in\r\nInformation Systems. I\m focused to the creation of a Website using CodeIgniter\r\nframework. I really want to add my experience is beyond my means.</span><o:p></o:p></span></p>', 'Web Development, Colleger, Freelancer', 'Jl. Kampung baru', 'fulan@gmail.com', '082167543906', 'https://www.facebook.com/rahmat.hidayatt.779/', 'https://www.instagram.com/hidayat_r78/', 'https://www.linkedin.com/in/rahmat-hidayat-a106621b2/', 'https://github.com/Hidayatr78', 'Iyan.png', '2021-04-18 08:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_project`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(23, 7, 'asdfasdfasdfadsf', 'Logo 1.png', '2021-02-24 07:15:52'),
(24, 8, 'mama', 'Logo 1.png', '2021-02-24 07:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(13, 'sepatu', 'Sepatu', 1, '2020-05-12 04:58:34'),
(14, 'sandal', 'Sandal', 2, '2020-05-12 04:58:48'),
(15, 'baju', 'Baju', 3, '2020-05-12 04:59:04'),
(16, 'celana', 'Celana', 4, '2020-05-12 04:59:25'),
(17, 'tas', 'Tas', 5, '2020-05-12 04:59:40'),
(18, 'ransel', 'Ransel', 5, '2020-06-05 08:38:41'),
(19, 'masker', 'Masker', 6, '2020-06-05 08:51:59'),
(20, 'apparel-top', 'Apparel Top', 7, '2020-06-05 08:58:59'),
(21, 'apparel-bottom', 'Apparel Bottom', 8, '2020-06-05 09:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `id_keahlian` int(11) NOT NULL,
  `nama_keahlian` varchar(255) NOT NULL,
  `deskripsi_keahlian` text NOT NULL,
  `gambar_keahlian` varchar(300) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id_keahlian`, `nama_keahlian`, `deskripsi_keahlian`, `gambar_keahlian`, `tanggal_update`) VALUES
(17, 'asdfasdfadsf', 'asdfasdfasfdawfawdfasdf', 'Logo 1.png', '2021-02-23 07:03:02'),
(18, 'asdfasdfasdf', 'asdfasdfasdf', 'Logo 2.2.png', '2021-03-02 19:38:18'),
(19, 'asdfasdfasdfadsf', 'asdfasdfasdfasdf', 'Logo 1_1.png', '2021-03-02 19:38:37'),
(20, 'asfasdfasdfasdfafs', 'sadfsadf', 'Logo 2.2_1.png', '2021-03-03 07:34:46'),
(21, 'sdfsdfsdf', 'sdfsdfsdafasdfsdafsadfsdaf', 'Logo 2.2_2.png', '2021-03-03 10:06:37'),
(23, 'asdfadfs', 'dafsds', 'Logo 1_2.png', '2021-04-06 06:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(300) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `website`, `keywords`, `metatext`, `deskripsi`, `logo`, `icon`, `tanggal_update`) VALUES
(1, 'PangestuJava', 'My Portfolio', 'http://localhost/pangestujava/public/iyan', 'rahmat hidayat, portfolio, portfolio rahmat, portfolio rahmat hidayat', 'ok            ', ' Mantul', 'Logo 2.2_1.png', 'Logo 1.png', '2021-04-06 06:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `email`, `pesan`) VALUES
(6, 'Rahmat Hidayat', 'hidayatr123@gmail.com', 'efasasefafaswdfasf'),
(7, 'Rahmat Hidayat', 'hidayatr1234@gmail.com', 'asdfafasdfasdfasdf'),
(8, 'Rahmat Hidayat', 'hidayatr1234@gmail.com', 'asdfasdfasdfasdfasdf'),
(9, 'Rahmat Hidayat', 'sultan@gmail.com', 'asdfasdfasdf'),
(10, 'Rahmat Hidayat', 'hidayatr123@gmail.com', 'asdfasdf'),
(11, 'asdfasdfasdf', 'hidayatr00@yahoo.co.id', 'asdfasdf'),
(12, 'Rahmat Hidayat a', 'ari.aab@bsi.ac.id', 'asdfasdfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `institusi` varchar(300) NOT NULL,
  `tahun_masuk` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id_pengalaman` int(11) NOT NULL,
  `bidang` varchar(255) NOT NULL,
  `institusi` varchar(300) NOT NULL,
  `thn_masuk` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `nama_project` varchar(255) NOT NULL,
  `deskripsi_project` text NOT NULL,
  `gambar_project` varchar(300) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `nama_project`, `deskripsi_project`, `gambar_project`, `tanggal_update`) VALUES
(9, 'asdfasdfasdfasd', 'asdfasdfasdfasdf', 'Logo 2.2.png', '2021-03-08 06:38:07'),
(10, 'asdfasdfasdfasdf', 'asdfasdfasdfasdfasdf', 'Logo 1.png', '2021-03-08 07:50:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_biodata`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id_keahlian`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id_pengalaman`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id_keahlian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id_pengalaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
