-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 11:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makemyday`
--

-- --------------------------------------------------------

--
-- Table structure for table `aream`
--

CREATE TABLE `aream` (
  `areaid` int(11) NOT NULL,
  `areaname` varchar(25) NOT NULL,
  `cityid` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aream`
--

INSERT INTO `aream` (`areaid`, `areaname`, `cityid`, `isactive`) VALUES
(1, 'Vastrapur', 1, 1),
(2, 'Navrangpura', 1, 1),
(3, 'Bapunagar', 1, 1),
(4, 'Varacchha', 2, 1),
(5, 'Kamrej Chokdi', 2, 1),
(6, 'Kalyan', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categorym`
--

CREATE TABLE `categorym` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(30) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorym`
--

INSERT INTO `categorym` (`categoryid`, `categoryname`, `isactive`) VALUES
(1, 'Mobile', 1),
(2, 'Electronics', 1),
(3, 'Cloths', 0),
(4, 'clothes', 1),
(5, 'Abc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `citym`
--

CREATE TABLE `citym` (
  `cityid` int(11) NOT NULL,
  `cityname` varchar(25) NOT NULL,
  `stateid` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citym`
--

INSERT INTO `citym` (`cityid`, `cityname`, `stateid`, `isactive`) VALUES
(1, 'Ahmedabad', 1, 1),
(2, 'Surat', 1, 1),
(3, 'Mumbai', 2, 1),
(4, 'Pune', 2, 1),
(5, 'Jaipur', 5, 1),
(6, 'Kota', 5, 1),
(7, 'Baroda', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `countrym`
--

CREATE TABLE `countrym` (
  `countryid` int(11) NOT NULL,
  `countryname` varchar(25) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countrym`
--

INSERT INTO `countrym` (`countryid`, `countryname`, `isactive`) VALUES
(1, 'India', 1),
(2, 'USA', 1),
(3, 'Japan', 1),
(4, 'China', 1),
(5, 'Australia', 1),
(6, 'Canada', 1),
(7, 'Pakistani', 0),
(8, 'UAE', 1),
(9, 'Shrilanka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallerym`
--

CREATE TABLE `gallerym` (
  `galleryid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `path` varchar(150) NOT NULL,
  `userid` int(11) NOT NULL,
  `isactive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productm`
--

CREATE TABLE `productm` (
  `productid` int(11) NOT NULL,
  `poductname` text NOT NULL,
  `subcategoryid` int(11) NOT NULL,
  `productbrand` text NOT NULL,
  `price` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `priceunit` int(11) NOT NULL,
  `productdecription` varchar(150) NOT NULL,
  `userid` int(11) NOT NULL,
  `isactive` bit(1) NOT NULL DEFAULT b'1',
  `tag` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productm`
--

INSERT INTO `productm` (`productid`, `poductname`, `subcategoryid`, `productbrand`, `price`, `tax`, `priceunit`, `productdecription`, `userid`, `isactive`, `tag`) VALUES
(1, 'Mi phone', 1, 'MI', 10000, 5, 2, 'Nice phone', 1, b'1', '');

-- --------------------------------------------------------

--
-- Table structure for table `statem`
--

CREATE TABLE `statem` (
  `stateid` int(11) NOT NULL,
  `statename` varchar(20) NOT NULL,
  `countryid` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statem`
--

INSERT INTO `statem` (`stateid`, `statename`, `countryid`, `isactive`) VALUES
(1, 'Gujarat', 1, 1),
(2, 'Maharashtra', 1, 1),
(3, 'Melbourne', 5, 1),
(4, 'Delhi', 1, 1),
(5, 'Rajasthan', 1, 1),
(6, 'California', 2, 0),
(7, 'Asam', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategorym`
--

CREATE TABLE `subcategorym` (
  `subcategoryid` int(11) NOT NULL,
  `subcategoryname` varchar(30) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategorym`
--

INSERT INTO `subcategorym` (`subcategoryid`, `subcategoryname`, `categoryid`, `isactive`) VALUES
(1, 'MI', 1, 1),
(2, 'OPPO', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userm`
--

CREATE TABLE `userm` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` enum('Male','Female','Other','') NOT NULL,
  `dateofbirth` date NOT NULL,
  `contactno` bigint(20) NOT NULL,
  `alternateno` bigint(20) DEFAULT NULL,
  `emailid` varchar(50) NOT NULL,
  `addressline1` varchar(100) NOT NULL,
  `addressline2` varchar(100) NOT NULL,
  `road` text NOT NULL,
  `landmark` text NOT NULL,
  `cityid` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `password` varchar(10) NOT NULL,
  `usertype` text NOT NULL,
  `userphoto` varchar(20) DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userm`
--

INSERT INTO `userm` (`userid`, `firstname`, `middlename`, `lastname`, `gender`, `dateofbirth`, `contactno`, `alternateno`, `emailid`, `addressline1`, `addressline2`, `road`, `landmark`, `cityid`, `pincode`, `password`, `usertype`, `userphoto`, `isactive`) VALUES
(1, 'Parth', 'Devendrakumar', 'Joshi', 'Male', '1993-07-26', 8460014041, 8160901481, 'parthjoshi2050@gmail.com', '20-Siddhivinayak Elegance, Near Jain Derasar, Behind DVP School', 'Sarkhej - Dholka Road, Gujarat State Highway 4', 'Sarkhej- Dholka Road', 'Nana Chapra, Kasindra', 1, 382210, 'helloworld', 'Admin', 'parth.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aream`
--
ALTER TABLE `aream`
  ADD PRIMARY KEY (`areaid`);

--
-- Indexes for table `categorym`
--
ALTER TABLE `categorym`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `citym`
--
ALTER TABLE `citym`
  ADD PRIMARY KEY (`cityid`);

--
-- Indexes for table `countrym`
--
ALTER TABLE `countrym`
  ADD PRIMARY KEY (`countryid`);

--
-- Indexes for table `gallerym`
--
ALTER TABLE `gallerym`
  ADD PRIMARY KEY (`galleryid`);

--
-- Indexes for table `productm`
--
ALTER TABLE `productm`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `statem`
--
ALTER TABLE `statem`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `subcategorym`
--
ALTER TABLE `subcategorym`
  ADD PRIMARY KEY (`subcategoryid`);

--
-- Indexes for table `userm`
--
ALTER TABLE `userm`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aream`
--
ALTER TABLE `aream`
  MODIFY `areaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categorym`
--
ALTER TABLE `categorym`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `citym`
--
ALTER TABLE `citym`
  MODIFY `cityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countrym`
--
ALTER TABLE `countrym`
  MODIFY `countryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallerym`
--
ALTER TABLE `gallerym`
  MODIFY `galleryid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productm`
--
ALTER TABLE `productm`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statem`
--
ALTER TABLE `statem`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subcategorym`
--
ALTER TABLE `subcategorym`
  MODIFY `subcategoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userm`
--
ALTER TABLE `userm`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
