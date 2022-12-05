-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 05 Des 2022 pada 14.26
-- Versi server: 10.5.12-MariaDB-0+deb11u1
-- Versi PHP: 8.1.12

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
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` varchar(60) NOT NULL,
  `name` varchar(100) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `is_valid` enum('true','false') NOT NULL DEFAULT 'false',
  `plate_number` varchar(20) DEFAULT NULL,
  `merk_model` varchar(50) DEFAULT NULL,
  `wash_type_id` int(1) NOT NULL,
  `time` time NOT NULL,
  `total` int(7) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `no_hp`, `is_valid`, `plate_number`, `merk_model`, `wash_type_id`, `time`, `total`, `date`, `created_at`, `updated_at`) VALUES
('135671', 'Adi', '', 'true', 'P09907RQ', 'Honda Vario', 2, '22:29:00', 20000, '2022-09-10', '2022-11-11 04:10:35', '0000-00-00 00:00:00'),
('13567ss', 'ad', '', 'true', 'P09907RQ', 'Honda Vario', 5, '22:29:00', 20000, '2022-09-10', '2022-11-11 04:13:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `id` varchar(30) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `total_fee` int(7) DEFAULT NULL,
  `time` enum('Sesi 1','Sesi 2','Sesi 3','Sesi 4','Sesi 5') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `date`, `total_fee`, `time`, `created_at`, `updated_at`) VALUES
('1-2022-11-27-sesi-2', 1, '2022-11-27', 22500, 'Sesi 2', '2022-12-04 14:25:26', '0000-00-00 00:00:00'),
('2-2022-11-27-sesi-1', 2, '2022-11-27', 8000, 'Sesi 1', '2022-12-02 13:58:40', '0000-00-00 00:00:00'),
('5-2022-11-27-sesi-1', 5, '2022-11-27', 8000, 'Sesi 1', '2022-12-02 14:12:20', '0000-00-00 00:00:00'),
('5-2022-11-27-sesi-2', 5, '2022-11-27', 22500, 'Sesi 2', '2022-12-04 15:47:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profits`
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profits`
--

INSERT INTO `profits` (`id`, `date`, `total`, `daytime`, `for_employee`, `for_cash`, `for_owner`, `created_at`, `updated_at`) VALUES
('sesi-1-2022-11-07', '2022-11-27', 16000, 'Sesi 1', 2800, 420, 8000, '2022-11-14 16:52:32', '2022-11-11 16:52:32'),
('sesi-2-2022-11-27', '2022-11-27', 45000, 'Sesi 2', 7875, 1181, 22500, '2022-12-02 13:20:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spends`
--

CREATE TABLE `spends` (
  `id` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `date` date NOT NULL,
  `total` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spends`
--

INSERT INTO `spends` (`id`, `keterangan`, `date`, `total`, `created_at`, `updated_at`) VALUES
(4, 'jghjg', '2022-04-12', 20000, '2022-12-05 07:04:37', '0000-00-00 00:00:00'),
(5, 'jjasdsa', '2022-12-05', 12000, '2022-12-05 07:11:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `name`, `is_done`, `plate_number`, `no_hp`, `merk_model`, `wash_type_id`, `time`, `total`, `date`, `note`, `created_at`, `updated_at`) VALUES
('2022-10-26-adi_saputro-22:22', 'Adi Saputro', 'false', 'P0797RT', '', 'Honda Beat', 1, '12:10:00', 16000, '2022-11-07', '', '2022-10-26 15:22:02', '2022-10-26 15:22:02'),
('2022-11-04-malik-09:24', 'Malik', 'false', 'N YAS', '', 'Honda Revo', 1, '09:30:00', 16000, '2022-11-07', '', '2022-11-04 02:24:36', '2022-11-04 02:24:36'),
('2022-11-12-aaa-00:10', 'AAA', 'false', 'P1111', '', 'Honda Revo', 1, '00:10:00', 16000, '2022-11-12', '', '2022-11-11 17:10:35', '2022-11-11 17:10:35'),
('2022-11-12-adi-14:34', 'Adi', 'false', NULL, '085748314069', NULL, 5, '15:34:00', 10000, '2022-11-27', 'Karpet 1', '2022-11-12 07:34:07', '2022-11-12 07:34:07'),
('2022-11-12-adi-14:36', 'Adi', 'false', NULL, '085748314069', NULL, 5, '14:36:00', 25000, '2022-11-27', 'Karpet 2', '2022-11-12 07:36:32', '2022-11-12 07:36:32'),
('2022-11-12-xxxx-14:34', 'Xxxx', 'false', NULL, '085748314069', NULL, 5, '14:34:00', 10000, '2022-11-27', 'Karpet 2', '2022-11-12 07:34:55', '2022-11-12 07:34:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `is_active`, `password`, `change_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Putra ', 'putra12@gmail.com', 'employee', 'true', '12345', 'false', NULL, NULL, NULL),
(2, 'Rendi', 'rendi123@gmail.com', 'employee', 'true', '12345', 'false', NULL, NULL, NULL),
(4, 'Admin', 'admin@gmail.com', 'admin', 'true', '$2a$12$g9enDafQgUWtocAxEKtBTOqprzwG65jed9/iZbe1xnxVoLUJhUEF.', 'false', NULL, '2022-09-21 07:31:48', '2022-11-12 07:40:49'),
(5, 'Adi', 'adi@gmail.com', 'employee', 'true', '$2y$10$ZwroQb5letISjsyVzceQ0uLprQBLht5xD1NPaWB4ugv5p84EbuCQW', 'false', NULL, '2022-10-04 14:43:50', '2022-10-04 14:43:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wash_types`
--

CREATE TABLE `wash_types` (
  `id` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` enum('Motor','Mobil','Karpet') NOT NULL,
  `price` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wash_types`
--

INSERT INTO `wash_types` (`id`, `name`, `type`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Cuci Motor', 'Motor', 16000, '2022-09-10 14:23:07', '2022-09-11 14:25:04'),
(2, 'Cuci Express Mobil', 'Mobil', 25000, '2022-09-10 14:23:07', NULL),
(3, 'Cuci Standard Mobil', 'Mobil', 30000, '2022-09-10 14:24:03', NULL),
(4, 'Cuci Premium Mobil', 'Mobil', 40000, '2022-09-10 14:24:03', NULL),
(5, 'Cuci Karpet', 'Karpet', 10000, '2022-09-10 14:24:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wash_type_id` (`wash_type_id`);

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `profits`
--
ALTER TABLE `profits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `spends`
--
ALTER TABLE `spends`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wash_type_id` (`wash_type_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wash_types`
--
ALTER TABLE `wash_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `spends`
--
ALTER TABLE `spends`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `wash_types`
--
ALTER TABLE `wash_types`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`wash_type_id`) REFERENCES `wash_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`wash_type_id`) REFERENCES `wash_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;