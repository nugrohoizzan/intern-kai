-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 04:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asset`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` varchar(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `luas` decimal(15,2) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `jalan` text NOT NULL,
  `desa` text NOT NULL,
  `kecamatan` text NOT NULL,
  `kabupaten` text NOT NULL,
  `provinsi` text NOT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `jenis`, `luas`, `latitude`, `longitude`, `jalan`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `klasifikasi`, `deskripsi`, `status`, `harga`, `foto`) VALUES
('06.01.00019', 'Tanah', 52235.00, -7.868103964, 110.0494109, 'Wojo', 'Janten', 'Temon', 'Kulonprogo', 'Daerah Istimewa Yogyakarta', 'Non Station', 'unclean and clear', 'Belum Tersewa', 100000000.00, 'sepatu2.jpeg'),
('06.01.00279', 'Tanah', 1042.00, -7.777622045, 110.3593884, 'Yogyakarta', 'Kricak', 'Tegalrejo', 'Jogja', 'Daerah Istimewa Yogyakarta', 'Non Station', 'Unclean and Clear', 'Tersewa', 12000000.00, 'bd3c0831-54e2-4eac-aa9c-dfd703bec674.png'),
('06.01.00511', 'Tanah', 15275.00, -7.813773, 110.360666, 'Ngabean', 'Suryodiningratan', 'Mantrijeron', 'Bantul', 'Daerah Istimewa Yogyakarta', 'Station', 'clean and clear', 'Belum Tersewa', 12000000.00, 'WhatsApp Image 2024-07-15 at 14.20.23.jpeg'),
('06.01.00529', 'Tanah', 5600.00, -7.8734902, 110.3799579, 'Ngabean', 'Wukirsari', 'Imogiri', 'Bantul', 'Daerah Istimewa Yogyakarta', 'Station', 'clean and clear', 'Milik Perusahaan', 12000000.00, 'WhatsApp Image 2024-06-12 at 20.02.50.jpeg'),
('06.02.00646', 'Rumah Perusahaan', 60.00, -7.78849919389194, 110.380014597892, 'Pengok', 'demangan', 'gondokusuman', 'Sleman', 'Daerah Istimewa Yogyakarta', 'Station', 'Clean and Clear', 'Belum Tersewa', 12000000.00, 'WhatsApp Image 2024-07-15 at 14.20.19.jpeg'),
('06.03.00014', 'Bangunan Dinas', 300.00, -7.85993303412247, 110.157954073016, 'Wates', 'Wates', 'Wates', 'Kulonprogo', 'Daerah Istimewa Yogyakarta', 'Non Station', 'Clean and Clear', 'Belum Tersewa', 12000000.00, 'WhatsApp Image 2024-07-15 at 14.20.23.jpeg'),
('06.03.00020', 'Bangunan Dinas', 128.00, -7.79615719670142, 110.283972323278, 'Balecatur', 'Balecatur', 'Gamping', 'Sleman', 'Daerah Istimewa Yogyakarta', 'Non Station', 'Clean and Clear', 'Belum Tersewa', 12000000.00, 'WhatsApp Image 2024-07-15 at 14.20.23.jpeg'),
('06.03.00028', 'Bangunan Dinas', 248.00, -7.79095133841648, 110.32510669259, 'Ambarketawang', 'Ambarketawang', 'Gamping', 'Sleman', 'Daerah Istimewa Yogyakarta', 'Non Station', 'Clean and Clear', 'Belum Tersewa', 12000000.00, 'WhatsApp Image 2024-07-15 at 14.20.23.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `blok`
--

CREATE TABLE `blok` (
  `id_blok` varchar(7) NOT NULL,
  `asset_id` varchar(11) NOT NULL,
  `nama_blok` text NOT NULL,
  `alias` text NOT NULL,
  `area` double NOT NULL,
  `dimension` double NOT NULL,
  `deskripsi` text NOT NULL,
  `best_use` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blok`
--

INSERT INTO `blok` (`id_blok`, `asset_id`, `nama_blok`, `alias`, `area`, `dimension`, `deskripsi`, `best_use`, `foto`) VALUES
('YK00001', '06.01.00511', 'Stasiun Besar Yogyakarta (Kios1)', '200', 28, 28, 'gatau jg', 'Toko', 'WhatsApp Image 2024-07-15 at 14.20.19.jpeg'),
('YK00002', '06.01.00511', 'Stasiun Besar Yogyakarta (Kios2)', '300', 29, 20, 'mbuh', 'Kios', 'open login (1).png'),
('YK00003', '06.01.00529', 'Stasiun Besar Imogiri(Kios1)', '100', 28, 28, 'barang bagus', 'Kios', 'WhatsApp Image 2024-05-30 at 23.42.00.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kelamin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `kelamin`, `email`, `nama`, `role`, `foto`) VALUES
('123456789', 'admin_izza', '$2y$10$w9SxYRbp10BT3kUi/Y1.pOIHhwvuMYdC2lp.XP9TR7eVDEBGjDRi2', 'Sistem Informasi', 'nugrohoizzan29@gmail.com', 'Nugroho Izza N', 'admin', 'IMG_20210405_163653_483.jpg'),
('AD004', 'admin_nugroho', '$2y$10$zz.XpQsr.aPNPxd6y5Cjf.czj2yjntzeuUYCkb6w2Y5rHqYb74CaW', 'Laki-laki', 'nugroho29@gmail.com', 'Nugroho Izza N', 'admin', 'ugo biru (1).png'),
('AD005', 'nugroho', '$2y$10$qHKSwjUkKokg/OAHuTvFoOjlfEAhdYCOzU2Tjcn5KApxKfKh9/x2a', 'Laki-laki', 'nugrohoizzan29@gmail.com', 'Nugroho Izza', 'admin', '2022-11-08-013628956.jpg'),
('AD006', 'ahmadraihan', '$2y$10$81t2ZYOXQrjB.OBhj2ZZ3uwQoQAMqIBEic4i1iRs2/qnRr32qDDqW', 'Laki-laki', 'ahmadraihan22@gmail.com', 'Ahmad Raihan A', 'admin', 'WhatsApp Image 2022-07-05 at 13.01.28.jpeg'),
('AD007', 'admin_raihan', '$2y$10$JKtkLWaOsmIlBFFg3ZaLnOweMRrHITYX7vMLOFOqDfcX3YVnLqprm', 'Laki-laki', 'ahmadraihan22@gmail.com', 'Ahmad Raihan', 'admin', 'DSC06344.JPG'),
('US001', 'nugrohoizzan', '$2y$10$TXwGHPaqxr0YNR2TIo8VtuGv6KYaDdQpM4Lis4jphRPTaLTayTKpm', 'Laki-laki', 'nugroho29@gmail.com', 'Nugroho Izza N', '', '1120758908123210152.jpeg'),
('US002', 'nugroho', '$2y$10$ZCaVKBQlebkTyDm17lDEQuMINZbY4ySEiapIfI7o8hjgzvEv119uK', 'Laki-laki', 'nugrohoizza29@gmail.com', 'nugroho', '', 'WhatsApp Image 2024-06-26 at 15.40.28.jpeg'),
('US003', 'nurcahyo', '$2y$10$JCtgO7l0.6T9upXNHKC46eUzYj/63372FJknV/d0NC1d3Ce3ZMM1K', 'Laki-laki', 'ugoo29@gmail.com', 'Nugroho Izza', '', 'day3.jpeg'),
('US004', 'ahmadraihan', '$2y$10$yTBzlDSo4Bv9TD21L7r.2eR0lC6niZlflcwVkJyImqTDOENV0Ac3y', 'Laki-laki', 'ahmadraihan22@gmail.com', 'Ahmad Raihan a', 'user', 'WhatsApp Image 2022-07-05 at 13.01.28.jpeg'),
('US005', 'user5', '$2y$10$huNy786QvFSwUnqgrz4oae.i6zH7BMBVvfzVn1iz7kcEjDMdLJ88S', 'Perempuan', 'user5@gmail.com', 'userrrrr', 'user', '2021-08-15-111617202.jpg'),
('US006', 'user6', '$2y$10$10LmzwhL6vnQjX40DzPWtOk33s/JovR2zxxzNXV7.G1qihmF4F6CG', 'Laki-laki', 'ahmadraihan22@gmail.com', 'Ahmad Raihan A', 'user', 'WhatsApp Image 2022-07-05 at 13.01.28.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`id_blok`),
  ADD KEY `id` (`asset_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blok`
--
ALTER TABLE `blok`
  ADD CONSTRAINT `blok_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
