-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2019 at 03:43 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr13_hristina_dakic_people`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE `friendships` (
  `friendshipId` int(11) NOT NULL,
  `fk_user_1` int(11) DEFAULT NULL,
  `fk_user_2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friendships`
--

INSERT INTO `friendships` (`friendshipId`, `fk_user_1`, `fk_user_2`) VALUES
(5, 1, 2),
(10, 1, 5),
(11, 1, 3),
(12, 10, 1),
(47, 7, 4),
(48, 4, 3),
(49, 8, 9),
(50, 9, 5),
(51, 3, 6),
(52, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `userImg`) VALUES
(1, 'Tina', 'tina@gmail.com', '57d4c56c312a498bc432a501e2599406f0a0240c554ee043394d7d0eabe3a8f7', 'https://pbs.twimg.com/profile_images/541512121/P1812_26-09-09_-_Kopie_400x400.jpg'),
(2, 'Johannes', 'johannes@gmail.com', '1d4b41c9db9172e5f151e4a5fe3c57ca3f98b8e6ba807450b10d1897c84ce72b', 'https://www.naschools.net/cms/lib/MA02202086/Centricity/Domain/1358/mickey-mouse.jpg'),
(3, 'Christoph', 'chrisi_aigner@gmx.net', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'https://images-na.ssl-images-amazon.com/images/I/61BR6ZOsmuL._SL1000_.jpg'),
(4, 'Goran', 'goran@gmail.com', 'c51d6596f69b211fa3c497631838f709ee63bcb518e1036877180de6ba4da099', 'https://pbs.twimg.com/profile_images/1148974811537911809/FIqAfd0l_400x400.png'),
(5, 'Alira', 'alira@gmail.com', 'dac2a22d2be457080f78becf6723d5a48cdf1a6003bee8fffa556abb8e7bdc2f', 'https://www.schoolswork.co.uk/media/images/lisa-simpson.gif'),
(6, 'Anja', 'anja@gmail.com', 'a0e503da9510b45ebdfeb86dffce9218d879145aa714599e42f37fd1b8c64986', 'https://i.pinimg.com/originals/2d/21/99/2d219976c1fff77610bf6d4536cd005d.jpg'),
(7, 'Darko', 'darko@gmail.com', '6a87f5096a86b523f33366fc2eea9b604efe74ff58aa45f95d58a7b8914414df', 'https://i.pinimg.com/originals/30/7a/7f/307a7fdd59577724198c9ba245f6fe4c.png'),
(8, 'Kati', 'kati@gmail.com', 'bd53c040b1c28e13f452a6f35ddcdb3a59540cae712fb71a474d8af105159d4e', 'https://assets.cdn.moviepilot.de/files/6ac70bfff3973eb8ffc22ddba34c6897e7a3fda0587dc4beb470fc4628c3/wickie.jpg'),
(9, 'Kari', 'kari@gmail.com', 'd44eb131a9fc729aae3aed377733d242c0796290775259142e0bd8d26e1e3132', 'https://s7d9.scene7.com/is/image/DisneyStoreES/Character_Assets_Atmb-sq_character-alice_launch?$sq-c$'),
(10, 'Max', 'max@gmail.com', 'c427a238488d0e14d9cc00782407acb9e8a4ef5d564d78c5c6593d3bb26bbc2d', 'https://s7d9.scene7.com/is/image/DisneyStoreES/Character_Assets_Stmb-sq_character-stitch_launch?$sq-c$');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`friendshipId`),
  ADD KEY `fk_user_1` (`fk_user_1`),
  ADD KEY `fk_user_2` (`fk_user_2`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friendships`
--
ALTER TABLE `friendships`
  MODIFY `friendshipId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friendships`
--
ALTER TABLE `friendships`
  ADD CONSTRAINT `friendships_ibfk_1` FOREIGN KEY (`fk_user_1`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `friendships_ibfk_2` FOREIGN KEY (`fk_user_2`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
