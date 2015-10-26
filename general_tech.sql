-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2015 at 12:23 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `general_tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `gtech_app_sessions`
--

CREATE TABLE IF NOT EXISTS `gtech_app_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gtech_app_sessions`
--

INSERT INTO `gtech_app_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0d8e2df70f50750d4a04408ebb50b446', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.81 Safari/537.36', 1432987384, ''),
('4eb14e1160cde3193fe4aa4be4f9394b', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:38.0) Gecko/20100101 Firefox/38.0', 1432988067, 'a:6:{s:9:"user_data";s:0:"";s:8:"identity";s:15:"admin@admin.com";s:8:"username";s:5:"admin";s:5:"email";s:15:"admin@admin.com";s:7:"user_id";s:1:"1";s:14:"old_last_login";s:10:"1432974830";}'),
('b58f993857ebb61ec910f52f962d6343', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:38.0) Gecko/20100101 Firefox/38.0', 1432986309, 'a:5:{s:8:"identity";s:15:"admin@admin.com";s:8:"username";s:5:"admin";s:5:"email";s:15:"admin@admin.com";s:7:"user_id";s:1:"1";s:14:"old_last_login";s:10:"1432966371";}');

-- --------------------------------------------------------

--
-- Table structure for table `gtech_brand`
--

CREATE TABLE IF NOT EXISTS `gtech_brand` (
  `brd_id` int(11) NOT NULL AUTO_INCREMENT,
  `brd_title` varchar(255) NOT NULL,
  `brd_url` text NOT NULL,
  `brd_logo` text NOT NULL,
  `brd_desc` text NOT NULL,
  `brd_status` tinyint(1) NOT NULL,
  `brd_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`brd_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gtech_brand`
--

INSERT INTO `gtech_brand` (`brd_id`, `brd_title`, `brd_url`, `brd_logo`, `brd_desc`, `brd_status`, `brd_date`) VALUES
(1, 'Hioki', 'http://www.Hioki.com', '8660583rsz_hioki.jpg', '', 0, '2015-05-29 14:29:59'),
(2, 'Mitutoyo', 'http://www.Mitutoyo.com', '7875671client6.jpg', '', 0, '2015-05-29 14:30:43'),
(3, 'Norbar', 'http://www.Norbar.com', '6938782norbarlogo.jpg', '', 0, '2015-05-29 14:32:01'),
(4, 'Rotronic', 'http://www.Rotronic.com', '2976685client8.jpg', '', 0, '2015-05-29 14:32:32'),
(5, 'Kroeplin', 'http://www.Kroeplin.com', '9331054logo-kroeplin3.jpg', '<p>Kroeplin</p>', 0, '2015-05-29 14:32:58'),
(7, 'new', '', '6147461Tulips.jpg', '', 0, '2015-05-30 14:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `gtech_calibration`
--

CREATE TABLE IF NOT EXISTS `gtech_calibration` (
  `cal_id` int(11) NOT NULL AUTO_INCREMENT,
  `cal_title` text NOT NULL,
  `cal_desc` text NOT NULL,
  `cal_image` varchar(255) NOT NULL,
  `cal_status` tinyint(1) NOT NULL DEFAULT '1',
  `cal_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gtech_calibration`
--

INSERT INTO `gtech_calibration` (`cal_id`, `cal_title`, `cal_desc`, `cal_image`, `cal_status`, `cal_date`) VALUES
(3, 'Force Measuring/Proving Instruments', '<p>Compression testing machines, CBR/Marshall Machines, proving Rings....etc</p>', '8144531service.jpg', 1, '2015-05-30 14:25:14'),
(4, 'Dimensional Measuring Instruments', '<p>Vernier &amp; Digital Calipers, Dial Gauges, Bore gauges,Height Gauges, Micrometers jhdsfjhsf fhshf shf sudhfsuh ha hfuhfuhduhsdu shug shgdfgdsgdsfgdsfg sdfg dsg Vernier &amp; Digital Calipers, Dial Gauges, Bore gauges,Height Gauges, Micrometers jhdsfjhsf fhshf shf sudhfsuh ha hfuhfuhduhsdu shug shgdfgdsgdsfgdsfg sdfg dsg Vernier &amp; Digital Calipers, Dial Gauges, Bore gauges,Height Gauges, Micrometers jhdsfjhsf fhshf shf sudhfsuh ha hfuhfuhduhsdu shug shgdfgdsgdsfgdsfg sdfg dsg&nbsp; Vernier &amp; Digital Calipers, Dial Gauges, Bore gauges,Height Gauges, Micrometers jhdsfjhsf fhshf shf sudhfsuh ha hfuhfuhduhsdu shug shgdfgdsgdsfgdsfg sdfg dsg&nbsp;</p>', '6258240service2.jpg', 1, '2015-05-30 14:26:47'),
(5, 'Force Measuring/Proving Instruments', '<p>Compression testing machines, CBR/Marshall Machines, proving Rings&nbsp;</p><p>Compression testing machines, CBR/Marshall Machines, proving Rings&nbsp;</p><p>Compression testing machines, CBR/Marshall Machines, proving Rings&nbsp;</p><p>Compression testing machines, CBR/Marshall Machines, proving Rings&nbsp;</p><p>Compression testing machines, CBR/Marshall Machines, proving Rings&nbsp;</p><p>Compression testing machines, CBR/Marshall Machines, proving Rings&nbsp;</p><p>Compression testing machines, CBR/Marshall Machines, proving Rings&nbsp;</p>', '6739197service.jpg', 1, '2015-05-30 14:27:11'),
(6, 'emperature Measuring Instruments', '<p>Thermometers, gauges/ Indicators, Probes (RTD, Thermocouples), Temperature Calibrators&nbsp;Thermometers, gauges/ Indicators, Probes (RTD, Thermocouples), Temperature Calibrators&nbsp;Thermometers, gauges/ Indicators, Probes (RTD, Thermocouples), Temperature Calibrators&nbsp;Thermometers, gauges/ Indicators, Probes (RTD, Thermocouples), Temperature Calibrators Thermometers, gauges/ Indicators, Probes (RTD, Thermocouples), Temperature Calibrators</p>', '3410035service2.jpg', 1, '2015-05-30 14:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `gtech_category`
--

CREATE TABLE IF NOT EXISTS `gtech_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_parent` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_status` tinyint(1) NOT NULL DEFAULT '1',
  `cat_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gtech_category`
--

INSERT INTO `gtech_category` (`cat_id`, `cat_parent`, `cat_title`, `cat_desc`, `cat_status`, `cat_date`) VALUES
(1, 0, 'Electrical', '<p>Electrical</p>', 1, '2015-05-29 14:33:51'),
(2, 1, 'Phase Detectors', '<p>Phase Detectors</p>', 1, '2015-05-29 14:34:15'),
(3, 1, 'Insulation Tester', '<p>Insulation Tester</p>', 1, '2015-05-29 14:34:43'),
(4, 0, 'Temperature', '', 1, '2015-05-29 14:34:50'),
(5, 4, 'Infrared Thermometer', '', 1, '2015-05-29 14:34:58'),
(6, 1, 'Clamp Meters', '<p>Clamp Meters</p>', 1, '2015-05-29 14:35:07'),
(8, 1, 'Battery Tester', '<p>Battery Tester</p>', 1, '2015-05-29 14:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `gtech_groups`
--

CREATE TABLE IF NOT EXISTS `gtech_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gtech_groups`
--

INSERT INTO `gtech_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `gtech_login_attempts`
--

CREATE TABLE IF NOT EXISTS `gtech_login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gtech_login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `gtech_products`
--

CREATE TABLE IF NOT EXISTS `gtech_products` (
  `prd_id` int(11) NOT NULL AUTO_INCREMENT,
  `prd_name` varchar(255) NOT NULL,
  `prd_status` varchar(200) NOT NULL,
  `prd_part_number` varchar(255) NOT NULL,
  `prd_price` int(11) NOT NULL,
  `prd_qty` int(11) NOT NULL,
  `prd_brand` int(11) NOT NULL,
  `prd_category` int(11) NOT NULL,
  `prd_features` text NOT NULL,
  `prd_desc` text NOT NULL,
  `prd_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prd_show_on_home` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`prd_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `gtech_products`
--

INSERT INTO `gtech_products` (`prd_id`, `prd_name`, `prd_status`, `prd_part_number`, `prd_price`, `prd_qty`, `prd_brand`, `prd_category`, `prd_features`, `prd_desc`, `prd_date`, `prd_show_on_home`) VALUES
(7, 'asd', '', '', 0, 0, 0, 0, '', '', '2015-05-30 11:51:57', 1),
(8, 'ssss', '', '', 0, 0, 0, 0, '', '', '2015-05-30 11:53:38', 0),
(9, 'dd', '', '', 0, 0, 0, 0, '', '', '2015-05-30 11:55:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gtech_prod_images`
--

CREATE TABLE IF NOT EXISTS `gtech_prod_images` (
  `pdi_id` int(11) NOT NULL AUTO_INCREMENT,
  `pdi_prod_id` int(11) NOT NULL,
  `pdi_image` varchar(255) NOT NULL,
  `pdi_order` int(11) NOT NULL,
  `pdi_status` tinyint(1) NOT NULL DEFAULT '1',
  `pdi_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pdi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gtech_prod_images`
--

INSERT INTO `gtech_prod_images` (`pdi_id`, `pdi_prod_id`, `pdi_image`, `pdi_order`, `pdi_status`, `pdi_date`) VALUES
(3, 2, '7961121Hydrangeas.jpg', 0, 1, '2015-05-29 16:24:27'),
(7, 9, '9124756Chrysanthemum.jpg', 0, 1, '2015-05-30 12:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `gtech_prod_specifications`
--

CREATE TABLE IF NOT EXISTS `gtech_prod_specifications` (
  `spe_id` int(11) NOT NULL AUTO_INCREMENT,
  `spe_prod_id` int(11) NOT NULL,
  `spe_specification` text NOT NULL,
  `spe_specification_detail` text NOT NULL,
  `spe_status` tinyint(1) NOT NULL DEFAULT '1',
  `spe_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`spe_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `gtech_prod_specifications`
--


-- --------------------------------------------------------

--
-- Table structure for table `gtech_users`
--

CREATE TABLE IF NOT EXISTS `gtech_users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gtech_users`
--

INSERT INTO `gtech_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '\0\0', 'admin', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, '9d029802e28cd9c768e8e62277c0df49ec65c48c', 1268889823, 1432986309, 1, 'Super', 'Admin', 'ADMIN', '222-333-4444');

-- --------------------------------------------------------

--
-- Table structure for table `gtech_users_groups`
--

CREATE TABLE IF NOT EXISTS `gtech_users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gtech_users_groups`
--

INSERT INTO `gtech_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);
