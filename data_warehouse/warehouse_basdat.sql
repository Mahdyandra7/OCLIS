-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2025 at 09:11 AM
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
-- Database: `warehouse_basdat`
--

-- --------------------------------------------------------

--
-- Table structure for table `dim_progress_proker`
--

CREATE TABLE `dim_progress_proker` (
  `sk_progress_proker` int(11) NOT NULL,
  `id_proker` int(11) NOT NULL,
  `nama_proker` varchar(100) NOT NULL,
  `id_progress` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dim_proker_kementrian`
--

CREATE TABLE `dim_proker_kementrian` (
  `sk_proker_kementrian` int(11) NOT NULL,
  `id_kementrian` int(11) NOT NULL,
  `nama_kementrian` varchar(100) NOT NULL,
  `periode` int(11) NOT NULL,
  `id_proker` int(11) NOT NULL,
  `nama_proker` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dim_user`
--

CREATE TABLE `dim_user` (
  `sk_user` int(11) NOT NULL,
  `id_kementrian` int(11) NOT NULL,
  `nama_kementrian` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dim_waktu`
--

CREATE TABLE `dim_waktu` (
  `sk_waktu` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `key_tgl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fact_kontribusi_user`
--

CREATE TABLE `fact_kontribusi_user` (
  `sk_waktu` int(11) NOT NULL,
  `sk_progress_proker` int(11) NOT NULL,
  `sk_user` int(11) NOT NULL,
  `nilai_kontribusi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fact_progress_kementrian`
--

CREATE TABLE `fact_progress_kementrian` (
  `sk_proker_kementrian` int(11) NOT NULL,
  `sk_waktu` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
