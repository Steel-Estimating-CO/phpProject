-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Feb 25, 2022 at 09:50 AM
-- Server version: 8.0.28
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MYSQL_DATABASE`
--

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Lastname` varchar(40) NOT NULL,
  `Email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Usertype` varchar(40) NOT NULL,
  `Auth` tinyint DEFAULT '0',
  PRIMARY KEY (userID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `Pending` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Lastname` varchar(40) NOT NULL,
  `Email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Usertype` varchar(40) NOT NULL,
  `Auth` tinyint DEFAULT '0',
  PRIMARY KEY (userID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `Listings` (
  `userID` int NOT NULL,
  `Type` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Description` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Claimed` tinyint DEFAULT '0',
  PRIMARY KEY (userID),
  FOREIGN KEY (userID) REFERENCES Users(userID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `Firstname`, `Lastname`, `Email`, `Username`, `Usertype`, `Auth`) VALUES
(23, 'Matt', 'dasas', 'lol@gmail.com', 'haha', 'Estimator', 0),
(24, 'Steve', 'dasas', 'lol@gmail.com', 'haha', 'Estimator', 0),
(25, 'Steve', 'dasas', 'lol@gmail.com', 'haha', 'Estimator', 0),
(26, 'Steve', 'dasas', 'lol@gmail.com', 'haha', 'Estimator', 0);


INSERT INTO `Listings` (`userID`, `type`, `description`, `claimed`) VALUES
(23, 'business', '1000 meter area that needs steal beams every 20 meters, I need estimations for how much steel is required for solid beams that can support up to 5 floors.', 0);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
