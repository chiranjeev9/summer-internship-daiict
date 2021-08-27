-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2020 at 06:56 AM
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
(6, 'Kalyan', 3, 0),
(7, 'sarkhej', 1, 1),
(8, 'sarkhej', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cartm`
--

CREATE TABLE `cartm` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartm`
--

INSERT INTO `cartm` (`cartid`, `userid`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cartt`
--

CREATE TABLE `cartt` (
  `carttid` int(11) NOT NULL,
  `cartid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `cartdatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cartt`
--

INSERT INTO `cartt` (`carttid`, `cartid`, `productid`, `qty`, `total`, `cartdatetime`) VALUES
(4, 1, 1, 1, 15000, '2020-03-06 08:06:49'),
(5, 1, 1, 1, 15000, '2020-03-06 08:07:11'),
(6, 1, 3, 1, 500, '2020-03-06 08:07:37'),
(7, 1, 1, 1, 15000, '2020-03-06 09:25:32'),
(8, 1, 2, 1, 35000, '2020-03-06 09:28:36'),
(9, 1, 1, 2, 30000, '2020-03-07 07:27:56'),
(10, 1, 1, 1, 15000, '2020-03-08 12:08:24');

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
(1, 'Clothing', 1),
(2, 'Jewellery', 1),
(3, 'Shoes', 1),
(4, 'Eyewear', 1),
(5, 'Accessories', 1),
(6, 'Watches', 1),
(7, 'Handbags', 1),
(8, 'Electronics', 1),
(9, 'Artifacts', 1);

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
(1, 'India', 0),
(2, 'USA', 1),
(3, 'Japan', 1),
(4, 'China', 0),
(5, 'Australia', 1),
(6, 'Canada', 1),
(7, 'Pakistani', 0),
(8, 'UAE', 1),
(9, 'Shrilanka', 1),
(10, 'Afghan', 1),
(11, 'Pak', 0),
(12, 'Afghan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `eventm`
--

CREATE TABLE `eventm` (
  `eventid` int(11) NOT NULL,
  `occationid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `occationdatetime` text NOT NULL,
  `occationtype` text DEFAULT NULL,
  `inviteemail` mediumtext NOT NULL,
  `isexpired` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventm`
--

INSERT INTO `eventm` (`eventid`, `occationid`, `userid`, `occationdatetime`, `occationtype`, `inviteemail`, `isexpired`) VALUES
(1, 1, 3, '2020-03-27', '', 'parthjoshi2050@gmail.com, amanmehta.am11@gmail.com, panchalumang267@gmail.com', b'1'),
(2, 1, 1, '2020-07-26', '', 'panchalumang267@gmail.com', b'1'),
(3, 1, 1, '2020-07-26', '', 'panchalumang267@gmail.com', b'1'),
(4, 1, 3, '2020-02-26', '', 'panchalumang267@gmail.com', b'1'),
(5, 1, 3, '2020-02-26', '', 'parthjoshi2050@gmail.com , amanmehta.am11@gmail.com', b'1'),
(6, 1, 3, '2020-02-26', '', 'panchalumang2672000@gmail.com', b'1'),
(7, 1, 3, '2020-07-26', '', 'panchalumang2672000@gmail.com', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `eventt`
--

CREATE TABLE `eventt` (
  `eventtid` int(11) NOT NULL,
  `eventid` int(11) NOT NULL,
  `wishlisttid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventt`
--

INSERT INTO `eventt` (`eventtid`, `eventid`, `wishlisttid`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 4, 3),
(5, 4, 4),
(6, 4, 3),
(7, 4, 4),
(8, 4, 3),
(9, 4, 4),
(10, 4, 5),
(11, 7, 3),
(12, 7, 4),
(13, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `gallerym`
--

CREATE TABLE `gallerym` (
  `photoid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `imagepath` varchar(150) NOT NULL,
  `imagetitle` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `isactive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallerym`
--

INSERT INTO `gallerym` (`photoid`, `productid`, `imagepath`, `imagetitle`, `userid`, `isactive`) VALUES
(1, 1, '690_LAVA IRIS PRO_Main.jpg', 'Main', 1, b'1'),
(2, 1, '713_LAVA IRIS PRO_Front.jpg', 'Front', 1, b'1'),
(3, 1, '694_LAVA IRIS PRO_Back.jpg', 'Back', 1, b'1'),
(4, 2, '775_Sony Xperia XA Smart Watch_Main.jpg', 'Main', 1, b'1'),
(5, 3, '536_Jeans_Main.jpg', 'Main', 1, b'1'),
(6, 3, '901_Jeans_Main.jpg', 'Main', 1, b'1'),
(7, 3, '410_Jeans_Front.jpg', 'Front', 1, b'1'),
(8, 3, '709_Jeans_Front.jpg', 'Front', 1, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `occationm`
--

CREATE TABLE `occationm` (
  `occationid` int(11) NOT NULL,
  `occationname` text NOT NULL,
  `isactive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `occationm`
--

INSERT INTO `occationm` (`occationid`, `occationname`, `isactive`) VALUES
(1, 'Birthday', b'1'),
(2, 'Marriage Anniversary', b'1'),
(4, 'Other', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `orderm`
--

CREATE TABLE `orderm` (
  `orderid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `orderdatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderm`
--

INSERT INTO `orderm` (`orderid`, `userid`, `orderdatetime`) VALUES
(2, 3, '2020-03-02 10:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `ordert`
--

CREATE TABLE `ordert` (
  `ordertid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `orderstatus` text NOT NULL DEFAULT 'Placed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordert`
--

INSERT INTO `ordert` (`ordertid`, `orderid`, `productid`, `qty`, `total`, `orderstatus`) VALUES
(3, 2, 1, 2, 30000, 'Placed');

-- --------------------------------------------------------

--
-- Table structure for table `productm`
--

CREATE TABLE `productm` (
  `productid` int(11) NOT NULL,
  `productname` text NOT NULL,
  `subcategoryid` int(11) NOT NULL,
  `productbrand` text NOT NULL,
  `price` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `priceunit` text NOT NULL,
  `productdescription` varchar(500) DEFAULT NULL,
  `tag` varchar(500) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `isactive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productm`
--

INSERT INTO `productm` (`productid`, `productname`, `subcategoryid`, `productbrand`, `price`, `tax`, `priceunit`, `productdescription`, `tag`, `userid`, `isactive`) VALUES
(1, 'LAVA IRIS PRO', 13, 'LAVA', 15000, 18, '1 Box', 'With a Cortex A7 quad core processor ticking at a speed of 1.5GHz built into the device, the Lava Iris Pro 30  can be expected to multitask quite efficiently. You can launch multiple tasks at the same time, play HD games, watch high resolution videos, browse the Internet and more without experiencing lags.', 'Phone, Lava, AI Cameras, Smart Phones', 1, b'1'),
(2, 'Sony Xperia XA Smart Watch', 22, 'Sony', 35000, 18, 'One Piece', 'Sony Xperia XA Compatible A1 Bluetooth 4G Touch Screen Smart Watch Phones with Camera, SIM Card, SD Card Slot, Multi Language Support Compatible with All Android and iOS Devices {Assorted Colour}', 'Sony Watch, Smart Watches', 1, b'1'),
(3, 'Jeans', 2, 'Denim', 500, 5, '1 ', 'Black jeans,Streacheble', 'Jeans , Denim', 1, b'1');

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
(1, 'Casual Shirts', 1, 1),
(2, 'Jeans', 1, 1),
(3, 'Jackets', 1, 1),
(4, 'Earrings', 2, 1),
(5, 'Neckless', 2, 1),
(6, 'Rings', 2, 1),
(7, 'Bracelets', 2, 1),
(8, 'Snickers', 3, 1),
(9, 'Loafers', 3, 1),
(10, 'Formal', 3, 1),
(11, 'Casual', 3, 1),
(12, 'Formal Shirts', 1, 1),
(13, 'Mobiles', 8, 1),
(14, 'Camera', 8, 1),
(15, 'Earphones', 8, 1),
(16, 'Show Piece', 9, 1),
(17, 'Flowers', 9, 1),
(18, 'Laptop Bag', 7, 1),
(19, 'Sunglasses', 4, 1),
(20, 'Digital Watch', 6, 1),
(21, 'Analog Watch ', 6, 1),
(22, 'Smart Watch', 6, 1),
(23, 'Fitness Tracker Watch', 6, 1);

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
(1, 'Umang', 'Sureshbhai', 'Panchal', 'Male', '2000-07-26', 8390017071, 7190901761, 'panchalumang@gmail.com', 'L J College of Computer Applciations', 'Near Mahavir Soc', 'Near New IIM road', 'Vastrapur', 1, 380015, 'admin@123', 'Admin', 'NULL', 1),
(2, 'Dhruvil', 'Ashokbhai', 'Panchal', 'Male', '2000-07-26', 8760012902, NULL, 'panchaldhruvil@gmail.com', 'Ahmedabad', 'Ahmedabad', 'Ahmedabad', 'Ahmedabad', 1, 382210, 'vendor@123', 'Vendor', NULL, 1),
(3, 'Aman', 'Nayanbhai', 'Mehta', 'Male', '2000-06-05', 8767121677, NULL, 'mehtaaman@gmail.com', 'Ahmedabad', 'Ahmedabad', 'Vastrapur', 'Vastrapur', 1, 380015, 'user@123', 'User', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlistm`
--

CREATE TABLE `wishlistm` (
  `wishlistid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlistm`
--

INSERT INTO `wishlistm` (`wishlistid`, `userid`) VALUES
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `wishlistt`
--

CREATE TABLE `wishlistt` (
  `wishlisttid` int(11) NOT NULL,
  `wishlistid` int(11) NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlistt`
--

INSERT INTO `wishlistt` (`wishlisttid`, `wishlistid`, `productid`) VALUES
(3, 3, 1),
(4, 3, 2),
(5, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aream`
--
ALTER TABLE `aream`
  ADD PRIMARY KEY (`areaid`);

--
-- Indexes for table `cartm`
--
ALTER TABLE `cartm`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `cartt`
--
ALTER TABLE `cartt`
  ADD PRIMARY KEY (`carttid`);

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
-- Indexes for table `eventm`
--
ALTER TABLE `eventm`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `eventt`
--
ALTER TABLE `eventt`
  ADD PRIMARY KEY (`eventtid`);

--
-- Indexes for table `gallerym`
--
ALTER TABLE `gallerym`
  ADD PRIMARY KEY (`photoid`);

--
-- Indexes for table `occationm`
--
ALTER TABLE `occationm`
  ADD PRIMARY KEY (`occationid`);

--
-- Indexes for table `orderm`
--
ALTER TABLE `orderm`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `ordert`
--
ALTER TABLE `ordert`
  ADD PRIMARY KEY (`ordertid`);

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
-- Indexes for table `wishlistm`
--
ALTER TABLE `wishlistm`
  ADD PRIMARY KEY (`wishlistid`);

--
-- Indexes for table `wishlistt`
--
ALTER TABLE `wishlistt`
  ADD PRIMARY KEY (`wishlisttid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aream`
--
ALTER TABLE `aream`
  MODIFY `areaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cartm`
--
ALTER TABLE `cartm`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cartt`
--
ALTER TABLE `cartt`
  MODIFY `carttid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categorym`
--
ALTER TABLE `categorym`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `citym`
--
ALTER TABLE `citym`
  MODIFY `cityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countrym`
--
ALTER TABLE `countrym`
  MODIFY `countryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `eventm`
--
ALTER TABLE `eventm`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `eventt`
--
ALTER TABLE `eventt`
  MODIFY `eventtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gallerym`
--
ALTER TABLE `gallerym`
  MODIFY `photoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `occationm`
--
ALTER TABLE `occationm`
  MODIFY `occationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderm`
--
ALTER TABLE `orderm`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordert`
--
ALTER TABLE `ordert`
  MODIFY `ordertid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productm`
--
ALTER TABLE `productm`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statem`
--
ALTER TABLE `statem`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subcategorym`
--
ALTER TABLE `subcategorym`
  MODIFY `subcategoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `userm`
--
ALTER TABLE `userm`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlistm`
--
ALTER TABLE `wishlistm`
  MODIFY `wishlistid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlistt`
--
ALTER TABLE `wishlistt`
  MODIFY `wishlisttid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
