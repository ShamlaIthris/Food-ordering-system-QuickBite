-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2026 at 05:51 PM
-- Server version: 8.0.43
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickbite_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'shamla', 'shamlaithris@gmail.com', 'hii', '2026-03-22 11:36:06'),
(2, 'shamla', 'shamlaithris@gmail.com', 'food is delicious', '2026-03-24 19:46:19'),
(3, 'shamla', 'shamlaithris@gmail.com', 'improve your delivery time', '2026-03-24 19:53:20'),
(4, 'shamla', 'shamlaithris@gmail.com', 'hello', '2026-03-25 09:48:33'),
(5, 'Rasa Nusrath', 'rasanusrath@gmail.com', 'satisfied with your service , but one more request , please ad mushroom biriyani next time', '2026-03-25 13:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `landmark` varchar(150) DEFAULT NULL,
  `payment_method` varchar(50) NOT NULL,
  `special_instructions` text,
  `order_items` longtext NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `delivery_fee` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `full_name`, `phone`, `email`, `street_address`, `city`, `landmark`, `payment_method`, `special_instructions`, `order_items`, `subtotal`, `delivery_fee`, `tax`, `total_amount`, `created_at`) VALUES
(1, 1, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', 'school', 'Cash on Delivery', 'hi', '[{\"name\":\"Mutton Biryani\",\"price\":1550,\"quantity\":1}]', 1550.00, 350.00, 46.50, 1946.50, '2026-03-22 13:45:28'),
(2, 1, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', 'school', 'Cash on Delivery', 'hi', '[{\"name\":\"Mutton Biryani\",\"price\":1550,\"quantity\":1}]', 1550.00, 350.00, 46.50, 1946.50, '2026-03-22 14:29:16'),
(3, 2, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', '3', 'Cash on Delivery', '3', '[{\"name\":\"Egg Biryani\",\"price\":800,\"quantity\":1}]', 800.00, 350.00, 24.00, 1174.00, '2026-03-24 15:00:20'),
(4, 1, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', '', 'Cash on Delivery', '', '[{\"name\":\"Egg Biryani\",\"price\":800,\"quantity\":1},{\"name\":\"Special Mixed Biryani\",\"price\":1650,\"quantity\":1}]', 2450.00, 350.00, 73.50, 2873.50, '2026-03-24 18:40:29'),
(5, 1, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', '', 'Cash on Delivery', '', '[{\"name\":\"Egg Biryani\",\"price\":800,\"quantity\":1},{\"name\":\"Special Mixed Biryani\",\"price\":1650,\"quantity\":1}]', 2450.00, 350.00, 73.50, 2873.50, '2026-03-24 18:46:04'),
(6, 1, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', '', 'Cash on Delivery', '', '[{\"name\":\"Egg Biryani\",\"price\":800,\"quantity\":2},{\"name\":\"Special Mixed Biryani\",\"price\":1650,\"quantity\":2}]', 4900.00, 350.00, 147.00, 5397.00, '2026-03-24 19:43:50'),
(7, 2, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', '', 'Credit / Debit Card', '', '[{\"name\":\"Egg Biryani\",\"price\":800,\"quantity\":1}]', 800.00, 350.00, 24.00, 1174.00, '2026-03-25 09:00:50'),
(8, 2, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', 'w', 'Online Payment', 'w', '[{\"name\":\"Egg Biryani\",\"price\":800,\"quantity\":1}]', 800.00, 350.00, 24.00, 1174.00, '2026-03-25 09:01:24'),
(9, 2, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', 'q', 'Credit / Debit Card', 'q', '[{\"name\":\"Egg Biryani\",\"price\":800,\"quantity\":1}]', 800.00, 350.00, 24.00, 1174.00, '2026-03-25 09:41:19'),
(10, 2, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', '', 'Online Payment', '', '[{\"name\":\"Egg Biryani\",\"price\":800,\"quantity\":1}]', 800.00, 350.00, 24.00, 1174.00, '2026-03-25 09:41:41'),
(11, 2, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', '', 'Credit / Debit Card', '', '[{\"name\":\"Egg Biryani\",\"price\":800,\"quantity\":1}]', 800.00, 350.00, 24.00, 1174.00, '2026-03-25 09:42:27'),
(12, 2, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', '', 'Credit / Debit Card', '', '[{\"name\":\"Egg Biryani\",\"price\":800,\"quantity\":1}]', 800.00, 350.00, 24.00, 1174.00, '2026-03-25 09:42:47'),
(13, 2, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', '', 'Online Payment', '', '[{\"name\":\"Egg Biryani\",\"price\":800,\"quantity\":1}]', 800.00, 350.00, 24.00, 1174.00, '2026-03-25 09:43:11'),
(14, 2, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', '', 'Credit / Debit Card', '', '[{\"name\":\"Egg Biryani\",\"price\":800,\"quantity\":1}]', 800.00, 350.00, 24.00, 1174.00, '2026-03-25 09:55:36'),
(15, 2, 'shamla', '0751234567', 'shamlaithris@gmail.com', 'asmiya road', 'akkaraipattu', '', 'Online Payment', '', '[{\"name\":\"Egg Biryani\",\"price\":800,\"quantity\":1}]', 800.00, 350.00, 24.00, 1174.00, '2026-03-25 12:38:04'),
(16, 3, 'Rasa Nusrath', '0759817021', 'rasanusrath@gmail.com', 'Mosque road', 'akkaraipattu', 'Natha Style', 'Cash on Delivery', '', '[{\"name\":\"Beef Biryani\",\"price\":1400,\"quantity\":1}]', 1400.00, 350.00, 42.00, 1792.00, '2026-03-25 13:45:26'),
(17, 3, 'Rasa Nusrath', '0759817021', 'rasanusrath@gmail.com', 'Mosque road', 'akkaraipattu', '', 'Credit / Debit Card', '', '[{\"name\":\"Beef Biryani\",\"price\":1400,\"quantity\":1}]', 1400.00, 350.00, 42.00, 1792.00, '2026-03-25 13:51:50'),
(18, 3, 'Rasa Nusrath', '0759817021', 'rasanusrath@gmail.com', 'Mosque road', 'akkaraipattu', '', 'Cash on Delivery', '', '[{\"name\":\"Beef Biryani\",\"price\":1400,\"quantity\":1}]', 1400.00, 350.00, 42.00, 1792.00, '2026-03-25 14:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'shamla', 'shamlaithris@gmail.com', '$2y$10$PGEnPIWfAQZ1P4g9KwOOseNqeJYvE5J2XFlD5AHZlNftFmaPcqD6y', '2026-03-22 07:39:06'),
(2, 'shabra', 'shab@gmail.com', '$2y$10$DyS848D7gQdoKhTZuQiBMuz4iFtQWmWhsUoPEx7FD9SQ4RkQW1oHW', '2026-03-24 08:03:36'),
(3, 'Nusrath MR', 'rasanusrath@gmail.com', '$2y$10$vft8rmPAhlh19MSeE6.QO.8THxuI4pp.SnXmB9ggOQrvKC7qacMMu', '2026-03-25 13:39:48');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
