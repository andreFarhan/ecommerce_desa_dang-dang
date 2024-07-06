-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2023 pada 15.34
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce_desa_dangdang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `total_pembayaran` varchar(20) NOT NULL,
  `uang_bayar` varchar(20) NOT NULL,
  `kembalian` varchar(20) NOT NULL,
  `tanggal_bayar` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `total_pembayaran`, `uang_bayar`, `kembalian`, `tanggal_bayar`, `id_user`, `id_pemesanan`) VALUES
(2, '30000', '35000', '5000', '2023-11-12 02:05:00', 16, 70),
(3, '15000', '20000', '5000', '2023-11-12 02:19:33', 16, 71),
(4, '15000', '20000', '5000', '2023-11-12 02:27:08', 16, 72),
(5, '15000', '20000', '5000', '2023-11-12 02:34:12', 16, 73),
(6, '15000', '20000', '5000', '2023-11-12 02:39:08', 16, 74),
(7, '30000', '50000', '20000', '2023-11-13 15:11:22', 16, 75),
(8, '35000', '50000', '15000', '2023-11-13 21:13:40', 16, 76),
(9, '28000', '30000', '2000', '2023-11-13 21:15:19', 16, 77),
(10, '15000', '20000', '5000', '2023-11-13 21:21:20', 16, 78),
(11, '40000', '50000', '10000', '2023-11-13 21:30:59', 12, 79),
(12, '5000', '5000', '0', '2023-11-13 21:56:36', 12, 81),
(13, '24000', '25000', '1000', '2023-11-13 21:59:19', 12, 82),
(14, '10000', '10000', '0', '2023-11-13 23:19:00', 12, 83),
(16, '15000', '20000', '5000', '2023-11-18 01:19:31', 16, 91),
(17, '45000', '50000', '5000', '2023-11-18 14:21:22', 16, 90),
(18, '125000', '150000', '25000', '2023-11-18 19:35:23', 16, 97);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(50) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `total_belanja` int(50) NOT NULL,
  `bayar` enum('belum bayar','dibayar') NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tanggal_pemesanan`, `total_belanja`, `bayar`, `id_user`, `id_toko`) VALUES
(60, '2023-11-08', 35000, 'belum bayar', 0, 0),
(61, '2023-11-08', 30000, 'belum bayar', 0, 0),
(62, '2023-11-08', 10000, 'dibayar', 16, 0),
(63, '2023-11-08', 55000, 'dibayar', 16, 0),
(64, '2023-11-08', 15000, 'dibayar', 18, 0),
(65, '2023-11-08', 15000, 'dibayar', 16, 0),
(66, '2023-11-08', 10000, 'dibayar', 16, 0),
(67, '2023-11-08', 25000, 'dibayar', 16, 0),
(68, '2023-11-08', 10000, 'dibayar', 16, 0),
(69, '2023-11-11', 25000, 'dibayar', 16, 0),
(70, '2023-11-11', 30000, 'dibayar', 16, 0),
(71, '2023-11-12', 15000, 'dibayar', 16, 0),
(72, '2023-11-12', 15000, 'dibayar', 16, 0),
(73, '2023-11-12', 15000, 'dibayar', 16, 0),
(74, '2023-11-12', 15000, 'dibayar', 16, 0),
(75, '2023-11-13', 30000, 'dibayar', 16, 0),
(76, '2023-11-13', 35000, 'dibayar', 16, 0),
(77, '2023-11-13', 28000, 'dibayar', 16, 0),
(78, '2023-11-13', 15000, 'dibayar', 16, 0),
(79, '2023-11-13', 40000, 'dibayar', 16, 0),
(80, '2023-11-13', 30000, 'belum bayar', 16, 0),
(81, '2023-11-13', 5000, 'dibayar', 16, 0),
(82, '2023-11-13', 24000, 'dibayar', 19, 0),
(83, '2023-11-13', 10000, 'dibayar', 16, 0),
(84, '2023-11-15', 72000, 'belum bayar', 16, 0),
(85, '2023-11-15', 40000, 'belum bayar', 16, 0),
(86, '2023-11-15', 20000, 'belum bayar', 16, 0),
(87, '2023-11-15', 3500, 'belum bayar', 16, 0),
(88, '2023-11-17', 30000, 'belum bayar', 16, 0),
(89, '2023-11-17', 60000, 'belum bayar', 16, 0),
(90, '2023-11-17', 45000, 'dibayar', 16, 7),
(91, '2023-11-17', 15000, 'dibayar', 16, 7),
(92, '2023-11-18', 75000, 'belum bayar', 16, 0),
(94, '2023-11-18', 120000, 'belum bayar', 16, 0),
(95, '2023-11-18', 15000, 'belum bayar', 16, 0),
(96, '2023-11-18', 15000, 'belum bayar', 16, 7),
(97, '2023-11-18', 105000, 'dibayar', 16, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_produk`
--

CREATE TABLE `pemesanan_produk` (
  `id_pemesanan_produk` int(50) NOT NULL,
  `id_pemesanan` int(50) NOT NULL,
  `id_menu` int(50) NOT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan_produk`
--

INSERT INTO `pemesanan_produk` (`id_pemesanan_produk`, `id_pemesanan`, `id_menu`, `jumlah`) VALUES
(42, 50, 23, 1),
(43, 51, 22, 1),
(44, 51, 32, 1),
(45, 52, 21, 1),
(46, 53, 22, 1),
(47, 54, 33, 1),
(48, 55, 0, 1),
(49, 55, 21, 1),
(50, 55, 22, 1),
(51, 56, 21, 1),
(52, 56, 29, 1),
(53, 57, 21, 1),
(54, 58, 21, 1),
(55, 58, 23, 1),
(56, 59, 21, 1),
(57, 59, 22, 1),
(58, 60, 21, 2),
(59, 60, 22, 1),
(60, 61, 23, 1),
(61, 61, 22, 1),
(62, 62, 21, 1),
(63, 63, 23, 2),
(64, 63, 29, 1),
(65, 63, 22, 1),
(66, 64, 22, 1),
(67, 65, 23, 1),
(68, 66, 28, 1),
(69, 67, 23, 1),
(70, 67, 21, 1),
(71, 68, 21, 1),
(72, 69, 35, 1),
(73, 69, 30, 1),
(74, 70, 35, 2),
(75, 71, 35, 1),
(76, 72, 35, 1),
(77, 73, 35, 1),
(78, 74, 35, 1),
(79, 75, 46, 1),
(80, 75, 48, 2),
(81, 76, 54, 1),
(82, 76, 53, 4),
(83, 77, 54, 1),
(84, 77, 50, 1),
(85, 77, 52, 2),
(86, 78, 54, 1),
(87, 79, 54, 2),
(88, 79, 53, 2),
(89, 80, 54, 2),
(90, 81, 53, 1),
(91, 82, 50, 3),
(92, 82, 39, 3),
(93, 83, 53, 2),
(94, 84, 58, 2),
(95, 84, 53, 1),
(96, 84, 54, 4),
(97, 85, 60, 2),
(98, 86, 59, 1),
(99, 87, 58, 1),
(100, 88, 64, 1),
(101, 89, 64, 2),
(102, 90, 65, 1),
(103, 90, 64, 1),
(104, 91, 65, 1),
(105, 92, 63, 1),
(106, 93, 63, 2),
(107, 93, 65, 1),
(108, 94, 65, 8),
(109, 96, 65, 1),
(110, 97, 64, 2),
(111, 97, 65, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_menu` int(50) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `jenis_menu` varchar(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_menu`, `nama_menu`, `jenis_menu`, `stok`, `harga`, `satuan`, `deskripsi`, `gambar`, `id_toko`) VALUES
(35, 'Jus mangga', 'Minuman', 99, 15000, '', '', 'manfaat-mengonsumsi-jus-mangga-untuk-kesehatan-tubuh-halodoc.jpg', 4),
(36, 'Kerupuk ikan', 'Makanan', 99, 10000, '', '', 'Kerupuk-Ikan.jpg', 1),
(37, 'Kerupuk kulit', 'Makanan', 99, 15000, '', '', 'kerupukkulit.jpg', 1),
(38, 'Nastar', 'Makanan', 99, 30000, '', '', 'nastar.jpeg', 2),
(39, 'Es Teh Manis', 'Minuman', 99, 5000, '', '', 'Ketahui-Fakta-Es-Teh-Manis.jpg', 4),
(40, 'Brownis', 'Makanan', 99, 25000, '', '', 'brownies(2).jpg', 2),
(41, 'Brownis keju', 'Makanan', 99, 30000, '', '', 'brownies(3)keju.jpg', 2),
(42, 'Kerupuk mawar', 'Makanan', 99, 10000, '', '', 'kerupukmawar.jpg', 1),
(43, 'Kerupuk opak', 'Makanan', 99, 10000, '', '', 'Kerupuk-opak.jpg', 1),
(44, 'Kerupuk udang', 'Makanan', 99, 15000, '', '', 'kerupukudang.jpg', 1),
(45, 'Kue ulang tahun', 'Makanan', 99, 100000, '', '', 'kueulangtahun.jpg', 2),
(46, 'Kopi Latte', 'Minuman', 99, 20000, '', '', '9a044491-1dec-4932-bf42-f872db73e771.jpg', 4),
(47, 'Kerupuk pasir', 'Makanan', 99, 10000, '', '', 'kerupukpasir.jpg', 1),
(48, 'Lapis Legit', 'Makanan', 99, 5000, '', '', 'lapislegit.jpeg', 2),
(49, 'Bika ambon', 'Makanan', 99, 10000, '', '', 'bikaambon.jpeg', 2),
(50, 'Donat', 'Makanan', 99, 3500, '', '', 'donatcoklat.jpg', 2),
(51, 'Kerupuk beras', 'Makanan', 99, 5000, '', '', 'Kerupuk-beras.jpg', 1),
(52, 'Rengginang', 'Makanan', 99, 5000, '', '', 'Rengginang.jpg', 1),
(53, 'Kerupuk puli', 'Makanan', 99, 5000, '', '', 'kerupuk-puli.jpg', 1),
(54, 'Makaroni', 'Makanan', 99, 15000, '', '', 'makaroni.jpg', 1),
(58, 'Donat keju', 'Makanan', 99, 3500, '', '', 'donatkeju.jpg', 2),
(59, 'Biji kopi', 'Bahan Mentah', 99, 20000, '', '', 'bijikopi.png', 4),
(60, 'caping', 'Kerajinan', 100, 20000, '', '', 'caping.jpg', 3),
(63, 'Semen Tiga Roda', 'Lainnya', 12, 75000, 'Sak', 'SEMEN TIGA RODA 1 SAK 50 KG ', 'e4c9fc7f-5959-4ba0-93ed-f4423932660d.jpg', 5),
(64, 'Abon Tuna', 'Makanan', 20, 25000, 'Pouch', 'Abon Tuna 90 gram', 'WhatsApp Image 2023-11-17 at 21.28.39.jpeg', 7),
(65, 'Abon Ayam', 'Makanan', 25, 25000, 'Pouch', 'Abon ayam 90 gram', 'WhatsApp Image 2023-11-17 at 21.29.22.jpeg', 7),
(66, 'Cinmond Cookies gluten free', 'Makanan', 12, 30000, 'Toples', 'Cinmond Cookies, kue bebas gluten', 'WhatsApp Image 2023-11-17 at 21.30.30.jpeg', 7),
(67, 'Tepung Mocaf 1kg', 'Bahan Mentah', 12, 15000, 'Bantal', 'Tepung Mocaf, tepung terbuat dari singkong, berat 1kg', 'WhatsApp Image 2023-11-17 at 21.48.06.jpeg', 7),
(68, 'Brownies Fugy Mini Gluten Free', 'Makanan', 12, 25000, 'Toples', 'Brownies Fugy Mini Gluten Free, 130g', 'WhatsApp Image 2023-11-17 at 21.31.04.jpeg', 7),
(69, 'Peanut Cookies Gluten Free', 'Makanan', 12, 25000, 'Toples', 'Peanut Cookies Gluten Free, 130g', 'WhatsApp Image 2023-11-17 at 21.48.17.jpeg', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_toko` varchar(30) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat_toko` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` enum('penjual') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `username`, `password`, `nama_toko`, `nama_pemilik`, `alamat_toko`, `no_hp`, `status`) VALUES
(1, 'kerupuk', '12345', 'Kerupuk Jaya Abadi', 'Kerupuk', 'jl. Cisauk', '081212121212', 'penjual'),
(2, 'bakery', '12345', 'Bakery', 'Bakery', 'jl. cisauk no 2', '081313131313', 'penjual'),
(3, 'kerajinan', '12345', 'Kerajinan tangan', 'Kerajinan', 'jl cisauk no 3', '081414141414', 'penjual'),
(4, 'coffee', '12345', 'Coffe shop', 'Coffee', 'jl. cisauk 4', '081515151515', 'penjual'),
(5, 'bangunan', '12345', 'TB. Putra Harapan', 'Bangunan', 'jl. Cicayur', '087782877173', 'penjual'),
(7, 'euis', '12345', 'LeBON', 'Euis Chodijah', 'Jalan kadumangu RT 09/ 03 no 140 Desa Dangdang Kecamatan Cisauk kabupaten Tangerang', '081296495120', 'penjual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `status` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `no_hp`, `status`) VALUES
(12, 'superadmin', 'superadmin', 'Super Admin', 'Laki-laki', '1900-01-01', '-', '-', 'admin'),
(16, 'aisyah', '12345', 'Aisyah Mawar Kusuma Salsabila', 'Perempuan', '2003-02-25', 'Bintaro', '085715748165', 'user'),
(18, 'rahmat', '12345', 'Rahmat', 'Laki-laki', '2002-01-29', 'Jl. amd babakan pocis no.', '087733932416', 'user'),
(19, 'aldo', '12345', 'Aldo Hermawan Suryana', 'Laki-laki', '2001-01-01', 'jl cemara no 3', '085810727518', 'user'),
(20, 'rangga', '12345', 'Rangga Ariansyah', 'Laki-laki', '2002-03-29', 'Bukit dago', '08213213321321', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_user` (`id_user`,`id_pemesanan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indeks untuk tabel `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  ADD PRIMARY KEY (`id_pemesanan_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  MODIFY `id_pemesanan_produk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_menu` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
