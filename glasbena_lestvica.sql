-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2017 at 05:20 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glasbena_lestvica`
--

-- --------------------------------------------------------

--
-- Table structure for table `glasba_zvrsti`
--

CREATE TABLE `glasba_zvrsti` (
  `id` int(11) NOT NULL,
  `zvrst_id` int(11) NOT NULL,
  `glasba_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `glasba_zvrsti`
--

INSERT INTO `glasba_zvrsti` (`id`, `zvrst_id`, `glasba_id`) VALUES
(1, 1, 23),
(2, 1, 24),
(3, 1, 25),
(4, 2, 26),
(5, 2, 27),
(6, 2, 28),
(7, 1, 29),
(8, 2, 30),
(9, 1, 31),
(10, 1, 32),
(11, 2, 33),
(12, 2, 34),
(13, 2, 35),
(14, 2, 36),
(15, 2, 37),
(16, 1, 37),
(17, 1, 38),
(18, 1, 39),
(19, 1, 40),
(20, 1, 41),
(21, 1, 42);

-- --------------------------------------------------------

--
-- Table structure for table `glasbe`
--

CREATE TABLE `glasbe` (
  `id` int(11) NOT NULL,
  `naslov` varchar(80) COLLATE utf8_slovenian_ci NOT NULL,
  `dolzina` varchar(80) COLLATE utf8_slovenian_ci NOT NULL,
  `opis` varchar(80) COLLATE utf8_slovenian_ci NOT NULL,
  `izvajalec_id` int(11) NOT NULL,
  `ocena_poz` int(11) NOT NULL,
  `ocena_neg` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `glasbe`
--

INSERT INTO `glasbe` (`id`, `naslov`, `dolzina`, `opis`, `izvajalec_id`, `ocena_poz`, `ocena_neg`) VALUES
(27, 'Blame', '4.16', 'Song of Calvin Harris ft. John Newman', 16, 0, 1),
(26, 'How Deep Is Your Love', '4.21', 'Song of Calvin Harris and Disciples', 16, 1, 0),
(28, 'Feel So Close', '4.07', 'Song of Calvin Harris', 16, 0, 0),
(23, 'My Way', '4.05', 'song of calvin harris', 16, 0, 0),
(24, 'This Is What You Came For', '4.00', 'Song feat Rihanna', 16, 0, 0),
(25, 'Summer', '3.54', 'summer', 16, 0, 0),
(29, 'This One Is For You', '3.56', 'Song Of UEFA EURO 2016', 21, 0, 0),
(30, 'Play Hard', '4.02', 'Song of David Guetta ft. Ne-Yo, Akon', 21, 0, 0),
(31, 'Bad', '2.51', 'Song Of David Guetta ft. Vassy', 11, 2, 1),
(32, 'Titanium', '4.06', 'Pupular song of David Guetta and Sia', 21, 0, 0),
(33, 'Something Just Like This', '4.08', 'Song of Chainsmokers ft. Coldplay', 16, 0, 0),
(34, 'Closer', '4.22', 'Popular song of Chainsmokers ft. Halsey', 17, 0, 0),
(35, 'There For You', '3.41', 'New amazing creation of Martin Garrix ft. Troye Sivan', 19, 0, 0),
(36, 'Byte', '3.51', 'Song of Martin Garrix ft. Brooks', 19, 0, 0),
(37, 'Scared To Be Lonely', '3.51', 'Collab with Dua Lipa', 19, 0, 0),
(38, 'I am the One', '5.22', 'Song of Album Purpose', 15, 1, 0),
(39, 'Let Me Love You', '3.26', 'Song of Justin Bieber ft. DJ Snake', 15, 1, 0),
(40, 'What Do You Mean?', '4.58', 'Song of Album Purpose', 15, 1, 0),
(41, 'Love Yourself', '4.33', 'Very Popular song of album Purpose', 15, 1, 0),
(42, 'Where Are U Now', '4.12', 'Popular song of Justin Bieber ft. Skrillex and Diplo', 11, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `izvajalci`
--

CREATE TABLE `izvajalci` (
  `id` int(11) NOT NULL,
  `ime` varchar(80) COLLATE utf8_slovenian_ci NOT NULL,
  `priimek` varchar(80) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `opis` varchar(300) COLLATE utf8_slovenian_ci NOT NULL,
  `let_rojstva` varchar(80) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `izvajalci`
--

INSERT INTO `izvajalci` (`id`, `ime`, `priimek`, `opis`, `let_rojstva`) VALUES
(11, 'Jonas', 'Blue', 'Guy James Robin (born 2 August 1989), better known by his stage name Jonas Blue, is an English DJ, record producer, songwriter and remixer[2] based in London[3] who produces music which blends dance music with pop sensibilities', '1989'),
(15, 'Justin', 'Bieber', 'is a Canadian singer and songwriter. After a talent manager discovered him through his YouTube videos covering songs in 2008 and signed to RBMG, Bieber released his debut EP, My World, in late 2009. It was certified Platinum in the U.S.', '1994'),
(16, 'Calvin', 'Harris', ' known professionally as Calvin Harris, is a Scottish record producer, DJ, singer and songwriter. His debut studio album I Created Disco was released in June 2007, and was the precursor to his UK top 10 singles "Acceptable in the 80s" and "The Girls". In 2009, Harris released his second studio album', '1984'),
(17, 'Chainsmokers', '', 'are an American DJ/producer duo consisting of Andrew Taggart and Alex Pall.[3][4] The EDM-pop duo[1] achieved a breakthrough with their 2014 song "#Selfie", which was a top twenty single in several countries. Their debut EP, Bouquet was released in October 2015 and featured the single "Roses", which', '1985'),
(19, 'Martin', 'Garrix', 'Martijn Gerard Garritsen (born 14 May 1996), known professionally Martin Garrix (stylized as Mar+in GarriÃ—), is a Dutch DJ, record producer and musician.', '1996'),
(20, 'Zarra', 'Larsson', 'is a Swedish singer and songwriter. She first gained national fame for winning the 2008 season of the talent show Talang, the Swedish version of Got Talent, at the age of 10', '1997'),
(21, 'David', 'Guetta', 'is a French DJ, record producer, remixer, and songwriter. He co-founded Gum Productions with Lisa Dodgson and released his first album, Just a Little More Love, in 2002. Later, he released Guetta Blaster (2004) and Pop Life (2007).', '1967');

-- --------------------------------------------------------

--
-- Table structure for table `ocene`
--

CREATE TABLE `ocene` (
  `id` int(11) NOT NULL,
  `uporabnik_id` int(11) NOT NULL,
  `glasba_id` int(11) NOT NULL,
  `vrednost` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `ocene`
--

INSERT INTO `ocene` (`id`, `uporabnik_id`, `glasba_id`, `vrednost`) VALUES
(1, 2, 31, 1),
(2, 2, 40, 1),
(3, 2, 31, -1),
(4, 2, 41, 1),
(5, 2, 42, 1),
(6, 1, 31, 1),
(7, 2, 27, -1),
(8, 2, 38, 1),
(9, 2, 39, 1),
(10, 2, 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `uporabniki`
--

CREATE TABLE `uporabniki` (
  `id` int(11) NOT NULL,
  `username` varchar(80) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(80) COLLATE utf8_slovenian_ci NOT NULL,
  `priimek` varchar(80) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_slovenian_ci NOT NULL,
  `tel_stevilka` varchar(80) COLLATE utf8_slovenian_ci NOT NULL,
  `geslo` varchar(80) COLLATE utf8_slovenian_ci NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `uporabniki`
--

INSERT INTO `uporabniki` (`id`, `username`, `ime`, `priimek`, `email`, `tel_stevilka`, `geslo`, `admin`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.com', '041', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'primoz.golavsek', 'PrimoÅ¾', 'GolavÅ¡ek', 'primoz.golavsek@gmail.com', '041222222', 'ae404a1ecbcdc8e96ae4457790025f50', 0),
(3, 'test', 'test', 'test', 'test@gmail.com', '03', '098f6bcd4621d373cade4e832627b4f6', 0),
(4, 'test1', 'test1', 'test1', 'test@gmail.com', '123', '5a105e8b9d40e1329780d62ea2265d8a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `zvrsti`
--

CREATE TABLE `zvrsti` (
  `id` int(11) NOT NULL,
  `ime` varchar(80) COLLATE utf8_slovenian_ci NOT NULL,
  `opis` varchar(80) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `zvrsti`
--

INSERT INTO `zvrsti` (`id`, `ime`, `opis`) VALUES
(1, 'Pop', 'pop music\r\n'),
(2, 'EDM', 'edm music');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `glasba_zvrsti`
--
ALTER TABLE `glasba_zvrsti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `glasba_id` (`glasba_id`),
  ADD KEY `zvrst_id` (`zvrst_id`);

--
-- Indexes for table `glasbe`
--
ALTER TABLE `glasbe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `izvajalec_id` (`izvajalec_id`);

--
-- Indexes for table `izvajalci`
--
ALTER TABLE `izvajalci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ocene`
--
ALTER TABLE `ocene`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uporabnik_id` (`uporabnik_id`),
  ADD KEY `glasba_id` (`glasba_id`);

--
-- Indexes for table `uporabniki`
--
ALTER TABLE `uporabniki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zvrsti`
--
ALTER TABLE `zvrsti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `glasba_zvrsti`
--
ALTER TABLE `glasba_zvrsti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `glasbe`
--
ALTER TABLE `glasbe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `izvajalci`
--
ALTER TABLE `izvajalci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `ocene`
--
ALTER TABLE `ocene`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `uporabniki`
--
ALTER TABLE `uporabniki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `zvrsti`
--
ALTER TABLE `zvrsti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
