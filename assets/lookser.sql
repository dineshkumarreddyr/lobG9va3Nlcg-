-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2015 at 08:34 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_desc`, `brand_image`, `brand_status`, `createdOn`, `updatedOn`) VALUES
(1, 'American Tourister', '', '', '1', '2015-08-25 15:11:20', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `l_gender` enum('Male','Female','Other') NOT NULL,
  `l_grid` int(11) NOT NULL,
  `l_details` text NOT NULL,
  `l_uid` int(11) NOT NULL,
  `l_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `looks`
--

INSERT INTO `looks` (`l_id`, `l_name`, `l_desc`, `l_image`, `l_mrp`, `l_price`, `l_category`, `l_gender`, `l_grid`, `l_details`, `l_uid`, `l_status`, `createdOn`, `updatedOn`) VALUES
(2, 'look1', '', '', '', '2062', 1, 'Male', 2, '', 2, '1', '2015-08-25 16:38:06', '0000-00-00 00:00:00'),
(3, 'second', '', '', '', '2212', 1, 'Male', 2, '', 2, '1', '2015-08-25 18:16:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `l_categories`
--

CREATE TABLE IF NOT EXISTS `l_categories` (
`lc_id` int(11) NOT NULL,
  `lc_pid` int(11) NOT NULL,
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

INSERT INTO `l_categories` (`lc_id`, `lc_pid`, `lc_name`, `lc_desc`, `lc_image`, `lc_status`, `createdOn`, `updatedOn`) VALUES
(1, 0, 'Men casual', '', '', '1', '2015-08-25 16:33:59', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `l_products`
--

INSERT INTO `l_products` (`lp_id`, `lp_lid`, `lp_pid`, `lp_priority`, `lp_status`, `createdOn`, `updatedOn`) VALUES
(1, 1, 2, 0, '1', '2015-08-25 16:36:20', '0000-00-00 00:00:00'),
(2, 2, 1, 0, '1', '2015-08-25 16:38:07', '0000-00-00 00:00:00'),
(3, 2, 2, 0, '1', '2015-08-25 16:38:07', '0000-00-00 00:00:00'),
(4, 3, 2, 0, '1', '2015-08-25 18:16:23', '0000-00-00 00:00:00'),
(5, 3, 3, 0, '1', '2015-08-25 18:16:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `l_views`
--

CREATE TABLE IF NOT EXISTS `l_views` (
`lv_id` int(11) NOT NULL,
  `lv_lookId` int(11) NOT NULL,
  `lv_ip` varchar(20) NOT NULL,
  `lv_source` text NOT NULL,
  `lv_status` enum('1','0') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `l_views`
--

INSERT INTO `l_views` (`lv_id`, `lv_lookId`, `lv_ip`, `lv_source`, `lv_status`, `createdOn`, `updatedOn`) VALUES
(1, 14, '::1', '', '1', '2015-08-25 15:01:49', '0000-00-00 00:00:00'),
(2, 14, '::1', '', '1', '2015-08-25 15:02:23', '0000-00-00 00:00:00'),
(3, 14, '::1', '', '1', '2015-08-25 15:03:23', '0000-00-00 00:00:00'),
(4, 1, '::1', '', '1', '2015-08-25 16:36:54', '0000-00-00 00:00:00'),
(5, 2, '::1', '', '1', '2015-08-25 16:38:27', '0000-00-00 00:00:00'),
(6, 2, '::1', '', '1', '2015-08-25 16:42:17', '0000-00-00 00:00:00'),
(7, 2, '::1', '', '1', '2015-08-25 16:43:14', '0000-00-00 00:00:00'),
(8, 2, '::1', '', '1', '2015-08-25 16:43:30', '0000-00-00 00:00:00'),
(9, 2, '::1', '', '1', '2015-08-25 16:45:17', '0000-00-00 00:00:00'),
(10, 2, '::1', '', '1', '2015-08-25 17:55:56', '0000-00-00 00:00:00'),
(11, 2, '::1', '', '1', '2015-08-25 17:58:48', '0000-00-00 00:00:00'),
(12, 2, '::1', '', '1', '2015-08-25 17:58:59', '0000-00-00 00:00:00'),
(13, 2, '::1', '', '1', '2015-08-25 17:59:41', '0000-00-00 00:00:00'),
(14, 3, '::1', '', '1', '2015-08-25 18:16:44', '0000-00-00 00:00:00'),
(15, 3, '::1', '', '1', '2015-08-25 18:16:55', '0000-00-00 00:00:00');

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
  `p_gender` enum('Male','Female','Other') NOT NULL,
  `p_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_storeId`, `p_name`, `p_desc`, `p_image`, `p_url`, `p_mrp`, `p_price`, `p_category`, `p_brand`, `p_details`, `p_provider`, `p_gender`, `p_status`, `createdOn`, `updatedOn`) VALUES
(1, 'TDHD8YQH2U5PUG6Z', 'American Tourister Slim Fold Wallet', 'You have never come across the perfect wallet for yourself. Finally you find the American Tourister Slim Fold Wallet â€“ For Unisex. This wallet is durable and sure to show resilience to common damages like tearing and ripping. As this wallet is slim fold it is sure to slip into your back pocket without much hassle. In the compartments of this wallet you can keep your cash and other essentials for the day. The bi-fold design of this unisex wallet makes it compact and easy for you to reach your belongings. For your change and miscellaneous items, this American Tourister Wallet has been equipped with multiple card slots. This wallet along with being sleek is also functional and easy to use. Your change and other miscellaneous items can be stacked in the pockets of this wallet. Wallets are a must-have accessory for both men and women. A safe place to stack all your monetary essentials in, is what this accessory is all about. Keep your cash and other accessories comfortably stacked inside this American Tourister Slim Fold Wallet â€“ Unisex. You can carry this wallet on daily basis or when you are travelling. Pair this wallet with both casual and formal wear.\r\n', 'http://img6a.flixcart.com/image/wallet-card-wallet/g/p/u/16x-0-09-004-american-tourister-wallet-slim-fold-wallet-1100x1360-imad92ejsne8uz5j.jpeg', 'http://dl.flipkart.com/dl/american-tourister-slim-fold-wallet/p/itmd9264wskpdg6q?pid=TDHD8YQH2U5PUG6Z&affid=udayakuma', '490', '367', 1, 1, '', 1, 'Male', '1', '2015-08-25 15:09:39', '0000-00-00 00:00:00'),
(2, 'TDHD8YQHTQSYGSYF', 'Elan Leather Travel Wallet', '', 'http://img5a.flixcart.com/image/travel-document-holder/s/y/f/eltw-247-br-elan-leather-travel-wallet-1100x1360-imadaj4k4hrahwnh.jpeg', 'http://dl.flipkart.com/dl/elan-leather-travel-wallet/p/itmd9264c8wcexek?pid=TDHD8YQHTQSYGSYF&affid=udayakuma', '1695', '1695', 1, 1, '', 1, 'Male', '1', '2015-08-25 15:27:08', '0000-00-00 00:00:00'),
(3, 'TDHD8ZUTBZB7CGUH', 'American Tourister Trifold Wallet', 'He has been preoccupied with too much of work, finally the day has come when he has to give a life changing presentation. He grabs his laptop bag and the American Tourister Trifold Wallet â€“ Unisex. This unisex wallet has a tri-fold design which makes it easy for him to slip it into his trouser pocket. The compartments of this American Tourister Wallet are where he keeps his cash. Equipped with multiple card slots, he never faces a problem when he is flooded with visiting and business cards. This unisex wallet is furnished with ample space for all his essentials for the day. It never gives him an opportunity to complain about space.\r\n', 'http://img6a.flixcart.com/image/travel-document-holder/g/u/h/16x-0-09-002-american-tourister-trifold-wallet-1100x1360-imad947wpdrz576z.jpeg', 'http://dl.flipkart.com/dl/american-tourister-trifold-wallet/p/itmd9264be3sghfc?pid=TDHD8ZUTBZB7CGUH&affid=udayakuma', '690', '517', 1, 1, '', 1, 'Other', '1', '2015-08-25 15:42:05', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `p_categories`
--

INSERT INTO `p_categories` (`pc_id`, `pc_pid`, `pc_name`, `pc_status`, `createdOn`, `updatedOn`, `pc_desc`) VALUES
(1, 0, 'Lifestyle', '1', '2015-08-25 15:13:09', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `p_views`
--

CREATE TABLE IF NOT EXISTS `p_views` (
`pv_id` int(11) NOT NULL,
  `pv_productId` int(11) NOT NULL,
  `pv_ip` varchar(20) NOT NULL,
  `pv_source` text NOT NULL,
  `pv_status` enum('1','0') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `p_views`
--

INSERT INTO `p_views` (`pv_id`, `pv_productId`, `pv_ip`, `pv_source`, `pv_status`, `createdOn`, `updatedOn`) VALUES
(1, 1, '::1', '', '1', '2015-08-25 14:58:25', '0000-00-00 00:00:00'),
(2, 1, '::1', '', '1', '2015-08-25 14:58:43', '0000-00-00 00:00:00'),
(3, 1, '::1', '', '1', '2015-08-25 14:59:57', '0000-00-00 00:00:00'),
(4, 1, '::1', '', '1', '2015-08-25 15:01:12', '0000-00-00 00:00:00'),
(5, 1, '::1', '', '1', '2015-08-25 15:13:15', '0000-00-00 00:00:00'),
(6, 1, '::1', '', '1', '2015-08-25 15:16:00', '0000-00-00 00:00:00'),
(7, 1, '::1', '', '1', '2015-08-25 15:16:04', '0000-00-00 00:00:00'),
(8, 1, '::1', '', '1', '2015-08-25 15:16:17', '0000-00-00 00:00:00'),
(9, 1, '::1', '', '1', '2015-08-25 15:16:37', '0000-00-00 00:00:00'),
(10, 1, '::1', '', '1', '2015-08-25 15:17:01', '0000-00-00 00:00:00'),
(11, 1, '::1', '', '1', '2015-08-25 15:19:03', '0000-00-00 00:00:00'),
(12, 1, '::1', '', '1', '2015-08-25 15:19:24', '0000-00-00 00:00:00'),
(13, 1, '::1', '', '1', '2015-08-25 15:19:35', '0000-00-00 00:00:00'),
(14, 1, '::1', '', '1', '2015-08-25 15:20:08', '0000-00-00 00:00:00'),
(15, 1, '::1', '', '1', '2015-08-25 15:21:20', '0000-00-00 00:00:00'),
(16, 1, '::1', '', '1', '2015-08-25 15:21:45', '0000-00-00 00:00:00'),
(17, 1, '::1', '', '1', '2015-08-25 15:21:53', '0000-00-00 00:00:00'),
(18, 1, '::1', '', '1', '2015-08-25 15:22:02', '0000-00-00 00:00:00'),
(19, 1, '::1', '', '1', '2015-08-25 15:22:09', '0000-00-00 00:00:00'),
(20, 2, '::1', '', '1', '2015-08-25 15:28:21', '0000-00-00 00:00:00'),
(21, 2, '::1', '', '1', '2015-08-25 15:29:57', '0000-00-00 00:00:00'),
(22, 3, '::1', '', '1', '2015-08-25 15:42:21', '0000-00-00 00:00:00'),
(23, 3, '::1', '', '1', '2015-08-25 15:42:28', '0000-00-00 00:00:00'),
(24, 3, '::1', '', '1', '2015-08-25 16:20:05', '0000-00-00 00:00:00'),
(25, 3, '::1', '', '1', '2015-08-25 16:20:21', '0000-00-00 00:00:00'),
(26, 2, '::1', '', '1', '2015-08-25 16:53:18', '0000-00-00 00:00:00'),
(27, 3, '::1', '', '1', '2015-08-25 16:53:23', '0000-00-00 00:00:00'),
(28, 3, '::1', '', '1', '2015-08-25 16:58:38', '0000-00-00 00:00:00'),
(29, 2, '::1', '', '1', '2015-08-25 16:58:44', '0000-00-00 00:00:00'),
(30, 1, '::1', '', '1', '2015-08-25 16:58:49', '0000-00-00 00:00:00'),
(31, 3, '::1', '', '1', '2015-08-25 17:00:10', '0000-00-00 00:00:00');

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
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
`s_id` int(11) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_status` enum('0','1') NOT NULL,
  `s_ip` varchar(20) NOT NULL,
  `createOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(2, 'Designer', 'Designer', 'designer@lookser.com', '8d098696b9ac5ed75139b78eb03b81b02036248d', 2, '1', '2015-08-04 11:34:38', '0000-00-00 00:00:00', ''),
(3, 'Registered', 'User', 'user@lookser.com', '8d098696b9ac5ed75139b78eb03b81b02036248d', 3, '1', '2015-08-04 11:34:38', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
`ud_id` int(11) NOT NULL,
  `ud_uid` int(11) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_about` text NOT NULL,
  `user_location` varchar(60) NOT NULL,
  `user_state` varchar(20) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `user_institution` varchar(60) NOT NULL,
  `user_experience` varchar(10) NOT NULL,
  `user_website` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`ud_id`, `ud_uid`, `user_image`, `user_about`, `user_location`, `user_state`, `user_mobile`, `user_institution`, `user_experience`, `user_website`) VALUES
(1, 1, '', '', '', '', '', '', '', ''),
(2, 2, 'd4.jpg', 'about me', 'Hyderabad', 'Telangana', '9700078025', 'NIFT', '2 years', 'non'),
(3, 3, '', '', '', '', '', '', '', '');

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
 ADD PRIMARY KEY (`lv_id`), ADD KEY `lv_lookId` (`lv_lookId`), ADD KEY `lv_ip` (`lv_ip`);

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
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
 ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
 ADD PRIMARY KEY (`ud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `looks`
--
ALTER TABLE `looks`
MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `l_categories`
--
ALTER TABLE `l_categories`
MODIFY `lc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `l_products`
--
ALTER TABLE `l_products`
MODIFY `lp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `l_views`
--
ALTER TABLE `l_views`
MODIFY `lv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
MODIFY `provider_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `p_categories`
--
ALTER TABLE `p_categories`
MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `p_views`
--
ALTER TABLE `p_views`
MODIFY `pv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
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
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
MODIFY `ud_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
