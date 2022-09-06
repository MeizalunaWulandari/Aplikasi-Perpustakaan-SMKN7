-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 04, 2022 at 01:16 AM
-- Server version: 8.0.28
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rapot`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int NOT NULL,
  `kelas` int NOT NULL DEFAULT '0',
  `login_terakhir` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `level`, `kelas`, `login_terakhir`) VALUES
(105, 'RAKEIN NARAYA PUTRA', '0021834761', '7f8e0f5a848549fb05d12b32de7a8309', 4, 0, '2021-05-03 04:54:51'),
(106, 'AFINA KHOIRI AZIZAH', '0032277549', '875ef7ef98c51237a9fbbf5c50431e89', 4, 0, '2021-05-03 04:55:02'),
(107, 'AHMAD NAFIQ UDIN', '0046058552', 'a8130527e1059350302b529be6cfadf6', 4, 0, '2020-12-02 07:27:44'),
(108, 'AJI DANANG KUSUMA', '0034271005', 'a530181561aebab430c70e5e503ac5b6', 4, 0, '2020-12-08 07:29:46'),
(109, 'ALDY RULANDA FIRMANSYAH', '0028792732', '351a1a85f9ce3933e089452d16fc3271', 4, 0, '2020-11-30 07:09:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
