-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 12:53 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_prod` (IN `pid` INT, IN `date` DATE, IN `qty` INT, IN `wid` INT)  NO SQL
insert into prod_in (PID,DATE_IN,QNTY_IN,WID) values(pid,date,qty,wid)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `USR_NME` varchar(20) NOT NULL,
  `PSS_WRD` varchar(20) NOT NULL,
  `NAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`USR_NME`, `PSS_WRD`, `NAME`) VALUES
('manager1', 'manager1', 'abhi'),
('manager2', 'manager2', 'raju'),
('manager3', 'manager3', 'suhas');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `MID` int(10) NOT NULL,
  `MMOB` int(20) NOT NULL,
  `MNAME` varchar(20) NOT NULL,
  `MCOUNTRY` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`MID`, `MMOB`, `MNAME`, `MCOUNTRY`) VALUES
(11, 123, 'cj', 'india');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PID` int(10) NOT NULL,
  `PNAME` varchar(20) NOT NULL,
  `PRICE` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PID`, `PNAME`, `PRICE`) VALUES
(1, 'PROD1', 100),
(2, 'PROD2', 50),
(3, 'PROD3', 200),
(4, 'PROD4', 200),
(5, 'PROD5', 25),
(6, 'prod6', 253);

-- --------------------------------------------------------

--
-- Table structure for table `prod_in`
--

CREATE TABLE `prod_in` (
  `PID` int(20) NOT NULL,
  `DATE_IN` date NOT NULL,
  `QNTY_IN` int(20) NOT NULL,
  `WID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_in`
--

INSERT INTO `prod_in` (`PID`, `DATE_IN`, `QNTY_IN`, `WID`) VALUES
(1, '2017-10-10', 12, 101),
(2, '2017-11-11', 20, 101),
(1, '2012-10-10', 100, 102),
(1, '2017-05-05', 120, 103),
(2, '2017-12-12', 250, 102),
(3, '2017-05-05', 250, 103),
(3, '2017-12-01', 100, 101),
(2, '2017-02-05', 300, 101),
(2, '2017-10-10', 200, 103),
(5, '2017-12-05', 500, 101),
(4, '2017-10-10', 250, 101),
(2, '2016-10-10', 250, 102),
(1, '2013-11-11', 3, 101);

-- --------------------------------------------------------

--
-- Table structure for table `prod_info`
--

CREATE TABLE `prod_info` (
  `PID` int(20) NOT NULL,
  `WID` int(20) NOT NULL,
  `PQNTY` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_info`
--

INSERT INTO `prod_info` (`PID`, `WID`, `PQNTY`) VALUES
(1, 101, 77),
(1, 102, 100),
(1, 103, 120),
(2, 101, 330),
(2, 102, 400),
(2, 103, 200),
(3, 101, 100),
(3, 103, 250),
(4, 101, 250),
(5, 101, 400);

-- --------------------------------------------------------

--
-- Table structure for table `prod_out`
--

CREATE TABLE `prod_out` (
  `PID` int(11) NOT NULL,
  `DATE_OUT` date NOT NULL,
  `QNTY_OUT` int(11) NOT NULL,
  `WID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_out`
--

INSERT INTO `prod_out` (`PID`, `DATE_OUT`, `QNTY_OUT`, `WID`) VALUES
(1, '2017-10-10', 20, 101),
(2, '2017-10-10', 10, 101),
(5, '2017-10-10', 100, 101),
(2, '2017-10-10', 100, 102);

--
-- Triggers `prod_out`
--
DELIMITER $$
CREATE TRIGGER `oos` BEFORE INSERT ON `prod_out` FOR EACH ROW BEGIN
IF new.QNTY_OUT > (SELECT PQNTY from prod_info where PID=new.PID and WID=new.WID) OR new.PID NOT IN ((SELECT PID from prod_info where WID=new.WID))
THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Product out of stock!";
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `WID` int(10) NOT NULL,
  `WCITY` varchar(20) NOT NULL,
  `WCOUNTRY` varchar(20) NOT NULL,
  `WMOB` int(20) NOT NULL,
  `MANAGER` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`WID`, `WCITY`, `WCOUNTRY`, `WMOB`, `MANAGER`) VALUES
(101, 'mys', 'india', 789, 'manager1'),
(102, 'bengaluru', 'india', 12345896, 'manager2'),
(103, 'chennai', 'india', 145879652, 'manager3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`USR_NME`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`MID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `prod_in`
--
ALTER TABLE `prod_in`
  ADD KEY `PID` (`PID`),
  ADD KEY `WID` (`WID`);

--
-- Indexes for table `prod_info`
--
ALTER TABLE `prod_info`
  ADD PRIMARY KEY (`PID`,`WID`),
  ADD KEY `WID` (`WID`);

--
-- Indexes for table `prod_out`
--
ALTER TABLE `prod_out`
  ADD KEY `WID` (`WID`),
  ADD KEY `PID` (`PID`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`WID`),
  ADD KEY `MANAGER` (`MANAGER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prod_in`
--
ALTER TABLE `prod_in`
  ADD CONSTRAINT `prod_in_ibfk_3` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`),
  ADD CONSTRAINT `prod_in_ibfk_4` FOREIGN KEY (`WID`) REFERENCES `warehouse` (`WID`);

--
-- Constraints for table `prod_info`
--
ALTER TABLE `prod_info`
  ADD CONSTRAINT `prod_info_ibfk_3` FOREIGN KEY (`WID`) REFERENCES `warehouse` (`WID`),
  ADD CONSTRAINT `prod_info_ibfk_4` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`);

--
-- Constraints for table `prod_out`
--
ALTER TABLE `prod_out`
  ADD CONSTRAINT `prod_out_ibfk_2` FOREIGN KEY (`WID`) REFERENCES `warehouse` (`WID`),
  ADD CONSTRAINT `prod_out_ibfk_3` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`);

--
-- Constraints for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD CONSTRAINT `warehouse_ibfk_1` FOREIGN KEY (`MANAGER`) REFERENCES `login` (`USR_NME`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
