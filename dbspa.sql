-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 10:28 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbspa`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `kd_terima` varchar(10) NOT NULL,
  `tgl_terima` date NOT NULL,
  `kd_produk` varchar(10) NOT NULL,
  `kd_suplier` varchar(10) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `kd_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`kd_terima`, `tgl_terima`, `kd_produk`, `kd_suplier`, `harga_beli`, `jumlah`, `stok_awal`, `kd_user`) VALUES
('TE01', '2018-11-07', 'p02', 'S01', 50000, 4, 0, ''),
('TE03', '2018-11-01', 'P03', 'S02', 20000, 5, 0, ''),
('TE04', '0000-00-00', 'p02', 'S02', 40000, 0, 0, ''),
('TE05', '0000-00-00', 'P03', 'S02', 40000, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `kd_booking` varchar(10) NOT NULL,
  `tgl_booking` date NOT NULL,
  `kd_pelanggan` varchar(10) NOT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL,
  `status_book` varchar(10) NOT NULL,
  `kd_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`kd_booking`, `tgl_booking`, `kd_pelanggan`, `check_in`, `check_out`, `status_book`, `kd_user`) VALUES
('B01', '2018-11-07', 'PE02', '12:17:00', '17:17:00', 'check in', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_booking`
--

CREATE TABLE `detail_booking` (
  `kd_detail_booking` int(11) NOT NULL,
  `kd_booking` varchar(10) NOT NULL,
  `kd_therapist` varchar(10) NOT NULL,
  `kd_treatment` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_booking`
--

INSERT INTO `detail_booking` (`kd_detail_booking`, `kd_booking`, `kd_therapist`, `kd_treatment`) VALUES
(2, 'B01', 'T01', 'TR01'),
(1, 'B01', 'T02', 'TR02');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `kd_detail_penjualan` int(11) NOT NULL,
  `kd_penjualan` varchar(10) NOT NULL,
  `kd_produk` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_treatment`
--

CREATE TABLE `kategori_treatment` (
  `kd_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_treatment`
--

INSERT INTO `kategori_treatment` (`kd_kategori`, `nama_kategori`) VALUES
('K01', 'Baliness Massage'),
('K02', 'Hand and Nail Treatment'),
('K03', 'Lulur');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kd_pelanggan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `telp_pelanggan` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kd_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `telp_pelanggan`, `email`, `status`) VALUES
('PE01', 'Siti Hardiati', 'laki-laki', '098736756253', 'siti@gmail.com', 'member'),
('PE02', 'Maria Salestina', 'laki-laki', '812121212', 'lesty@gmail.com', 'member'),
('PE03', 'Kadek Ayu', 'perempuan', '866375436', 'kjskajh@gmail.com', 'member'),
('PE04', 'Eka Suryaningsih', 'perempuan', '83847536', 'eka@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kd_penjualan` varchar(10) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `kd_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kd_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(15) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kd_produk`, `nama_produk`, `harga_jual`, `satuan`, `stok`, `tgl_kadaluarsa`) VALUES
('p01', 'lilin', 15000, 'kilo', 30, '2018-10-02'),
('p02', 'sabun', 3400, 'lusin', 0, '2018-10-01'),
('P03', 'Gelang', 50000, 'pcs', 0, '0000-00-00'),
('p04', 'Kalung', 150000, 'pcs', 0, '0000-00-00'),
('P05', 'Cincin', 150000, 'pcs', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `kd_suplier` varchar(10) NOT NULL,
  `nama_suplier` varchar(25) NOT NULL,
  `telp_suplier` varchar(15) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `npwp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`kd_suplier`, `nama_suplier`, `telp_suplier`, `alamat`, `npwp`) VALUES
('S01', 'PT Mahasiswa Abadi', '1234567890', 'Jalan yang benar', '5555555555555'),
('S02', 'PT Jomblo Abadi', '08127563265', 'Jalan yang benar', '6375643753647525');

-- --------------------------------------------------------

--
-- Table structure for table `therapist`
--

CREATE TABLE `therapist` (
  `kd_therapist` varchar(10) NOT NULL,
  `nama_therapist` varchar(25) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `telp_therapist` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `therapist`
--

INSERT INTO `therapist` (`kd_therapist`, `nama_therapist`, `no_ktp`, `telp_therapist`, `jenis_kelamin`, `alamat`) VALUES
('T01', 'Dwi Suryaningrat', '321019283617362725', '182132132', 'laki-laki', 'Denpasar'),
('T02', 'Dwi Hikmah', '5456546574654', '817263656437', 'perempuan', 'Renon'),
('T03', 'Ni Kadek Ayu Sukma', '5647536456473564', '98256256345', 'perempuan', 'Tabanan');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `kd_treatment` varchar(10) NOT NULL,
  `nama_treatment` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL,
  `kd_kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`kd_treatment`, `nama_treatment`, `harga`, `kd_kategori`) VALUES
('T03', 'Lulur Mandi', 150000, 'K02'),
('TR01', 'Masas bawang', 200000, 'K01'),
('TR02', 'Massage lulur', 150000, 'K02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kd_user` varchar(10) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hak_akses` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kd_user`, `nama_user`, `username`, `password`, `telepon`, `alamat`, `hak_akses`, `status`) VALUES
('U01', 'Ida Ayu Tri', 'tri', '12345', '081234456678', 'Gianyar', 'resepsionis', 'Aktif'),
('U02', 'Ida Bagus Made Manuaba', 'gusde', '12345', '0826364256436', 'Gianyar', 'owner', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`kd_terima`),
  ADD KEY `kd_produk` (`kd_produk`,`kd_suplier`),
  ADD KEY `kd_suplier` (`kd_suplier`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`kd_booking`),
  ADD KEY `kd_pelanggan` (`kd_pelanggan`);

--
-- Indexes for table `detail_booking`
--
ALTER TABLE `detail_booking`
  ADD PRIMARY KEY (`kd_detail_booking`),
  ADD KEY `kd_booking` (`kd_booking`,`kd_therapist`,`kd_treatment`),
  ADD KEY `kd_therapist` (`kd_therapist`),
  ADD KEY `kd_treatment` (`kd_treatment`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`kd_detail_penjualan`),
  ADD KEY `kd_produk` (`kd_produk`),
  ADD KEY `kd_penjualan` (`kd_penjualan`,`kd_produk`);

--
-- Indexes for table `kategori_treatment`
--
ALTER TABLE `kategori_treatment`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kd_pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kd_penjualan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_produk`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`kd_suplier`);

--
-- Indexes for table `therapist`
--
ALTER TABLE `therapist`
  ADD PRIMARY KEY (`kd_therapist`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`kd_treatment`),
  ADD KEY `kd_kategori` (`kd_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_booking`
--
ALTER TABLE `detail_booking`
  MODIFY `kd_detail_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `kd_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`kd_produk`) REFERENCES `produk` (`kd_produk`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`kd_suplier`) REFERENCES `suplier` (`kd_suplier`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`kd_pelanggan`) REFERENCES `pelanggan` (`kd_pelanggan`);

--
-- Constraints for table `detail_booking`
--
ALTER TABLE `detail_booking`
  ADD CONSTRAINT `detail_booking_ibfk_1` FOREIGN KEY (`kd_booking`) REFERENCES `booking` (`kd_booking`),
  ADD CONSTRAINT `detail_booking_ibfk_2` FOREIGN KEY (`kd_therapist`) REFERENCES `therapist` (`kd_therapist`),
  ADD CONSTRAINT `detail_booking_ibfk_3` FOREIGN KEY (`kd_treatment`) REFERENCES `treatment` (`kd_treatment`);

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`kd_penjualan`) REFERENCES `penjualan` (`kd_penjualan`),
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`kd_produk`) REFERENCES `produk` (`kd_produk`);

--
-- Constraints for table `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `treatment_ibfk_1` FOREIGN KEY (`kd_kategori`) REFERENCES `kategori_treatment` (`kd_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
