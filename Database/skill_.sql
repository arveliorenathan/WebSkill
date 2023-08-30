-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 04:32 PM
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
-- Database: `skill+`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `domisili` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','mentor','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`id`, `username`, `nama_lengkap`, `tanggal_lahir`, `gender`, `no_hp`, `domisili`, `email`, `password`, `role`) VALUES
(44, 'Admin', NULL, NULL, NULL, NULL, NULL, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(45, 'Mentor', 'Baiq Yusrina Hidayati', '2003-04-30', 'Perempuan', '089534631948', 'Mataram', 'mentor@gmail.com', '23cbeacdea458e9ced9807d6cbe2f4d6', 'mentor'),
(46, 'Amal', 'Insyanu Amal', '2003-07-13', 'Laki-Laki', '087701049922', 'Mataram', 'amal@gmail.com', '16b5480e7b6e68607fe48815d16b5d6d', 'customer'),
(47, 'Arvel', '', '0000-00-00', '', '0', '', 'arvel@gmail.com', '124d05809f54431b91926cd931d5242a', 'customer'),
(48, 'Anggi', 'Baiq Anggita Arsya', '0000-00-00', 'Perempuan', '0812345678987', 'Mataram', 'anggi@gmail.com', '4a283e1f5eb8628c8631718fe87f5917', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `admin_bootcamp`
--

CREATE TABLE `admin_bootcamp` (
  `id_bootcamp` int(11) NOT NULL,
  `gambar_bootcamp` text NOT NULL,
  `judul_bootcamp` text NOT NULL,
  `tanggal_bootcamp` text NOT NULL,
  `harga_bootcamp` text NOT NULL,
  `tentang_bootcamp` text NOT NULL,
  `prospek_bootcamp` text NOT NULL,
  `mentor_bootcamp` text NOT NULL,
  `jadwal_bootcamp` text NOT NULL,
  `benefit_bootcamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_bootcamp`
--

INSERT INTO `admin_bootcamp` (`id_bootcamp`, `gambar_bootcamp`, `judul_bootcamp`, `tanggal_bootcamp`, `harga_bootcamp`, `tentang_bootcamp`, `prospek_bootcamp`, `mentor_bootcamp`, `jadwal_bootcamp`, `benefit_bootcamp`) VALUES
(4, '5.png', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b'),
(6, '6.png', 'DIGITAL MARKETING', '25 Jul 2023 - 26 Agu 2023', 'Rp 1.000.000,00', 'aaaaaaaaaaaa', 'aaaaaaaaaaaa', 'aaaaaaaaaaaa', 'aaaaaaaaaaaa', 'aaaaaaaaaaaa'),
(7, '7.png', 'MICROSOFT EXCEL BASIC', '31 Jul 2023 - 15 Sep 2023', 'Rp 1.000.000,00', 'bbbbbbbbbbbb', 'bbbbbbbbbbbb', 'bbbbbbbbbbbb', 'bbbbbbbbbbbb', 'bbbbbbbbbbbb');

-- --------------------------------------------------------

--
-- Table structure for table `admin_materi`
--

CREATE TABLE `admin_materi` (
  `id_materi` int(11) NOT NULL,
  `judul_materi` text NOT NULL,
  `deskripsi_materi` text NOT NULL,
  `mentor_materi` text NOT NULL,
  `harga_materi` text NOT NULL,
  `gambar_materi` varchar(255) NOT NULL,
  `sertif_materi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_materi`
--

INSERT INTO `admin_materi` (`id_materi`, `judul_materi`, `deskripsi_materi`, `mentor_materi`, `harga_materi`, `gambar_materi`, `sertif_materi`) VALUES
(1, 'Copywriting Introduction', 'Materi ini membahas pengenalan dasar copywriting, sehingga kamu memiliki fondasi copywriting yang baik. Materi ini juga akan membuat kamu mempelajari karir seorang copywriter dan perbedaan copywriting dengan metode tulisan lainnya. Kamu juga akan belajar mengenai media-media yang dapat digunakan untuk melakukan copywriting untuk memaksimalkan kemampuan kamu dalam membuat sebuah tulisan yang memiliki nilai jual.', 'Waitatiri - Lead Copywriter at Zenius Education', 'Rp 100.000,00', '1.png', '1.png'),
(22, 'SEO Fundamentals', 'Pada materi SEO Fundamentals ini, kita akan mempelajari tentang dasar-dasar yang perlu diketahui dan dikuasai tentang SEO. Pengetahuan dasar ini mencakup apa itu SEO, apa saja komponen didalamnya, bagaimana prinsip kerjanya, search result, hingga cara melakukan riset kompetitor. Pada materi kali ini, diharapkan para peserta bisa menguasai semua materi tersebut sebelum beranjak pada materi SEO yang lebih luas lagi di video-video selanjutnya.', 'Septi Riyani Maulida - SEO Manager at IDN Times', 'Rp 150.000,00', '2.png', '2.png'),
(39, 'TikTok Ads Fundamentals', 'abcdefghijklmnopqrstuvwxyz', 'Anis Soyyati - Senior Performance Manager at Digital Bank Company', 'Rp 150.000,00', '3.png', '3.png');

-- --------------------------------------------------------

--
-- Table structure for table `materi_elearning`
--

CREATE TABLE `materi_elearning` (
  `id_materiElearning` int(11) NOT NULL,
  `judul_materiElearning` text NOT NULL,
  `deskripsi_materiElearning` text NOT NULL,
  `gambar_materiElearning` varchar(255) NOT NULL,
  `id_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi_elearning`
--

INSERT INTO `materi_elearning` (`id_materiElearning`, `judul_materiElearning`, `deskripsi_materiElearning`, `gambar_materiElearning`, `id_materi`) VALUES
(3, 'Copywriting Introduction', 'Materi ini membahas pengenalan dasar copywriting, sehingga kamu memiliki fondasi copywriting yang baik. Materi ini juga akan membuat kamu mempelajari karir seorang copywriter dan perbedaan copywriting dengan metode tulisan lainnya. Kamu juga akan belajar mengenai media-media yang dapat digunakan untuk melakukan copywriting untuk memaksimalkan kemampuan kamu dalam membuat sebuah tulisan yang memiliki nilai jual.', '5.png', 1),
(34, 'Copywriting Introduction', 'aaaaaaaaaaa', '6.png', 1),
(35, 'Copywriting Introduction', 'aaaaaaaaaaaaaaaa', '4.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tanggal_pembayaran` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_pembayaran` enum('Berhasil','Gagal') NOT NULL,
  `bukti_pembayaran` text NOT NULL,
  `id` int(11) NOT NULL,
  `id_bootcamp` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tanggal_pembayaran`, `status_pembayaran`, `bukti_pembayaran`, `id`, `id_bootcamp`, `id_materi`) VALUES
(2, '2023-06-19 02:09:06', 'Berhasil', '', 46, 4, 1),
(3, '2023-06-19 05:59:52', 'Berhasil', '4.png', 46, 6, 22),
(4, '2023-06-19 06:00:28', 'Berhasil', '5.png', 46, 7, 39);

-- --------------------------------------------------------

--
-- Table structure for table `video_elearning`
--

CREATE TABLE `video_elearning` (
  `id_videoElearning` int(11) NOT NULL,
  `judul_videoElearning` varchar(255) NOT NULL,
  `link_videoElearning` varchar(255) NOT NULL,
  `id_materiElearning` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_elearning`
--

INSERT INTO `video_elearning` (`id_videoElearning`, `judul_videoElearning`, `link_videoElearning`, `id_materiElearning`) VALUES
(1, 'Copywriting Introduction\r\n', 'https://www.youtube.com/embed/czubWNv8MYk', 3),
(5, 'Technical Copywriting Fundamental', 'https://www.youtube.com/embed/qGJRr8O2wtc', 3),
(6, 'Copywriting Goals and Theory', 'https://www.youtube.com/embed/qGJRr8O2wtc', 3),
(7, 'Rating Course', 'https://www.youtube.com/embed/qGJRr8O2wtc', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_bootcamp`
--
ALTER TABLE `admin_bootcamp`
  ADD PRIMARY KEY (`id_bootcamp`);

--
-- Indexes for table `admin_materi`
--
ALTER TABLE `admin_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `materi_elearning`
--
ALTER TABLE `materi_elearning`
  ADD PRIMARY KEY (`id_materiElearning`),
  ADD KEY `fk_materi_elearning_admin_materi` (`id_materi`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_actor` (`id`),
  ADD KEY `fk_bootcamp` (`id_bootcamp`),
  ADD KEY `fk_materi` (`id_materi`);

--
-- Indexes for table `video_elearning`
--
ALTER TABLE `video_elearning`
  ADD PRIMARY KEY (`id_videoElearning`),
  ADD KEY `fk_video` (`id_materiElearning`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `admin_bootcamp`
--
ALTER TABLE `admin_bootcamp`
  MODIFY `id_bootcamp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin_materi`
--
ALTER TABLE `admin_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `materi_elearning`
--
ALTER TABLE `materi_elearning`
  MODIFY `id_materiElearning` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `video_elearning`
--
ALTER TABLE `video_elearning`
  MODIFY `id_videoElearning` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materi_elearning`
--
ALTER TABLE `materi_elearning`
  ADD CONSTRAINT `fk_materi_elearning_admin_materi` FOREIGN KEY (`id_materi`) REFERENCES `admin_materi` (`id_materi`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_actor` FOREIGN KEY (`id`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `fk_bootcamp` FOREIGN KEY (`id_bootcamp`) REFERENCES `admin_bootcamp` (`id_bootcamp`),
  ADD CONSTRAINT `fk_materi` FOREIGN KEY (`id_materi`) REFERENCES `admin_materi` (`id_materi`);

--
-- Constraints for table `video_elearning`
--
ALTER TABLE `video_elearning`
  ADD CONSTRAINT `fk_video` FOREIGN KEY (`id_materiElearning`) REFERENCES `materi_elearning` (`id_materiElearning`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
