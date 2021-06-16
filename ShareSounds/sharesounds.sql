-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2021 at 05:10 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharesounds`
--

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `pl_id` int(11) NOT NULL,
  `pl_name` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_name` varchar(255) DEFAULT 'default_ss.svg',
  `access_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`pl_id`, `pl_name`, `user_id`, `img_name`, `access_type`) VALUES
(41, 'Rock', 1, '1500785images.jpg', 0),
(42, 'Lofi', 1, '1827838125877.jpg', 1),
(43, 'Rap', 1, '1192985artworks-000346207275-u906fg-t500x500.jpg', 1),
(45, 'Lo que me voy encontrando de mÃºsica', 1, 'default_ss.svg', 0),
(47, 'Mis Favoritos', 2, 'default_ss.svg', 1),
(48, 'MÃºsica de PapÃ¡', 2, '2146498images.jpg', 0),
(51, 'Podcasts', 2, '284273png-clipart-the-joe-rogan-experience-podcast-paper-organza-ribbon-others-miscellaneous-ribbon-thumbnail.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `song_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `type` varchar(40) NOT NULL,
  `pl_id` int(11) NOT NULL,
  `data_frame` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`song_id`, `name`, `link`, `type`, `pl_id`, `data_frame`) VALUES
(1, 'HARD GZ & NIKONE - LO REAL (PROD.DUALY)', 'https://www.youtube.com/watch?v=I96S7SxeVV0', 'youtube', 43, 'I96S7SxeVV0'),
(2, 'HARD GZ - SHAMELESS [(PROD.FIGU) O PORTO, VIDEOCLIP)]', 'https://www.youtube.com/watch?v=jPE4ZkL4sWk', 'youtube', 43, 'jPE4ZkL4sWk'),
(3, 'Miranda y Hard GZ - VOLVER (prod. Dualy)', 'https://www.youtube.com/watch?v=SAn9ya_nKPc', 'youtube', 43, 'SAn9ya_nKPc'),
(4, 'AYAX - ZINEDINE (PROD. HUECO PRODS) VIDEOCLIP', 'https://www.youtube.com/watch?v=DFeo6BXRt1A', 'youtube', 43, 'DFeo6BXRt1A'),
(5, 'Cinderella', 'https://www.youtube.com/watch?v=QrTgKddShpc', 'youtube', 43, 'QrTgKddShpc'),
(6, 'Apache - En Defensa Propia (VÃ­deo Oficial)', 'https://www.youtube.com/watch?v=BgQepgjulUU', 'youtube', 43, 'BgQepgjulUU'),
(7, '360 Grados -  Apache', 'https://www.youtube.com/watch?v=H7Lrv2_9UvY', 'youtube', 43, 'H7Lrv2_9UvY'),
(11, 'Future March Madness - Tarantino', 'https://soundcloud.com/futureisnow/future-march-madness-prod-by-tarantino', 'soundcloud', 43, NULL),
(12, 'CRUZ CAFUNÃ‰ - MINA EL HAMMANI [Moonlight922 no. 5]', 'https://www.youtube.com/watch?v=-vI_nFXLY_Y', 'youtube', 43, '-vI_nFXLY_Y');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'Teker', 'miguel00rg@hotmail.com', '$2y$10$/kTkEn7lnCQPdTHDAIIkLe.zrz7gM1a/ULvTB63xRut92awoPET/6'),
(2, 'user01', 'user01@user01.com', '$2y$10$OIiRMs3jtV68iya2oD3MYemEi2Bh4CCZDIsbsjZ2k7hxEQKuGc4gW'),
(3, 'sddsd', 'prueba@prueba.com', '$2y$10$tthDTEDE973L/poer0N13eQ2uEnst5MkQZE5iwvX629.gXm6yEgxi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`pl_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`song_id`),
  ADD KEY `pl_id` (`pl_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `pl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`pl_id`) REFERENCES `playlist` (`pl_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
