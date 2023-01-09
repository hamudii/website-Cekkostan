-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2022 at 08:08 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-pemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `kost`
--

CREATE TABLE `kost` (
  `id_kost` int NOT NULL,
  `nama_kost` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_kost` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `total_kamar` int NOT NULL,
  `sisa_kamar` int NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_pemilik` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kost`
--

INSERT INTO `kost` (`id_kost`, `nama_kost`, `alamat_kost`, `harga`, `total_kamar`, `sisa_kamar`, `deskripsi`, `gambar`, `id_pemilik`) VALUES
(27, 'DxTrie', 'Sukawening', 1000000, 50, 6, 'Include :\r\nKamar mandi dalam,\r\nWifi 300Mbps', 'dxtrie.jpg', 35),
(28, 'Pondok Mahasiswa', 'Caringin', 800000, 20, 4, 'Include Water Heater', 'pondok-mahasiswa.png', 35);

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int NOT NULL,
  `username_pemilik` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password_pemilik` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pemilik` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_pemilik` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telp_pemilik` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `username_pemilik`, `password_pemilik`, `nama_pemilik`, `email_pemilik`, `telp_pemilik`) VALUES
(27, 'kumywydi', '$2y$10$auyQBsxoyMpp33hmZjUbEexYhfGi/rzhlCZuHRMx9TBWn1AF35Z/e', 'Ducimus maxime vel ', 'jivucoza@mailinator.com', 0),
(28, 'goqaqafet', '$2y$10$p/X0CL41vDu0yGD8d0DXJeZEB/bS5veiLG7HeBouWNwcg1H4ZYNwy', 'Deleniti anim quod e', 'bosikilaqa@mailinator.com', 0),
(29, 'pijuqeram', '$2y$10$cF.UcHfn.RdqdbmDT3PimuH4A0Oen1BaOKxoazkfnM6owqIeeXbuu', 'Mollit et qui laboru', 'zoxib@mailinator.com', 0),
(30, 'dijup', '$2y$10$MErsrhtIwAczHVOHtwCiJepuET78BmewoRYYD9rPV4cY04fieerzW', 'Eligendi natus volup', 'disebike@mailinator.com', 0),
(31, 'pugumuz', '$2y$10$jWkio.pDXvGrsrl4enHjl.QXqF282iUDx6EwiwmwgYtURzSkjBeee', 'Aliqua Officiis rer', 'jilypegy@mailinator.com', 0),
(32, 'cufibyfyni', '$2y$10$DiF0z/37.1jscU0P5q2WXu8byeo0h1yU71slWXtHHgytLOKle.fI2', 'Exercitationem animi', 'zaxyx@mailinator.com', 0),
(34, 'qolepav', '$2y$10$pGGp2Qjqm9M8UPlrzE7qQO4Fr6BqqPQZTjawW8GHuWobgkx6c3XDG', 'Odit omnis consequun', 'juryl@mailinator.com', 0),
(35, 'test', '$2y$10$e66nvsJU9uleyuCCuD4AWudDtMH42GnYzeB9pQks9RZI366jobXYG', 'Praesentium itaque a', 'boqyvosu@mailinator.com', 0),
(36, 'hamud123', '$2y$10$AWngH8BvREYBpBNYlwZb2.nEX6aMqUMYAFAUiw3VJTBonWLKPHyom', 'hamud', 'hamud@test.com', 12345),
(37, 'banyg', '$2y$10$LOZAewsy/h56APCaBGU9seAXlI7wImrfVtUNpINPsCw/L42oHKHZm', 'Cillum sed elit ut ', 'debocel@mailinator.com', 123456),
(38, 'admin', '$2y$10$rvHE76OYXnP0cNOoucLsQe29cplt.LtKZHciNaDzP75.maxLdeU9i', 'admin', 'gokin@mailinator.com', 12412512);

-- --------------------------------------------------------

--
-- Table structure for table `pencari`
--

CREATE TABLE `pencari` (
  `id_pencari` int NOT NULL,
  `username_pencari` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password_pencari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pencari` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_pencari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telp_pencari` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pencari`
--

INSERT INTO `pencari` (`id_pencari`, `username_pencari`, `password_pencari`, `nama_pencari`, `email_pencari`, `telp_pencari`) VALUES
(1, 'test1', '098f6bcd4621d373cade4e832627b4f6', 'Libero aperiam lorem', 'biroqadite@mailinator.com', 321),
(2, 'rian', 'cb2b28afc2cc836b33eb7ed86f99e65a', 'Voluptatum accusamus', 'xepykapyvu@mailinator.com', 123),
(3, 'benopaped', '202cb962ac59075b964b07152d234b70', 'Varian', 'zyxecim@mailinator.com', 123),
(4, 'hamud123', 'b94d35f79871cab214ac418cce64db05', 'hamud', 'fyjadav@mailinator.com', 123),
(5, 'qoqemuq', '123', 'Eveniet ullam nisi ', 'wege@mailinator.com', 123),
(6, 'tiqotawu', '123', 'Distinctio Quis vol', 'tyzemy@mailinator.com', 123),
(7, 'xewifunom', '123', 'Non hic vero ipsum q', 'kuhaqo@mailinator.com', 123),
(8, 'lisec', 'Pa$$w', 'Duis iusto odio qui ', 'jimarosory@mailinator.com', 123),
(9, 'hamud', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Ea ratione dolor obc', 'vulizage@mailinator.com', 123),
(11, 'giqebicico', '123', 'Vitae fuga Ad quide', 'hyhetu@mailinator.com', 0),
(12, 'doxufyzejy', 'doxufyzejy', 'Dolorum eu ut recusa', 'qadevoluz@mailinator.com', 0),
(13, 'goqaqafet', '$2y$10$ISiEFBLk4dKQjzL2PTye4ONwWAK2kBKp.8J/XHJN7WyB4Lhn55e4C', 'Est dolores et corpo', 'bydi@mailinator.com', 0),
(14, 'qewaq', '$2y$10$qaoErZN4QfFWNUp6U2D0yOy2ghfsKVtaQyD4kHJ274755yp5O3eTG', 'Commodi aut et rerum', 'gevoju@mailinator.com', 0),
(15, 'pugumuz', '$2y$10$j/3tN3hERXp3u6wgHltxUeDYpXQRyraYP.RWvHupI9fdzgNmdnca2', 'Magna aut quod omnis', 'cyhacehud@mailinator.com', 0),
(16, 'lodinyk', '$2y$10$udbN/56jELu9hBF1HXKPoezNe9WsQf8LUVXndo0br/5c.pg28Ixni', 'Fuga Molestiae adip', 'cixy@mailinator.com', 0),
(17, 'zexidify', '$2y$10$5nDsmkcULd1n50t6qy9JSeZRqCCuPYGj1QfQD6RP6YAb/Smf.I/vK', 'Voluptas velit cillu', 'pibojime@mailinator.com', 1234),
(18, 'test', '$2y$10$LPLKKdxcb/aJblKzCKTkS.NBDk53q/OE1dmtFCxSzlvpNsFCyPV1e', 'Reprehenderit vero ', 'sizi@mailinator.com', 123),
(19, 'sunajavu', '$2y$10$2NUYXRzUPBDc5jikcU7qCOOpl6OKg5QMcDyLgY.tBo.frSx91GVu6', 'In cum qui pariatur', 'bewesilysa@mailinator.com', 1245),
(20, 'giat', '$2y$10$Mu.Mt2vRZmEc4xaB5sJNkukctc4YZkYm8sJiRXeSrzICyzEWjYSiu', 'Giat Cukimay', 'Giat@gmail.com', 1234567);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `id_kost` int NOT NULL,
  `id_pencari` int NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `tanggal_pesan`, `id_kost`, `id_pencari`, `status`) VALUES
(9, '2022-12-05', 27, 18, 'diterima'),
(10, '2022-12-05', 27, 18, 'ditolak'),
(11, '2022-12-05', 28, 20, 'diterima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id_kost`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`),
  ADD UNIQUE KEY `username_pemilik` (`username_pemilik`);

--
-- Indexes for table `pencari`
--
ALTER TABLE `pencari`
  ADD PRIMARY KEY (`id_pencari`),
  ADD UNIQUE KEY `username_pencari` (`username_pencari`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_pencari` (`id_pencari`),
  ADD KEY `id_kost` (`id_kost`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kost`
--
ALTER TABLE `kost`
  MODIFY `id_kost` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pencari`
--
ALTER TABLE `pencari`
  MODIFY `id_pencari` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kost`
--
ALTER TABLE `kost`
  ADD CONSTRAINT `kost_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik` (`id_pemilik`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_pencari`) REFERENCES `pencari` (`id_pencari`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_kost`) REFERENCES `kost` (`id_kost`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
