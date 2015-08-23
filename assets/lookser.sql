-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2015 at 03:58 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_desc`, `brand_image`, `brand_status`, `createdOn`, `updatedOn`) VALUES
(1, 'Suspense', '', '', '1', '2015-08-05 08:32:40', '0000-00-00 00:00:00'),
(2, 'Fastrack', '', '', '1', '2015-08-05 18:55:10', '0000-00-00 00:00:00'),
(3, 'Reebok', '', '', '1', '2015-08-05 19:00:32', '0000-00-00 00:00:00'),
(4, 'Raybon', '', '', '1', '2015-08-05 19:00:43', '0000-00-00 00:00:00'),
(5, 'Puma', '', '', '0', '2015-08-05 19:01:27', '0000-00-00 00:00:00'),
(6, 'Hanes', '', '', '1', '2015-08-23 05:40:56', '0000-00-00 00:00:00'),
(7, 'Kashana Fashions', '', '', '1', '2015-08-23 05:50:43', '0000-00-00 00:00:00'),
(8, 'people', '', '', '1', '2015-08-23 05:57:41', '0000-00-00 00:00:00'),
(9, 'W', '', '', '1', '2015-08-23 06:04:02', '0000-00-00 00:00:00'),
(10, 'adidas', '', '', '1', '2015-08-23 06:22:48', '0000-00-00 00:00:00'),
(11, 'Superdry', '', '', '1', '2015-08-23 06:32:36', '0000-00-00 00:00:00'),
(12, 'Puma', '', '', '1', '2015-08-23 06:58:56', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `looks`
--

INSERT INTO `looks` (`l_id`, `l_name`, `l_desc`, `l_image`, `l_mrp`, `l_price`, `l_category`, `l_grid`, `l_details`, `l_uid`, `l_status`, `createdOn`, `updatedOn`) VALUES
(12, 'First look', '', '', '', '', 1, 2, '', 2, '0', '2015-08-10 17:56:35', '0000-00-00 00:00:00'),
(13, 'Second look', '', '', '', '', 1, 2, '', 2, '1', '2015-08-10 18:36:12', '0000-00-00 00:00:00'),
(14, 'kurtas combo', '', '', '', '', 1, 4, '', 2, '1', '2015-08-23 06:48:53', '0000-00-00 00:00:00'),
(15, 'asdf', '', '', '', '1274', 1, 2, '', 2, '1', '2015-08-23 11:45:07', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `l_products`
--

INSERT INTO `l_products` (`lp_id`, `lp_lid`, `lp_pid`, `lp_priority`, `lp_status`, `createdOn`, `updatedOn`) VALUES
(18, 12, 1, 0, '1', '2015-08-10 17:56:35', '0000-00-00 00:00:00'),
(19, 12, 2, 0, '1', '2015-08-10 17:56:35', '0000-00-00 00:00:00'),
(20, 13, 1, 0, '1', '2015-08-10 18:36:12', '0000-00-00 00:00:00'),
(21, 13, 4, 0, '1', '2015-08-10 18:36:12', '0000-00-00 00:00:00'),
(22, 14, 7, 0, '1', '2015-08-23 06:48:53', '0000-00-00 00:00:00'),
(23, 14, 11, 0, '1', '2015-08-23 06:48:53', '0000-00-00 00:00:00'),
(24, 14, 10, 0, '1', '2015-08-23 06:48:53', '0000-00-00 00:00:00'),
(25, 14, 9, 0, '1', '2015-08-23 06:48:53', '0000-00-00 00:00:00'),
(26, 15, 5, 0, '1', '2015-08-23 11:45:07', '0000-00-00 00:00:00'),
(27, 15, 6, 0, '1', '2015-08-23 11:45:07', '0000-00-00 00:00:00');

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
(1, 14, '::1', '', '1', '2015-08-23 12:41:59', '0000-00-00 00:00:00'),
(2, 14, '::1', '', '1', '2015-08-23 12:43:25', '0000-00-00 00:00:00'),
(3, 14, '::1', '', '1', '2015-08-23 12:43:28', '0000-00-00 00:00:00'),
(4, 14, '::1', '', '1', '2015-08-23 12:43:29', '0000-00-00 00:00:00'),
(5, 14, '::1', '', '1', '2015-08-23 12:44:25', '0000-00-00 00:00:00'),
(6, 14, '::1', '', '1', '2015-08-23 12:44:32', '0000-00-00 00:00:00'),
(7, 14, '::1', '', '1', '2015-08-23 12:44:34', '0000-00-00 00:00:00'),
(8, 14, '::1', '', '1', '2015-08-23 12:44:34', '0000-00-00 00:00:00'),
(9, 14, '::1', '', '1', '2015-08-23 12:45:19', '0000-00-00 00:00:00'),
(10, 14, '::1', '', '1', '2015-08-23 12:45:21', '0000-00-00 00:00:00'),
(11, 14, '::1', '', '1', '2015-08-23 12:45:21', '0000-00-00 00:00:00'),
(12, 14, '::1', '', '1', '2015-08-23 12:45:22', '0000-00-00 00:00:00'),
(13, 14, '::1', '', '1', '2015-08-23 12:45:22', '0000-00-00 00:00:00'),
(14, 14, '::1', '', '1', '2015-08-23 12:45:22', '0000-00-00 00:00:00'),
(15, 14, '::1', '', '1', '2015-08-23 12:45:22', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_storeId`, `p_name`, `p_desc`, `p_image`, `p_url`, `p_mrp`, `p_price`, `p_category`, `p_brand`, `p_details`, `p_provider`, `p_status`, `createdOn`, `updatedOn`) VALUES
(1, 'SHTDYPAYAHVQ3YZW', 'Suspense Men''s Solid Casual Shirt', 'Suspense Men''s Solid Casual Shirt', 'http://img5a.flixcart.com/image/shirt/a/r/x/rcsh-nb-suspense-l-400x400-imadyqfzyr6zdbgh.jpeg', '', '1099', '499', 1, 1, '', 1, '1', '2015-08-05 08:33:23', '0000-00-00 00:00:00'),
(4, 'SHTE88BAWCHHBFBE', 'Blackberrys Men''s Self Design Casual Shirt', '', 'http://img5a.flixcart.com/image/shirt/z/v/w/msmap00eben16spqestate-blue-blackberrys-39-400x400-imae9rwh6rwuzm7z.jpeg', '', '2000', '1995', 1, 1, '', 1, '1', '2015-08-07 16:18:33', '0000-00-00 00:00:00'),
(5, 'SPWDQGFPAKFXPPYZ', 'Hanes Seamless Thigh BD901 Women''s Shapewear', 'Designed to sculpt and shape your body where it needs it the most â€“ hip to thighs, this Hanes mid-thigh shaping brief smoothens your figure and gives you a flawless look. It also comes with a ribbed stretch waist for good compression.', 'http://img5a.flixcart.com/image/shapewear/h/h/h/83bd901-4-pl-hanes-m-700x700-imadqy6qu2zsmdyz.jpeg', 'http://dl.flipkart.com/dl/hanes-seamless-thigh-bd901-women-s-shapewear/p/itmdte3dqrah52kx?pid=SPWDQGFPAKFXPPYZ', '775', '775', 1, 2, '', 1, '1', '2015-08-23 05:40:16', '0000-00-00 00:00:00'),
(6, 'KRTE7WMSFSARXWCT', 'Kashana Fashions Casual Printed Women''s Kurti', 'Leave Everyone Mesmerized With The Apperal Of This Green Color Cotton Febric Printed Chinese Collor Neck Kurti. This Aesthetically Designed Make This Kurti Become A Regular Wear For Every Girl. It Is Dexterously Made Of 100% Cotton Fabric. This Kurti Can Be Worn Over Your Favorite Jeans, Pant, Skirt, Leggings, Salwaar Or Churidaars. It Is Versatile For Any Occasion And Is Comfy For Any Season.', 'http://img5a.flixcart.com/image/kurti/h/u/u/basic129-fab-nisa-xxl-700x700-imae29ycuj6ffgcs.jpeg;', 'http://dl.flipkart.com/dl/kashana-fashions-casual-solid-women-s-kurti/p/itme8f9efz53zbbf?pid=KRTE7WMSFSARXWCT', '1499', '499', 4, 7, '', 1, '1', '2015-08-23 05:53:21', '0000-00-00 00:00:00'),
(7, 'KTADN7X9QC32JTZV', 'People Printed Women''s Kurta', 'Showcase your polished look by wearing this People Kurta. This purple kurta has been designed to give you that chic look along with elevating your style quotient. Pair this kurta with leggings and Â peep-toe pumps to complete the look.', 'http://img5a.flixcart.com/image/kurta/f/h/c/p10202139019914purple-people-s-700x700-imadny84efhfhwuc.jpeg', 'http://dl.flipkart.com/dl/people-printed-women-s-kurta/p/itmdn7yh8f2vu6gq?pid=KTADN7X9QC32JTZV', '799', '799', 5, 8, '', 1, '1', '2015-08-23 06:00:24', '0000-00-00 00:00:00'),
(9, 'KTAEY68DGDXWVJVT', 'W Printed Women''s Kurta', '', 'http://img6a.flixcart.com/image/kurta/f/u/h/14au14551-55896-w-10-700x700-imaeyzcxr6be5cyw.jpeg', 'http://dl.flipkart.com/dl/w-printed-women-s-kurta/p/itmey68fwyejwzpf?pid=KTAEY68DGDXWVJVT', '1299', '623', 5, 9, '', 1, '1', '2015-08-23 06:06:26', '0000-00-00 00:00:00'),
(10, 'KTADRG85A7YXB7CE', 'People Printed Women''s Kurta', '', 'http://img5a.flixcart.com/image/kurta/u/z/x/p10202139128914wine-people-s-700x700-imads2dasj5n6jss.jpeg', 'http://dl.flipkart.com/dl/people-printed-women-s-kurta/p/itmdrg85gxprgfje?pid=KTADRG85A7YXB7CE', '699', '699', 5, 8, '', 1, '1', '2015-08-23 06:08:06', '0000-00-00 00:00:00'),
(11, 'KTAEYUNKEKMHX4SU', 'W Solid Women''s Kurta', '', 'http://img5a.flixcart.com/image/kurta/7/j/r/13fe13391-20255yellow-w-s-700x700-imae2f6xb7r2fjyf.jpeg', 'http://dl.flipkart.com/dl/w-solid-women-s-kurta/p/itmeyunhnep76xrh?pid=KTAEYUNKEKMHX4SU', '1199', '1199', 5, 9, '', 1, '1', '2015-08-23 06:15:33', '0000-00-00 00:00:00'),
(12, 'KTAEF3H6CEFT86WQ', 'W Solid Women''s Kurta', '', 'http://img6a.flixcart.com/image/kurta/8/p/s/14no14811-65480-w-s-700x700-imaefwscrvgewqkg.jpeg', 'http://dl.flipkart.com/dl/w-solid-women-s-kurta/p/itmef3h6w7f4qszg?pid=KTAEF3H6CEFT86WQ', '1999', '959', 5, 9, '', 1, '1', '2015-08-23 06:19:54', '0000-00-00 00:00:00'),
(13, 'SKIDJCVZHTJAGDH8', 'adidas Solid Women''s Skirt', '', 'http://img5a.flixcart.com/image/skirt/u/f/c/z09541-adidas-s-700x700-imadh6krhdzhvcvg.jpeg', 'http://dl.flipkart.com/dl/adidas-solid-women-s-skirt/p/itmdmvk3qf9cnuyj?pid=SKIDJCVZHTJAGDH8', '1299', '1299', 6, 10, '', 1, '1', '2015-08-23 06:24:33', '0000-00-00 00:00:00'),
(14, 'JCKE9DCGGZTF7G5G', 'Superdry Full Sleeve Solid Women''s Non-quilted Jacket', 'Black jacket with a self check pattern, has a layered mock collar with a ribbed inner layer, a panelled hood with a toggle drawstring fastening and a Velcro closure with inner fleece lining, branding on the left shoulder, long sleeves with contrast branding on the right hem, has ribbed layered cuffs on the sleeves with a functional thumb cut-out detailing, a triple layered full zip front closure, concealed insert pocket on either side of the front waist with a zip closure, has embroidered branding on the back below the right shoulder, toggle drawstring fastening on the hems, has an inner fleece lining. Look your fashionable best in this super stylish jacket from Superdry. The amazing British and Japanese styling gives you a unique look with great comfort. Wear this jacket with your casual attire.', 'http://img5a.flixcart.com/image/jacket/2/t/v/725072-superdry-m-700x700-imae9bhmnrf6hh83.jpeg', 'http://dl.flipkart.com/dl/superdry-full-sleeve-solid-women-s-non-quilted-jacket/p/itme9dcgfb2mshy7?pid=JCKE9DCGGZTF7G5G', '8490', '8490', 0, 11, '', 1, '1', '2015-08-23 06:35:44', '0000-00-00 00:00:00'),
(15, 'JCKE978FHVPGPHEZ', 'Puma Full Sleeve Striped Women''s Quilted Jacket', 'Blue padded jacket with quilt stitch detailing, has a mock collar, full zip front closure, long sleeves with ribbed cuffs, insert pocket on the front waist with press button closure, brand embroidery on the left chest, ribbed hem, has an inner insert pocket. If there''s a jacket that can add brownie points to your cool quotient while keeping you warm, this is it. This jacket features the warmCELL technology, which keeps you warm throughout. This strikingly stylish Puma jacket can be paired with jeggings and sneakers for an effortlessly casual and sporty look.', 'http://img6a.flixcart.com/image/jacket/h/e/z/353811-puma-s-700x700-imae94hpsbsbfhze.jpeg', 'http://dl.flipkart.com/dl/puma-full-sleeve-striped-women-s-quilted-jacket/p/itme978fudsnvh25?pid=JCKE978FHVPGPHEZ', '4499', '4499', 7, 12, '', 1, '1', '2015-08-23 07:00:02', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `p_categories`
--

INSERT INTO `p_categories` (`pc_id`, `pc_pid`, `pc_name`, `pc_status`, `createdOn`, `updatedOn`, `pc_desc`) VALUES
(1, 0, 'Shirt', '1', '2015-08-05 08:32:10', '0000-00-00 00:00:00', 'Casual'),
(2, 0, 'Jeans', '0', '2015-08-07 15:36:04', '0000-00-00 00:00:00', 'Cotton Jeans'),
(3, 1, 'formal', '1', '2015-08-13 17:20:22', '0000-00-00 00:00:00', 'asdf'),
(4, 0, 'Kurtis', '1', '2015-08-23 05:48:59', '0000-00-00 00:00:00', ''),
(5, 0, 'Kurtas', '1', '2015-08-23 05:58:01', '0000-00-00 00:00:00', ''),
(6, 0, 'Skirts', '1', '2015-08-23 06:23:50', '0000-00-00 00:00:00', ''),
(7, 0, 'Jackets', '1', '2015-08-23 06:58:03', '0000-00-00 00:00:00', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `p_views`
--

INSERT INTO `p_views` (`pv_id`, `pv_productId`, `pv_ip`, `pv_source`, `pv_status`, `createdOn`, `updatedOn`) VALUES
(1, 9, '::1', '', '1', '2015-08-23 12:53:06', '0000-00-00 00:00:00'),
(2, 9, '::1', '', '1', '2015-08-23 13:01:08', '0000-00-00 00:00:00'),
(3, 9, '::1', '', '1', '2015-08-23 13:02:45', '0000-00-00 00:00:00'),
(4, 5, '::1', '', '1', '2015-08-23 13:02:54', '0000-00-00 00:00:00'),
(5, 5, '::1', '', '1', '2015-08-23 13:03:26', '0000-00-00 00:00:00'),
(6, 7, '::1', '', '1', '2015-08-23 13:03:31', '0000-00-00 00:00:00'),
(7, 4, '::1', '', '1', '2015-08-23 13:03:34', '0000-00-00 00:00:00'),
(8, 10, '::1', '', '1', '2015-08-23 13:04:34', '0000-00-00 00:00:00'),
(9, 10, '::1', '', '1', '2015-08-23 13:04:53', '0000-00-00 00:00:00'),
(10, 15, '::1', '', '1', '2015-08-23 13:05:01', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`s_id`, `s_email`, `s_status`, `s_ip`, `createOn`, `updatedOn`) VALUES
(1, 'asdf@gmail.com', '0', '::1', '2015-08-23 13:30:16', '0000-00-00 00:00:00'),
(5, 'asdf@gmail.comz', '0', '::1', '2015-08-23 13:41:09', '0000-00-00 00:00:00');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `looks`
--
ALTER TABLE `looks`
MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `l_categories`
--
ALTER TABLE `l_categories`
MODIFY `lc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `l_products`
--
ALTER TABLE `l_products`
MODIFY `lp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `l_views`
--
ALTER TABLE `l_views`
MODIFY `lv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
MODIFY `provider_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `p_categories`
--
ALTER TABLE `p_categories`
MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `p_views`
--
ALTER TABLE `p_views`
MODIFY `pv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
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
MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
