-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2015 at 06:33 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student_housing`
--
CREATE DATABASE IF NOT EXISTS `student_housing` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `student_housing`;

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

DROP TABLE IF EXISTS `Address`;
CREATE TABLE IF NOT EXISTS `Address` (
  `addrID` varchar(20) NOT NULL,
  `street` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`addrID`, `street`, `city`, `zipcode`) VALUES
('address1', '633 Chappell Drive', 'Raleigh', 27606),
('address2', '100 Chappell Drive', 'Raleigh', 27606);

-- --------------------------------------------------------

--
-- Table structure for table `Apartment`
--

DROP TABLE IF EXISTS `Apartment`;
CREATE TABLE IF NOT EXISTS `Apartment` (
  `apartmentID` varchar(20) NOT NULL DEFAULT '',
  `addrID` varchar(20) NOT NULL,
  `noStud` int(11) DEFAULT NULL,
  `noBed` int(11) DEFAULT NULL,
  `noBath` int(11) DEFAULT NULL,
  `family` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Family`
--

DROP TABLE IF EXISTS `Family`;
CREATE TABLE IF NOT EXISTS `Family` (
  `name` varchar(50) NOT NULL DEFAULT '',
  `studentID` varchar(20) NOT NULL DEFAULT '',
  `dateOfBirth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Guest`
--

DROP TABLE IF EXISTS `Guest`;
CREATE TABLE IF NOT EXISTS `Guest` (
  `approvalID` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Guest_Request`
--

DROP TABLE IF EXISTS `Guest_Request`;
CREATE TABLE IF NOT EXISTS `Guest_Request` (
  `guestrequestID` varchar(20) NOT NULL DEFAULT '',
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Has_Options`
--

DROP TABLE IF EXISTS `Has_Options`;
CREATE TABLE IF NOT EXISTS `Has_Options` (
  `lotno` varchar(10) NOT NULL DEFAULT '',
  `housingID` varchar(20) NOT NULL DEFAULT '',
  `location` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Housing`
--

DROP TABLE IF EXISTS `Housing`;
CREATE TABLE IF NOT EXISTS `Housing` (
  `houseID` varchar(20) NOT NULL DEFAULT '',
  `addressID` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `available` int(1) DEFAULT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Housing`
--

INSERT INTO `Housing` (`houseID`, `addressID`, `name`, `telephone`, `available`, `type`) VALUES
('house1', 'address2', 'testHousing', 2147483647, 1, ''),
('housing1', 'address1', 'testHousing', 2147483647, 1, ''),
('housing2', 'address1', 'testHousing', 2147483647, 1, ''),
('housing3', 'address2', 'testHousing3', 2147483647, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `Housing_Staff`
--

DROP TABLE IF EXISTS `Housing_Staff`;
CREATE TABLE IF NOT EXISTS `Housing_Staff` (
  `staffID` varchar(20) NOT NULL DEFAULT '',
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `sex` char(10) DEFAULT NULL,
  `position` varchar(30) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  `addressID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Housing_Staff`
--

INSERT INTO `Housing_Staff` (`staffID`, `firstName`, `lastName`, `dateOfBirth`, `sex`, `position`, `location`, `addressID`) VALUES
('staff1', 'Akond', 'Rahman', '1987-08-26', 'M', 'Admin', 'Apartment', 'address1'),
('staff2', 'Asif', 'Rahman', '1987-08-26', 'M', 'Admin', 'Apartment', 'address2');

-- --------------------------------------------------------

--
-- Table structure for table `Kin`
--

DROP TABLE IF EXISTS `Kin`;
CREATE TABLE IF NOT EXISTS `Kin` (
  `studentID` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `relationship` varchar(20) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `addressID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Lease`
--

DROP TABLE IF EXISTS `Lease`;
CREATE TABLE IF NOT EXISTS `Lease` (
  `studentID` varchar(20) DEFAULT NULL,
  `placeID` varchar(20) DEFAULT NULL,
  `leaseID` varchar(20) NOT NULL DEFAULT '',
  `leaseDuration` int(11) DEFAULT NULL,
  `entrydate` date DEFAULT NULL,
  `exitDate` date DEFAULT NULL,
  `securityDeposit` int(11) DEFAULT NULL,
  `penalty` int(11) DEFAULT NULL,
  `cutOffDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Lease`
--

INSERT INTO `Lease` (`studentID`, `placeID`, `leaseID`, `leaseDuration`, `entrydate`, `exitDate`, `securityDeposit`, `penalty`, `cutOffDate`) VALUES
('peoplel1', 'place1', 'lease1', 5, '2015-01-01', '2015-02-01', 120, 50, '2015-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `Lease_Request`
--

DROP TABLE IF EXISTS `Lease_Request`;
CREATE TABLE IF NOT EXISTS `Lease_Request` (
  `LeaseRequestID` varchar(20) NOT NULL,
  `PeopleID` varchar(20) DEFAULT NULL,
  `PlaceID` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `rentalPeriod` int(11) DEFAULT NULL,
  `preference1` varchar(20) DEFAULT NULL,
  `preference2` varchar(20) DEFAULT NULL,
  `preference3` varchar(20) DEFAULT NULL,
  `paymentMode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Lease_Request`
--

INSERT INTO `Lease_Request` (`LeaseRequestID`, `PeopleID`, `PlaceID`, `status`, `startDate`, `rentalPeriod`, `preference1`, `preference2`, `preference3`, `paymentMode`) VALUES
('leaseRequest1', 'peoplel1', 'place1', 'blah blah', '2015-01-01', 100, 'prefernece1', 'prefernece1', 'prefernece1', 'checks'),
('leaseRequest2', 'peoplel1', 'place1', 'occupied', '2014-12-01', 100, 'apartmentA', 'apartmentB', 'apartmentC', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

DROP TABLE IF EXISTS `Login`;
CREATE TABLE IF NOT EXISTS `Login` (
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`username`, `password`) VALUES
('H123', 'h123'),
('H12345', 'h12345'),
('GX1234', 'gx1234');

-- --------------------------------------------------------

--
-- Table structure for table `Maintenance_Ticket`
--

DROP TABLE IF EXISTS `Maintenance_Ticket`;
CREATE TABLE IF NOT EXISTS `Maintenance_Ticket` (
  `ticketID` int(11) NOT NULL DEFAULT '0',
  `approvalStatus` varchar(20) DEFAULT NULL,
  `inspectionDate` date DEFAULT NULL,
  `damageCharges` int(11) DEFAULT NULL,
  `ticketStatus` varchar(20) DEFAULT NULL,
  `ticketSeverity` varchar(10) DEFAULT NULL,
  `ticketType` varchar(20) DEFAULT NULL,
  `studentID` varchar(20) DEFAULT NULL,
  `staffID` varchar(20) DEFAULT NULL,
  `houseID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Maintenance_Ticket`
--

INSERT INTO `Maintenance_Ticket` (`ticketID`, `approvalStatus`, `inspectionDate`, `damageCharges`, `ticketStatus`, `ticketSeverity`, `ticketType`, `studentID`, `staffID`, `houseID`) VALUES
(1, 'review', '2015-03-01', 100, 'pending', 'critical', 'bathroom', 'peoplel1', 'staff1', 'housing3'),
(2, 'pending', '2015-03-03', 25, 'waiting', 'normal', 'kitchen', 'peoplel1', 'staff1', 'housing1');

-- --------------------------------------------------------

--
-- Table structure for table `Nearby`
--

DROP TABLE IF EXISTS `Nearby`;
CREATE TABLE IF NOT EXISTS `Nearby` (
  `studentID` varchar(20) DEFAULT NULL,
  `lotID` varchar(20) DEFAULT NULL,
  `nearBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Parking_Lot`
--

DROP TABLE IF EXISTS `Parking_Lot`;
CREATE TABLE IF NOT EXISTS `Parking_Lot` (
  `lotno` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Parking_Permit`
--

DROP TABLE IF EXISTS `Parking_Permit`;
CREATE TABLE IF NOT EXISTS `Parking_Permit` (
  `permitID` varchar(20) NOT NULL,
  `peopleID` varchar(20) NOT NULL,
  `parkingRent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Parking_Permit`
--

INSERT INTO `Parking_Permit` (`permitID`, `peopleID`, `parkingRent`) VALUES
('permit1', 'peoplel1', 20),
('permit2', 'peoplel1', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Parking_Requests`
--

DROP TABLE IF EXISTS `Parking_Requests`;
CREATE TABLE IF NOT EXISTS `Parking_Requests` (
  `requestID` int(11) NOT NULL DEFAULT '0',
  `lotno` varchar(20) DEFAULT NULL,
  `spotno` varchar(20) DEFAULT NULL,
  `studentID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Parking_Requests`
--

INSERT INTO `Parking_Requests` (`requestID`, `lotno`, `spotno`, `studentID`) VALUES
(1, NULL, NULL, 'peoplel1');

-- --------------------------------------------------------

--
-- Table structure for table `Parking_Spot`
--

DROP TABLE IF EXISTS `Parking_Spot`;
CREATE TABLE IF NOT EXISTS `Parking_Spot` (
  `spotID` varchar(20) NOT NULL DEFAULT '',
  `lotID` varchar(10) DEFAULT NULL,
  `classification` varchar(20) DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Places`
--

DROP TABLE IF EXISTS `Places`;
CREATE TABLE IF NOT EXISTS `Places` (
  `placeID` varchar(20) NOT NULL DEFAULT '',
  `houseID` varchar(20) DEFAULT NULL,
  `monthlyRent` int(11) NOT NULL,
  `roomNo` int(11) DEFAULT NULL,
  `studentID` varchar(20) DEFAULT NULL,
  `occupied` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Places`
--

INSERT INTO `Places` (`placeID`, `houseID`, `monthlyRent`, `roomNo`, `studentID`, `occupied`) VALUES
('place1', 'housing1', 500, 1, 'peoplel1', 'occupied');

-- --------------------------------------------------------

--
-- Table structure for table `Private_Accommodation`
--

DROP TABLE IF EXISTS `Private_Accommodation`;
CREATE TABLE IF NOT EXISTS `Private_Accommodation` (
  `studentID` varchar(20) NOT NULL DEFAULT '',
  `address` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Request`
--

DROP TABLE IF EXISTS `Request`;
CREATE TABLE IF NOT EXISTS `Request` (
  `studentID` varchar(20) NOT NULL DEFAULT '',
  `LeaserequestID` varchar(20) NOT NULL DEFAULT '',
  `request_Type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Residence_Hall`
--

DROP TABLE IF EXISTS `Residence_Hall`;
CREATE TABLE IF NOT EXISTS `Residence_Hall` (
  `hallID` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(20) DEFAULT NULL,
  `addrID` varchar(20) NOT NULL,
  `telephoneNo` int(11) DEFAULT NULL,
  `hallManager` varchar(20) NOT NULL,
  `eligibility` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;
CREATE TABLE IF NOT EXISTS `Student` (
  `studentID` varchar(20) NOT NULL DEFAULT '',
  `category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`studentID`, `category`) VALUES
('peoplel1', 'undergrad');

-- --------------------------------------------------------

--
-- Table structure for table `Terminate_Request`
--

DROP TABLE IF EXISTS `Terminate_Request`;
CREATE TABLE IF NOT EXISTS `Terminate_Request` (
  `RequestID` varchar(20) NOT NULL DEFAULT '',
  `studentID` varchar(20) DEFAULT NULL,
  `placeID` varchar(20) DEFAULT NULL,
  `terminateDate` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `inspectionDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Terminate_Request`
--

INSERT INTO `Terminate_Request` (`RequestID`, `studentID`, `placeID`, `terminateDate`, `status`, `inspectionDate`) VALUES
('termRequest1', 'peoplel1', 'place1', '2015-03-15', 'inspected', '2015-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `Univ_People`
--

DROP TABLE IF EXISTS `Univ_People`;
CREATE TABLE IF NOT EXISTS `Univ_People` (
  `peopleID` varchar(20) NOT NULL DEFAULT '',
  `currentStatus` varchar(20) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `available` tinyint(1) DEFAULT NULL,
  `sex` char(10) DEFAULT NULL,
  `program` varchar(20) DEFAULT NULL,
  `specialNeeds` varchar(100) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `courseName` varchar(50) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `alternatePhone` int(11) DEFAULT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `additionalComments` varchar(20) DEFAULT NULL,
  `addressID` varchar(20) DEFAULT NULL,
  `housingID` varchar(20) DEFAULT NULL,
  `leaseID` varchar(20) DEFAULT NULL,
  `permitID` varchar(20) DEFAULT NULL,
  `smoker` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Univ_People`
--

INSERT INTO `Univ_People` (`peopleID`, `currentStatus`, `category`, `dateOfBirth`, `available`, `sex`, `program`, `specialNeeds`, `nationality`, `courseName`, `phone`, `alternatePhone`, `firstName`, `lastName`, `additionalComments`, `addressID`, `housingID`, `leaseID`, `permitID`, `smoker`) VALUES
('GX1234', 'approved', 'guest', '1988-08-26', 0, 'F', 'N/A', 'Disablilty', 'USA', 'N/A', 800134567, NULL, 'fGuest', 'lGuest', 'N/A', 'address2', NULL, NULL, NULL, ''),
('H12345', 'Admin', 'Housing', '2014-10-05', NULL, 'F', NULL, 'Smoker', 'Bangladeshi', NULL, 2147483647, NULL, 'Akond', 'Rahman', 'This is a housing ', 'address2', NULL, NULL, 'permit1', ''),
('peoplel1', 'waiting', '1', '2000-03-03', 1, 'F', 'Undergdauate', 'Nothing', 'American', 'CSC', 2147483647, 2147483647, 'xFName', 'xLName', 'Nothing', 'address1', 'housing1', NULL, NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
 ADD PRIMARY KEY (`addrID`);

--
-- Indexes for table `Apartment`
--
ALTER TABLE `Apartment`
 ADD PRIMARY KEY (`apartmentID`), ADD KEY `apartment_fk` (`addrID`);

--
-- Indexes for table `Family`
--
ALTER TABLE `Family`
 ADD PRIMARY KEY (`name`,`studentID`), ADD KEY `family_fk` (`studentID`);

--
-- Indexes for table `Guest`
--
ALTER TABLE `Guest`
 ADD PRIMARY KEY (`approvalID`);

--
-- Indexes for table `Guest_Request`
--
ALTER TABLE `Guest_Request`
 ADD PRIMARY KEY (`guestrequestID`);

--
-- Indexes for table `Has_Options`
--
ALTER TABLE `Has_Options`
 ADD PRIMARY KEY (`lotno`,`housingID`), ADD KEY `has_Option_fk2` (`housingID`);

--
-- Indexes for table `Housing`
--
ALTER TABLE `Housing`
 ADD PRIMARY KEY (`houseID`), ADD KEY `housing_fk` (`addressID`);

--
-- Indexes for table `Housing_Staff`
--
ALTER TABLE `Housing_Staff`
 ADD PRIMARY KEY (`staffID`), ADD KEY `housing_staff_address_fk` (`addressID`);

--
-- Indexes for table `Kin`
--
ALTER TABLE `Kin`
 ADD PRIMARY KEY (`studentID`,`name`), ADD KEY `kin_address_fk` (`addressID`);

--
-- Indexes for table `Lease`
--
ALTER TABLE `Lease`
 ADD PRIMARY KEY (`leaseID`), ADD KEY `Lease_fk1` (`studentID`), ADD KEY `Lease_fk2` (`placeID`);

--
-- Indexes for table `Lease_Request`
--
ALTER TABLE `Lease_Request`
 ADD PRIMARY KEY (`LeaseRequestID`), ADD KEY `lease_request_fk` (`PeopleID`);

--
-- Indexes for table `Maintenance_Ticket`
--
ALTER TABLE `Maintenance_Ticket`
 ADD PRIMARY KEY (`ticketID`), ADD KEY `maintenanceTicket_fk` (`studentID`), ADD KEY `maintenanceTicket_fk2` (`houseID`), ADD KEY `maintenanceTicket_fk3` (`staffID`);

--
-- Indexes for table `Nearby`
--
ALTER TABLE `Nearby`
 ADD KEY `nearby_fk1` (`studentID`), ADD KEY `nearby_fk2` (`lotID`);

--
-- Indexes for table `Parking_Lot`
--
ALTER TABLE `Parking_Lot`
 ADD PRIMARY KEY (`lotno`);

--
-- Indexes for table `Parking_Permit`
--
ALTER TABLE `Parking_Permit`
 ADD PRIMARY KEY (`permitID`), ADD KEY `Parking_Permit_People` (`peopleID`);

--
-- Indexes for table `Parking_Requests`
--
ALTER TABLE `Parking_Requests`
 ADD PRIMARY KEY (`requestID`), ADD KEY `parking_request_fk1` (`lotno`), ADD KEY `parking_request_fk2` (`spotno`), ADD KEY `parking_request_fk3` (`studentID`);

--
-- Indexes for table `Parking_Spot`
--
ALTER TABLE `Parking_Spot`
 ADD PRIMARY KEY (`spotID`), ADD KEY `parking_spot_fk1` (`lotID`);

--
-- Indexes for table `Places`
--
ALTER TABLE `Places`
 ADD PRIMARY KEY (`placeID`), ADD KEY `places_fk` (`houseID`), ADD KEY `places_fk2` (`studentID`);

--
-- Indexes for table `Private_Accommodation`
--
ALTER TABLE `Private_Accommodation`
 ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `Request`
--
ALTER TABLE `Request`
 ADD PRIMARY KEY (`studentID`,`LeaserequestID`), ADD KEY `Request_fk2` (`LeaserequestID`);

--
-- Indexes for table `Residence_Hall`
--
ALTER TABLE `Residence_Hall`
 ADD PRIMARY KEY (`hallID`), ADD KEY `residence_fk2` (`addrID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
 ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `Terminate_Request`
--
ALTER TABLE `Terminate_Request`
 ADD PRIMARY KEY (`RequestID`), ADD KEY `Terminate_Request_fk1` (`studentID`), ADD KEY `Terminate_Request_fk2` (`placeID`);

--
-- Indexes for table `Univ_People`
--
ALTER TABLE `Univ_People`
 ADD PRIMARY KEY (`peopleID`), ADD KEY `univ_people_address_fk` (`addressID`), ADD KEY `univ_people_permit_fk` (`permitID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Apartment`
--
ALTER TABLE `Apartment`
ADD CONSTRAINT `apartment_fk` FOREIGN KEY (`addrID`) REFERENCES `Address` (`addrID`);

--
-- Constraints for table `Family`
--
ALTER TABLE `Family`
ADD CONSTRAINT `family_fk` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`);

--
-- Constraints for table `Guest`
--
ALTER TABLE `Guest`
ADD CONSTRAINT `guest_fk` FOREIGN KEY (`approvalID`) REFERENCES `Univ_People` (`peopleID`);

--
-- Constraints for table `Has_Options`
--
ALTER TABLE `Has_Options`
ADD CONSTRAINT `has_Option_fk1` FOREIGN KEY (`lotno`) REFERENCES `parking_lot` (`lotno`),
ADD CONSTRAINT `has_Option_fk2` FOREIGN KEY (`housingID`) REFERENCES `Housing` (`houseID`);

--
-- Constraints for table `Housing`
--
ALTER TABLE `Housing`
ADD CONSTRAINT `housing_fk` FOREIGN KEY (`addressID`) REFERENCES `Address` (`addrID`);

--
-- Constraints for table `Housing_Staff`
--
ALTER TABLE `Housing_Staff`
ADD CONSTRAINT `housing_staff_address_fk` FOREIGN KEY (`addressID`) REFERENCES `Address` (`addrID`);

--
-- Constraints for table `Kin`
--
ALTER TABLE `Kin`
ADD CONSTRAINT `kin_address_fk` FOREIGN KEY (`addressID`) REFERENCES `Address` (`addrID`),
ADD CONSTRAINT `kin_student_fk` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`);

--
-- Constraints for table `Lease`
--
ALTER TABLE `Lease`
ADD CONSTRAINT `Lease_fk1` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`),
ADD CONSTRAINT `Lease_fk2` FOREIGN KEY (`placeID`) REFERENCES `Places` (`placeID`);

--
-- Constraints for table `Lease_Request`
--
ALTER TABLE `Lease_Request`
ADD CONSTRAINT `lease_request_fk` FOREIGN KEY (`PeopleID`) REFERENCES `Univ_People` (`peopleID`);

--
-- Constraints for table `Maintenance_Ticket`
--
ALTER TABLE `Maintenance_Ticket`
ADD CONSTRAINT `maintenanceTicket_fk` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`),
ADD CONSTRAINT `maintenanceTicket_fk2` FOREIGN KEY (`houseID`) REFERENCES `Housing` (`houseID`),
ADD CONSTRAINT `maintenanceTicket_fk3` FOREIGN KEY (`staffID`) REFERENCES `Housing_Staff` (`staffID`);

--
-- Constraints for table `Nearby`
--
ALTER TABLE `Nearby`
ADD CONSTRAINT `nearby_fk1` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`),
ADD CONSTRAINT `nearby_fk2` FOREIGN KEY (`lotID`) REFERENCES `Parking_Lot` (`lotno`);

--
-- Constraints for table `Parking_Permit`
--
ALTER TABLE `Parking_Permit`
ADD CONSTRAINT `Parking_Permit_People` FOREIGN KEY (`peopleID`) REFERENCES `Univ_People` (`peopleID`);

--
-- Constraints for table `Parking_Requests`
--
ALTER TABLE `Parking_Requests`
ADD CONSTRAINT `parking_request_fk1` FOREIGN KEY (`lotno`) REFERENCES `Parking_Lot` (`lotno`),
ADD CONSTRAINT `parking_request_fk2` FOREIGN KEY (`spotno`) REFERENCES `Parking_Spot` (`spotID`),
ADD CONSTRAINT `parking_request_fk3` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`);

--
-- Constraints for table `Parking_Spot`
--
ALTER TABLE `Parking_Spot`
ADD CONSTRAINT `parking_spot_fk1` FOREIGN KEY (`lotID`) REFERENCES `Parking_Lot` (`lotno`);

--
-- Constraints for table `Places`
--
ALTER TABLE `Places`
ADD CONSTRAINT `places_fk` FOREIGN KEY (`houseID`) REFERENCES `Housing` (`houseID`),
ADD CONSTRAINT `places_fk2` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`);

--
-- Constraints for table `Private_Accommodation`
--
ALTER TABLE `Private_Accommodation`
ADD CONSTRAINT `pvtacco_fk` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`);

--
-- Constraints for table `Request`
--
ALTER TABLE `Request`
ADD CONSTRAINT `Request_fk1` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`),
ADD CONSTRAINT `Request_fk2` FOREIGN KEY (`LeaserequestID`) REFERENCES `Lease_Request` (`LeaseRequestID`);

--
-- Constraints for table `Residence_Hall`
--
ALTER TABLE `Residence_Hall`
ADD CONSTRAINT `residence_fk` FOREIGN KEY (`hallID`) REFERENCES `Housing` (`houseID`),
ADD CONSTRAINT `residence_fk2` FOREIGN KEY (`addrID`) REFERENCES `Address` (`addrID`);

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
ADD CONSTRAINT `student_fk` FOREIGN KEY (`studentID`) REFERENCES `Univ_People` (`peopleID`);

--
-- Constraints for table `Terminate_Request`
--
ALTER TABLE `Terminate_Request`
ADD CONSTRAINT `Terminate_Request_fk1` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`),
ADD CONSTRAINT `Terminate_Request_fk2` FOREIGN KEY (`placeID`) REFERENCES `Places` (`placeID`);

--
-- Constraints for table `Univ_People`
--
ALTER TABLE `Univ_People`
ADD CONSTRAINT `univ_people_address_fk` FOREIGN KEY (`addressID`) REFERENCES `Address` (`addrID`),
ADD CONSTRAINT `univ_people_permit_fk` FOREIGN KEY (`permitID`) REFERENCES `Parking_Permit` (`permitID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
