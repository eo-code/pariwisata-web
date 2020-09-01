-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2020 pada 09.10
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mangrove`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(2) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `email_admin` varchar(40) NOT NULL,
  `pass_admin` varchar(40) NOT NULL,
  `level_admin` enum('Admin','Super Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `email_admin`, `pass_admin`, `level_admin`) VALUES
(1, 'Otniel', 'otnielsi2016@gmail.com', '4428c6c474502e61151877825bb41961', 'Super Admin'),
(2, 'Oni', 'otniel.oktaviani97@gmail.com', 'd54d1702ad0f8326224b817c796763c9', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fasilitas`
--

CREATE TABLE `tb_fasilitas` (
  `id_fasilitas` int(2) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(105) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_fasilitas`
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
-- Struktur dari tabel `tb_identitas`
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
-- Dumping data untuk tabel `tb_identitas`
--

INSERT INTO `tb_identitas` (`id_identitas`, `nama_website`, `deskripsi`, `kata_kunci`, `pembuat`, `hak_cipta`, `logo`, `slogan`, `footer`) VALUES
(1, 'Taman Mangrove Klawalu', 'Tempat wisata Mangrove di Kota Sorong', 'Mangrove', 'Dispar', 'Copy Right-All Right Reserved', 'Logo.png', 'Sejukkan hati di Taman Mangrove ', 'DisParKotaSorong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(3) NOT NULL,
  `tanggal_komentar` date NOT NULL,
  `Email` varchar(40) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kunjungan`
--

CREATE TABLE `tb_kunjungan` (
  `id_kunjungan` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_pengunjung` int(3) NOT NULL,
  `harga` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kunjungan`
--

INSERT INTO `tb_kunjungan` (`id_kunjungan`, `tanggal`, `jumlah_pengunjung`, `harga`) VALUES
(1, '0000-00-00', 5, 1000),
(2, '2001-02-02', 2, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id_slider` int(3) NOT NULL,
  `ket_slider` text NOT NULL,
  `gambar` varchar(105) NOT NULL,
  `judul_slider` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_slider`
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
-- Struktur dari tabel `tb_wisata`
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
-- Dumping data untuk tabel `tb_wisata`
--

INSERT INTO `tb_wisata` (`id_wisata`, `nama_wisata`, `nama_pengelola`, `kelurahan`, `distrik`, `deskripsi`, `alamat_wisata`, `telp_wisata`, `id_kunjungan`, `id_admin`, `logo`) VALUES
(1, 'Taman Mangrove Klawalu', 'Dinas Pariwisata Kota Sorong', 'Klawalu', 'Sorong Timur', 'Taman Mangrove Klawalu adalah tempat wisata blablabla', 'jl. Malibela', '085243435647', 0, 2, 'logo.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `tb_identitas`
--
ALTER TABLE `tb_identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indeks untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indeks untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  MODIFY `id_fasilitas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  MODIFY `id_kunjungan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id_slider` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  MODIFY `id_wisata` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
