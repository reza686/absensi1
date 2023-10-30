-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 03:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_polri`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_pegawai`, `nama`, `tanggal`, `jam`, `keterangan`, `lampiran`, `status`) VALUES
(1, 170702, 'Reza', '2023-10-05', '23:59:11', 'hadir', 'BAB2.pdf', ''),
(29, 170702, 'Reza', '2023-10-08', '16:16:55', 'hadir', '', ''),
(39, 98765, 'rayda', '2023-10-11', '19:23:55', 'cuti', 'Logbook PKL M.Reza part 2.pdf', ''),
(40, 98765, 'rayda', '2023-10-11', '19:24:52', 'hadir', '', ''),
(41, 80050807, 'ARIF ANANTA ADITYA PUTRA', '2023-10-25', '04:52:54', 'masuk', '', ''),
(43, 87070029, 'FILA TRI YULIANSYAH', '2023-10-25', '05:04:17', 'masuk', '', ''),
(45, 82070231, 'IRFAN, S.H.', '2023-10-25', '11:13:44', 'masuk', '', ''),
(46, 80050807, 'ARIF ANANTA ADITYA PUTRA', '2023-10-25', '11:14:48', 'pulang', '', ''),
(47, 80050807, 'ARIF ANANTA ADITYA PUTRA', '2023-10-25', '17:08:23', 'masuk', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_pegawai` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_pegawai`, `username`, `password`) VALUES
(80050807, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(5, 'KABID TIK'),
(6, 'PS. KASUBBAG RENMIN'),
(7, 'PS. KAURMINTU'),
(8, 'PS. KAUR REN'),
(9, 'PS. PAMIN 2 RENMIN'),
(10, 'PS. PAMIN 7 RENMIN'),
(11, 'PS. KAUR KEU'),
(12, 'PS. PAMIN 5 RENMIN'),
(13, 'PS. PAMIN 4 RENMIN'),
(14, 'PS. PAMIN 1 RENMIN'),
(15, 'PS. PAMIN 3 RENMIN'),
(16, 'PS. PAMIN 6 RENMIN'),
(17, 'BAMIN KEU'),
(18, 'BAMIN RENMIN'),
(20, 'PAUR 2 TEKKOM'),
(21, 'PS. PAUR 3 TEKKOM'),
(22, 'PAMIN 1 RENMIN'),
(23, 'BAMIN TEKKOM'),
(24, 'BANUM TEKKOM'),
(25, 'PS.KASUBBID TEKINFO'),
(26, 'KAURINTI TEKINFO'),
(27, 'PS. KAURYANDUKNIS'),
(28, 'PS. PAUR 1 TEKINFO'),
(29, 'PS. PAUR 2 TEKINFO'),
(30, 'BAMIN TEKINFO');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan`
--

CREATE TABLE `keterangan` (
  `id_keterangan` int(11) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keterangan`
--

INSERT INTO `keterangan` (`id_keterangan`, `keterangan`) VALUES
(1, 'masuk'),
(2, 'izin'),
(3, 'sakit'),
(4, 'cuti'),
(5, 'pulang');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `nama_pangkat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id_pangkat`, `nama_pangkat`) VALUES
(10, 'KOMBES POL'),
(11, 'KOMPOL'),
(12, 'PENATA I'),
(13, 'PENATA'),
(14, 'PENDA I'),
(15, 'AIPTU'),
(16, 'AIPDA'),
(17, 'BRIPKA'),
(18, 'BRIPTU'),
(19, 'BRIPDA'),
(20, 'IPTU'),
(21, 'IPDA'),
(22, 'PENGTU');

-- --------------------------------------------------------

--
-- Table structure for table `polri`
--

CREATE TABLE `polri` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `pangkat` varchar(20) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `polri`
--

INSERT INTO `polri` (`id_pegawai`, `nama`, `password`, `jenis_kelamin`, `pangkat`, `jabatan`) VALUES
(30149, 'TAUFIK AULIA RAHMAN', '$2y$10$RGZ1fM0H5j0IlSCZaFIf1.mbZtJgA/c9OjbyvYILcrg', 'Laki-Laki', 'BRIPDA', 'BAMIN KEU'),
(60590, 'HAMID', '$2y$10$P6UMftp2pdMZPgJPYuCxqOsPru6nnbOn/UgIiO88pQq', 'Laki-Laki', 'BRIPDA', 'BAMIN TEKKOM'),
(70527, 'AKHMAD MIFTAHUDIN', '$2y$10$JrilYq8HTYuyMYy4unSBf.hbor/dGigBvSEvNqonxgI', 'Laki-Laki', 'BRIPDA', 'BAMIN TEKKOM'),
(90428, 'DEDY SUTANTO', '$2y$10$syUL3A2RVajdoora/F4WRONCA5vHWcTcHWXtIJkE08P', 'Laki-Laki', 'BRIPDA', 'BAMIN TEKKOM'),
(170702, 'Reza', '$2y$10$1CdMPTDa9tU2Cf3RmeRALOOP8RLG8An9xsSiWcqgyNT', 'Laki-Laki', '', ''),
(987654, 'rayda', '$2y$10$WSdvhWINco8dlL2UEcMgxe5WQceP3NXHVcYHxP.HMRI', 'Perempuan', 'kepala sekolah', 'kepala kantin'),
(1050895, 'MUH. IBMA ROSLIYANDA', '$2y$10$72Gnm2pOE5WVBBr1b0XiaOEMO4LzwxoCl/06gHLsWj/', 'Laki-Laki', 'BRIPDA', 'BAMIN TEKINFO'),
(1060358, 'BAYU SETIAWAN', '$2y$10$peKEq5nhwSzC4KTQtUZ./OxGRv8c0XmUb956elK5tKM', 'Laki-Laki', 'BRIPDA', 'BAMIN RENMIN'),
(1060753, 'M. AMINUL YAQIN ', '$2y$10$7wAS8CSCV/tn4ZrOjKWoW.SdGebhjBeZeXR/E0C9gXW', 'Laki-Laki', 'BRIPDA', 'BAMIN RENMIN'),
(1060863, 'MUHAMMAD. BAGUS NUGRAHA', '$2y$10$h53bCt1epOS/pb8v7NzO5eDU3sA.M1nFmUTq4J.B7Tp', 'Laki-Laki', 'BRIPDA', 'BAMIN TEKKOM'),
(2040207, 'MUHAMMAD AKMAL IKHSAN S', '$2y$10$etxhArUfXQ3LG7Cn8St5Sed54r0lk47D3VUZH8KKt/k', 'Laki-Laki', 'BRIPDA', 'BAMIN TEKKOM'),
(2050191, 'M YOGA YUDHISTIRA P', '$2y$10$pPiJZiWUazCghQ8IGOwqLe75T.4is8XowfAX/JsL1yj', 'Laki-Laki', 'BRIPDA', 'BAMIN TEKKOM'),
(2122001, 'NOOR MASKANAH', '$2y$10$3Grz2NvQLBeddaiKejwODeoDY3z8tXO3Ghxigr/xc.h', 'Perempuan', 'PENDA I', 'PS. PAMIN 7 RENMIN'),
(3080022, 'AZRIEL DEDE DIPUTRA', '$2y$10$ZSlKMrEVNwF3w59I5Tpzj.k9TT0.XMisS8WGjL/ktJw', 'Laki-Laki', 'BRIPDA', 'BAMIN TEKKOM'),
(3080158, 'ZAKY ADITYA SAPUTRA', '$2y$10$UAxj9zkDN3IZQot/pgk8puwHZNVT54l5dYlg.auFYxs', 'Laki-Laki', 'BRIPDA', 'BAMIN TEKINFO'),
(3090190, 'WAHYU EKA SEPTIAN ANWAR', '$2y$10$fmtiLyybr2N2lfeYJD2E0urk1bt2rK5m7pQZyly3/aF', 'Laki-Laki', 'BRIPDA', 'BAMIN TEKINFO'),
(3121004, 'ZAKIYI MAKHDY, A.Md', '$2y$10$5RuoKelKqElXAjN67qVFMO.MEISDs3HWgJifwc8gpZZ', 'Laki-Laki', 'PENATA', 'PS. PAUR 1 TEKINFO'),
(6041003, 'A. ZAINUDIN, R, S.Kom', '$2y$10$yfBpvCKd8vP/ZrUYfbWZUeK17elmX5hOlWrjL56W0pw', 'Laki-Laki', 'PENATA', 'PS. KAUR REN'),
(9102001, 'SALASIAH YAHYA, S.Sos', '$2y$10$eB4dsmMuOcfL/ovdjqw5NOdZdyr01EuL8aREEET3Ldy', 'Perempuan', 'PENATA I', 'PS. KAURMINTU'),
(65060665, 'DARWIN, S.E., M.M.', '$2y$10$MiOOKbF07m3yk7mjztggxOvGWI9FGS7xYWGCojCrZJd', 'Laki-Laki', 'KOMPOL', 'PS. KASUBBAG RENMIN'),
(68100454, 'SUNU WIDIANTO', '$2y$10$3NUKVAXv72tYJGyJFn/dEuMGWQrkUV7Kib6CK4hdu5b', 'Laki-Laki', 'IPDA', 'PS. PAUR 3 TEKKOM'),
(71050438, 'SUHARTONO KHAMTORO,S.Sos', '$2y$10$7DBGkwGTL9IXJe8mmHzMbuWOxeEpHKKQAqbRfPu7uzm', 'Laki-Laki', 'KOMPOL', 'PS.KASUBBID TEKINFO'),
(72010301, 'BAMBANG ALBITA SURYA', '$2y$10$MzC/dd5Di5Kbn4BQ5FPgSeWx5Hlto4oRKpnyqFkTzQz', 'Laki-Laki', 'IPTU', 'PAUR 2 TEKKOM'),
(73020473, 'DARMONO BUDI UTOMO, S.H., M.H', '$2y$10$GFAyMnwuPJ0G6HbyWZTifusRXV7a80VOgm7EZULl7Bx', 'Laki-Laki', 'KOMPOL', 'KAURINTI TEKINFO'),
(73030516, 'IRHAN ZEGA', '$2y$10$8z6YSZiHxS697M2XzltiWe3f9mfr/2CLy1NCdV37PyS', 'Laki-Laki', 'IPDA', 'PAMIN 1 RENMIN'),
(75010202, 'KARMADI, S.E', '$2y$10$uTTRzHOkegFRPGQbRXT0sOfkQHuGC/48QTuwM7DRIPN', 'Laki-Laki', 'AIPTU', 'PS. PAMIN 2 RENMIN'),
(75030732, 'KHOLILUR ROCHMAN, S.H., S.I.K., M.H', '$2y$10$6z8nj6sAoNN.he1K3CVfYOZkrL2mibPDneJJcwJL48Q', 'Laki-Laki', 'KOMBES POL', 'KABID TIK'),
(77010307, 'BUSRA’I, S.E', '$2y$10$Bvfr5tgAuTN.L6jLGyjAc.9ZmIwVdiac2.Oztot39Py', 'Laki-Laki', 'AIPTU', 'PS. KAUR KEU'),
(78100327, 'MUKHLIS M.N, S.Pd', '$2y$10$cuECFVs/GJK1gTdzT3eFSewItOeV1jRzJqRzwC2u8t5', 'Laki-Laki', 'BRIPKA', 'PS. PAMIN 1 RENMIN'),
(80050807, 'ARIF ANANTA ADITYA PUTRA', '$2y$10$Z9ZNUbVbXczxuXmAWCcQ0eaSAU1EOgmQuY2KsNVG5uk', 'Laki-Laki', 'AIPTU', 'PS. PAMIN 5 RENMIN'),
(81090076, 'ACHWADI, S.Kom., M.M', '$2y$10$IWaZeWoRcK4I38TMFukPtOPBwmsSDpNSu/eKPGJ6dt7', 'Laki-Laki', 'IPTU', 'PS. PAUR 2 TEKINFO'),
(82070231, 'IRFAN, S.H.', '$2y$10$cvX4k3Lh74aS8gbYrs.bbOyHyFe9rfOjmbgk4Md8.sg', 'Laki-Laki', 'AIPTU', 'BAMIN TEKINFO'),
(83080418, 'DANANG EKA PRASTYA', '$2y$10$akF2LJDQ3YEkFfxEPyvJtecfSW9A1xQQfhAtb160pSn', 'Perempuan', 'IPDA', 'BAMIN TEKKOM'),
(84050207, 'HADY WIJAYA', '$2y$10$dkXBmYrKFo9scVNmiTvgtOk7qJgyHpRg.TFMqP8XUES', 'Laki-Laki', 'AIPDA', 'PS. PAMIN 4 RENMIN'),
(87070029, 'FILA TRI YULIANSYAH', '$2y$10$dPgqpvpIvL6VLCqCjhPtk.xbuuYqXmTDEUD2Ayawwri', 'Perempuan', 'BRIPKA', 'PS. PAMIN 3 RENMIN'),
(88020318, 'AKHMAD FAJRIANSYAH', '$2y$10$t9zVSX6FDeDp33KrdKY5G.52tBf6jJ6wt20525u7I6e', 'Laki-Laki', 'BRIPKA', 'PS. PAMIN 6 RENMIN'),
(88110725, 'HENDRI SUSILO PUTRA', '$2y$10$EQR3YqT.OuksxLAgQRYopeRsS1oD3Hltq780BycqDk7', 'Laki-Laki', 'BRIPKA', 'BAMIN KEU'),
(92011001, 'M. AGUS', '$2y$10$HL5ynZklx9PoVzDk/0cF.eZU9Oxajlj853kVxAoGwIL', 'Laki-Laki', 'PENGTU', 'BANUM TEKKOM'),
(94121344, 'DETO ADITYAN SUBAGJA, S.H., M.H', '$2y$10$5JrQqYOT0NiPiuO/0yG42utLhh8XIYXVL9vP7eK.Z1Q', 'Laki-Laki', 'BRIPTU', 'BAMIN RENMIN'),
(96061030, 'MOH. SUPARDI', '$2y$10$kiWW19Y3sVLyGmNBfAsKHOLYz7NhFdvbXPJ0I6nMnZ1', 'Laki-Laki', 'BRIPTU', 'BAMIN RENMIN'),
(96100626, 'DHARMA SETIAWATI, S.H.', '$2y$10$SKeLMkja7BfwvTuiHJgg6Ow2hz.XoxEclqdgqw4c./Q', 'Perempuan', 'BRIPTU', 'BAMIN TEKINFO'),
(97050184, 'ABDUL RAHIM WAHAB, S.H.', '$2y$10$V9FQrruUQYI6tQS7qkJyiOzsfafp.0JPAyYXbpfioiY', 'Laki-Laki', 'BRIPDA', 'BAMIN TEKKOM'),
(97080067, 'PANJI JAYATNO', '$2y$10$WqZLDaVTu0/h2SEqOeN9qOW1D8.gk.jK7J7qPz.jX8E', 'Laki-Laki', 'BRIPTU', 'BAMIN TEKKOM'),
(97090652, 'M. PUGUH TRIJATMIKO', '$2y$10$3OlJbZqCqeZl1YqUAB4mj.FpSxdHzr0vSOEWZ98EsLH', 'Laki-Laki', 'BRIPTU', 'BAMIN TEKINFO'),
(98032005, 'SURYAWATI, S.Sos', '$2y$10$.pVlR0xtxfYfRBitlILz0eSvbNLrJhiFHnaGxJFssa/', 'Perempuan', 'PENATA I', 'PS. KAURYANDUKNIS'),
(98050174, 'KURNIA Z. A. ASMARA', '$2y$10$/ktrhDXkRUR59szwG4I2BOxR6KdxKDBFJMNigBHgQl7', 'Perempuan', 'BRIPTU', 'BAMIN TEKINFO'),
(98050316, 'MEISKA A. NAINGGOLAN', '$2y$10$iV9fhD3qepIkhqPMdQENM.tEY7682NGKdvrYUpI2HQj', 'Perempuan', 'BRIPDA', 'BAMIN RENMIN'),
(98091289, 'ADRIAN CAHAYA PUTRA', '$2y$10$cKBw/IabXL91bQsyTQ/eLed02ORqJ2qRVwQeDmYjdOr', 'Laki-Laki', 'BRIPDA', 'BAMIN TEKKOM'),
(99060090, 'SATRIYO NUGROHO, S.H.', '$2y$10$uMCmNnsLFupkQ8J8k154Hu3CfIfcMlIlGRTVKPb8WSX', 'Laki-Laki', 'BRIPTU', 'BAMIN TEKINFO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `keterangan` (`keterangan`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `polri`
--
ALTER TABLE `polri`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `pangkat` (`pangkat`),
  ADD KEY `jabatan` (`jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
