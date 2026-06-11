-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2026 at 09:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti1d_silviahanatasya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int(11) NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('reguler','imax','velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(100) DEFAULT NULL,
  `layanan_butler` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'Laga Tanpa Batas', '2026-06-12 13:00:00', 2, 40000.00, 'reguler', 'Dolby Digital 5.1', 'Row A', NULL, NULL, NULL, NULL),
(2, 'Tawa di Sekolah', '2026-06-12 15:30:00', 1, 40000.00, 'reguler', 'Dolby Digital 5.1', 'Row B', NULL, NULL, NULL, NULL),
(3, 'Air Mata Ibu', '2026-06-12 18:00:00', 4, 45000.00, 'reguler', 'Dolby Digital 5.1', 'Row C', NULL, NULL, NULL, NULL),
(4, 'Kejar Target', '2026-06-12 20:30:00', 2, 45000.00, 'reguler', 'Dolby Digital 5.1', 'Row D', NULL, NULL, NULL, NULL),
(5, 'Misteri Rumah Tua', '2026-06-13 12:00:00', 3, 50000.00, 'reguler', 'Dolby Digital 5.1', 'Row E', NULL, NULL, NULL, NULL),
(6, 'Detektif Cilik', '2026-06-13 14:15:00', 2, 50000.00, 'reguler', 'Dolby Digital 5.1', 'Row F', NULL, NULL, NULL, NULL),
(7, 'Cinta di Kota Tua', '2026-06-13 16:45:00', 2, 50000.00, 'reguler', 'Standard Stereo', 'Row G', NULL, NULL, NULL, NULL),
(8, 'Operasi Senyap', '2026-06-13 19:15:00', 1, 50000.00, 'reguler', 'Dolby Digital 5.1', 'Row H', NULL, NULL, NULL, NULL),
(9, 'Dunia Fantasi', '2026-06-13 21:45:00', 2, 50000.00, 'reguler', 'Dolby Digital 5.1', 'Row I', NULL, NULL, NULL, NULL),
(10, 'Petualangan di Angkasa', '2026-06-14 11:00:00', 2, 50000.00, 'reguler', 'Standard Stereo', 'Row J', NULL, NULL, NULL, NULL),
(11, 'Laga Tanpa Batas', '2026-06-14 13:30:00', 1, 50000.00, 'reguler', 'Dolby Digital 5.1', 'Row K', NULL, NULL, NULL, NULL),
(12, 'Misteri Rumah Tua', '2026-06-14 16:00:00', 2, 50000.00, 'reguler', 'Dolby Digital 5.1', 'Row L', NULL, NULL, NULL, NULL),
(13, 'Tawa di Sekolah', '2026-06-14 18:30:00', 5, 50000.00, 'reguler', 'Dolby Digital 5.1', 'Row M', NULL, NULL, NULL, NULL),
(14, 'Air Mata Ibu', '2026-06-14 21:00:00', 2, 50000.00, 'reguler', 'Dolby Digital 5.1', 'Row N', NULL, NULL, NULL, NULL),
(15, 'Kejar Target', '2026-06-15 13:00:00', 1, 40000.00, 'reguler', 'Standard Stereo', 'Row O', NULL, NULL, NULL, NULL),
(16, 'Operasi Senyap', '2026-06-15 15:30:00', 2, 40000.00, 'reguler', 'Dolby Digital 5.1', 'Row P', NULL, NULL, NULL, NULL),
(17, 'Detektif Cilik', '2026-06-15 18:00:00', 3, 40000.00, 'reguler', 'Dolby Digital 5.1', 'Row Q', NULL, NULL, NULL, NULL),
(18, 'Petualangan di Angkasa 3D', '2026-06-12 12:45:00', 2, 75000.00, 'imax', 'IMAX 12-Channel', 'Row C', 'GLS-IMAX-01', 'Sub-Bass Vibration', NULL, NULL),
(19, 'Dunia Fantasi', '2026-06-12 15:45:00', 1, 75000.00, 'imax', 'IMAX 12-Channel', 'Row D', NULL, 'Sub-Bass Vibration', NULL, NULL),
(20, 'Operasi Senyap', '2026-06-12 18:45:00', 2, 85000.00, 'imax', 'IMAX 6-Channel', 'Row E', NULL, 'Seat Shaker', NULL, NULL),
(21, 'Laga Tanpa Batas', '2026-06-12 21:45:00', 3, 85000.00, 'imax', 'IMAX 12-Channel', 'Row F', NULL, 'Sub-Bass Vibration', NULL, NULL),
(22, 'Petualangan di Angkasa 3D', '2026-06-13 11:30:00', 2, 95000.00, 'imax', 'IMAX 12-Channel', 'Row G', 'GLS-IMAX-02', 'Sub-Bass Vibration', NULL, NULL),
(23, 'Dunia Fantasi 3D', '2026-06-13 14:30:00', 4, 95000.00, 'imax', 'IMAX 12-Channel', 'Row H', 'GLS-IMAX-03', 'Sub-Bass Vibration', NULL, NULL),
(24, 'Laga Tanpa Batas', '2026-06-13 17:30:00', 1, 95000.00, 'imax', 'IMAX 6-Channel', 'Row I', NULL, 'Seat Shaker', NULL, NULL),
(25, 'Operasi Senyap', '2026-06-13 20:30:00', 2, 95000.00, 'imax', 'IMAX 12-Channel', 'Row J', NULL, 'Sub-Bass Vibration', NULL, NULL),
(26, 'Petualangan di Angkasa', '2026-06-14 12:45:00', 2, 95000.00, 'imax', 'IMAX 12-Channel', 'Row C', NULL, 'Sub-Bass Vibration', NULL, NULL),
(27, 'Dunia Fantasi 3D', '2026-06-14 15:45:00', 2, 95000.00, 'imax', 'IMAX 12-Channel', 'Row D', 'GLS-IMAX-04', 'Sub-Bass Vibration', NULL, NULL),
(28, 'Laga Tanpa Batas', '2026-06-14 18:45:00', 1, 95000.00, 'imax', 'IMAX 6-Channel', 'Row E', NULL, 'Seat Shaker', NULL, NULL),
(29, 'Operasi Senyap 3D', '2026-06-14 21:45:00', 2, 95000.00, 'imax', 'IMAX 12-Channel', 'Row F', 'GLS-IMAX-05', 'Sub-Bass Vibration', NULL, NULL),
(30, 'Petualangan di Angkasa 3D', '2026-06-15 12:45:00', 3, 75000.00, 'imax', 'IMAX 12-Channel', 'Row G', 'GLS-IMAX-06', 'Sub-Bass Vibration', NULL, NULL),
(31, 'Dunia Fantasi', '2026-06-15 15:45:00', 1, 75000.00, 'imax', 'IMAX 12-Channel', 'Row H', NULL, 'Sub-Bass Vibration', NULL, NULL),
(32, 'Laga Tanpa Batas', '2026-06-15 18:45:00', 2, 75000.00, 'imax', 'IMAX 6-Channel', 'Row I', NULL, 'Seat Shaker', NULL, NULL),
(33, 'Operasi Senyap', '2026-06-15 21:45:00', 2, 75000.00, 'imax', 'IMAX 12-Channel', 'Row J', NULL, 'Sub-Bass Vibration', NULL, NULL),
(34, 'Dunia Fantasi 3D', '2026-06-16 13:00:00', 4, 75000.00, 'imax', 'IMAX 12-Channel', 'Row K', 'GLS-IMAX-07', 'Sub-Bass Vibration', NULL, NULL),
(35, 'Cinta di Kota Tua', '2026-06-12 14:00:00', 2, 120000.00, 'velvet', 'Dolby Atmos', 'Sofa 01', NULL, NULL, 'Satin Pillow & Blanket Pack', 'Welcome Drink Service'),
(36, 'Air Mata Ibu', '2026-06-12 16:30:00', 2, 120000.00, 'velvet', 'Dolby Atmos', 'Sofa 02', NULL, NULL, 'Standard Quilt Pack', 'Popcorn Delivery'),
(37, 'Misteri Rumah Tua', '2026-06-12 19:00:00', 2, 140000.00, 'velvet', 'Dolby Atmos', 'Sofa 03', NULL, NULL, 'Premium Wool Blanket', 'Full Course Dinner Service'),
(38, 'Cinta di Kota Tua', '2026-06-12 21:30:00', 2, 140000.00, 'velvet', 'Dolby Atmos', 'Sofa 04', NULL, NULL, 'Satin Pillow & Blanket Pack', 'Welcome Drink Service'),
(39, 'Dunia Fantasi', '2026-06-13 13:00:00', 2, 150000.00, 'velvet', 'Dolby Atmos', 'Sofa 05', NULL, NULL, 'Premium Wool Blanket', 'Snack & Beverage Call'),
(40, 'Detektif Cilik', '2026-06-13 15:30:00', 2, 150000.00, 'velvet', 'Dolby Atmos', 'Sofa 06', NULL, NULL, 'Standard Quilt Pack', 'Welcome Drink Service'),
(41, 'Air Mata Ibu', '2026-06-13 18:00:00', 2, 150000.00, 'velvet', 'Dolby Atmos', 'Sofa 07', NULL, NULL, 'Premium Wool Blanket', 'Full Course Dinner Service'),
(42, 'Cinta di Kota Tua', '2026-06-13 20:30:00', 2, 150000.00, 'velvet', 'Dolby Atmos', 'Sofa 08', NULL, NULL, 'Satin Pillow & Blanket Pack', 'Wine & Dine Service'),
(43, 'Misteri Rumah Tua', '2026-06-14 14:00:00', 2, 150000.00, 'velvet', 'Dolby Atmos', 'Sofa 01', NULL, NULL, 'Premium Wool Blanket', 'Full Course Dinner Service'),
(44, 'Cinta di Kota Tua', '2026-06-14 16:30:00', 2, 150000.00, 'velvet', 'Dolby Atmos', 'Sofa 02', NULL, NULL, 'Satin Pillow & Blanket Pack', 'Welcome Drink Service'),
(45, 'Air Mata Ibu', '2026-06-14 19:00:00', 2, 150000.00, 'velvet', 'Dolby Atmos', 'Sofa 03', NULL, NULL, 'Standard Quilt Pack', 'Popcorn Delivery'),
(46, 'Dunia Fantasi', '2026-06-14 21:30:00', 2, 150000.00, 'velvet', 'Dolby Atmos', 'Sofa 04', NULL, NULL, 'Premium Wool Blanket', 'Snack & Beverage Call'),
(47, 'Cinta di Kota Tua', '2026-06-15 14:00:00', 2, 120000.00, 'velvet', 'Dolby Atmos', 'Sofa 05', NULL, NULL, 'Satin Pillow & Blanket Pack', 'Welcome Drink Service'),
(48, 'Misteri Rumah Tua', '2026-06-15 16:30:00', 2, 120000.00, 'velvet', 'Dolby Atmos', 'Sofa 06', NULL, NULL, 'Premium Wool Blanket', 'Full Course Dinner Service'),
(49, 'Detektif Cilik', '2026-06-15 19:00:00', 2, 120000.00, 'velvet', 'Dolby Atmos', 'Sofa 07', NULL, NULL, 'Standard Quilt Pack', 'Welcome Drink Service'),
(50, 'Air Mata Ibu', '2026-06-15 21:30:00', 2, 120000.00, 'velvet', 'Dolby Atmos', 'Sofa 08', NULL, NULL, 'Premium Wool Blanket', 'Snack & Beverage Call'),
(51, 'Cinta di Kota Tua', '2026-06-16 14:00:00', 2, 120000.00, 'velvet', 'Dolby Atmos', 'Sofa 01', NULL, NULL, 'Satin Pillow & Blanket Pack', 'Welcome Drink Service');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
