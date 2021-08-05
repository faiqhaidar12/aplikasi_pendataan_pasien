-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 03:40 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel8`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alergi`
--

CREATE TABLE `tbl_alergi` (
  `id_alergi` int(11) NOT NULL,
  `alergi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alergi`
--

INSERT INTO `tbl_alergi` (`id_alergi`, `alergi`) VALUES
(1, 'tidak ada'),
(2, 'seafood'),
(3, 'panas'),
(4, 'dingin'),
(5, 'antibiotik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nip_dokter` varchar(255) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto_dokter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`id_dokter`, `nip_dokter`, `nama_dokter`, `alamat`, `foto_dokter`) VALUES
(1, '11111', 'Hani Kusnarto', 'perum sinar giripeni', '11111.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_golongan`
--

CREATE TABLE `tbl_golongan` (
  `id_golongan` int(11) NOT NULL,
  `golongan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_golongan`
--

INSERT INTO `tbl_golongan` (`id_golongan`, `golongan`) VALUES
(1, 'Bekerja'),
(2, 'Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kunjungan`
--

CREATE TABLE `tbl_kunjungan` (
  `id_kunjungan` int(11) NOT NULL,
  `kunjungan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kunjungan`
--

INSERT INTO `tbl_kunjungan` (`id_kunjungan`, `kunjungan`) VALUES
(1, 'Kunjungan Sakit'),
(2, 'Kunjungan Sehat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(13) NOT NULL,
  `no_bpjs` int(13) DEFAULT NULL,
  `nama_pasien` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `id_golongan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `no_bpjs`, `nama_pasien`, `alamat`, `id_status`, `id_golongan`) VALUES
(1, 46017764, 'siti amina', 'panjatan I', 2, 1),
(2, 84300759, 'dadang', 'wates', 1, 2),
(3, 84300761, 'kamidi', 'gotakan', 1, 1),
(7, 84300735, 'jami', 'panjatan', 2, 1),
(8, 84300722, 'dadot', 'giripeni', 1, 1),
(10, 84300745, 'budi aji', 'wates', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perawatan`
--

CREATE TABLE `tbl_perawatan` (
  `id_perawatan` int(11) NOT NULL,
  `perawatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_perawatan`
--

INSERT INTO `tbl_perawatan` (`id_perawatan`, `perawatan`) VALUES
(1, 'Rawat Jalan'),
(2, 'Rawat Inap'),
(3, 'Promotif Preventif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rm`
--

CREATE TABLE `tbl_rm` (
  `id_rm` int(11) NOT NULL,
  `id_kunjungan` int(20) DEFAULT NULL,
  `id_perawatan` int(20) DEFAULT NULL,
  `id_pasien` int(13) DEFAULT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `keluhan` varchar(255) DEFAULT NULL,
  `terapi_obat` varchar(255) DEFAULT NULL,
  `terapi_non_obat` varchar(255) DEFAULT NULL,
  `diagnosa` varchar(255) DEFAULT NULL,
  `suhu` int(11) DEFAULT NULL,
  `id_alergi` int(255) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `lingkar_perut` int(11) DEFAULT NULL,
  `sistole` int(11) DEFAULT NULL,
  `diastole` int(11) DEFAULT NULL,
  `respiratory_rate` int(11) DEFAULT NULL,
  `heart_rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rm`
--

INSERT INTO `tbl_rm` (`id_rm`, `id_kunjungan`, `id_perawatan`, `id_pasien`, `id_dokter`, `keluhan`, `terapi_obat`, `terapi_non_obat`, `diagnosa`, `suhu`, `id_alergi`, `tinggi_badan`, `berat_badan`, `lingkar_perut`, `sistole`, `diastole`, `respiratory_rate`, `heart_rate`) VALUES
(1, 1, 1, NULL, NULL, 'pusing kepala berputar', 'hufagrip', NULL, 'vertigo', 36, 1, 165, 60, 55, 120, 80, 24, 64),
(2, 1, 1, 1, 1, 'batuk pilek', 'paracetamol', NULL, 'flu', 36, 1, 165, 55, 54, 120, 80, 24, 64);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `status`) VALUES
(1, 'Aktif'),
(2, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(1, 'faiq', 'faiqhaidar1@gmail.com', NULL, '$2y$10$p9lC5s/hFYp4Z9yOCSQKTeIUtXdgu9R1UBQV5RK16edvvXiDggsaC', NULL, '2021-02-19 23:07:43', '2021-02-19 23:07:43', 1),
(2, 'hani', 'hani.kusnarto@gmail.com', NULL, '$2y$10$Uuo8m7T/mupyVSbh08Kd6umZcMaVvgA895n42ZodYyvTxVbcsayW6', NULL, '2021-02-19 23:08:36', '2021-02-19 23:08:36', 2),
(6, 'haidar', 'haidar@gmail.com', NULL, '$2y$10$DxiWSZhnV68jbpi4SQLdE.385rzidskifCY98jdoe2RHFehSVAqeu', NULL, '2021-02-24 22:18:49', '2021-02-24 22:18:49', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_alergi`
--
ALTER TABLE `tbl_alergi`
  ADD PRIMARY KEY (`id_alergi`);

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  ADD PRIMARY KEY (`id_golongan`),
  ADD KEY `golongan_2` (`golongan`),
  ADD KEY `golongan_4` (`golongan`);
ALTER TABLE `tbl_golongan` ADD FULLTEXT KEY `golongan_3` (`golongan`);

--
-- Indexes for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `foridgolongan` (`id_golongan`),
  ADD KEY `foridstatus` (`id_status`);

--
-- Indexes for table `tbl_perawatan`
--
ALTER TABLE `tbl_perawatan`
  ADD PRIMARY KEY (`id_perawatan`);

--
-- Indexes for table `tbl_rm`
--
ALTER TABLE `tbl_rm`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `foridkunjungan` (`id_kunjungan`),
  ADD KEY `foridperawatan` (`id_perawatan`),
  ADD KEY `foridalergi` (`id_alergi`),
  ADD KEY `foridpasien` (`id_pasien`),
  ADD KEY `foriddokter` (`id_dokter`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_alergi`
--
ALTER TABLE `tbl_alergi`
  MODIFY `id_alergi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  MODIFY `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_perawatan`
--
ALTER TABLE `tbl_perawatan`
  MODIFY `id_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rm`
--
ALTER TABLE `tbl_rm`
  MODIFY `id_rm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD CONSTRAINT `foridgolongan` FOREIGN KEY (`id_golongan`) REFERENCES `tbl_golongan` (`id_golongan`),
  ADD CONSTRAINT `foridstatus` FOREIGN KEY (`id_status`) REFERENCES `tbl_status` (`id_status`);

--
-- Constraints for table `tbl_rm`
--
ALTER TABLE `tbl_rm`
  ADD CONSTRAINT `foridalergi` FOREIGN KEY (`id_alergi`) REFERENCES `tbl_alergi` (`id_alergi`),
  ADD CONSTRAINT `foriddokter` FOREIGN KEY (`id_dokter`) REFERENCES `tbl_dokter` (`id_dokter`),
  ADD CONSTRAINT `foridkunjungan` FOREIGN KEY (`id_kunjungan`) REFERENCES `tbl_kunjungan` (`id_kunjungan`),
  ADD CONSTRAINT `foridpasien` FOREIGN KEY (`id_pasien`) REFERENCES `tbl_pasien` (`id_pasien`),
  ADD CONSTRAINT `foridperawatan` FOREIGN KEY (`id_perawatan`) REFERENCES `tbl_perawatan` (`id_perawatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
