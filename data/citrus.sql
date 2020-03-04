-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 05, 2020 at 12:10 AM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.27-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citrus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'Marko', 'marko');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `text` text COLLATE utf8_slovenian_ci NOT NULL,
  `date` date DEFAULT NULL,
  `approve` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `email`, `text`, `date`, `approve`) VALUES
(1, 'Marko', 'marko@gmail.com', 'Great and fresh fruits!', '2020-03-17', 1),
(3, 'Djordje', 'djordje@gmail.com', 'Great service! ', '2020-03-12', 1),
(38, 'Tijana', 'tijana@gmail.com', 'You are awesome!!!', '2020-03-04', 0),
(39, 'Marina', 'marina@gmail.com', 'Great and fresh fruits!', '2020-03-04', 1),
(40, 'Nina', 'nina@gmail.com', 'Good stuff!', '2020-03-04', 0),
(41, 'Marko', 'marko@gmail.com', 'Good job!', '2020-03-04', 0),
(42, 'Lazar', 'lazar@gmail.com', 'All the best!', '2020-03-04', 1),
(43, 'Filip', 'filip@gmail.com', 'Best fruits!', '2020-03-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `img`) VALUES
(1, 'Lemon', 'The lemon, Citrus limon (L.) Osbeck, is a species of small evergreen tree in the flowering plant family Rutaceae, native to South Asia, primarily North eastern India.', '/assets/img/lemon.jpg'),
(2, 'Orange', 'The orange is the fruit of the citrus species Citrus × sinensis in the family Rutaceae, native to China.', '/assets/img/orange.jpg'),
(3, 'Mandarin', 'The mandarin orange (Citrus reticulata), also known as the mandarin or mandarine, is a small citrus tree with fruit resembling other oranges, usually eaten plain or in fruit salads.', '/assets/img/mandarine.jpg'),
(4, 'Pomelo', 'The pomelo, pummelo, or in scientific terms Citrus maxima or Citrus grandis, is the largest citrus fruit from the family Rutaceae and the principal ancestor of the grapefruit.', '/assets/img/pomelo.jpg'),
(5, 'Citron', 'The citron (Citrus medica) is a large fragrant citrus fruit with a thick rind. It is one of the original citrus fruits from which all other citrus types developed through natural hybrid speciation or artificial hybridization.', '/assets/img/citron.jpeg'),
(6, 'Tangerine', 'The tangerine (Citrus reticula L. var., sometimes referred as Citrus tangerina) is a group of orange-colored citrus fruit consisting of hybrids of mandarin orange (Citrus reticulata).', '/assets/img/tangerine.jpg'),
(7, 'Oroblanco', 'An oroblanco, oro blanco (white gold) or sweetie (Citrus grandis Osbeck × C. Paradisi Macf.) is a sweet seedless citrus hybrid fruit similar to grapefruit.', '/assets/img/oroblanco.jpg'),
(8, 'Kumquats', 'Kumquats (or cumquats in Australian English, /ˈkʌmkwɒt/; Citrus japonica) are a group of small fruit-bearing trees in the flowering plant family Rutaceae.', '/assets/img/kumquat.jpg'),
(9, 'Grapefruit', 'The grapefruit (Citrus × paradisi) is a subtropical citrus tree known for its relatively large sour to semi-sweet, somewhat bitter fruit.', '/assets/img/grapefruit.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
