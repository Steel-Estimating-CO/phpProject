-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 10, 2022 at 02:19 PM
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
-- Table structure for table `Listings`
--
CREATE TABLE `Listings` (
  `listingID` int NOT NULL,
  `userID` int NOT NULL,
  `Type` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Description` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Claimed` tinyint DEFAULT '0',
<<<<<<< HEAD
  `estimatorID` int ,
=======
  `estimatorID` int,
>>>>>>> parent of ef7a782 (Merge branch 'main' of https://github.com/Steel-Estimating-CO/phpProject)
  PRIMARY KEY (listingID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (estimatorID) REFERENCES Users(userID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Listings` (`listingID`, `userID`, `Type`, `Description`, `Claimed`) VALUES 
(2412, 23, 'private', '300 meter squared area, need to estimate how much steel is required to reinforce the exterior walls for a house', 0),
(2523, 23, 'business', '250 meter squared area, need to estimate how much steel is required to reinforce the interior walls for a cafe', 0),
(253, 24, 'private', '20 meter squared area, need to estimate how much steel is required to reinforce the exterior walls for a shed', 0),
(2354, 24, 'business', '1000 meter area that needs steal beams every 20 meters, I need estimations for how much steel is required for solid beams that can support up to 5 floors.', 0);
-- Table structure for table `Complaints`
--

CREATE TABLE `Complaints` (
  `caseID` int NOT NULL,
  `UserID` int NOT NULL,
  `Password` varchar(40) NOT NULL,
  `UserDate` varchar(40) NOT NULL,
  `UserEmail` varchar(40) NOT NULL,
  `Category` varchar(40) NOT NULL,
  `UserSubject` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Complete` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Complaints`
--

INSERT INTO `Complaints` (`caseID`, `UserID`, `UserDate`, `UserEmail`, `Category`, `UserSubject`, `Complete`) VALUES
(2, 3454, '2022-03-10', 'lol@tgfufftu', 'JobPosting', 'hihihihihihihihhihihihihi', 0),
(3, 4333, '2022-03-10', 'ewefewfew@gfgdgd', 'Payments', 'sfdsfsdfdssfsdfsd', 0),
(4, 2234, '2022-03-10', 'fhhhhhhhfew@gfgdgd', 'Other', 'sfdsfsdfdssfsdfsd', 0),
(5, 3454, '2022-03-10', 'ewefewfew@gfgdgd', 'JobPosting', 'frefer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int NOT NULL,
  `Firstname` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Lastname` varchar(40) NOT NULL,
  `Email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Usertype` varchar(40) NOT NULL,
  `Auth` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `Firstname`, `Lastname`, `Email`, `Username`, `Usertype`, `Auth`) VALUES
(55, 'dsad', 'sada', 'asdads@dasas', 'asdass', 'Customer', -1),
(56, 'cscds', 'dcsc', 'cdscsdcsd@dcs', 'dcsdsfsdfd', 'Customer', 1),
(57, 'ewrew', 'fewfwf', 'fwfwfewf@fgrffdsf', 'fewfewe', 'Customer', -1),
(58, 'ewrew', 'fewfwf', 'fwfwfewf@fgrffdsf', 'fewfewe', 'Customer', -1),
(59, 'ewrew', 'fewfwf', 'fwfwfewf@fgrffdsf', 'fewfewe', 'Customer', -1),
(60, 'ewrew', 'fewfwf', 'fwfwfewf@fgrffdsf', 'fewfewe', 'Customer',  0),
(61, 'ewrew', 'fewfwf', 'fwfwfewf@fgrffdsf', 'fewfewe', 'Customer', -1),
(67, 'edcadc', 'ccds', 'dscs@fssdfdscsd', 'cdscsdsc', 'Customer', -1),
(68, 'edcadc', 'ccds', 'dscs@fssdfdscsd', 'cdscsdsc', 'Customer', 0),
(69, 'edcadc', 'ccds', 'dscs@fssdfdscsd', 'cdscsdsc', 'Customer', 0),
(70, 'Matt', 'dasas', 'lol@gmail.com', 'haha', 'Customer', 0),
(71, 'Matt', 'dasas', 'dasdsad@dsadas', 'haha', 'Customer', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Complaints`
--
ALTER TABLE `Complaints`
  ADD PRIMARY KEY (`caseID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Complaints`
--
ALTER TABLE `Complaints`
  MODIFY `caseID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
