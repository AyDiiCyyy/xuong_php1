-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 07:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `loaisach`
--

CREATE TABLE `loaisach` (
  `id` int(11) NOT NULL,
  `tenloai` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaisach`
--

INSERT INTO `loaisach` (`id`, `tenloai`) VALUES
(1, 'khoa học'),
(2, 'giáo khoa'),
(6, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `id` int(11) NOT NULL,
  `tensach` varchar(150) NOT NULL,
  `gia` decimal(10,0) NOT NULL,
  `anh` varchar(150) NOT NULL,
  `mota` text NOT NULL,
  `soluong` int(11) NOT NULL,
  `maloai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`id`, `tensach`, `gia`, `anh`, `mota`, `soluong`, `maloai`) VALUES
(8, 'a', 44444, '1new.jpg', 'a', 33, 1),
(10, 'v', 42, '40158637_10156491714252440_3127797804324356096_n.jpg', 'bb', 4, 2),
(11, 'b', 3, '1new.jpg', 'b', 3, 2),
(12, 'b', 3, '1new.jpg', 'đa', 3, 1),
(13, 'bb', 33, '1new.jpg', 'bbb', 22, 2),
(17, 'a', 44444, 'avt.jpg', 'bbb', 33, 1),
(18, 'test', 1, '311941428_973122760272072_5974512937872738802_n.jpg', '', 0, 2),
(19, 'test', 44444, '40158637_10156491714252440_3127797804324356096_n.jpg', '', 0, 1),
(20, 'test1', 2, '40158637_10156491714252440_3127797804324356096_n.jpg', '', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loaisach`
--
ALTER TABLE `loaisach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sa` (`maloai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loaisach`
--
ALTER TABLE `loaisach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sach`
--
ALTER TABLE `sach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `fk_sa` FOREIGN KEY (`maloai`) REFERENCES `loaisach` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
