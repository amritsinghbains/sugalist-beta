-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2013 at 01:07 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sugalist`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `ID_CATEGORY` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` char(255) DEFAULT NULL,
  PRIMARY KEY (`ID_CATEGORY`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID_CATEGORY`, `NAME`) VALUES
(1, 'pant'),
(2, 'shirt');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `ID_CUSTOMER` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` char(255) DEFAULT NULL,
  `ZIP` char(255) DEFAULT NULL,
  `BIRTHDAY` date DEFAULT NULL,
  `CITY` char(255) DEFAULT NULL,
  `PASSWORD` char(255) DEFAULT NULL,
  `COUNTRY` char(255) DEFAULT NULL,
  `REGISTRATION_DATE` date DEFAULT NULL,
  `EMAIL` char(255) DEFAULT NULL,
  PRIMARY KEY (`ID_CUSTOMER`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID_CUSTOMER`, `USERNAME`, `ZIP`, `BIRTHDAY`, `CITY`, `PASSWORD`, `COUNTRY`, `REGISTRATION_DATE`, `EMAIL`) VALUES
(3, 'admin2', '11002', '2013-10-10', 'dilli', 'password2', 'india', '2013-10-22', 'admin2@sugalist.com'),
(1, 'admin', '11000', '1961-02-05', 'new delhi', 'password', 'india', '2013-09-30', 'admin@sugalist.com'),
(2, 'amrit', '11003', '2013-10-08', 'new delhi', 'a', 'india', NULL, 'amrit@amrit.com');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `ID_CUSTOMER` int(11) NOT NULL,
  `ID_PRODUCT` int(11) NOT NULL,
  `SALE` int(11) DEFAULT NULL,
  `CUSTOMIZED_PRICE` int(11) DEFAULT NULL,
  `CODE_PROMO` char(255) DEFAULT NULL,
  `END_PROMO` date DEFAULT NULL,
  PRIMARY KEY (`ID_CUSTOMER`,`ID_PRODUCT`),
  KEY `FK_FOLLOW` (`ID_PRODUCT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`ID_CUSTOMER`, `ID_PRODUCT`, `SALE`, `CUSTOMIZED_PRICE`, `CODE_PROMO`, `END_PROMO`) VALUES
(1, 14, 17, 14, 'Roads', '2014-10-01'),
(1, 19, 18, 15, 'BOXERS', '2014-10-01'),
(1, 1, 19, 18, 'SALE120', '2014-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE IF NOT EXISTS `merchant` (
  `ID_MERCHANT` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` char(255) DEFAULT NULL,
  `EMAIL` char(255) DEFAULT NULL,
  `PASSWORD` char(255) DEFAULT NULL,
  PRIMARY KEY (`ID_MERCHANT`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`ID_MERCHANT`, `USERNAME`, `EMAIL`, `PASSWORD`) VALUES
(1, 'gucci', 'info@gucci.com', 'gucci'),
(2, 'nike', 'info@nike.com', 'nike'),
(5, 'fakestore', 'info@fakestore.com', 'fakestore'),
(4, 'adidas', 'adidas@adidas.com', 'qawsed'),
(3, 'brand a', 'info@branda.com', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `ID_NOTIFICATION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MERCHANT` int(11) NOT NULL,
  `MESSAGE` char(255) DEFAULT NULL,
  `TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_NOTIFICATION`),
  KEY `FK_SEND` (`ID_MERCHANT`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`ID_NOTIFICATION`, `ID_MERCHANT`, `MESSAGE`, `TIMESTAMP`) VALUES
(1, 1, 'sale he sale', '2013-09-30 10:02:06'),
(2, 2, '50% off hai boss', '2013-09-30 10:03:06'),
(13, 5, 'We have our own website sale', '2013-10-27 21:39:25'),
(10, 1, 'ok', '2013-09-30 18:01:05'),
(9, 2, 'new', '2013-10-18 12:42:21'),
(7, 1, 'loads of sale goods', '2013-09-30 13:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ID_PRODUCT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CATEGORY` int(11) NOT NULL,
  `ID_STORE` int(11) NOT NULL,
  `NAME` char(255) DEFAULT NULL,
  `SIZE` char(255) DEFAULT NULL,
  `COLOR` char(255) DEFAULT NULL,
  `PRICE` float(8,2) DEFAULT NULL,
  `IMAGEURL` varchar(300) NOT NULL,
  `INITSALE` int(11) NOT NULL,
  `INITCUSTOMIZED_PRICE` int(11) NOT NULL,
  `INITCODE_PROMO` char(255) NOT NULL,
  PRIMARY KEY (`ID_PRODUCT`),
  KEY `FK_CONTAINS` (`ID_CATEGORY`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID_PRODUCT`, `ID_CATEGORY`, `ID_STORE`, `NAME`, `SIZE`, `COLOR`, `PRICE`, `IMAGEURL`, `INITSALE`, `INITCUSTOMIZED_PRICE`, `INITCODE_PROMO`) VALUES
(1, 1, 1, 'jeans', 'xl', 'blue', 20.00, 'http://www.esquire.com/cm/esquire/images/lF/esq-jeans-081512-xlg.jpg', 19, 18, 'SALE120'),
(14, 2, 10, 'T Shirt Roads', 'xl', 'pink white', 20.00, 'http://myntra.myntassets.com/images/style/properties/Roadster-Men-Maroon-&-Black-Checked-Slim-Fit-Casual-Shirt_0c06540f857b6d871be65e90ea67b9da_images_360_480_mini.JPG', 17, 14, 'Roads'),
(15, 2, 10, 'Jacket Power', 'xxl', 'maroon', 55.00, 'http://myntra.myntassets.com/images/style/properties/Lee-Men-Red-Riders-Jacket_d4a98d53d46290c19c91e622df08ef8f_images_1080_1440_mini.jpg', 50, 39, 'JACKETDEMO'),
(16, 1, 10, 'Pink Heart Print Leggings', 'small', 'pink', 30.00, 'http://myntra.myntassets.com/images/style/properties/United-Colors-of-Benetton-Girls-Pink-Heart-Print-Leggings_804ce8b2b0dd154083301ad6823454ff_images_360_480_mini.jpg', 25, 19, 'pinkwhite'),
(17, 2, 10, 'Tickles Girls Printed T-shirt', 'small', 'Dark Blue', 20.00, 'http://myntra.myntassets.com/images/style/properties/Tickles-Girls-Tshirts_0fc8f3975922da21e2a09c1f9c9423ec_images_360_480_mini.jpg', 18, 15, ''),
(18, 2, 10, 'BIBA Girls Orange & Green Salwar Suit', 'xl', 'orange', 100.00, 'http://myntra.myntassets.com/images/style/properties/BIBA-Girls-Orange-&-Green-Salwar-Suit_ee425ed4e697f010db47bec68b60617b_images_360_480_mini.jpg', 89, 79, 'BIBA'),
(19, 1, 10, 'ETC Men Checked Boxers 007', 'xl', 'Red & Black', 20.00, 'http://myntra.myntassets.com/images/style/properties/ETC-Men-Red-&-Black-Checked-Boxers_55452101838d4b6b0598de18c48f0d28_images_360_480_mini.jpg', 18, 15, 'BOXERS');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `ID_STORE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MERCHANT` int(11) NOT NULL,
  `NAME` char(255) DEFAULT NULL,
  `CITY` char(255) DEFAULT NULL,
  `ZIP` char(255) DEFAULT NULL,
  `COUNTRY` char(255) DEFAULT NULL,
  PRIMARY KEY (`ID_STORE`),
  KEY `FK_MANAGE` (`ID_MERCHANT`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`ID_STORE`, `ID_MERCHANT`, `NAME`, `CITY`, `ZIP`, `COUNTRY`) VALUES
(1, 1, 'green park', 'new delhi', '11002', 'india'),
(2, 2, 'hauz khas', 'new delhi', '11002', 'india'),
(3, 1, 'gautam nagar', 'new delhi', 'zip', 'india'),
(7, 1, 'new store', 'new delhi', '10029', 'pakistan'),
(8, 3, 'new york1', 'new york', '11002', 'usa'),
(9, 4, 'ok', 'gh', 'gh', 'gh'),
(10, 5, 'Mars Place', 'Mars City', '90901', 'Mars');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
