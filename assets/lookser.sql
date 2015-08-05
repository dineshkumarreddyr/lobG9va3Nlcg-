-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2015 at 01:08 PM
-- Server version: 5.5.37-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lookser`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(60) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_image` varchar(60) NOT NULL,
  `brand_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_desc`, `brand_image`, `brand_status`, `createdOn`, `updatedOn`) VALUES
(1, 'Suspense', '', '', '1', '2015-08-05 08:32:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `l_categories`
--

CREATE TABLE IF NOT EXISTS `l_categories` (
  `lc_id` int(11) NOT NULL AUTO_INCREMENT,
  `lc_name` varchar(60) NOT NULL,
  `lc_desc` text NOT NULL,
  `lc_image` text NOT NULL,
  `lc_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`lc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `l_views`
--

CREATE TABLE IF NOT EXISTS `l_views` (
  `lv_id` int(11) NOT NULL AUTO_INCREMENT,
  `lv_lookId` int(11) NOT NULL,
  `lv_ip` varchar(20) NOT NULL,
  `lv_source` text NOT NULL,
  `lv_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`lv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(60) NOT NULL,
  `page_content` longtext NOT NULL,
  `page_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_storeId` varchar(60) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_dessc` text NOT NULL,
  `p_image` text NOT NULL,
  `p_mrp` varchar(10) NOT NULL,
  `p_price` varchar(10) NOT NULL,
  `p_category` int(11) NOT NULL,
  `p_brand` int(11) NOT NULL,
  `p_details` text NOT NULL,
  `p_provider` int(11) NOT NULL,
  `p_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_storeId`, `p_name`, `p_dessc`, `p_image`, `p_mrp`, `p_price`, `p_category`, `p_brand`, `p_details`, `p_provider`, `p_status`, `createdOn`, `updatedOn`) VALUES
(1, 'SHTDYPAYAHVQ3YZW', 'Suspense Men''s Solid Casual Shirt', 'Suspense Men''s Solid Casual Shirt', 'http://img5a.flixcart.com/image/shirt/a/r/x/rcsh-nb-suspense-l-400x400-imadyqfzyr6zdbgh.jpeg', '1099', '499', 1, 1, '', 1, '1', '2015-08-05 08:33:23', '0000-00-00 00:00:00'),
(2, 'SHODZT5UFWAZ6ZCM', 'Allen Cooper Zipper Combat Boot', '', 'http://img5a.flixcart.com/image/shoe/3/m/z/black-85023-allen-cooper-10-400x400-imaey2vywescbjk8.jpeg', '2450', '2320', 1, 1, '', 1, '1', '2015-08-05 09:09:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE IF NOT EXISTS `providers` (
  `provider_id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_name` varchar(60) NOT NULL,
  `provider_desc` text NOT NULL,
  `provider_image` varchar(60) NOT NULL,
  `provider_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`provider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`provider_id`, `provider_name`, `provider_desc`, `provider_image`, `provider_status`, `createdOn`, `updatedOn`) VALUES
(1, 'Flipkart', '', '', '1', '2015-08-05 08:33:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p_categories`
--

CREATE TABLE IF NOT EXISTS `p_categories` (
  `pc_id` int(11) NOT NULL AUTO_INCREMENT,
  `pc_name` varchar(60) NOT NULL,
  `pc_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pc_desc` text NOT NULL,
  PRIMARY KEY (`pc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `p_categories`
--

INSERT INTO `p_categories` (`pc_id`, `pc_name`, `pc_status`, `createdOn`, `updatedOn`, `pc_desc`) VALUES
(1, 'Shirt', '1', '2015-08-05 08:32:10', '0000-00-00 00:00:00', 'Casual');

-- --------------------------------------------------------

--
-- Table structure for table `p_views`
--

CREATE TABLE IF NOT EXISTS `p_views` (
  `pv_id` int(11) NOT NULL AUTO_INCREMENT,
  `pv_productId` int(11) NOT NULL,
  `pv_ip` varchar(20) NOT NULL,
  `pv_source` text NOT NULL,
  `pv_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`pv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `review_type` varchar(60) NOT NULL,
  `review_typeId` int(11) NOT NULL,
  `review_title` varchar(60) NOT NULL,
  `review_desc` text NOT NULL,
  `review_rating` int(11) NOT NULL,
  `review_by` int(11) NOT NULL,
  `review_status` enum('0','1') NOT NULL,
  `review_ip` varchar(20) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(60) NOT NULL,
  `role_desc` text NOT NULL,
  `role_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_desc`, `role_status`, `createdOn`, `UpdatedOn`) VALUES
(1, 'Admin', '', '1', '2015-08-04 09:53:27', '0000-00-00 00:00:00'),
(2, 'Designer', '', '1', '2015-08-04 09:53:27', '0000-00-00 00:00:00'),
(3, 'User', '', '1', '2015-08-04 09:54:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(60) NOT NULL,
  `user_lname` varchar(60) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_hash` varchar(60) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_password`, `user_role`, `user_status`, `createdOn`, `updatedOn`, `user_hash`) VALUES
(1, 'Super', 'Admin', 'superadmin@lookser.com', '8d098696b9ac5ed75139b78eb03b81b02036248d', 1, '1', '2015-08-04 09:56:10', '0000-00-00 00:00:00', ''),
(2, 'Looks', 'Designer', 'designer@lookser.com', '8d098696b9ac5ed75139b78eb03b81b02036248d', 2, '1', '2015-08-04 11:34:38', '0000-00-00 00:00:00', ''),
(3, 'Registered', 'User', 'user@lookser.com', '8d098696b9ac5ed75139b78eb03b81b02036248d', 3, '1', '2015-08-04 11:34:38', '0000-00-00 00:00:00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
