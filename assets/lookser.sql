-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2015 at 07:30 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

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
`brand_id` int(11) NOT NULL,
  `brand_name` varchar(60) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_image` varchar(60) NOT NULL,
  `brand_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_desc`, `brand_image`, `brand_status`, `createdOn`, `updatedOn`) VALUES
(1, 'Suspense', '', '', '1', '2015-08-05 08:32:40', '0000-00-00 00:00:00'),
(2, 'Fastrack', '', '', '1', '2015-08-05 18:55:10', '0000-00-00 00:00:00'),
(3, 'Reebok', '', '', '1', '2015-08-05 19:00:32', '0000-00-00 00:00:00'),
(4, 'Raybon', '', '', '1', '2015-08-05 19:00:43', '0000-00-00 00:00:00'),
(5, 'Puma', '', '', '0', '2015-08-05 19:01:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE IF NOT EXISTS `followers` (
`f_id` int(11) NOT NULL,
  `f_did` int(11) NOT NULL,
  `f_uid` int(11) NOT NULL,
  `f_status` enum('1','0') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`f_id`, `f_did`, `f_uid`, `f_status`, `createdOn`, `updatedOn`) VALUES
(2, 2, 1, '', '2015-08-19 17:19:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `looks`
--

CREATE TABLE IF NOT EXISTS `looks` (
`l_id` int(11) NOT NULL,
  `l_name` varchar(60) NOT NULL,
  `l_desc` text NOT NULL,
  `l_image` text NOT NULL,
  `l_mrp` varchar(10) NOT NULL,
  `l_price` varchar(10) NOT NULL,
  `l_category` int(11) NOT NULL,
  `l_grid` int(11) NOT NULL,
  `l_details` text NOT NULL,
  `l_uid` int(11) NOT NULL,
  `l_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `looks`
--

INSERT INTO `looks` (`l_id`, `l_name`, `l_desc`, `l_image`, `l_mrp`, `l_price`, `l_category`, `l_grid`, `l_details`, `l_uid`, `l_status`, `createdOn`, `updatedOn`) VALUES
(12, 'First look', '', '', '', '', 1, 2, '', 0, '1', '2015-08-10 17:56:35', '0000-00-00 00:00:00'),
(13, 'Second look', '', '', '', '', 1, 2, '', 2, '1', '2015-08-10 18:36:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `l_categories`
--

CREATE TABLE IF NOT EXISTS `l_categories` (
`lc_id` int(11) NOT NULL,
  `lc_name` varchar(60) NOT NULL,
  `lc_desc` text NOT NULL,
  `lc_image` text NOT NULL,
  `lc_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `l_categories`
--

INSERT INTO `l_categories` (`lc_id`, `lc_name`, `lc_desc`, `lc_image`, `lc_status`, `createdOn`, `updatedOn`) VALUES
(1, 'Wedding', '', '', '1', '2015-08-10 16:15:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `l_products`
--

CREATE TABLE IF NOT EXISTS `l_products` (
`lp_id` int(11) NOT NULL,
  `lp_lid` int(11) NOT NULL,
  `lp_pid` int(11) NOT NULL,
  `lp_priority` int(11) NOT NULL,
  `lp_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `l_products`
--

INSERT INTO `l_products` (`lp_id`, `lp_lid`, `lp_pid`, `lp_priority`, `lp_status`, `createdOn`, `updatedOn`) VALUES
(18, 12, 1, 0, '1', '2015-08-10 17:56:35', '0000-00-00 00:00:00'),
(19, 12, 2, 0, '1', '2015-08-10 17:56:35', '0000-00-00 00:00:00'),
(20, 13, 1, 0, '1', '2015-08-10 18:36:12', '0000-00-00 00:00:00'),
(21, 13, 4, 0, '1', '2015-08-10 18:36:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `l_views`
--

CREATE TABLE IF NOT EXISTS `l_views` (
`lv_id` int(11) NOT NULL,
  `lv_lookId` int(11) NOT NULL,
  `lv_ip` varchar(20) NOT NULL,
  `lv_source` text NOT NULL,
  `lv_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
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
`p_id` int(11) NOT NULL,
  `p_storeId` varchar(60) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_desc` text NOT NULL,
  `p_image` text NOT NULL,
  `p_url` text NOT NULL,
  `p_mrp` varchar(10) NOT NULL,
  `p_price` varchar(10) NOT NULL,
  `p_category` int(11) NOT NULL,
  `p_brand` int(11) NOT NULL,
  `p_details` text NOT NULL,
  `p_provider` int(11) NOT NULL,
  `p_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_storeId`, `p_name`, `p_desc`, `p_image`, `p_url`, `p_mrp`, `p_price`, `p_category`, `p_brand`, `p_details`, `p_provider`, `p_status`, `createdOn`, `updatedOn`) VALUES
(1, 'SHTDYPAYAHVQ3YZW', 'Suspense Men''s Solid Casual Shirt', 'Suspense Men''s Solid Casual Shirt', 'http://img5a.flixcart.com/image/shirt/a/r/x/rcsh-nb-suspense-l-400x400-imadyqfzyr6zdbgh.jpeg', '', '1099', '499', 1, 1, '', 1, '1', '2015-08-05 08:33:23', '0000-00-00 00:00:00'),
(2, 'SHODZT5UFWAZ6ZCM', 'Allen Cooper Zipper Combat Boot', '', 'http://img5a.flixcart.com/image/shoe/3/m/z/black-85023-allen-cooper-10-400x400-imaey2vywescbjk8.jpeg', '', '2450', '2320', 1, 1, '', 1, '1', '2015-08-05 09:09:28', '0000-00-00 00:00:00'),
(4, 'SHTE88BAWCHHBFBE', 'Blackberrys Men''s Self Design Casual Shirt', '', 'http://img5a.flixcart.com/image/shirt/z/v/w/msmap00eben16spqestate-blue-blackberrys-39-400x400-imae9rwh6rwuzm7z.jpeg', '', '2000', '1995', 1, 1, '', 1, '1', '2015-08-07 16:18:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE IF NOT EXISTS `providers` (
`provider_id` int(11) NOT NULL,
  `provider_name` varchar(60) NOT NULL,
  `provider_desc` text NOT NULL,
  `provider_image` text NOT NULL,
  `provider_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`provider_id`, `provider_name`, `provider_desc`, `provider_image`, `provider_status`, `createdOn`, `updatedOn`) VALUES
(1, 'Flipkart', '', 'http://img5a.flixcart.com/www/promos/new/20150521-151534-flipkart-logo.png', '1', '2015-08-05 08:33:18', '0000-00-00 00:00:00'),
(2, 'Snapdeal', '', 'http://www.snapdeal.com/img/metroUI/logoSD.svg', '1', '2015-08-07 15:33:15', '0000-00-00 00:00:00'),
(4, 'Paytm', '', 'https://paytm.com/blog/wp-content/uploads/2014/11/Paytm-Logo.jpg', '1', '2015-08-07 16:44:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p_categories`
--

CREATE TABLE IF NOT EXISTS `p_categories` (
`pc_id` int(11) NOT NULL,
  `pc_pid` int(11) NOT NULL,
  `pc_name` varchar(60) NOT NULL,
  `pc_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pc_desc` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `p_categories`
--

INSERT INTO `p_categories` (`pc_id`, `pc_pid`, `pc_name`, `pc_status`, `createdOn`, `updatedOn`, `pc_desc`) VALUES
(1, 0, 'Shirt', '1', '2015-08-05 08:32:10', '0000-00-00 00:00:00', 'Casual'),
(2, 0, 'Jeans', '0', '2015-08-07 15:36:04', '0000-00-00 00:00:00', 'Cotton Jeans'),
(3, 1, 'formal', '1', '2015-08-13 17:20:22', '0000-00-00 00:00:00', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `p_views`
--

CREATE TABLE IF NOT EXISTS `p_views` (
`pv_id` int(11) NOT NULL,
  `pv_productId` int(11) NOT NULL,
  `pv_ip` varchar(20) NOT NULL,
  `pv_source` text NOT NULL,
  `pv_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `p_views`
--

INSERT INTO `p_views` (`pv_id`, `pv_productId`, `pv_ip`, `pv_source`, `pv_status`, `createdOn`, `updatedOn`) VALUES
(1, 1, '::1', '', '0', '2015-08-09 09:57:59', '0000-00-00 00:00:00'),
(2, 1, '::1', '', '0', '2015-08-09 09:58:18', '0000-00-00 00:00:00'),
(3, 1, '::1', '', '0', '2015-08-09 09:59:17', '0000-00-00 00:00:00'),
(4, 1, '::1', '', '0', '2015-08-09 09:59:48', '0000-00-00 00:00:00'),
(5, 1, '::1', '', '0', '2015-08-09 10:09:52', '0000-00-00 00:00:00'),
(6, 4, '::1', '', '0', '2015-08-12 18:56:54', '0000-00-00 00:00:00'),
(7, 4, '::1', '', '0', '2015-08-12 18:57:01', '0000-00-00 00:00:00'),
(8, 4, '::1', '', '0', '2015-08-12 18:57:09', '0000-00-00 00:00:00'),
(9, 4, '::1', '', '0', '2015-08-12 18:57:25', '0000-00-00 00:00:00'),
(10, 2, '::1', '', '0', '2015-08-12 19:00:24', '0000-00-00 00:00:00'),
(11, 2, '::1', '', '0', '2015-08-13 15:05:00', '0000-00-00 00:00:00'),
(12, 2, '::1', '', '0', '2015-08-13 15:09:50', '0000-00-00 00:00:00'),
(13, 2, '::1', '', '0', '2015-08-13 15:09:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
`review_id` int(11) NOT NULL,
  `review_type` varchar(60) NOT NULL,
  `review_typeId` int(11) NOT NULL,
  `review_title` varchar(60) NOT NULL,
  `review_desc` text NOT NULL,
  `review_rating` int(11) NOT NULL,
  `review_by` int(11) NOT NULL,
  `review_status` enum('0','1') NOT NULL,
  `review_ip` varchar(20) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`role_id` int(11) NOT NULL,
  `role_name` varchar(60) NOT NULL,
  `role_desc` text NOT NULL,
  `role_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
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
`user_id` int(11) NOT NULL,
  `user_fname` varchar(60) NOT NULL,
  `user_lname` varchar(60) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_hash` varchar(60) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_password`, `user_role`, `user_status`, `createdOn`, `updatedOn`, `user_hash`) VALUES
(1, 'Super', 'Admin', 'superadmin@lookser.com', '8d098696b9ac5ed75139b78eb03b81b02036248d', 1, '1', '2015-08-04 09:56:10', '0000-00-00 00:00:00', ''),
(2, 'Looks', 'Designer', 'designer@lookser.com', '8d098696b9ac5ed75139b78eb03b81b02036248d', 2, '1', '2015-08-04 11:34:38', '0000-00-00 00:00:00', ''),
(3, 'Registered', 'User', 'user@lookser.com', '8d098696b9ac5ed75139b78eb03b81b02036248d', 3, '1', '2015-08-04 11:34:38', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
 ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
 ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `looks`
--
ALTER TABLE `looks`
 ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `l_categories`
--
ALTER TABLE `l_categories`
 ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `l_products`
--
ALTER TABLE `l_products`
 ADD PRIMARY KEY (`lp_id`);

--
-- Indexes for table `l_views`
--
ALTER TABLE `l_views`
 ADD PRIMARY KEY (`lv_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
 ADD PRIMARY KEY (`provider_id`);

--
-- Indexes for table `p_categories`
--
ALTER TABLE `p_categories`
 ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `p_views`
--
ALTER TABLE `p_views`
 ADD PRIMARY KEY (`pv_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `looks`
--
ALTER TABLE `looks`
MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `l_categories`
--
ALTER TABLE `l_categories`
MODIFY `lc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `l_products`
--
ALTER TABLE `l_products`
MODIFY `lp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `l_views`
--
ALTER TABLE `l_views`
MODIFY `lv_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
MODIFY `provider_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `p_categories`
--
ALTER TABLE `p_categories`
MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `p_views`
--
ALTER TABLE `p_views`
MODIFY `pv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
