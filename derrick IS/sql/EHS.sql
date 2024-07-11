-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2023 at 08:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EHS`
--
CREATE DATABASE IF NOT EXISTS `EHS` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `EHS`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(50) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `phoneNo`, `email`, `password`) VALUES
(1, 'Peter Pan', 725489657, 'pan@ehs.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86'),
(2, 'Wendy Williams', 725489657, 'wendy@ehs.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE IF NOT EXISTS `diagnosis` (
  `diagnosisID` int(11) NOT NULL AUTO_INCREMENT,
  `docID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `diagnosisDate` date NOT NULL,
  `diagnosis` text NOT NULL,
  PRIMARY KEY (`diagnosisID`),
  KEY `docIDX` (`docID`),
  KEY `patientIDX` (`patientID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosisID`, `docID`, `patientID`, `diagnosisDate`, `diagnosis`) VALUES
(1, 3, 1, '2023-11-27', 'Patient needs to do a blood test for further diagnosis.'),
(2, 1, 1, '2023-11-27', 'The patient will require to have an MRI.');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `docID` int(11) NOT NULL AUTO_INCREMENT,
  `docName` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `phoneNo` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`docID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`docID`, `docName`, `type`, `phoneNo`, `email`, `password`) VALUES
(1, 'Tim Horton', 'Paediatrician', 725986321, 'tim@ehs.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86'),
(2, 'Peter Smith', 'Surgeon', 786951753, 'peter@ehs.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86'),
(3, 'John Doe', 'Surgeon', 753612487, 'john@ehs.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86');

-- --------------------------------------------------------

--
-- Table structure for table `labtest`
--

CREATE TABLE IF NOT EXISTS `labtest` (
  `testID` int(11) NOT NULL AUTO_INCREMENT,
  `patientID` int(11) NOT NULL,
  `technicianID` int(11) NOT NULL,
  `docID` int(11) NOT NULL,
  `testName` varchar(50) NOT NULL,
  `scheduledDate` date NOT NULL,
  PRIMARY KEY (`testID`),
  KEY `patientIDX` (`patientID`),
  KEY `technicianIDX` (`technicianID`),
  KEY `docIDX` (`docID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `labtest`
--

INSERT INTO `labtest` (`testID`, `patientID`, `technicianID`, `docID`, `testName`, `scheduledDate`) VALUES
(1, 1, 1, 3, 'Urine Blood Count', '2023-11-28'),
(2, 1, 1, 1, 'Urine Test', '2023-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE IF NOT EXISTS `nurses` (
  `nurseID` int(11) NOT NULL AUTO_INCREMENT,
  `nurseName` varchar(50) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`nurseID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`nurseID`, `nurseName`, `phoneNo`, `email`, `password`) VALUES
(1, 'Nancy Micheals', 736951753, 'nancy@ehs.com', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff'),
(2, 'Charles Jones', 715326984, 'charles@ehs.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patientID` int(11) NOT NULL AUTO_INCREMENT,
  `patientName` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `DoB` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`patientID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `patientName`, `age`, `DoB`, `gender`, `phoneNo`, `email`) VALUES
(1, 'Mike Lu', 23, '2000-05-12', 'male', 752369874, 'mike@gmail.com'),
(2, 'Jane Duff', 20, '2003-06-25', 'female', 711556683, 'jane@gmail.com'),
(3, 'Sam Johnson', 30, '1993-04-16', 'male', 738456217, 'sam@gmail.com'),
(4, 'Sam Tracy', 27, '1996-02-29', 'male', 758476398, 'tracy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patientappointments`
--

CREATE TABLE IF NOT EXISTS `patientappointments` (
  `assignID` int(11) NOT NULL AUTO_INCREMENT,
  `nurseID` int(11) NOT NULL,
  `docID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `appointmentDate` date NOT NULL,
  PRIMARY KEY (`assignID`),
  KEY `nurseIDX` (`nurseID`),
  KEY `docIDX` (`docID`),
  KEY `patientIDX` (`patientID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patientappointments`
--

INSERT INTO `patientappointments` (`assignID`, `nurseID`, `docID`, `patientID`, `appointmentDate`) VALUES
(1, 2, 2, 1, '2023-11-27'),
(2, 1, 3, 1, '2023-11-29'),
(3, 1, 1, 1, '2023-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE IF NOT EXISTS `prescriptions` (
  `prescriptionID` int(11) NOT NULL AUTO_INCREMENT,
  `docID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `drug` varchar(50) NOT NULL,
  `prescriptionDate` date NOT NULL,
  `instructions` text NOT NULL,
  PRIMARY KEY (`prescriptionID`),
  KEY `docIDX` (`docID`),
  KEY `patientIDX` (`patientID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`prescriptionID`, `docID`, `patientID`, `drug`, `prescriptionDate`, `instructions`) VALUES
(1, 2, 1, 'Aspirin', '2023-11-27', 'Take 2 pills twice a day. Morning and evening. After meals.'),
(2, 1, 1, 'Amoxcillin', '2023-11-27', 'Take 1 pill thrice a day. Before meals');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `recordID` int(11) NOT NULL AUTO_INCREMENT,
  `patientID` int(11) NOT NULL,
  `allergies` varchar(50) NOT NULL,
  `immunizationStatus` varchar(5) NOT NULL,
  PRIMARY KEY (`recordID`),
  KEY `patientIDX` (`patientID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`recordID`, `patientID`, `allergies`, `immunizationStatus`) VALUES
(1, 1, 'Sulfur', 'No'),
(2, 1, 'Peanut Butter', 'Yes'),
(3, 1, 'Pollen', 'Yes'),
(4, 1, 'Sesame', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE IF NOT EXISTS `technician` (
  `techID` int(11) NOT NULL AUTO_INCREMENT,
  `technicianName` varchar(50) NOT NULL,
  `role` varchar(15) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`techID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`techID`, `technicianName`, `role`, `phoneNo`, `email`) VALUES
(1, 'Mark John', 'Urologist', 762854632, 'mark@ehs.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD CONSTRAINT `diagnosis_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diagnosis_ibfk_2` FOREIGN KEY (`docID`) REFERENCES `doctors` (`docID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `labtest`
--
ALTER TABLE `labtest`
  ADD CONSTRAINT `labtest_ibfk_1` FOREIGN KEY (`technicianID`) REFERENCES `technician` (`techID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labtest_ibfk_2` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labtest_ibfk_3` FOREIGN KEY (`docID`) REFERENCES `doctors` (`docID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patientappointments`
--
ALTER TABLE `patientappointments`
  ADD CONSTRAINT `patientappointments_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patientappointments_ibfk_2` FOREIGN KEY (`docID`) REFERENCES `doctors` (`docID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patientappointments_ibfk_3` FOREIGN KEY (`nurseID`) REFERENCES `nurses` (`nurseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescriptions_ibfk_3` FOREIGN KEY (`docID`) REFERENCES `doctors` (`docID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
