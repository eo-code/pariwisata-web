-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 12:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `idlogin` varchar(15) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`idlogin`, `nama`, `username`, `password`, `level_user`) VALUES
('01', 'admin', 'admin', 'admin', 'ADMINISTRATOR'),
('02', 'Mahasiswa', 'mahasiswa', 'mahasiswa', 'MAHASISWA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nm_kategori` varchar(255) NOT NULL,
  `gambar_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nm_kategori`, `gambar_kategori`) VALUES
(1, 'Wisata Pantai', 'jeremy-bishop-GntGR-SHkXE-unsplash_1599041804.jpg'),
(2, 'Wisata Gunung', 'killian-pham-Sq8rpq2KB7U-unsplash_1599041834.jpg'),
(44, 'Wisata Budaya', 'surya-prakosa-QqZqRN7iThY-unsplash_1599042125.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(2) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `email_admin` varchar(40) NOT NULL,
  `pass_admin` varchar(40) NOT NULL,
  `level_admin` enum('Admin','Super Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `email_admin`, `pass_admin`, `level_admin`) VALUES
(1, 'Otniel', 'otnielsi2016@gmail.com', '4428c6c474502e61151877825bb41961', 'Super Admin'),
(2, 'Oni', 'otniel.oktaviani97@gmail.com', 'd54d1702ad0f8326224b817c796763c9', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas`
--

CREATE TABLE `tb_fasilitas` (
  `id_fasilitas` int(2) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(105) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_fasilitas`
--

INSERT INTO `tb_fasilitas` (`id_fasilitas`, `nama_fasilitas`, `deskripsi`, `gambar`) VALUES
(2, 'qw', 'qaa', 'C:xampp	mpphpBE57.tmp'),
(3, '2', 'wqe3', 'C:xampp	mpphpF70E.tmp'),
(4, 'JHNF', 'YHYR', 'C:xampp	mpphp283D.tmp'),
(5, 'dfede', 'rf', 'C:xampp	mpphp90AE.tmp'),
(6, 'ww', 'we', 'C:xampp	mpphp974.tmp'),
(7, 'r3', '3e3e', 'C:xampp	mpphp4C5A.tmp');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id_gambar` int(11) NOT NULL,
  `judul_gambar` varchar(50) NOT NULL,
  `nama_gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`id_gambar`, `judul_gambar`, `nama_gambar`) VALUES
(1, 'Ciba aja', 'smpt_1599040783.png'),
(2, 'Pulau Dua', 'images-pulau-dua_1599041147.jpg'),
(3, 'Peninggalan PD II', 'image-peninggala-PD-II_1599041182.jpg'),
(4, 'Coba lagi', 'bg-01_1599041221.jpg'),
(5, 'Nama Gambar Lagi', 'pondok_1599041247.png'),
(6, 'dasd', 'jeremy-bishop-GntGR-SHkXE-unsplash_1599041570.jpg'),
(7, 'asd', 'killian-pham-Sq8rpq2KB7U-unsplash_1599041595.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_identitas`
--

CREATE TABLE `tb_identitas` (
  `id_identitas` int(2) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `deskripsi` varchar(180) NOT NULL,
  `kata_kunci` varchar(200) NOT NULL,
  `pembuat` varchar(40) NOT NULL,
  `hak_cipta` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `slogan` varchar(120) NOT NULL,
  `footer` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_identitas`
--

INSERT INTO `tb_identitas` (`id_identitas`, `nama_website`, `deskripsi`, `kata_kunci`, `pembuat`, `hak_cipta`, `logo`, `slogan`, `footer`) VALUES
(1, 'Taman Mangrove Klawalu', 'Tempat wisata Mangrove di Kota Sorong', 'Mangrove', 'Dispar', 'Copy Right-All Right Reserved', 'Logo.png', 'Sejukkan hati di Taman Mangrove ', 'DisParKotaSorong');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(3) NOT NULL,
  `tanggal_komentar` date NOT NULL,
  `Email` varchar(40) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kunjungan`
--

CREATE TABLE `tb_kunjungan` (
  `id_kunjungan` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_pengunjung` int(3) NOT NULL,
  `harga` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kunjungan`
--

INSERT INTO `tb_kunjungan` (`id_kunjungan`, `tanggal`, `jumlah_pengunjung`, `harga`) VALUES
(1, '0000-00-00', 5, 1000),
(2, '2001-02-02', 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id_slider` int(3) NOT NULL,
  `ket_slider` text NOT NULL,
  `gambar` varchar(105) NOT NULL,
  `judul_slider` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`id_slider`, `ket_slider`, `gambar`, `judul_slider`) VALUES
(1, 'aneka kursi trand baru', 'sofa.jpg', 'kursi'),
(2, 'WW2', '1900948.jpg', 'QQW'),
(3, 'edef', '5.jpg', 'eed'),
(4, 'frfr', '6.jpg', 'rfrf'),
(5, 'erfr', '7.jpg', 'de'),
(6, 'rfre', '4.jpg', 'ffrf'),
(7, '4rft5ymol', '2.jpg', '4r42r'),
(8, 'u8k', '7.jpg', '6u'),
(9, 'ui9o', '5.jpg', '575'),
(10, 'iko', '3.jpg', '8i6'),
(11, 'olyt', '1.jpg', 'olou'),
(12, '3e', '6.jpg', 'e3'),
(13, 'edw', '7.jpg', 'edeq');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wisata`
--

CREATE TABLE `tb_wisata` (
  `id_wisata` int(2) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `nama_pengelola` varchar(40) NOT NULL,
  `kelurahan` varchar(40) NOT NULL,
  `distrik` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat_wisata` text NOT NULL,
  `telp_wisata` varchar(20) NOT NULL,
  `id_kunjungan` int(2) NOT NULL,
  `id_admin` int(2) NOT NULL,
  `logo` varchar(105) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wisata`
--

INSERT INTO `tb_wisata` (`id_wisata`, `nama_wisata`, `nama_pengelola`, `kelurahan`, `distrik`, `deskripsi`, `alamat_wisata`, `telp_wisata`, `id_kunjungan`, `id_admin`, `logo`) VALUES
(1, 'Taman Mangrove Klawalu', 'Dinas Pariwisata Kota Sorong', 'Klawalu', 'Sorong Timur', 'Taman Mangrove Klawalu adalah tempat wisata blablabla', 'jl. Malibela', '085243435647', 0, 2, 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` varchar(12) NOT NULL,
  `nama_wisata` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_kategori` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `alamat`, `deskripsi`, `gambar`, `id_kategori`) VALUES
('123', 'Puncak Jaya Wijaya', 'Jayapura', 'ini adalah puncak', 'killian-pham-Sq8rpq2KB7U-unsplash_1599041873.jpg', 2),
('2', 'Pantai Indah Kapuk', 'Papua', 'ini pantai', 'jeremy-bishop-GntGR-SHkXE-unsplash_1599041919.jpg', 1),
('433', 'Wisata desa Tambrau', 'Kabupaten Tambrau', 'ini wisata budaya', 'surya-prakosa-QqZqRN7iThY-unsplash_1599042184.jpg', 44);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idlogin`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  MODIFY `id_fasilitas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  MODIFY `id_kunjungan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id_slider` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_wisata`
--
ALTER TABLE `tb_wisata`
  MODIFY `id_wisata` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
