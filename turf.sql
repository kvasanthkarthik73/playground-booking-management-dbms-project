-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 01:00 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turf`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getbill` (IN `bdate` VARCHAR(10))   BEGIN
SELECT * FROM invoice WHERE booking_date = bdate;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `findcid` (`cname` VARCHAR(20)) RETURNS INT(11)  BEGIN

   DECLARE done INT DEFAULT FALSE;
   DECLARE siteID INT DEFAULT 0;

   DECLARE c1 CURSOR FOR
     SELECT c_id
     FROM customer
     WHERE c_name=cname;

   DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
	OPEN c1;
   FETCH c1 INTO siteID;
	CLOSE c1;
	RETURN siteID;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', 'admin2'),
(3, 'ADMIN3', 'admin3');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `email`) VALUES
(1, 'vasanth', 'karthik9122002@gmail'),
(2, 'vasanthhk', 'ka102@gmail.com'),
(3, 'jarus', 'ka1r02@gmail.com'),
(4, 'tate', 'ka1r02tate@gmail.com'),
(5, 'patrick', 'bateman@gmail.com'),
(6, 'patrickbate', 'batemanpa@gmail.com'),
(7, 'patrickbateee', 'batemanpat@gmail.com'),
(8, 'pratham', 'prathamhegde8@gmail.'),
(9, 'pratham', 'prathamhegde8@gmail.'),
(10, 'anne', 'anne@gmail.com'),
(11, 'aayush', 'aayush8@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `billing_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 2000,
  `booking_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`billing_id`, `slot_id`, `c_id`, `price`, `booking_date`) VALUES
(7, 1, 1, 2000, '12/02/2002'),
(8, 2, 2, 2000, '12/04/2023'),
(9, 24, 3, 2000, '12/05/2023'),
(10, 12, 4, 2000, '15/05/2023'),
(11, 11, 5, 2000, '25/05/2023'),
(12, 13, 6, 2000, '25/05/2023'),
(13, 16, 7, 2000, '25/05/2023'),
(14, 627, 9, 0, '17/04/2023'),
(15, 69, 10, 2000, '12/04/2023'),
(16, 45, 11, 2000, '25/05/2023');

-- --------------------------------------------------------

--
-- Table structure for table `playg`
--

CREATE TABLE `playg` (
  `p_name` varchar(10) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playg`
--

INSERT INTO `playg` (`p_name`, `p_id`) VALUES
('jarus', 16),
('jaruspk', 31);

--
-- Triggers `playg`
--
DELIMITER $$
CREATE TRIGGER `play_gro` BEFORE INSERT ON `playg` FOR EACH ROW BEGIN  
    DECLARE error_msg VARCHAR(255);  
    SET error_msg = ('THE PLAYGROUND ID CANNOT BE GREATER THAN 35');  
    IF new.p_id>35 THEN  
    SIGNAL SQLSTATE '45000'   
    SET MESSAGE_TEXT = error_msg;  
    END IF;  
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slot_id` int(11) NOT NULL,
  `booking_date` varchar(10) NOT NULL,
  `st_t` varchar(10) NOT NULL,
  `end_t` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slot_id`, `booking_date`, `st_t`, `end_t`) VALUES
(1, '12/02/2002', '10:50', '11:45'),
(2, '12/04/2023', '10:50', '11:50'),
(11, '25/05/2023', '12:50', '03:50'),
(12, '15/05/2023', '10:50', '11:50'),
(13, '25/05/2023', '12:50', '03:50'),
(16, '25/05/2023', '12:50', '03:50'),
(24, '12/05/2023', '10:50', '11:50'),
(45, '25/05/2023', '12:50', '11:45'),
(67, '17/04/2023', '10:50', '03:50'),
(69, '12/04/2023', '10:50', '11:50'),
(627, '17/04/2023', '10:50', '03:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`billing_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `slot_id` (`slot_id`);

--
-- Indexes for table `playg`
--
ALTER TABLE `playg`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `playg`
--
ALTER TABLE `playg`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `c_id` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slot_id` FOREIGN KEY (`slot_id`) REFERENCES `slot` (`slot_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
