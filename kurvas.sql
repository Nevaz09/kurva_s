-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 02:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kurvas`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_proyek`
--

CREATE TABLE `data_proyek` (
  `id` bigint(20) NOT NULL,
  `kode_tender` varchar(191) NOT NULL,
  `kode_rup` varchar(191) NOT NULL,
  `nama_paket` varchar(191) NOT NULL,
  `pd` varchar(191) NOT NULL,
  `satuan_kerja` varchar(191) NOT NULL,
  `jenis_pengadaan` varchar(191) NOT NULL,
  `tahun_anggaran` int(4) NOT NULL,
  `nomor_kontrak` varchar(191) NOT NULL,
  `nilai` bigint(20) NOT NULL,
  `lokasi` varchar(191) NOT NULL,
  `masa_pekerjaan` varchar(191) NOT NULL,
  `disetujui_pada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_proyek`
--

INSERT INTO `data_proyek` (`id`, `kode_tender`, `kode_rup`, `nama_paket`, `pd`, `satuan_kerja`, `jenis_pengadaan`, `tahun_anggaran`, `nomor_kontrak`, `nilai`, `lokasi`, `masa_pekerjaan`, `disetujui_pada`) VALUES
(4, '15413111', '30132122', 'Peningkatan Jalan Wadungasri - Tambaksumur', 'Pemerintah Daerah Kabupaten Sidoarjo', 'Dinas Pekerjaan Uumum Bina Marga Dan Sumber Daya Air', 'Pekerjaan Kontruksi', 2021, '---', 1274214937, 'Kecamatan Waru', '45 Hari Kalender', '2022-05-12'),
(5, '1728419', '19016122', 'Peningkatan Dinding Penahan Sungai Welang Kel. Karangketug', 'Pemerintah Daerah Kota Pasuruan', 'Dinas Perumahan Rakyat Dan Kawasan Permukiman', 'Pekerjaan Kontruksi', 2019, '602.1/1443/423.108/2019', 429312264, 'Jl. Kraton Kota Pasuruan', '106 Hari Kalender', '2022-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pekerjaan`
--

CREATE TABLE `jenis_pekerjaan` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `volume` float NOT NULL,
  `satuan` varchar(191) NOT NULL,
  `harga_satuan` double NOT NULL,
  `jumlah_harga` double NOT NULL,
  `jumlah_biaya` double NOT NULL,
  `sub_kegiatan_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pekerjaan`
--

INSERT INTO `jenis_pekerjaan` (`id`, `nama`, `volume`, `satuan`, `harga_satuan`, `jumlah_harga`, `jumlah_biaya`, `sub_kegiatan_id`) VALUES
(1, 'Officia pariatur Ala', 10, 'Aut veniam non et a', 16, 160, 0, 1),
(2, 'Eiusmod mollit ad am', 17, 'Quia ullam molestiae', 30, 510, 0, 1),
(4, 'Aliquip asperiores u', 52, 'Soluta velit consec', 48, 2496, 0, 2),
(5, 'Mobilisasi', 1, 'Ls', 22365000, 22365000, 0, 11),
(6, 'Relokasi Utilitas', 1, 'Ls', 13000500, 13000500, 0, 11),
(7, 'Keselamatan dan Kesehatan Kerja', 1, 'Ls', 6940000, 6940000, 0, 11),
(8, 'Pengadaan dan Pemasangan U-ditch 40.50- 120cm + Cover (G.20 Ton)', 365, 'Bh', 1274979, 465367335, 0, 12),
(9, 'Galian Biasa', 240.9, 'm3', 21445, 5166100.5, 0, 13),
(10, 'Timbunan Pilihan dari Sumber Galian', 11.38, 'm3', 212957, 2423450.66, 0, 13),
(11, 'Penyiapan Badan Jalan', 595.35, 'm2', 5904, 3514946.4, 0, 13),
(12, 'Pemotongan Pohon Pilihan 50 - 75 cm', 5, 'Bh', 137599, 687995, 0, 13),
(13, 'Lapis Pondasi Agregat Kelas A', 106.52, 'm3', 266064, 28341137.28, 0, 14),
(14, 'Lapis Pondasi Agregat Kelas B', 148.83, 'm3', 233037, 34682896.71, 0, 14),
(15, 'Perkerasan Beton Semen dengan Anyaman Tulangan Tunggal (L=5 m,Tb=20 cm)', 207, 'm3', 1788373, 370193211, 0, 14),
(16, 'Lapis Pondasi bawah Beton Kurus (Concrete Vibrator)', 170.51, 'm3', 742722, 126641528.22, 0, 14),
(17, 'Lapis Perekat - Aspal cair/Emulsi', 68, 'Ltr', 16843, 1145324, 0, 15),
(18, 'Laston Lapis Antara (AC-BC)  Manual', 23.35, 'Ton', 988162, 23073582.7, 0, 15),
(19, 'Beton Struktur, fc\' 20 Mpa', 1.37, 'm3', 1268475, 1737810.75, 0, 16),
(20, 'Beton Struktur, fc\' 20 Mpa (untuk Berm)', 38.62, 'm3', 820335, 31681337.7, 0, 16),
(21, 'Baja tulangan polos BJTP 280', 314.14, 'Kg', 16292, 5117968.88, 0, 16),
(22, 'Memasang   1 m2 dinding bata merah  ukuran (5x11x22) cm tebal 1/2 bata,', 53.01, 'm2', 76701, 4065920.01, 0, 16),
(23, 'Pipa Drainase PVC diameter 125 mm', 18.5, 'm', 165862, 3068447, 0, 16),
(24, 'Marka Jalan Termoplastik', 64.44, 'm2', 142190, 9162723.6, 0, 17);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `position` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `name`, `position`) VALUES
(2, 'Cindia Rama A', 'Direktur'),
(3, 'Amar', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(2, 'Admin'),
(5, 'Direktur'),
(4, 'Manager Lapangan'),
(3, 'Manager Proyek'),
(1, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kegiatan`
--

CREATE TABLE `sub_kegiatan` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `data_proyek_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kegiatan`
--

INSERT INTO `sub_kegiatan` (`id`, `nama`, `data_proyek_id`) VALUES
(1, 'PEKERJAAN PERSIAPAN', 2),
(2, 'PEKERJAAN TANAH', 2),
(11, 'UMUM', 4),
(12, 'DRAINASE', 4),
(13, 'PEKERJAAN TANAH DAN GEOSINTETIK', 4),
(14, 'PERKERASAN BERBUTIR', 4),
(15, 'PERKERASAN ASPAL', 4),
(16, 'STRUKTUR', 4),
(17, 'PEKERJAAN HARIAN DAN PEKERJAAN LAIN-LAIN', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` char(60) NOT NULL,
  `role_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'superadmin', '$2y$10$YiByCtKIF2uJ5VkrSWbQBOksJBKpwNJrM0xc6KanH25.LDAu2LFRK', 1),
(2, 'admin', '$2y$10$YiByCtKIF2uJ5VkrSWbQBOksJBKpwNJrM0xc6KanH25.LDAu2LFRK', 2),
(3, 'direktur', '$2y$10$YiByCtKIF2uJ5VkrSWbQBOksJBKpwNJrM0xc6KanH25.LDAu2LFRK', 5),
(4, 'managerlapangan', '$2y$10$YiByCtKIF2uJ5VkrSWbQBOksJBKpwNJrM0xc6KanH25.LDAu2LFRK', 4),
(5, 'managerproyek', '$2y$10$YiByCtKIF2uJ5VkrSWbQBOksJBKpwNJrM0xc6KanH25.LDAu2LFRK', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_proyek`
--
ALTER TABLE `data_proyek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`name`);

--
-- Indexes for table `sub_kegiatan`
--
ALTER TABLE `sub_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_username` (`username`),
  ADD KEY `user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_proyek`
--
ALTER TABLE `data_proyek`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_kegiatan`
--
ALTER TABLE `sub_kegiatan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
