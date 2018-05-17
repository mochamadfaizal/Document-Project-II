-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2018 at 02:33 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_qpay`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_krywn` varchar(11) NOT NULL,
  `nama_krywn` varchar(255) NOT NULL,
  `alamat_krywn` varchar(255) NOT NULL,
  `email_krywn` varchar(55) NOT NULL,
  `telp_krywn` varchar(15) NOT NULL,
  `id_toko` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_krywn`, `nama_krywn`, `alamat_krywn`, `email_krywn`, `telp_krywn`, `id_toko`) VALUES
('', 'namapemasok', 'alamatpemasok', '', 'telppemasok', ''),
('', 'Luqmanul Hakim', 'Jl Cipelang RT/RW 06/02 Desa Rancajawat Kecamatan Tukdana', '', '565666', ''),
('', 'Luqmanul Hakim', 'Jl Cipelang RT/RW 06/02 Desa Rancajawat Kecamatan Tukdana', '', '34535435354', ''),
('', 'faizal', 'afewasgfwaevrawsezrf edvwsfedfjwze6tb', '', '4534636', ''),
('', 'Mochamad Faizal', 'Jalan Pangkalan Brandan III No. 80 RT. 26 RW. 10\r\nKomperta Bumi Patra Jl. Pangkalan Brandan', '', '081394626880', ''),
('A2', '', '', '', '', 'A08'),
('A3', 'asdsadsad', 'sadsadsd', 'gh@hj.com', '', 'A45'),
('A9', 'Inneke Widianti', 'Terusan, Sindang, Indramayu', 'innekesayang@gmail.com', '0898212989', 'A001');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `photo`) VALUES
(3, 'admin', 'mchfzal@gmail.com', '$2y$10$nPDWf2xPKnA/S85yozj37usbBMwV1z7cbpiOmu6kxq4B03hyX/o0O', 'Mochamad Faizal', 'default.svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
