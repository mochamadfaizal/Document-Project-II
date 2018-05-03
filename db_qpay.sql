-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2018 at 02:00 
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_qpay`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE IF NOT EXISTS `data_karyawan` (
`id` int(11) NOT NULL,
  `id_krywn` varchar(11) NOT NULL,
  `nama_krywn` varchar(255) NOT NULL,
  `alamat_krywn` varchar(255) NOT NULL,
  `email_krywn` varchar(55) NOT NULL,
  `telp_krywn` varchar(15) NOT NULL,
  `id_toko` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `id_krywn`, `nama_krywn`, `alamat_krywn`, `email_krywn`, `telp_krywn`, `id_toko`) VALUES
(14, '', 'Faizal', 'Bumi Patra', 'mchfzal@gmail.com', '081394626880', '2121b'),
(17, '', 'Luqmanul Hakim', 'Cipelang, Indramayu Jawa Barat', 'luqman@luqman.com', '12344321', '1621H'),
(18, '', 'Inneke Widianti', 'Terusan Sindang, Indramayu', 'inneke69@gmail.com', '0892898821', '34B'),
(20, '', 'Rizal ', 'sukalila', 'mchfzal@gmail.com', '87813298', '238748');

-- --------------------------------------------------------

--
-- Table structure for table `data_pemasok`
--

CREATE TABLE IF NOT EXISTS `data_pemasok` (
`id_pemasok` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_pmsk` varchar(50) NOT NULL,
  `telp_pmsk` varchar(15) NOT NULL,
  `alamat_pmsk` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pemasok`
--

INSERT INTO `data_pemasok` (`id_pemasok`, `id_toko`, `nama_pmsk`, `telp_pmsk`, `alamat_pmsk`) VALUES
(1, 1, 'jkjsdklds', 'dckldsjl', 'kdsckldskl');

-- --------------------------------------------------------

--
-- Table structure for table `data_toko`
--

CREATE TABLE IF NOT EXISTS `data_toko` (
`id_toko` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `nama_pemilik_toko` varchar(50) NOT NULL,
  `alamat_toko` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jumlah_saldo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_toko`
--

INSERT INTO `data_toko` (`id_toko`, `id_user`, `nama_toko`, `nama_pemilik_toko`, `alamat_toko`, `email`, `jumlah_saldo`) VALUES
(1, 53, 'arto jaya', 'Faizal', 'Pasar baru Indramayu kota', 'arto@mail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `level`) VALUES
(46, 'luqmanulhakim0422978@gmail.com', 'luqman', 'member'),
(47, 'nyH@haha.com', 'hahah', 'member'),
(48, 'officer@mail.com', 'officer', 'karyawan'),
(49, 'ade@mail', 'ade', 'member'),
(50, 'fikih@mail', 'fikih', 'member'),
(51, 'member@mail', 'member', 'member'),
(52, 'hgvg', 'fdffv', 'member'),
(53, 'arto@mail.com', 'arto', 'toko'),
(54, 'pelanggan@mail', 'pelanggan', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `photo`) VALUES
(3, 'admin', 'mchfzal@gmail.com', '$2y$10$nPDWf2xPKnA/S85yozj37usbBMwV1z7cbpiOmu6kxq4B03hyX/o0O', 'Mochamad Faizal', 'default.svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pemasok`
--
ALTER TABLE `data_pemasok`
 ADD PRIMARY KEY (`id_pemasok`), ADD KEY `id_toko` (`id_toko`);

--
-- Indexes for table `data_toko`
--
ALTER TABLE `data_toko`
 ADD PRIMARY KEY (`id_toko`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `data_pemasok`
--
ALTER TABLE `data_pemasok`
MODIFY `id_pemasok` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_toko`
--
ALTER TABLE `data_toko`
MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_pemasok`
--
ALTER TABLE `data_pemasok`
ADD CONSTRAINT `data_pemasok_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `data_toko` (`id_toko`);

--
-- Constraints for table `data_toko`
--
ALTER TABLE `data_toko`
ADD CONSTRAINT `data_toko_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
