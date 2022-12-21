-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2022 at 09:18 AM
-- Server version: 10.5.12-MariaDB-0+deb11u1
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nb-carwash`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` varchar(60) NOT NULL,
  `name` varchar(100) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `is_valid` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Kolom penentu apakah booking valid atau belum',
  `is_done` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Kolom penentu booking selesai apa belum',
  `plate_number` varchar(20) DEFAULT NULL,
  `merk_model` varchar(50) DEFAULT NULL,
  `wash_type_id` int(1) NOT NULL,
  `time` time NOT NULL,
  `total` int(7) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `no_hp`, `is_valid`, `is_done`, `plate_number`, `merk_model`, `wash_type_id`, `time`, `total`, `date`, `created_at`, `updated_at`) VALUES
('135671', 'Adi', '', 'true', 'false', 'P09907RQ', 'Honda Vario', 2, '22:29:00', 20000, '2022-09-10', '2022-11-11 04:10:35', '0000-00-00 00:00:00'),
('2022-12-09-adi-0:46', 'Adi', '0990237024', 'false', 'false', 'R12308PL', 'Vario', 1, '00:46:00', 16000, '2022-12-09', '2022-12-08 17:46:44', NULL),
('2022-12-09-adi-1:01', 'Adi', '0990237024', 'false', 'false', 'R12308PL', 'Vario', 1, '01:01:00', 16000, '2022-12-09', '2022-12-08 17:59:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` varchar(30) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `total_fee` int(7) DEFAULT NULL,
  `time` enum('Sesi 1','Sesi 2','Sesi 3','Sesi 4','Sesi 5') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `date`, `total_fee`, `time`, `created_at`, `updated_at`) VALUES
('1-2022-11-27-sesi-2', 1, '2022-11-27', 22500, 'Sesi 2', '2022-12-04 14:25:26', '0000-00-00 00:00:00'),
('2-2022-11-27-sesi-1', 2, '2022-11-27', 8000, 'Sesi 1', '2022-12-02 13:58:40', '0000-00-00 00:00:00'),
('5-2022-11-27-sesi-1', 5, '2022-11-27', 8000, 'Sesi 1', '2022-12-02 14:12:20', '0000-00-00 00:00:00'),
('5-2022-11-27-sesi-2', 5, '2022-11-27', 22500, 'Sesi 2', '2022-12-04 15:47:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profits`
--

CREATE TABLE `profits` (
  `id` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `total` int(7) NOT NULL,
  `daytime` enum('Sesi 1','Sesi 2','Sesi 3','Sesi 4','Sesi 5') DEFAULT NULL COMMENT 'Sesi 1 => 08:00->11:00\r\nSesi 2 => 11:00->16:00\r\nSesi 3 => 14:00->16:00\r\nSesi 4 => 16:00->19:00\r\nSesi 5 => 19:00->22:00',
  `for_employee` int(7) DEFAULT NULL,
  `for_cash` int(7) NOT NULL COMMENT 'Uang untuk kas',
  `for_owner` int(7) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profits`
--

INSERT INTO `profits` (`id`, `date`, `total`, `daytime`, `for_employee`, `for_cash`, `for_owner`, `created_at`, `updated_at`) VALUES
('sesi-1-2022-11-07', '2022-11-27', 16000, 'Sesi 1', 2800, 420, 8000, '2022-11-14 16:52:32', '2022-11-11 16:52:32'),
('sesi-2-2022-11-27', '2022-11-27', 45000, 'Sesi 2', 7875, 1181, 22500, '2022-12-02 13:20:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `spends`
--

CREATE TABLE `spends` (
  `id` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `date` date NOT NULL,
  `total` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spends`
--

INSERT INTO `spends` (`id`, `keterangan`, `date`, `total`, `created_at`, `updated_at`) VALUES
(4, 'jghjg', '2022-04-12', 20000, '2022-12-05 07:04:37', '0000-00-00 00:00:00'),
(5, 'jjasdsa', '2022-12-05', 12000, '2022-12-05 07:11:16', '0000-00-00 00:00:00'),
(7, 'sadas', '2022-12-07', 10000, '2022-12-07 06:21:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` varchar(60) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_done` enum('true','false') NOT NULL DEFAULT 'false',
  `plate_number` varchar(20) DEFAULT NULL,
  `no_hp` varchar(20) NOT NULL,
  `merk_model` varchar(50) DEFAULT NULL,
  `wash_type_id` int(1) NOT NULL DEFAULT 5,
  `time` time NOT NULL,
  `total` int(7) DEFAULT NULL,
  `date` date NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `name`, `is_done`, `plate_number`, `no_hp`, `merk_model`, `wash_type_id`, `time`, `total`, `date`, `note`, `created_at`, `updated_at`) VALUES
('2022-10-26-adi_saputro-22:22', 'Adi Saputro', 'false', 'P0797RT', '', 'Honda Beat', 1, '12:10:00', 16000, '2022-11-07', '', '2022-10-26 15:22:02', '2022-10-26 15:22:02'),
('2022-11-04-malik-09:24', 'Malik', 'false', 'N YAS', '', 'Honda Revo', 1, '09:30:00', 16000, '2022-11-07', '', '2022-11-04 02:24:36', '2022-11-04 02:24:36'),
('2022-11-12-aaa-00:10', 'AAA', 'false', 'P1111', '', 'Honda Revo', 1, '00:10:00', 16000, '2022-11-12', '', '2022-11-11 17:10:35', '2022-11-11 17:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','owner','employee','member') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'employee',
  `is_active` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `change_password` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `is_active`, `password`, `change_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Putra ', 'putra12@gmail.com', 'employee', 'true', '12345', 'false', NULL, NULL, NULL),
(2, 'Rendi', 'rendi123@gmail.com', 'employee', 'true', '12345', 'false', NULL, NULL, NULL),
(4, 'Admin', 'admin@gmail.com', 'admin', 'true', '$2a$12$g9enDafQgUWtocAxEKtBTOqprzwG65jed9/iZbe1xnxVoLUJhUEF.', 'false', NULL, '2022-09-21 07:31:48', '2022-11-12 07:40:49'),
(5, 'Adi', 'adi@gmail.com', 'employee', 'true', '$2y$10$ZwroQb5letISjsyVzceQ0uLprQBLht5xD1NPaWB4ugv5p84EbuCQW', 'false', NULL, '2022-10-04 14:43:50', '2022-10-04 14:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `wash_types`
--

CREATE TABLE `wash_types` (
  `id` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` enum('Motor','Mobil') NOT NULL,
  `price` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wash_types`
--

INSERT INTO `wash_types` (`id`, `name`, `type`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Cuci Motor', 'Motor', 16000, '2022-09-10 14:23:07', '2022-09-11 14:25:04'),
(2, 'Cuci Express Mobil', 'Mobil', 25000, '2022-09-10 14:23:07', NULL),
(3, 'Cuci Standard Mobil', 'Mobil', 30000, '2022-09-10 14:24:03', NULL),
(4, 'Cuci Premium Mobil', 'Mobil', 40000, '2022-09-10 14:24:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wash_type_id` (`wash_type_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profits`
--
ALTER TABLE `profits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spends`
--
ALTER TABLE `spends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wash_type_id` (`wash_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wash_types`
--
ALTER TABLE `wash_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `spends`
--
ALTER TABLE `spends`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wash_types`
--
ALTER TABLE `wash_types`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`wash_type_id`) REFERENCES `wash_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`wash_type_id`) REFERENCES `wash_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;