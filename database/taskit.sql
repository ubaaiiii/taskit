-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 09:41 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskit`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` varchar(10) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `divisi` varchar(25) NOT NULL,
  `skor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `divisi`, `skor`) VALUES
('100', 'Information & Technology', 100),
('90', 'Human Resource Department', 90),
('80', 'Underwritting', 80),
('60', 'Office Boy', 60),
('70', 'Costumer Service', 70);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` varchar(5) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`) VALUES
('0', 'Staff'),
('1', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggalLahir` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `divisi` varchar(20) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `tanggalLahir`, `email`, `divisi`, `jabatan`, `username`, `password`) VALUES
('2019090001', 'Reinando', '23/08/1997', 'nando@gmail.com', '100', '1', 'nando', 'kambing'),
('2019090002', 'Rizqi Ubaidillah', '23/08/1997', 'nisl.arcu.iaculis@fringillaestMauris.ca', '90', '0', 'ubai', 'dillah'),
('2019090003', 'Giovanni Anthionia', '23/08/1997', 'Sed.malesuada@arcuSed.edu', '60', '1', 'ipan', '123'),
('2020010001', 'Xxx', '15/08/2000', 'budi@gmail.com', '100', '0', 'XXX1508', 'X@1508!');

-- --------------------------------------------------------

--
-- Table structure for table `kepentingan`
--

CREATE TABLE `kepentingan` (
  `id` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `skor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepentingan`
--

INSERT INTO `kepentingan` (`id`, `kode`, `deskripsi`, `skor`) VALUES
(100, 'NOW', 'Dibutuhkan sekarang', 100),
(90, 'URGENT', 'Dibutuhkan Mendesak', 90),
(80, 'IMPORTANT', 'Penting', 80),
(70, 'ASAP', 'Lebih cepat lebih baik', 70),
(60, 'TODAY', 'Dibutuhkan hari ini', 60),
(50, 'TOMORROW', 'Dibutuhkan besok', 50);

-- --------------------------------------------------------

--
-- Table structure for table `matriks`
--

CREATE TABLE `matriks` (
  `kodeRequest` varchar(15) NOT NULL,
  `k1` varchar(3) NOT NULL,
  `k2` varchar(3) NOT NULL,
  `k3` varchar(3) NOT NULL,
  `k4` varchar(3) NOT NULL,
  `hk` varchar(6) NOT NULL,
  `n1` varchar(6) NOT NULL,
  `n2` varchar(6) NOT NULL,
  `n3` varchar(6) NOT NULL,
  `n4` varchar(6) NOT NULL,
  `hn` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matriks`
--

INSERT INTO `matriks` (`kodeRequest`, `k1`, `k2`, `k3`, `k4`, `hk`, `n1`, `n2`, `n3`, `n4`, `hn`) VALUES
('REQ2019120001', '80', '80', '60', '80', '300', '', '', '', '', ''),
('REQ2019120002', '60', '90', '80', '80', '310', '', '', '', '', ''),
('REQ2019120003', '100', '100', '100', '100', '400', '', '', '', '', ''),
('REQ2020010001', '100', '80', '80', '80', '340', '', '', '', '', ''),
('REQ2020010002', '80', '90', '80', '100', '350', '', '', '', '', ''),
('REQ2020010003', '90', '90', '80', '60', '320', '', '', '', '', ''),
('REQ2020010004', '80', '90', '80', '80', '330', '', '', '', '', ''),
('REQ2020010005', '70', '80', '60', '80', '290', '', '', '', '', ''),
('REQ2020010006', '60', '80', '80', '80', '300', '', '', '', '', ''),
('REQ2020010007', '90', '100', '60', '80', '330', '', '', '', '', ''),
('REQ2020010008', '100', '100', '80', '80', '360', '', '', '', '', ''),
('REQ2020010009', '90', '100', '60', '80', '330', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `kodeRequest` varchar(15) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tanggalRequest` varchar(10) NOT NULL,
  `tanggalDikerjakan` varchar(10) NOT NULL,
  `tanggalDone` varchar(10) NOT NULL,
  `requester` varchar(10) NOT NULL,
  `managerTujuan` varchar(10) NOT NULL,
  `dikerjakanOleh` varchar(10) NOT NULL,
  `divisiTujuan` varchar(3) NOT NULL,
  `catatanDone` varchar(255) NOT NULL,
  `catatanTugas` varchar(255) NOT NULL,
  `progress` varchar(3) NOT NULL,
  `skor_saw` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`kodeRequest`, `deskripsi`, `status`, `tanggalRequest`, `tanggalDikerjakan`, `tanggalDone`, `requester`, `managerTujuan`, `dikerjakanOleh`, `divisiTujuan`, `catatanDone`, `catatanTugas`, `progress`, `skor_saw`) VALUES
('REQ2019120001', 'segera pak...', 'new', '27/12/2019', '', '', '2019090001', '', '', '80', '', '', '', '1.2'),
('REQ2019120002', 'butuh cepat', 'new', '27/12/2019', '', '', '2019090001', '', '', '90', '', '', '', '2.48'),
('REQ2019120003', 'urgent...', 'rejected', '27/12/2019', '21/01/2020', '21/01/2020', '2019090001', '', '2019090001', '100', '', '', '', '4.8'),
('REQ2020010001', 'urgent', 'new', '11/01/2020', '', '', '2019090001', '', '', '80', '', '', '', '5.44'),
('REQ2020010002', 'penting', 'new', '11/01/2020', '', '', '2019090001', '', '', '90', '', '', '', '7'),
('REQ2020010003', 'urgent', 'close', '20/01/2020', '', '', '2019090001', '', '', '90', '', '', '', '7.68'),
('REQ2020010004', 'cb', 'new', '21/01/2020', '', '', '2019090001', '', '', '90', '', '', '', '9.24'),
('REQ2020010005', 'ya', 'new', '21/01/2020', '', '', '2019090001', '', '', '80', '', '', '', '9.28'),
('REQ2020010006', '345', 'new', '21/01/2020', '', '', '2019090001', '', '', '80', '', '', '', '10.8'),
('REQ2020010007', 'cepet', 'onprogress', '21/01/2020', '', '', '2019090001', '', '', '100', '', '', '', '13.2'),
('REQ2020010008', 'cepe 1', 'done', '21/01/2020', '', '', '2019090001', '', '', '100', '', '', '', '15.84'),
('REQ2020010009', 'cepet 2', 'new', '21/01/2020', '', '', '2019090001', '', '', '100', '', '', '', '15.84');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
