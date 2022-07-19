-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 юни 2020 в 15:54
-- Версия на сървъра: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `receptions_data`
--

-- --------------------------------------------------------

--
-- Структура на таблица `tbl_receptions`
--

CREATE TABLE `tbl_receptions` (
  `id_reception` int(10) NOT NULL,
  `id_type` int(10) NOT NULL,
  `name` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `time` int(5) UNSIGNED NOT NULL,
  `moreinfo` text NOT NULL,
  `picture` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `tbl_receptions`
--

INSERT INTO `tbl_receptions` (`id_reception`, `id_type`, `name`, `time`, `moreinfo`, `picture`) VALUES
(1, 3, 'Чийзкейк', 60, 'Чийзкейкът е ...\r\n', 'Pic1.jpg'),
(2, 3, 'Торта', 56, 'Начин на приготвяне ...', ''),
(6, 1, 'Паниран кашкава', 30, 'Начин на приготвяне', 'Pic6.jpg');

-- --------------------------------------------------------

--
-- Структура на таблица `tbl_types`
--

CREATE TABLE `tbl_types` (
  `id_type` int(10) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `tbl_types`
--

INSERT INTO `tbl_types` (`id_type`, `type`) VALUES
(3, 'Десерти'),
(1, 'Предястия'),
(2, 'Ястия');

-- --------------------------------------------------------

--
-- Структура на таблица `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `passwd` varchar(15) NOT NULL,
  `usertype` tinyint(4) NOT NULL,
  `personname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `passwd`, `usertype`, `personname`) VALUES
(1, 'admin', 'admin', 1, 'Администратор');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_receptions`
--
ALTER TABLE `tbl_receptions`
  ADD PRIMARY KEY (`id_reception`),
  ADD KEY `id_type` (`id_type`);

--
-- Indexes for table `tbl_types`
--
ALTER TABLE `tbl_types`
  ADD PRIMARY KEY (`id_type`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_receptions`
--
ALTER TABLE `tbl_receptions`
  MODIFY `id_reception` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_types`
--
ALTER TABLE `tbl_types`
  MODIFY `id_type` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `tbl_receptions`
--
ALTER TABLE `tbl_receptions`
  ADD CONSTRAINT `tbl_receptions_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `tbl_types` (`id_type`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
