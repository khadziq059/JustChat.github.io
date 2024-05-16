-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 01:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ads_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `pengirim` varchar(500) NOT NULL,
  `penerima` varchar(500) NOT NULL,
  `isi` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `pengirim`, `penerima`, `isi`) VALUES
(1, 'amar', 'Aroef', '1sadavds'),
(2, 'amar', 'Aroef', 'uyfiooljbjo'),
(3, 'amar', 'Aroef', 'dsfasds'),
(4, 'amar', 'Aroef', 'sdfads'),
(5, 'Aroef', 'amar', 'hhihhb'),
(6, 'amar', 'Aroef', 'vghb'),
(7, 'amar', 'Aroef', 'jkakdkad'),
(8, 'repo', 'amar', 'halo amarr'),
(9, 'repo', 'Aroef', ''),
(10, 'repo', 'Aroef', 'aroef'),
(11, 'repo', 'Aroef', 'zxbd,fvsa,dfv'),
(12, 'repo', 'Aroef', 'halokadik'),
(13, 'daniel', 'Aroef', 'hadlso'),
(14, 'amar', 'Aroef', 'hai kamu adakah sebuah nama'),
(15, 'amar', 'Aroef', 'kjsadg'),
(16, 'amar', 'Aroef', 'sadgasr'),
(17, 'amar', 'Aroef', 'sfadhhwaef'),
(18, 'daniel', 'repo', 'jhjasf'),
(19, 'daniel', 'repo', 'adfad'),
(20, 'daniel', 'repo', 'jkbsdfjlaelkfknaskndkaslkf'),
(21, 'daniel', 'repo', 'jhahskdkawfd'),
(22, 'daniel', 'repo', 'jkasbflad'),
(23, 'daniel', 'repo', 'dff'),
(24, 'daniel', 'repo', 'adfrsf'),
(25, 'daniel', 'repo', 'fsdfsrgwfed'),
(26, 'daniel', 'repo', 'adgfdascsc'),
(27, 'daniel', 'repo', 'sdgfsdf'),
(28, 'daniel', 'repo', 'arwewdas'),
(29, 'daniel', 'repo', 'jasjkdjasd'),
(30, 'daniel', 'amar', 'hgvuh'),
(31, 'daniel', 'repo', 'tdufutu'),
(32, 'Aroef', 'amar', 'hao'),
(33, 'Aroef', 'amar', 'Hai amar'),
(34, 'Aroef', 'amar', 'haloo'),
(35, 'Aroef', 'amar', 'Haii'),
(36, 'Aroef', 'amar', 'hai'),
(37, 'Aroef', 'amar', 'klo kamu'),
(38, 'Aroef', 'amar', 'haiiiii'),
(39, 'Aroef', 'repo', 'ga jelass'),
(40, 'Aroef', 'amar', 'hai'),
(41, 'Aroef', 'repo', 'hai'),
(42, 'Aroef', 'amar', 'hai'),
(43, 'Aroef', 'amar', 'halo aamarrr'),
(44, 'Aroef', 'Daniel', 'halo aamarrr'),
(45, 'amar', 'Daniel', 'oiaosfsa'),
(46, 'amar', 'Daniel', 'kjljl'),
(47, 'amar', 'repo', 'Halo Repo'),
(48, 'amar', 'repo', 'Kamu sedang apa?'),
(49, 'admin', 'amar', 'haloo'),
(50, 'amar', 'admin', 'h'),
(51, 'admin', 'amar', 'Halo akun anda akan saya hapus');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `isi` varchar(10000) NOT NULL,
  `tanggal` datetime NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `username`, `isi`, `tanggal`, `foto`) VALUES
(1, 'daniel', 'hai azizan', '2023-11-11 04:39:40', ''),
(2, 'Aroef', 'halo saya sedang mengerjakan ads', '2023-11-11 05:28:00', ''),
(3, 'daniel', 'Hai sekarang sudah duuhur', '2023-11-11 11:38:19', ''),
(4, 'amar', 'tolong serang aroef agar akunnya terhapus', '2023-11-13 19:18:35', ''),
(5, 'amar', 'jadsnadsd', '2023-11-16 10:56:18', ''),
(6, 'amar', 'hgglj\r\n\r\n', '2023-11-17 13:08:39', ''),
(7, 'amar', 'halo dunia', '2023-11-17 13:08:47', ''),
(8, 'Aroef', 'Halooooo', '2023-11-17 13:37:47', ''),
(9, 'Aroef', 'Kampret', '2023-11-17 13:38:01', ''),
(10, 'amar', 'haiii', '2023-11-17 13:38:37', ''),
(11, 'Aroef', 'jkgklk', '2023-11-17 14:06:08', ''),
(12, 'Aroef', 'Halo namaku aroef\r\n', '2023-11-18 17:59:52', ''),
(13, 'Aroef', 'Hai kamu', '2023-11-18 18:08:17', 'FB_IMG_15039235512356319.jpg'),
(14, 'Aroef', 'halo', '2023-11-18 18:09:43', ''),
(15, 'Aroef', 'Ini adalah mukaku', '2023-11-18 18:13:02', 'IMG_20170520_211959.jpg'),
(16, 'Aroef', 'Ini foto jaman SMA guysss..', '2023-11-18 18:20:23', 'IMG20210430130109.jpg'),
(17, 'amar', 'hlo', '2023-12-19 22:02:15', 'WIN_20220502_16_43_19_Pro.jpg'),
(22, 'admin', 'halo ini adalah admin', '2023-12-21 21:34:18', ''),
(25, 'admin', 'ini fotoku jaman dulu', '2023-12-21 21:40:20', 'IMG_20200116_153306.jpg'),
(29, 'moderator', 'Hai', '2023-12-26 13:59:38', ''),
(30, 'moderator', 'Kapan ini?\r\n', '2023-12-26 13:59:48', 'IMG_20200202_102306.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `gambar`) VALUES
(6, 'amar', 'amar123@gmail.com', '$2y$10$F36hnJHnXg187G/8h45fOOgGQeoFpU7C6CkCZ3P3pSTFBzzMzMHqm', 'default.png'),
(7, 'owner', 'owner@gmail.com', '$2y$10$tMlP5p.keJ66f53cNGg/vO8m4lKgu7dP5pGAdiPtUrdURWrLvBwHW', 'default.png'),
(8, 'admin', 'admin@gmail.com', '$2y$10$kt/dpjlgLXy709iVBKEgyOcJkZlUp3UnJe73eJEnFYN67bxLVqmN.', 'default.png'),
(9, 'moderator', 'moderator@gmail.com', '$2y$10$QOeXEc16tVgM9eW16Xgpae2T7FoJLf5JRSeulhkHukJlsmHCRQrgO', 'IMG_20200418_150700_617.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
