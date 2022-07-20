-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 02:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_service_rental`
--
CREATE DATABASE IF NOT EXISTS `car_service_rental` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `car_service_rental`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rental_price` decimal(13,2) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` enum('available','reserved') DEFAULT 'available',
  `fk_supplierId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `rental_price`, `picture`, `status`, `fk_supplierId`) VALUES
(1, 'Audi R8', '290.00', 'audi_r8.jpg', 'reserved', 1),
(2, 'Audi RS4', '190.00', 'audi_rs4.jpg', 'available', 2),
(3, 'Audi TT', '145.00', 'audi_tt.jpg', 'reserved', 1),
(4, 'VW R32', '155.00', 'vw_r32.jpg', 'reserved', 2),
(5, 'BMW M3', '230.00', 'bmw_2.jpg', 'available', 1),
(6, 'BMW M4', '390.00', '62d67a7525f2f.jpg', 'available', NULL),
(7, 'Test auto', '150.00', '62d68ee32a9c1.jpg', 'available', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rent_info`
--

CREATE TABLE `rent_info` (
  `id` int(11) NOT NULL,
  `fk_car_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `rent_date_start` date DEFAULT NULL,
  `rent_date_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_info`
--

INSERT INTO `rent_info` (`id`, `fk_car_id`, `fk_user_id`, `rent_date_start`, `rent_date_end`) VALUES
(3, 1, 2, '2022-07-21', '2022-07-31'),
(4, 3, 2, '0000-00-00', '0000-00-00'),
(5, 3, 2, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplierId` int(11) NOT NULL,
  `sup_name` varchar(100) NOT NULL,
  `sup_email` varchar(50) DEFAULT NULL,
  `sup_website` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplierId`, `sup_name`, `sup_email`, `sup_website`) VALUES
(1, 'Avis Autovermietung GmbH', 'kundenservice@avis.at', 'www.avis.at'),
(2, 'Hertz Europe Ltd', 'office@hertz.de', 'www.hertz.de');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `date_of_birth`, `email`, `picture`, `status`) VALUES
(1, 'Hasan', 'Acartuerk', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1985-05-31', 'hadev@mailbox.org', '62d5c0dd59bca.jpg', 'adm'),
(2, 'Sandra', 'Bella', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1985-06-01', 'sandra@gmail.com', '62d5c10dcb000.jpg', 'user'),
(3, 'Thomas', 'Kunz', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '2000-08-30', 'kunz@mailbox.org', '62d5c8a918b3c.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_supplierId` (`fk_supplierId`);

--
-- Indexes for table `rent_info`
--
ALTER TABLE `rent_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_car_id` (`fk_car_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplierId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rent_info`
--
ALTER TABLE `rent_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplierId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`fk_supplierId`) REFERENCES `suppliers` (`supplierId`) ON DELETE SET NULL;

--
-- Constraints for table `rent_info`
--
ALTER TABLE `rent_info`
  ADD CONSTRAINT `rent_info_ibfk_1` FOREIGN KEY (`fk_car_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `rent_info_ibfk_2` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
