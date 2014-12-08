-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2014 at 05:34 PM
-- Server version: 5.1.54
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `villauk`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `applications`
--


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `status`, `created_at`, `modified_at`) VALUES
(5, 'EEE', 0, 0, '2014-11-23 12:24:56', '2014-11-23 12:24:56'),
(4, 'IT', 0, 0, '2014-11-23 12:24:44', '2014-11-23 12:24:44'),
(6, 'ECE', 0, 0, '2014-11-23 12:25:02', '2014-11-26 23:23:04'),
(7, 'Mech', 0, 0, '2014-11-27 21:31:19', '2014-11-27 21:31:19'),
(8, 'Civil', 0, 0, '2014-11-27 21:31:26', '2014-11-27 21:31:26'),
(9, 'E&I', 0, 0, '2014-11-27 21:31:35', '2014-11-27 21:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contact`
--


-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `job_type` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `cat_id`, `salary`, `location`, `job_type`, `code`, `desc`, `email`, `created_at`, `modified_at`) VALUES
(1, 'PHP Developer', 1, 600000, 0, 0, 'ID3434', 'job desc', 'recruiter@company.com', '0000-00-00 00:00:00', '2014-11-03 23:01:32'),
(2, 'Java Developer', 2, 700000, 0, 1, 'ID4545', 'desc', 'recruiter@company.com', '0000-00-00 00:00:00', '2014-11-03 23:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `created_at`, `modified_at`) VALUES
(1, 'Chennai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Salem', '2014-11-23 13:51:15', '2014-11-23 13:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL,
  `menu_slug` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `menu_slug`, `parent_id`, `created_at`, `modified_at`) VALUES
(12, 'Sub Menu1', 'Sub_Menu1', 11, '2014-11-26 23:36:04', '2014-11-26 23:36:04'),
(11, 'Services', 'Services', 0, '2014-11-26 23:35:54', '2014-11-26 23:35:54'),
(10, 'About Us', 'About_Us', 0, '2014-11-26 23:35:47', '2014-11-26 23:35:47'),
(9, 'home', 'home', 0, '2014-11-26 23:35:38', '2014-11-26 23:35:38'),
(13, 'Sub Menu2', 'Sub_Menu2', 10, '2014-11-26 23:36:21', '2014-11-26 23:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `menu` tinyint(1) NOT NULL,
  `footer` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `parent`, `title`, `slug`, `desc`, `status`, `menu`, `footer`, `created_at`, `modified_at`) VALUES
(1, 0, 'Home', 'Home', 'Home page content', 1, 0, 0, '0000-00-00 00:00:00', '2014-11-03 22:50:42'),
(2, 0, 'About Us', 'about-us', 'This is about us page Content', 1, 0, 0, '0000-00-00 00:00:00', '2014-11-03 22:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `reffered`
--

CREATE TABLE IF NOT EXISTS `reffered` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `referer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reffered`
--


-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `role`
--


-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `testimonial`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `cover` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `referal_code` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `resume`, `cover`, `role_id`, `referal_code`, `status`, `created_at`, `modified_at`) VALUES
(1, 'super', 'admin', 'superadmin@villauk.com', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', 1, '', 1, '0000-00-00 00:00:00', '2014-11-23 14:01:59');
