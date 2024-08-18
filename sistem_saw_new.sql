-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2024 at 08:37 AM
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
-- Database: `sistem_saw_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(20) NOT NULL,
  `id_pengajuan` int(20) NOT NULL,
  `id_nilai_kriteria` int(20) NOT NULL,
  `id_users` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `id_pengajuan`, `id_nilai_kriteria`, `id_users`, `created_at`, `updated_at`) VALUES
(8, 5, 8, 9, '2024-08-05 04:31:20', '2024-08-05 04:31:20'),
(9, 5, 10, 9, '2024-08-05 04:31:20', '2024-08-05 04:31:20'),
(10, 5, 14, 9, '2024-08-05 04:31:20', '2024-08-05 04:31:20'),
(11, 5, 16, 9, '2024-08-05 04:31:20', '2024-08-05 04:31:20'),
(12, 5, 18, 9, '2024-08-05 04:31:20', '2024-08-05 04:31:20'),
(13, 5, 22, 9, '2024-08-05 04:31:20', '2024-08-05 04:31:20'),
(14, 5, 25, 9, '2024-08-05 04:31:20', '2024-08-05 04:31:20'),
(15, 5, 27, 9, '2024-08-05 04:31:20', '2024-08-05 04:31:20'),
(16, 5, 31, 9, '2024-08-05 04:31:20', '2024-08-05 04:31:20'),
(17, 7, 1, 9, '2024-08-05 05:17:43', '2024-08-05 05:17:43'),
(18, 7, 10, 9, '2024-08-05 05:17:43', '2024-08-05 05:17:43'),
(19, 7, 12, 9, '2024-08-05 05:17:43', '2024-08-05 05:17:43'),
(20, 7, 18, 9, '2024-08-05 05:17:43', '2024-08-05 05:17:43'),
(21, 7, 21, 9, '2024-08-05 05:17:43', '2024-08-05 05:17:43'),
(22, 7, 24, 9, '2024-08-05 05:17:43', '2024-08-05 05:17:43'),
(23, 7, 29, 9, '2024-08-05 05:17:43', '2024-08-05 05:17:43'),
(24, 7, 32, 9, '2024-08-05 05:17:43', '2024-08-05 05:17:43'),
(25, 8, 8, 9, '2024-08-05 05:20:06', '2024-08-05 05:20:06'),
(26, 8, 3, 9, '2024-08-05 05:20:06', '2024-08-05 05:20:06'),
(27, 8, 12, 9, '2024-08-05 05:20:06', '2024-08-05 05:20:06'),
(28, 8, 16, 9, '2024-08-05 05:20:06', '2024-08-05 05:20:06'),
(29, 8, 19, 9, '2024-08-05 05:20:06', '2024-08-05 05:20:06'),
(30, 8, 22, 9, '2024-08-05 05:20:06', '2024-08-05 05:20:06'),
(31, 8, 24, 9, '2024-08-05 05:20:06', '2024-08-05 05:20:06'),
(32, 8, 28, 9, '2024-08-05 05:20:06', '2024-08-05 05:20:06'),
(33, 8, 32, 9, '2024-08-05 05:20:06', '2024-08-05 05:20:06'),
(34, 6, 9, 10, '2024-08-09 22:31:11', '2024-08-09 22:31:11'),
(35, 6, 3, 10, '2024-08-09 22:31:11', '2024-08-09 22:31:11'),
(36, 6, 12, 10, '2024-08-09 22:31:11', '2024-08-09 22:31:11'),
(37, 6, 17, 10, '2024-08-09 22:31:11', '2024-08-09 22:31:11'),
(38, 6, 20, 10, '2024-08-09 22:31:11', '2024-08-09 22:31:11'),
(39, 6, 22, 10, '2024-08-09 22:31:11', '2024-08-09 22:31:11'),
(40, 6, 26, 10, '2024-08-09 22:31:11', '2024-08-09 22:31:11'),
(41, 6, 27, 10, '2024-08-09 22:31:11', '2024-08-09 22:31:11'),
(42, 6, 30, 10, '2024-08-09 22:31:11', '2024-08-09 22:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(20) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `bobot` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `nama`, `jenis`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'Tujuan Penggunaan', 'Benefit', 10, '2024-04-12 13:48:10', '2024-04-12 13:48:10'),
(2, 'C2', 'Pekerjaan', 'Benefit', 15, '2024-04-12 14:12:50', '2024-05-11 19:21:05'),
(7, 'C3', 'Pendapatan Per Bulan', 'Benefit', 15, '2024-05-11 19:21:28', '2024-05-11 19:21:28'),
(8, 'C4', 'Usia', 'Benefit', 10, '2024-05-11 19:21:47', '2024-05-11 19:21:47'),
(9, 'C5', 'Jaminan', 'Benefit', 15, '2024-05-11 19:22:04', '2024-05-11 19:22:04'),
(10, 'C6', 'Plafon Pembiayaan', 'Cost', 10, '2024-05-11 19:22:27', '2024-05-11 19:22:27'),
(11, 'C7', 'Jangka Waktu', 'Cost', 10, '2024-05-11 19:22:44', '2024-05-11 19:22:44'),
(12, 'C8', 'Debt Service Ratio', 'Benefit', 10, '2024-05-11 19:23:11', '2024-05-11 19:23:11'),
(13, 'C9', 'Eksisting', 'Benefit', 5, '2024-05-11 19:23:26', '2024-05-11 19:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id`, `nama`, `no_ktp`, `alamat`, `no_telp`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(2, 'nanda', '3403104701990002', 'jl. tresno soko kulino', '0909788765654', 'Perempuan', '2024-04-21 07:26:52', '2024-04-21 07:32:48'),
(3, 'Nur', '12334667373', 'denpasar1', '0361244445', 'Perempuan', '2024-04-30 03:23:29', '2024-04-30 03:25:44'),
(5, 'Hermanto', '1234567890', 'Jalan terus', '098765432', 'Perempuan', '2024-05-25 04:12:28', '2024-05-25 04:12:28'),
(6, 'WARSITI', '1234567887653321', 'Jl. Sunset Road Dewa Ruci Kuta, Ruko Sunset 8 Blok 4, Badung-Bali', '081337854677', 'Perempuan', '2024-08-09 22:27:34', '2024-08-09 22:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `nilaikriteria`
--

CREATE TABLE `nilaikriteria` (
  `id` int(20) NOT NULL,
  `id_kriteria` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilaikriteria`
--

INSERT INTO `nilaikriteria` (`id`, `id_kriteria`, `nama`, `nilai`, `created_at`, `updated_at`) VALUES
(1, '1', 'Murabahah (Jual Beli)', 3, '2024-04-14 14:04:55', '2024-05-11 19:25:00'),
(3, '2', 'PNS/Karyawan Swasta/Guru/Dosen', 3, '2024-04-20 06:53:23', '2024-05-11 19:26:33'),
(8, '1', 'Mudharabah (Modal Usaha)', 2, '2024-05-11 19:25:23', '2024-05-11 19:25:23'),
(9, '1', 'Ijarah (Konsumtif)', 1, '2024-05-11 19:25:40', '2024-05-11 19:25:40'),
(10, '2', 'Wiraswasta/Wirausaha', 2, '2024-05-11 19:26:47', '2024-05-11 19:26:47'),
(11, '2', 'Pekerja Tidak Tetap', 1, '2024-05-11 19:27:01', '2024-05-11 19:27:01'),
(12, '7', '> 3 Juta', 3, '2024-05-11 19:27:32', '2024-05-11 19:27:32'),
(13, '7', '≥ 1 Juta - ≤ 3 Juta', 2, '2024-05-11 19:27:49', '2024-05-11 19:27:49'),
(14, '7', '< 1 Juta', 1, '2024-05-11 19:28:04', '2024-05-11 19:28:04'),
(15, '8', '≥ 21 Tahun - ≤ 40 tahun', 3, '2024-05-11 19:28:31', '2024-05-11 19:28:31'),
(16, '8', '≥ 41 Tahun - ≤ 60 Tahun', 2, '2024-05-11 19:28:46', '2024-05-11 19:28:46'),
(17, '8', '> 60 Tahun', 1, '2024-05-11 19:29:02', '2024-05-11 19:29:02'),
(18, '9', 'Sertifikat Tanah/Bilyet Deposito', 3, '2024-05-11 19:29:25', '2024-05-11 19:29:25'),
(19, '9', 'BPKB Motor/Mobil', 2, '2024-05-11 19:29:39', '2024-05-11 19:29:39'),
(20, '9', 'SK Pegawai', 1, '2024-05-11 19:29:52', '2024-05-11 19:29:52'),
(21, '10', '> 10 Juta', 1, '2024-05-11 19:30:39', '2024-05-11 19:30:39'),
(22, '10', '≥ 5 Juta - ≤ 10 Juta', 2, '2024-05-11 19:30:52', '2024-05-11 19:30:52'),
(23, '10', '< 5 Juta', 3, '2024-05-11 19:31:06', '2024-05-11 19:31:06'),
(24, '11', '≥ 48 Bulan - ≤ 60 Bulan', 1, '2024-05-11 19:31:33', '2024-05-11 19:31:33'),
(25, '11', '≥ 24 Bulan - ≤ 48 Bulan', 2, '2024-05-11 19:31:46', '2024-05-11 19:31:46'),
(26, '11', '< 24 Bulan', 3, '2024-05-11 19:32:00', '2024-05-11 19:32:00'),
(27, '12', '< 30%', 3, '2024-05-11 19:32:34', '2024-05-11 19:32:34'),
(28, '12', '≥ 30% - ≤ 40%', 2, '2024-05-11 19:32:47', '2024-05-11 19:32:47'),
(29, '12', '≥ 40%', 1, '2024-05-11 19:32:58', '2024-05-11 19:32:58'),
(30, '13', '≥ 5 tahun', 3, '2024-05-11 19:33:23', '2024-05-11 19:33:23'),
(31, '13', '≥ 1 tahun - ≤ 5 tahun', 2, '2024-05-11 19:33:35', '2024-05-11 19:33:35'),
(32, '13', '< 1 tahun', 1, '2024-05-11 19:33:48', '2024-05-11 19:33:48'),
(33, '14', '1 tahun', 10, '2024-08-09 22:28:40', '2024-08-09 22:29:20'),
(34, '14', '2 tahun', 20, '2024-08-09 22:28:54', '2024-08-09 22:29:27'),
(35, '14', '3 tahun', 30, '2024-08-09 22:29:06', '2024-08-09 22:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(20) NOT NULL,
  `id_nasabah` int(20) NOT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `status_pengajuan` varchar(255) NOT NULL,
  `plafon` float NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_validasi` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `id_nasabah`, `tanggal_pengajuan`, `status_pengajuan`, `plafon`, `keterangan`, `tanggal_validasi`, `created_at`, `updated_at`) VALUES
(5, 2, '2024-05-12', 'diterima', 40000000, 'Umum', '2024-05-12', '2024-05-11 08:51:28', '2024-05-23 04:17:35'),
(6, 5, '2024-05-25', 'sedang_diproses', 10000000, 'MOU', '2024-08-09', '2024-05-25 04:13:13', '2024-08-09 22:31:35'),
(8, 3, '2024-08-05', 'berkas masuk', 12000000, 'MOU', NULL, '2024-08-05 05:18:59', '2024-08-05 05:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'NUR ANNISA WULANDARI', 'marketing@gmail.com', '', 'Account Officer', '2024-04-14 13:27:08', '2024-08-09 21:53:15'),
(8, 'INNA', 'innakiyowo123@gmail.com', '', 'Direksi/PE', '2024-05-11 03:37:31', '2024-05-11 03:37:31'),
(10, 'AMALIA', 'amalia123@gmail.com', '$2y$12$SOqkir.C7wi8jrItiqcn3.4bgnq3VQOzh5wO8n/qOzK06Kt7jjQee', 'Direksi/PE', '2024-08-09 22:06:22', '2024-08-09 22:25:37'),
(12, 'IDA BAGUS', 'hamdanikantor@gmail.com', '$2y$12$hUHnADsgthNa409f3J6BbuAUtLqMzWkRc5Wax9XmfaTW1cbmYNDpW', 'Direksi/PE', '2024-08-09 22:26:30', '2024-08-09 22:33:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilaikriteria`
--
ALTER TABLE `nilaikriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilaikriteria`
--
ALTER TABLE `nilaikriteria`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
