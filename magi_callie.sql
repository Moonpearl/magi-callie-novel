-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2019 at 03:26 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magi_callie`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` tinytext NOT NULL,
  `serial` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`id`, `title`, `serial`) VALUES
(1, 'Prologue', '1vSLNpedNvS5wXY0E7RsU67xltaQr_C9b1B7EJq0hX6zEVVBCyfAOhqTG3EuJeXqqkfuKMRqgxgC5Fev'),
(2, 'Reach for the star', '1vSCBRPEi6JYPUH9kuKlw8qrFxGJIHhWRSoFN2VmAbvHefrkw8D9gepiDQMc8UCcUki1ATziApu05wG6'),
(3, 'Misfortune telling', '1vSJzubr4_K0grtjMN4V-uF4-16CMKvZ5bw9ztNqGGCmvn7-PAu0suuO67m8IoctD4RWcxUtrGunN9os'),
(4, 'Mortals help us', '1vQI11qHaKPKT3O8JHBjHb9Xm2uRDz3xj9Xt8O4eV86MWAdqlMOOnFzUpqVx862inZbNdr4Dq94YlJQC'),
(5, 'Let the magic not work', '1vRYjI3e89uoI2E5w-MkGBnn5sK7nAsi1JIfdpQ3l79_V44W6Ta51OZNGs4ff6w8XROjbTrewMHWFEy0'),
(6, 'Let\'s celebrate too soon', '1vQIMZgP7RE8M1q0A0ieWPhcHs23SsGYXoExIXO_M-EbiwoeOS-dLWW2kAz01D4h0vhMkgkosVbjZ2El');

-- --------------------------------------------------------

--
-- Table structure for table `nav_item`
--

CREATE TABLE `nav_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `caption` tinytext NOT NULL,
  `icon` tinytext NOT NULL,
  `url` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nav_item`
--

INSERT INTO `nav_item` (`id`, `caption`, `icon`, `url`) VALUES
(1, 'Home', 'fas fa-home', ''),
(2, 'Read', 'fas fa-book-open', 'chapter'),
(3, 'Calendar', 'far fa-calendar-alt', 'date'),
(4, 'Encyclopedia', 'fas fa-globe-americas', 'cards'),
(5, 'Contact', 'fas fa-file-signature', '#');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nav_item`
--
ALTER TABLE `nav_item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nav_item`
--
ALTER TABLE `nav_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
