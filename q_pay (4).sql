-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2018 pada 12.06
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `q_pay`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `id_toko`, `nama_barang`, `harga_jual`, `harga_beli`, `satuan`, `stok`) VALUES
(2, 5, 'Kerupuk Udang', 15000, 10000, 'pak', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `id_user`, `id_toko`, `nama`, `email`, `no_hp`, `alamat`) VALUES
(7, 84, 5, 'rizal', 'rizal@gmail', '089212736123', 'sukalila');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_member`
--

CREATE TABLE `data_member` (
  `id_member` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jumlah_saldo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_member`
--

INSERT INTO `data_member` (`id_member`, `id_user`, `nama`, `email`, `alamat`, `no_hp`, `jumlah_saldo`) VALUES
(4, 89, 'Luqman', 'luqman@mail', 'Indramayu', '098289812789', 0),
(5, 90, 'Luqmanul Hakim', 'luqmanulhakim0422978@gmail.com', 'Tukdana', '083824397272', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemasok`
--

CREATE TABLE `data_pemasok` (
  `id_pemasok` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_toko`
--

CREATE TABLE `data_toko` (
  `id_toko` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `nama_pemilik_toko` varchar(50) NOT NULL,
  `alamat_toko` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jumlah_saldo` int(11) NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_toko`
--

INSERT INTO `data_toko` (`id_toko`, `id_user`, `nama_toko`, `nama_pemilik_toko`, `alamat_toko`, `email`, `jumlah_saldo`, `logo`) VALUES
(5, 76, 'Mochamad Faizal', 'Arto Jaya', 'Indramayu', 'mchfaizal21@gmail.com', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_beli` int(11) NOT NULL,
  `id_beli` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_jual` int(11) NOT NULL,
  `id_jual` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_jual`, `id_jual`, `id_barang`, `quantity`, `harga`) VALUES
(1, 1, 2, 1, 15000),
(2, 1, 2, 2, 30000);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `penjualan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `penjualan` (
`id_jual` int(11)
,`id_detail` int(11)
,`nama_member` varchar(50)
,`nama_toko` varchar(50)
,`barang` varchar(20)
,`qty` int(11)
,`harga` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `id_beli` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `id_jual` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `cara_pembayaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`id_jual`, `id_toko`, `id_member`, `id_karyawan`, `tanggal`, `total_harga`, `cara_pembayaran`) VALUES
(1, 5, 4, NULL, '2018-05-29', 45000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(71, 'admin', '$2y$04$ETsUMx59Hi3UFXWEB64joOusWNJwcCVpSyZgKZQvwIDrk9wpTHPru', 'admin'),
(76, 'faizal', '$2y$04$5ydUZGLTiq2iJf4J9wOfzu398K8POg8Jq/fZtRwmIvC1V20NGEt7O', 'pemilik toko'),
(84, 'rzl', 'rzl', 'karyawan'),
(89, 'luqman', 'luqman', 'member'),
(90, 'luck', 'jack', 'member');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_bayar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_bayar` (
`id_jual` int(11)
,`nama` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_karyawan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_karyawan` (
`id_karyawan` int(11)
,`id_toko` int(11)
,`nama` varchar(50)
,`alamat` varchar(100)
,`email` varchar(50)
,`no_hp` varchar(15)
,`username` varchar(50)
,`password` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_member`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_member` (
`id_member` int(11)
,`nama` varchar(50)
,`email` varchar(50)
,`alamat` varchar(100)
,`no_hp` varchar(15)
,`jumlah_saldo` int(11)
,`username` varchar(50)
,`password` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `penjualan`
--
DROP TABLE IF EXISTS `penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `penjualan`  AS  select `transaksi_penjualan`.`id_jual` AS `id_jual`,`detail_penjualan`.`id_detail_jual` AS `id_detail`,`data_member`.`nama` AS `nama_member`,`data_toko`.`nama_toko` AS `nama_toko`,`data_barang`.`nama_barang` AS `barang`,`detail_penjualan`.`quantity` AS `qty`,`detail_penjualan`.`harga` AS `harga` from ((((`transaksi_penjualan` join `detail_penjualan`) join `data_toko`) join `data_member`) join `data_barang`) where ((`transaksi_penjualan`.`id_jual` = `detail_penjualan`.`id_jual`) and (`transaksi_penjualan`.`id_toko` = `data_toko`.`id_toko`) and (`transaksi_penjualan`.`id_member` = `data_member`.`id_member`) and (`detail_penjualan`.`id_barang` = `data_barang`.`id_barang`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_bayar`
--
DROP TABLE IF EXISTS `view_bayar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_bayar`  AS  select `transaksi_penjualan`.`id_jual` AS `id_jual`,`data_member`.`nama` AS `nama` from (`transaksi_penjualan` join `data_member`) where (`data_member`.`id_member` = `transaksi_penjualan`.`id_member`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_karyawan`
--
DROP TABLE IF EXISTS `v_karyawan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_karyawan`  AS  select `data_karyawan`.`id_karyawan` AS `id_karyawan`,`data_karyawan`.`id_toko` AS `id_toko`,`data_karyawan`.`nama` AS `nama`,`data_karyawan`.`alamat` AS `alamat`,`data_karyawan`.`email` AS `email`,`data_karyawan`.`no_hp` AS `no_hp`,`user`.`username` AS `username`,`user`.`password` AS `password` from (`data_karyawan` join `user`) where (`data_karyawan`.`id_user` = `user`.`id_user`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_member`
--
DROP TABLE IF EXISTS `v_member`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_member`  AS  select `data_member`.`id_member` AS `id_member`,`data_member`.`nama` AS `nama`,`data_member`.`email` AS `email`,`data_member`.`alamat` AS `alamat`,`data_member`.`no_hp` AS `no_hp`,`data_member`.`jumlah_saldo` AS `jumlah_saldo`,`user`.`username` AS `username`,`user`.`password` AS `password` from (`data_member` join `user`) where (`user`.`id_user` = `data_member`.`id_user`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indeks untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indeks untuk tabel `data_member`
--
ALTER TABLE `data_member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `data_pemasok`
--
ALTER TABLE `data_pemasok`
  ADD PRIMARY KEY (`id_pemasok`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indeks untuk tabel `data_toko`
--
ALTER TABLE `data_toko`
  ADD PRIMARY KEY (`id_toko`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_beli`),
  ADD KEY `id_beli` (`id_beli`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_jual`),
  ADD KEY `id_jual` (`id_jual`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `id_toko` (`id_toko`),
  ADD KEY `id_pemasok` (`id_pemasok`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `id_toko` (`id_toko`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_member` (`id_member`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_member`
--
ALTER TABLE `data_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_pemasok`
--
ALTER TABLE `data_pemasok`
  MODIFY `id_pemasok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_toko`
--
ALTER TABLE `data_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_beli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD CONSTRAINT `data_barang_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `data_toko` (`id_toko`);

--
-- Ketidakleluasaan untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD CONSTRAINT `data_karyawan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `data_karyawan_ibfk_2` FOREIGN KEY (`id_toko`) REFERENCES `data_toko` (`id_toko`);

--
-- Ketidakleluasaan untuk tabel `data_member`
--
ALTER TABLE `data_member`
  ADD CONSTRAINT `data_member_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `data_pemasok`
--
ALTER TABLE `data_pemasok`
  ADD CONSTRAINT `data_pemasok_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `data_toko` (`id_toko`);

--
-- Ketidakleluasaan untuk tabel `data_toko`
--
ALTER TABLE `data_toko`
  ADD CONSTRAINT `data_toko_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_ibfk_1` FOREIGN KEY (`id_beli`) REFERENCES `transaksi_pembelian` (`id_beli`),
  ADD CONSTRAINT `detail_pembelian_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `data_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_jual`) REFERENCES `transaksi_penjualan` (`id_jual`),
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `data_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD CONSTRAINT `transaksi_pembelian_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `data_toko` (`id_toko`),
  ADD CONSTRAINT `transaksi_pembelian_ibfk_2` FOREIGN KEY (`id_pemasok`) REFERENCES `data_pemasok` (`id_pemasok`),
  ADD CONSTRAINT `transaksi_pembelian_ibfk_3` FOREIGN KEY (`id_karyawan`) REFERENCES `data_karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD CONSTRAINT `transaksi_penjualan_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `data_toko` (`id_toko`),
  ADD CONSTRAINT `transaksi_penjualan_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `data_karyawan` (`id_karyawan`),
  ADD CONSTRAINT `transaksi_penjualan_ibfk_3` FOREIGN KEY (`id_member`) REFERENCES `data_member` (`id_member`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
