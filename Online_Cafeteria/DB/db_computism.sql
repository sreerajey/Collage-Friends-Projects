-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2023 at 05:03 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_computism`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigndelivery`
--

CREATE TABLE IF NOT EXISTS `assigndelivery` (
  `agid` int(11) NOT NULL AUTO_INCREMENT,
  `deliveryid` varchar(100) DEFAULT NULL,
  `payid` varchar(100) DEFAULT NULL,
  `dates` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`agid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `assigndelivery`
--

INSERT INTO `assigndelivery` (`agid`, `deliveryid`, `payid`, `dates`, `type`) VALUES
(7, '3', '21', '16-06-23 05:03:46', 'assign');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(100) DEFAULT NULL,
  `uid` varchar(100) DEFAULT NULL,
  `paid` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `pid`, `uid`, `paid`, `date`) VALUES
(28, '29', '18', 'yes', '16-06-23 11:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE IF NOT EXISTS `complaint` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `des` varchar(500) DEFAULT NULL,
  `dates` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`cid`, `uid`, `subject`, `des`, `dates`) VALUES
(4, '18', 'Good Services', 'okay file they are okay to all as a startup  finw we accepted', '16-06-23 11:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `delivery`
--


-- --------------------------------------------------------

--
-- Table structure for table `getdata`
--

CREATE TABLE IF NOT EXISTS `getdata` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `dids` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `getdata`
--

INSERT INTO `getdata` (`gid`, `dids`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payid` int(11) NOT NULL AUTO_INCREMENT,
  `pdid` varchar(100) DEFAULT NULL,
  `puid` varchar(100) DEFAULT NULL,
  `cname` varchar(100) DEFAULT NULL,
  `cno` varchar(100) DEFAULT NULL,
  `cvv` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT 'no',
  PRIMARY KEY (`payid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `pdid`, `puid`, `cname`, `cno`, `cvv`, `amount`, `type`, `token`) VALUES
(23, '28', '18', 'jenika', '4564444456423634', '346', '10/2', 'user', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `rsid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) DEFAULT NULL,
  `tid` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'no',
  PRIMARY KEY (`rsid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`rsid`, `uid`, `tid`, `status`) VALUES
(2, '1', '1', 'no'),
(3, '11', '1', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tablesset`
--

CREATE TABLE IF NOT EXISTS `tablesset` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `settable` varchar(100) DEFAULT NULL,
  `numsheet` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `datess` varchar(100) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tablesset`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_center_register`
--

CREATE TABLE IF NOT EXISTS `tb_center_register` (
  `reg_id` int(100) NOT NULL AUTO_INCREMENT,
  `centername` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_center_register`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_feedback`
--

CREATE TABLE IF NOT EXISTS `tb_feedback` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `feedback` varchar(200) NOT NULL,
  `cusid` varchar(100) NOT NULL,
  `date` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_feedback`
--

INSERT INTO `tb_feedback` (`fid`, `feedback`, `cusid`, `date`) VALUES
(1, 'Nice site', '3', '2020/Jul/18'),
(2, 'Very good center', '3', '2020/Jul/18'),
(3, 'shitty service from Apple.. Very poor', '4', '2020/Jul/18'),
(4, 'Yes excellent services', '7', '2022/Jan/07'),
(5, 'Yes excellent services', '7', '2022/Jan/07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `log_id` int(200) NOT NULL AUTO_INCREMENT,
  `reg_id` int(100) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `uphone` varchar(200) DEFAULT NULL,
  `upass` varchar(200) DEFAULT NULL,
  `status` varbinary(100) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`log_id`, `reg_id`, `user_type`, `uphone`, `upass`, `status`) VALUES
(29, 12, 'admin', 'admin', 'admin', 'ACTIVE'),
(37, 18, 'CUSTOMER', '7777777777', '123', 'ACTIVE'),
(38, 19, 'CUSTOMER', '4563456345645665', 'fdgdf', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE IF NOT EXISTS `tb_product` (
  `productcode` bigint(50) NOT NULL AUTO_INCREMENT,
  `centerid` int(100) DEFAULT NULL,
  `productname` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `price` bigint(100) NOT NULL,
  `warranty` varchar(50) NOT NULL,
  `features` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`productcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`productcode`, `centerid`, `productname`, `category`, `brand`, `price`, `warranty`, `features`, `image`) VALUES
(28, 12, 'Juice', 'Cool drinks', '2023-06-23T16:47', 200, 'cooling', 'Cool Drink', 'images/jjj.jpeg'),
(29, 12, 'Cake', 'cakes had good cherrys and pluberrry', '2023-07-16T16:52', 2000, 'Cholate ', 'Mlet Cake', 'images/cakes.jpeg'),
(30, 12, 'Orange Jiuce', 'all flavor juice drinks', '2023-07-09T16:54', 6700, 'Fruits', 'Cool Milk', 'images/jj.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_register`
--

CREATE TABLE IF NOT EXISTS `tb_user_register` (
  `ureg_id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ureg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tb_user_register`
--

INSERT INTO `tb_user_register` (`ureg_id`, `username`, `email`, `address`, `contact`, `password`) VALUES
(11, 'Abi', 'abi@gmail.com', 'Ernakulam, kochin-4654', '1111111111', '111'),
(18, 'john', 'john@gmail.com', 'kerala', '777777777777', '123'),
(19, 'asdas', 'sdasa@sdfgsd', 'fgdf', '4563456345645665', 'fdgdf');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `token_id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(200) DEFAULT NULL,
  `payid` varchar(200) DEFAULT NULL,
  `tokenno` varchar(100) DEFAULT NULL,
  `dates` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`token_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`token_id`, `sid`, `payid`, `tokenno`, `dates`) VALUES
(9, '12', '19', '33', '16-06-23 06:29:38'),
(10, '12', '23', '555', '16-06-23 11:34:19');
