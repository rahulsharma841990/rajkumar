-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2014 at 03:53 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `raj_clasi`
--
CREATE DATABASE IF NOT EXISTS `raj_clasi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `raj_clasi`;

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE IF NOT EXISTS `user_register` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `cell_phone` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `city_area` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `website` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `user_image` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`id`, `user_id`, `user_email`, `user_pass`, `full_name`, `user_type`, `cell_phone`, `phone`, `country`, `region`, `city`, `city_area`, `address`, `website`, `description`, `user_image`, `date`, `status`) VALUES
(1, 'rahulsharma841990', 'rahulsharma841990@outlook.com', 'e10adc3949ba59abbe56e057f20f883e', 'Rahul Sharma', '1', '9646451712', '2421764', 'India', 'Hindu', 'Amritsar', 'Gopal Nagar', 'Majitha Road', 'No', 'Testing...', 'IMG-20140906-WA0012.jpg', '0000-00-00', 'Active'),
(2, 'rahul123', 'rahulsharma_990@outlook.com', 'e10adc3949ba59abbe56e057f20f883e', 'Rahul', '1', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
