-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 12:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `name`, `phone_number`, `email`) VALUES
(1, 'Rika', '085156412841', 'rika@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `picture`, `name`, `type`, `description`, `price`) VALUES
(15, 'asd.jpeg', 'dsf', 'sdfdsf', 'sdfsdf', '324324'),
(16, 'dfg13r.jpg', 'fdgfdg', 'dfgdfg', 'dfgdfg', '234324'),
(19, 'dfg13r_1.jpg', 'asdsad', 'asdasd', 'sdfsdf', '213'),
(20, 'asd_1.jpeg', 'dsfdsf', 'sdfsdf', 'dsfdsf', '123'),
(22, 'asd21_1.jpg', 'dsfsdf', 'sdfdsf', 'sdfdsfds', '234'),
(23, 'asd21_2.jpg', 'dsfsdf', 'sdfdsf', 'sdfdsfds', '234'),
(26, 'asd21_3.jpg', 'dfsfsdf23', 'fdsgfdg', 'dsfsdfsdf', '314'),
(30, 'Vestia_Zeta_Portrait.webp', 'Zeta', 'Hllow', 'Zeta adalah anggota ketujuh dari “Secret Archive Unit”, sebuah organisasi yang memiliki akses ke semua data dalam dunia virtual. Dia adalah pendatang baru dengan codename “V.7” yang harus mengikuti aturan tegas, karena jika tidak, maka dia akan terjerat d', '99999999999'),
(33, 'Vestia_Zeta_Portrait_3.webp', 'cool', 'dsfgsdf', 'asdasd', '50000000'),
(34, 'Vestia_Zeta_Portrait_4.webp', 'aasd', 'asd', 'asdsa', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone_number`, `email`, `address`) VALUES
(7, 'Guna', '08121321421', 'gunanan@gmail.com', 'Bekasi'),
(8, 'Iman S', '085121312', 'safdsf@sdfdsf.com', 'sdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `komik`
--

CREATE TABLE `komik` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komik`
--

INSERT INTO `komik` (`id`, `judul`, `slug`, `penulis`, `penerbit`, `sampul`, `created_at`, `updated_at`) VALUES
(1, 'Naruto', 'naruto', 'Masashi Kishimoto', 'Shonen Jump', 'naruto.jpg', NULL, '2023-07-02 19:42:06'),
(2, 'One Piece', 'one-piece', 'Eichiro Oda', 'Gramedia', 'onepiece.jpg', NULL, NULL),
(34, 'Zeta', 'zeta', 'Holowlive', 'hollow', 'Vestia_Zeta_Portrait.webp', '2023-07-02 20:34:38', '2023-07-02 20:34:52'),
(35, 'dfsa', 'dfsa', 'xcv', 'asdcxv', 'Vestia_Zeta_Portrait_1.webp', '2023-07-02 20:35:56', '2023-07-02 20:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `salesperson`
--

CREATE TABLE `salesperson` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`id`, `name`, `phone_number`, `email`) VALUES
(5, 'Lina', '0856143142', 'linassa@gmail.com'),
(6, 'Fina', '08561421841', 'sdgdgf@gfgd.com'),
(7, 'Reyna', '085515128512', 'dsfgdfg@dsfg.com'),
(8, 'asd', 'asd', 'dsg@sdfs.sdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `car_id` varchar(255) NOT NULL,
  `salesperson_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `car_id`, `salesperson_id`, `price`, `created_at`, `updated_at`) VALUES
(298, 'Guna', 'asdsad', 'Fina', '21300', '2023-07-05 09:09:10', '2023-07-05 09:09:10'),
(309, 'Iman S', 'fdgfdg', 'Fina', '234324', '2023-07-05 10:22:58', '2023-07-05 10:22:58'),
(310, 'Guna', 'cool', 'Lina', '50000000', '2023-07-05 10:23:18', '2023-07-05 10:23:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komik`
--
ALTER TABLE `komik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesperson`
--
ALTER TABLE `salesperson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komik`
--
ALTER TABLE `komik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `salesperson`
--
ALTER TABLE `salesperson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
