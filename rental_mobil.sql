-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2023 pada 23.34
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
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `id` int(3) NOT NULL,
  `KdMerk` varchar(50) NOT NULL,
  `NmMerk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`id`, `KdMerk`, `NmMerk`) VALUES
(33, '1', 'Toyota'),
(34, '2', 'Toyota'),
(35, '3', 'Toyota'),
(36, '4', 'Toyota'),
(37, '5', 'Honda'),
(38, '6', 'Mitsubishi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id` int(3) NOT NULL,
  `NoPlat` varchar(10) NOT NULL,
  `KdMerk` varchar(20) DEFAULT NULL,
  `IdType` varchar(20) DEFAULT NULL,
  `StatusRental` enum('Jalan','Dipesan','Kosong') DEFAULT NULL,
  `HargaSewa` double(10,0) DEFAULT NULL,
  `JenisMobil` varchar(20) DEFAULT NULL,
  `Transmisi` enum('Manual','CVT','Matic') DEFAULT NULL,
  `FotoMobil` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id`, `NoPlat`, `KdMerk`, `IdType`, `StatusRental`, `HargaSewa`, `JenisMobil`, `Transmisi`, `FotoMobil`) VALUES
(64, 'AB 2547 FH', '1', '1', 'Kosong', 500000, 'MPV', 'Manual', 0x3520666f7274756e6572206772203230323220617474697475646520626c61636b2e706e67),
(65, 'AB 2092 KL', '2', '2', 'Kosong', 300000, 'MPV', 'Manual', 0x4176616e7a615f472d283233292e706e67),
(66, 'AB 1346 EQ', '3', '3', 'Kosong', 450000, 'SUV', 'CVT', 0x6e65772076656e74757265722e504e47),
(67, 'AB 9873 BG', '4', '4', 'Kosong', 600000, 'SUV', 'CVT', 0x70616a65726f2e706e67),
(68, 'AB 6432 YJ', '5', '5', 'Kosong', 550000, 'Sedan', 'Matic', 0x556e69745f486f6e64612d3030362d31206272696f2e706e67),
(69, 'AB 5682 OI', '6', '6', 'Kosong', 450000, 'SUV', 'CVT', 0x7870616e6465722d77686974652e706e67);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sopir`
--

CREATE TABLE `sopir` (
  `id` int(3) NOT NULL,
  `IdSopir` char(6) NOT NULL,
  `NIK` char(13) NOT NULL,
  `NmSopir` varchar(50) DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `NoTelp` char(13) DEFAULT NULL,
  `JenisKelamin` enum('P','L') DEFAULT NULL,
  `NoSim` char(20) DEFAULT NULL,
  `TarifPerhari` double(10,0) DEFAULT NULL,
  `StatusSopir` enum('Busy','Booked','Free') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sopir`
--

INSERT INTO `sopir` (`id`, `IdSopir`, `NIK`, `NmSopir`, `Alamat`, `NoTelp`, `JenisKelamin`, `NoSim`, `TarifPerhari`, `StatusSopir`) VALUES
(9, 'SPR000', '-', '-', '-', '-', 'L', '-', 0, 'Free'),
(10, 'SPR001', '172040', 'Muh. Rafly Hisyam', 'Taman Sudiang', '088812313211', 'L', '817381790', 210000, 'Free'),
(11, 'SPR002', '172069', 'Wahyudi', 'Dekat penjual stiker', '081278991213', 'L', '19397147', 195000, 'Free'),
(12, 'SPR003', '172043', 'Muhammad Atma Nugraha', 'Dg. Ramang City', '087312393987', 'L', '0138842917', 250000, 'Free'),
(13, 'SPR004', '120308', 'Bang Kumis', 'Jl. Perumnas Sudiang', '081271289991', 'L', '12039138', 180000, 'Booked'),
(14, 'SPR005', '172041', 'Muh. Saiful', 'Dekat tower, Laikang', '087823813115', 'L', '1923739', 174000, 'Free'),
(15, 'SPR006', '11308', 'Mamang Garox', 'Masih stay disini', '081169696969', 'L', '696969', 690000, 'Free');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `NoTransaksi` char(8) NOT NULL,
  `NIK` char(13) DEFAULT NULL,
  `Tanggal_Pesan` date DEFAULT NULL,
  `Tanggal_Pinjam` date DEFAULT NULL,
  `Tanggal_Kembali_Rencana` date DEFAULT NULL,
  `Tanggal_Kembali_Sebenarnya` date DEFAULT NULL,
  `LamaRental` int(3) DEFAULT NULL,
  `LamaDenda` int(3) DEFAULT NULL,
  `Kerusakan` text DEFAULT NULL,
  `Id_Sopir` char(6) DEFAULT NULL,
  `BiayaBBM` double(10,0) DEFAULT NULL,
  `BiayaKerusakan` double(10,0) DEFAULT NULL,
  `Denda` double(10,0) DEFAULT NULL,
  `Total_Bayar` double(10,0) DEFAULT NULL,
  `Jumlah_Bayar` double(10,0) DEFAULT NULL,
  `Kembalian` double(10,0) DEFAULT NULL,
  `StatusTransaksi` enum('Proses','Mulai','Batal','Arsip','Selesai') DEFAULT NULL,
  `Arsip` int(1) DEFAULT NULL,
  `NoPlat` varchar(255) DEFAULT NULL,
  `IdMobil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`NoTransaksi`, `NIK`, `Tanggal_Pesan`, `Tanggal_Pinjam`, `Tanggal_Kembali_Rencana`, `Tanggal_Kembali_Sebenarnya`, `LamaRental`, `LamaDenda`, `Kerusakan`, `Id_Sopir`, `BiayaBBM`, `BiayaKerusakan`, `Denda`, `Total_Bayar`, `Jumlah_Bayar`, `Kembalian`, `StatusTransaksi`, `Arsip`, `NoPlat`, `IdMobil`) VALUES
('6490bc77', '0000', '2023-06-20', '2023-06-20', '2023-06-24', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, 1200000, NULL, NULL, 'Proses', NULL, 'AB 2092 KL', 65),
('6490bde6', '0000', '2023-06-20', '2023-06-20', '2023-06-29', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, 4050000, NULL, NULL, 'Proses', NULL, 'AB 1346 EQ', 66),
('6490be39', '0000', '2023-06-27', '2023-06-27', '2023-06-28', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, 600000, NULL, NULL, 'Proses', NULL, 'AB 9873 BG', 67),
('6490c0a5', '1111', '2023-06-22', '2023-06-24', '2023-07-01', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, 3150000, NULL, NULL, 'Proses', NULL, 'AB 5682 OI', 69);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type`
--

CREATE TABLE `type` (
  `id` int(3) NOT NULL,
  `IdType` varchar(20) NOT NULL,
  `NmType` varchar(50) DEFAULT NULL,
  `KdMerk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `type`
--

INSERT INTO `type` (`id`, `IdType`, `NmType`, `KdMerk`) VALUES
(43, '1', 'Fortuner', '1'),
(44, '2', 'Avanza', '2'),
(45, '3', 'Venturer', '3'),
(46, '4', 'Pajero Sport', '4'),
(47, '5', 'Brio', '5'),
(48, '6', 'Xpander', '6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `NIK` char(13) NOT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `NamaUser` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `JenisKelamin` enum('L','P') DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `NoTelp` varchar(13) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `RoleId` int(2) DEFAULT NULL,
  `IsActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `NIK`, `Nama`, `NamaUser`, `Password`, `JenisKelamin`, `Alamat`, `NoTelp`, `Foto`, `RoleId`, `IsActive`) VALUES
(29, '0000', 'Yoko Khmrdn', 'yoko@gmail.com', 'yoko', 'L', 'Kasihan', '088888888888', 'default.png', 3, 1),
(31, '', 'admin', 'admin@gmail.com', 'admin', 'L', NULL, NULL, NULL, 1, 1),
(33, '1111', 'User', 'pelanggan@gmail.com', 'pelanggan', 'L', 'Sleman', '123', NULL, 3, 1),
(35, '2222', 'Sifaq', 'sifaq@gmail.com', 'sifaq', 'L', 'Kasihan', '123', NULL, 3, 1),
(36, '3333', 'Ilyas', 'ilyas@gmail.com', '123', 'L', 'KulonProgo', '123', NULL, 3, 1),
(38, '4444', 'coba', 'coba@gmail.com', '123', 'L', 'Bantul', '123', NULL, 2, 1),
(40, '5555', 'sopir', 'sopir@gmail.com', 'sopir', 'L', 'Jetis', '085765431', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Karyawan'),
(3, 'Pelanggan');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewmobil`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewmobil` (
`id` int(3)
,`NoPlat` varchar(10)
,`KdMerk` varchar(20)
,`IdType` varchar(20)
,`StatusRental` enum('Jalan','Dipesan','Kosong')
,`HargaSewa` double(10,0)
,`FotoMobil` blob
,`NmMerk` varchar(50)
,`NmType` varchar(50)
,`JenisMobil` varchar(20)
,`Transmisi` enum('Manual','CVT','Matic')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewriwayattransaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewriwayattransaksi` (
`NoTransaksi` char(8)
,`NIK` char(13)
,`NoPlat` varchar(10)
,`Tanggal_Pesan` date
,`Tanggal_Pinjam` date
,`Tanggal_Kembali_Rencana` date
,`StatusTransaksi` enum('Proses','Mulai','Batal','Arsip','Selesai')
,`NmType` varchar(50)
,`TotalHarga` double(17,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewtype`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewtype` (
`id` int(3)
,`IdType` varchar(20)
,`NmType` varchar(50)
,`KdMerk` varchar(50)
,`NmMerk` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewusers`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewusers` (
`id` int(3)
,`NIK` char(13)
,`Nama` varchar(30)
,`NamaUser` varchar(50)
,`Password` varchar(255)
,`JenisKelamin` enum('L','P')
,`Alamat` text
,`NoTelp` varchar(13)
,`Foto` varchar(100)
,`role` varchar(20)
,`IsActive` int(1)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `viewmobil`
--
DROP TABLE IF EXISTS `viewmobil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewmobil`  AS SELECT `mobil`.`id` AS `id`, `mobil`.`NoPlat` AS `NoPlat`, `mobil`.`KdMerk` AS `KdMerk`, `mobil`.`IdType` AS `IdType`, `mobil`.`StatusRental` AS `StatusRental`, `mobil`.`HargaSewa` AS `HargaSewa`, `mobil`.`FotoMobil` AS `FotoMobil`, `merk`.`NmMerk` AS `NmMerk`, `type`.`NmType` AS `NmType`, `mobil`.`JenisMobil` AS `JenisMobil`, `mobil`.`Transmisi` AS `Transmisi` FROM ((`mobil` join `type` on(`mobil`.`IdType` = `type`.`IdType`)) join `merk` on(`mobil`.`KdMerk` = `merk`.`KdMerk`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `viewriwayattransaksi`
--
DROP TABLE IF EXISTS `viewriwayattransaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewriwayattransaksi`  AS SELECT `t`.`NoTransaksi` AS `NoTransaksi`, `t`.`NIK` AS `NIK`, `m`.`NoPlat` AS `NoPlat`, `t`.`Tanggal_Pesan` AS `Tanggal_Pesan`, `t`.`Tanggal_Pinjam` AS `Tanggal_Pinjam`, `t`.`Tanggal_Kembali_Rencana` AS `Tanggal_Kembali_Rencana`, `t`.`StatusTransaksi` AS `StatusTransaksi`, `ty`.`NmType` AS `NmType`, `m`.`HargaSewa`* (to_days(`t`.`Tanggal_Kembali_Rencana`) - to_days(`t`.`Tanggal_Pinjam`)) AS `TotalHarga` FROM ((`transaksi` `t` join `mobil` `m` on(`t`.`NoPlat` = `m`.`NoPlat`)) join `type` `ty` on(`m`.`IdType` = `ty`.`IdType`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `viewtype`
--
DROP TABLE IF EXISTS `viewtype`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewtype`  AS SELECT `type`.`id` AS `id`, `type`.`IdType` AS `IdType`, `type`.`NmType` AS `NmType`, `type`.`KdMerk` AS `KdMerk`, `merk`.`NmMerk` AS `NmMerk` FROM (`type` join `merk` on(`type`.`KdMerk` = `merk`.`KdMerk`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `viewusers`
--
DROP TABLE IF EXISTS `viewusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewusers`  AS SELECT `users`.`id` AS `id`, `users`.`NIK` AS `NIK`, `users`.`Nama` AS `Nama`, `users`.`NamaUser` AS `NamaUser`, `users`.`Password` AS `Password`, `users`.`JenisKelamin` AS `JenisKelamin`, `users`.`Alamat` AS `Alamat`, `users`.`NoTelp` AS `NoTelp`, `users`.`Foto` AS `Foto`, `user_role`.`role` AS `role`, `users`.`IsActive` AS `IsActive` FROM (`users` join `user_role` on(`users`.`RoleId` = `user_role`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id`,`KdMerk`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`,`NoPlat`);

--
-- Indeks untuk tabel `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id`,`IdSopir`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`NoTransaksi`);

--
-- Indeks untuk tabel `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`,`IdType`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`NIK`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `merk`
--
ALTER TABLE `merk`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `type`
--
ALTER TABLE `type`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
