-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2019 at 10:58 AM
-- Server version: 5.6.43
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rn_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_type` enum('1','2','3') NOT NULL DEFAULT '2' COMMENT '1= super admin , 2= half_admin_right,3=low_admin_right',
  `admin_key` varchar(15) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `admin_email` varchar(255) NOT NULL DEFAULT '',
  `litigation_days` int(5) DEFAULT NULL,
  `admin_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `contact_phone` varchar(50) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `post_date` date NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_type`, `admin_key`, `admin_username`, `admin_password`, `admin_email`, `litigation_days`, `admin_last_login`, `address`, `city`, `country`, `phone`, `fax`, `contact_person`, `contact_phone`, `contact_email`, `post_date`, `status`) VALUES
(1, '1', 'cnsgkMd4', 'admin', 'admin123', 'info@belsenglish.com', 20, '0000-00-00 00:00:00', 'Noida sec 2', 'New Delhi', 'India', '564564564565', '', '', '', '', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ip_address` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `user_agent` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_activity` int(10) DEFAULT NULL,
  `user_data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('b86bf11ccaf26311693729f1089d5b5f', '203.89.97.120', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 1575021279, 'a:7:{s:9:\"user_data\";s:0:\"\";s:13:\"previous_page\";s:27:\"adminzone/courses/lession/4\";s:10:\"admin_user\";s:5:\"admin\";s:7:\"adm_key\";s:8:\"cnsgkMd4\";s:10:\"admin_type\";s:1:\"1\";s:8:\"admin_id\";s:1:\"1\";s:15:\"admin_logged_in\";b:1;}'),
('25f802b1a1d9ca4c62b50f45d0275ac6', '103.73.155.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 1575024983, 'a:17:{s:9:\"user_data\";s:0:\"\";s:13:\"previous_page\";s:18:\"adminzone/dashbord\";s:10:\"admin_user\";s:5:\"admin\";s:7:\"adm_key\";s:8:\"cnsgkMd4\";s:10:\"admin_type\";s:1:\"1\";s:8:\"admin_id\";s:1:\"1\";s:15:\"admin_logged_in\";b:1;s:7:\"user_id\";s:2:\"60\";s:10:\"login_type\";s:6:\"normal\";s:8:\"username\";s:26:\"rohitdigitalmart@gmail.com\";s:5:\"title\";N;s:10:\"first_name\";s:6:\"lokesh\";s:9:\"last_name\";s:7:\"khaitan\";s:10:\"is_blocked\";s:1:\"0\";s:12:\"blocked_time\";s:19:\"0000-00-00 00:00:00\";s:6:\"course\";s:5:\"7,8,9\";s:9:\"logged_in\";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_type` enum('1','2','3') NOT NULL DEFAULT '2' COMMENT '1= super admin , 2= half_admin_right,3=low_admin_right',
  `admin_key` varchar(15) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `admin_email` varchar(255) NOT NULL DEFAULT '',
  `litigation_days` int(5) DEFAULT NULL,
  `admin_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `contact_phone` varchar(50) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `post_date` date NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_type`, `admin_key`, `admin_username`, `admin_password`, `admin_email`, `litigation_days`, `admin_last_login`, `address`, `city`, `country`, `phone`, `fax`, `contact_person`, `contact_phone`, `contact_email`, `post_date`, `status`) VALUES
(1, '1', 'cnsgkMd4', 'admin', 'admin123', 'info@qgspl.com', 20, '0000-00-00 00:00:00', 'Noida sec 2', 'New Delhi', 'India', '564564564565', '', '', '', '', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auto_respond_mails`
--

CREATE TABLE `tbl_auto_respond_mails` (
  `id` int(11) NOT NULL,
  `email_section` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_subject` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_auto_respond_mails`
--

INSERT INTO `tbl_auto_respond_mails` (`id`, `email_section`, `email_subject`, `email_content`, `status`, `updated_on`) VALUES
(1, 'Registration ', 'Welcome to {site_name}', '<table border=\"0\" xss=removed>\r\n <tbody>\r\n  <tr>\r\n   <td colspan=\"2\"><strong>Hi {mem_name},</strong></td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">We are happy to have you as the newest member of {site_name}!</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">This is a registration email as per the details submitted by you. You are now registered on {site_name} with the following details:</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\"> </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Email ID:</strong></td>\r\n   <td>{username}</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Password:</strong></td>\r\n   <td>{password}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\"> </td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Thanks again. We hope you will visit us again soon and put these special services to work for you.<br>\r\n   Please feel free to contact us if you have any questions at all.</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\"> </td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Thank you.<br>\r\n   {site_name} Customer Service<br>\r\n   Email: {admin_email}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\" xss=removed>© 2013 {site_name}. All right reserved.</td>\r\n  </tr>\r\n </tbody>\r\n</table>', '1', '2017-08-14 16:30:35'),
(2, 'Forgot Password', 'Forgot Password', '<table border=\"0\" style=\"width:100%\">\r\n <tbody>\r\n  <tr>\r\n   <td colspan=\"2\"><strong>Hi {mem_name},</strong></td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Your login details are as follows:</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Email ID:</strong></td>\r\n   <td>{username}</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>password:</strong></td>\r\n   <td>{password}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Click here to login {link}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Thank you.<br />\r\n   {site_name} Customer Service<br />\r\n   Email: {admin_email}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\" style=\"text-align:center\">&copy; 2013 {site_name}. All right reserved.</td>\r\n  </tr>\r\n </tbody>\r\n</table>', '1', '2013-05-08 05:01:25'),
(3, 'Refer To Friends', 'Refer a Friend', '<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border:2px solid #e9e9e9; margin-top:10px; width:600px\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"text-align:left\">Hi {friend_name},</td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n   <p>{your_name} has recommended this {text}, as {your_name} thinks you would like it.<br />\r\n   <br />\r\n   To view the Deal details please click on the following link.<br />\r\n   <br />\r\n   {site_link}</p>\r\n\r\n   <p>Thanks and Regards,</p>\r\n\r\n   <p>{site_name} Team</p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"text-align:center\">&copy; 2013 {site_name}. All right reserved.</td>\r\n  </tr>\r\n </tbody>\r\n</table>', '1', '2013-05-08 05:03:53'),
(1, 'Registration ', 'Welcome to {site_name}', '<table border=\"0\" xss=removed>\r\n <tbody>\r\n  <tr>\r\n   <td colspan=\"2\"><strong>Hi {mem_name},</strong></td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">We are happy to have you as the newest member of {site_name}!</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">This is a registration email as per the details submitted by you. You are now registered on {site_name} with the following details:</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\"> </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Email ID:</strong></td>\r\n   <td>{username}</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Password:</strong></td>\r\n   <td>{password}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\"> </td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Thanks again. We hope you will visit us again soon and put these special services to work for you.<br>\r\n   Please feel free to contact us if you have any questions at all.</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\"> </td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Thank you.<br>\r\n   {site_name} Customer Service<br>\r\n   Email: {admin_email}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\" xss=removed>© 2013 {site_name}. All right reserved.</td>\r\n  </tr>\r\n </tbody>\r\n</table>', '1', '2017-08-14 16:30:35'),
(2, 'Forgot Password', 'Forgot Password', '<table border=\"0\" style=\"width:100%\">\r\n <tbody>\r\n  <tr>\r\n   <td colspan=\"2\"><strong>Hi {mem_name},</strong></td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Your login details are as follows:</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Email ID:</strong></td>\r\n   <td>{username}</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>password:</strong></td>\r\n   <td>{password}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Click here to login {link}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Thank you.<br />\r\n   {site_name} Customer Service<br />\r\n   Email: {admin_email}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\" style=\"text-align:center\">&copy; 2013 {site_name}. All right reserved.</td>\r\n  </tr>\r\n </tbody>\r\n</table>', '1', '2013-05-08 05:01:25'),
(3, 'Refer To Friends', 'Refer a Friend', '<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border:2px solid #e9e9e9; margin-top:10px; width:600px\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"text-align:left\">Hi {friend_name},</td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n   <p>{your_name} has recommended this {text}, as {your_name} thinks you would like it.<br />\r\n   <br />\r\n   To view the Deal details please click on the following link.<br />\r\n   <br />\r\n   {site_link}</p>\r\n\r\n   <p>Thanks and Regards,</p>\r\n\r\n   <p>{site_name} Team</p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"text-align:center\">&copy; 2013 {site_name}. All right reserved.</td>\r\n  </tr>\r\n </tbody>\r\n</table>', '1', '2013-05-08 05:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `friendly_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(3) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `statuss` enum('0','1','2') COLLATE utf8_bin NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `meta_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_keywords` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_description` varchar(225) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `branch_name`, `friendly_url`, `sort_order`, `date_added`, `date_modified`, `statuss`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(1, 'Noida Centre', 'Noida Centre', NULL, '2018-01-09 13:36:51', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(2, 'Shahdara Centre', 'Shahdara Centre', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(3, 'Laxmi Nagar Centre', 'Laxmi Nagar Centre', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(4, 'Uttam Nagar Centre', 'Uttam Nagar Centre', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `friendly_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(3) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1','2') COLLATE utf8_bin NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `meta_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_keywords` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_description` varchar(225) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`, `friendly_url`, `category_image`, `category_description`, `parent_id`, `sort_order`, `date_added`, `date_modified`, `status`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(1, 'English', 'english', '', '0', 0, NULL, '2018-03-10 09:15:58', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(7, 'Adverb', 'adverb', '', '0', 1, NULL, '2018-03-15 10:21:22', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(4, 'Articles', 'articles', '', '', 1, NULL, '2018-03-10 09:17:08', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(6, 'Adjective', 'adjective', '', '', 1, NULL, '2018-03-15 09:25:14', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(8, 'Modals', 'modals', '', '0', 1, NULL, '2018-03-15 10:22:35', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(9, 'Sentences', 'sentences', '', '0', 1, NULL, '2018-03-15 10:27:44', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(10, 'Parts of speech', 'parts-of-speech', '', '0', 1, NULL, '2018-03-15 10:29:29', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(11, 'Active and Passive Voice', 'active-and-passive-voice', '', '0', 1, NULL, '2018-03-27 10:20:15', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(12, 'Preposition', 'preposition', '', '0', 1, NULL, '2018-03-30 06:35:21', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(13, 'Verb', 'verb', '', '0', 1, NULL, '2018-03-30 06:37:14', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(14, 'Narration', 'narration', '', '0', 1, NULL, '2018-03-30 06:40:44', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(15, 'Conditional Sentences', 'conditional-sentences', '', '0', 1, NULL, '2018-03-30 07:56:08', '0000-00-00 00:00:00', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `friendly_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(3) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1','2') COLLATE utf8_bin NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `meta_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_keywords` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_description` varchar(225) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`category_id`, `category_name`, `friendly_url`, `category_image`, `category_description`, `parent_id`, `sort_order`, `date_added`, `date_modified`, `status`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(1, 'Andra pradesh', 'andra-pradesh', '', '0', 0, NULL, '2017-05-22 10:57:35', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(96, 'thrissur', 'thrissur', NULL, '', 14, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(3, 'assam\r\n\r\n', 'assam\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(4, 'Bihar', 'bihar', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(5, 'chhatisgarh\r\n', 'chhatisgarh\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(6, 'delhi\r\n', 'delhi\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(7, 'goa\r\n', 'goa\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(8, 'gujrat\r\n\r\n', 'gujrat\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(9, 'haryana\r\n', 'haryana\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(10, 'himachal pradesh\r\n\r\n', 'himachal pradesh\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(11, 'jamu kashmir\r\n\r\n', 'jamu kashmir\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(12, 'jarkhand\r\n\r\n', 'jarkhand\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(13, 'karnataka\r\n\r\n', 'karnataka\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(14, 'kerala\r\n\r\n', 'kerala\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(15, 'madhya pradesh\r\n\r\n', 'madhya pradesh\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(16, 'maharashtra\r\n\r\n', 'maharashtra\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(17, 'orissa\r\n\r\n', 'orissa\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(18, 'punjab\r\n\r\n', 'punjab\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(19, 'rajasthan\r\n\r\n', 'rajasthan\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(20, 'tamilnadu\r\n\r\n', 'tamilnadu\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(21, 'telangana\r\n\r\n', 'telangana\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(22, 'uttar pradesh\r\n\r\n', 'uttar pradesh\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(23, 'uttrakhand\r\n\r\n\r\n', 'uttrakhand\r\n\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(24, 'westbangal\r\n\r\n\r\n\r\n', 'westbangal\r\n\r\n\r\n\r\n', NULL, '', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(95, 'thiruvananthapuram', 'thiruvananthapuram', NULL, '', 14, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(94, 'palakkad', 'palakkad', NULL, '', 14, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(93, 'kottayam', 'kottayam', NULL, '', 14, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(92, 'kollam', 'kollam', NULL, '', 14, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(91, 'kannur', 'kannur', NULL, '', 14, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(90, 'ernakulam', 'ernakulam', NULL, '', 14, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(89, 'hubli', 'hubli', NULL, '', 13, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(88, 'gulbarga', 'gulbarga', NULL, '', 13, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(87, 'bangalore', 'bangalore', NULL, '', 13, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(86, 'ranchi', 'ranchi', NULL, '', 12, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(85, 'dandbad', 'dandbad', NULL, '', 12, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(84, 'jamu', 'jamu', NULL, '', 11, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(83, 'shimla', 'shimla', NULL, '', 10, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(82, 'rohtak', 'rohtak', NULL, '', 9, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(81, 'panipath', 'panipath', NULL, '', 9, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(80, 'panchkula', 'panchkula', NULL, '', 9, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(79, 'hisar', 'hisar', NULL, '', 9, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(78, 'gurgaon', 'gurgaon', NULL, '', 9, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(77, 'faridabad', 'faridabad', NULL, '', 9, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(76, 'virar', 'virar', NULL, '', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(75, 'silvassa', 'silvassa', NULL, '', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(74, 'jamnagar', 'jamnagar', NULL, '', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(73, 'gandhidham', 'gandhidham', NULL, '', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(72, 'bhuj', 'bhuj', NULL, '', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(71, 'surat', 'surat', NULL, '', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(70, 'bhavnagar', 'bhavnagar', NULL, '', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(69, 'bharuch', 'bharuch', NULL, '', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(68, 'anand', 'anand', NULL, '', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(67, 'ahemdabad', 'ahemdabad', NULL, '', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(66, 'goa', 'goa', NULL, '', 7, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(65, 'new delhi ', 'new-delhi-', NULL, '', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(64, 'raipur', 'raipur', NULL, '', 5, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(63, 'bhilai', 'bhilai', NULL, '', 5, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(62, 'patna', 'patna', NULL, '', 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(61, 'guwahati', 'guwahati', NULL, '', 3, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(97, 'bhopal', 'bhopal', NULL, '', 15, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(98, 'dewas', 'dewas', NULL, '', 15, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(99, 'gwalior', 'gwalior', NULL, '', 15, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(100, 'indore ', 'indore-', NULL, '', 15, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(101, 'jabalpur', 'jabalpur', NULL, '', 15, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(102, 'ratlam', 'ratlam', NULL, '', 15, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(103, 'ahmednagar', 'ahmednagar', NULL, '', 16, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(104, 'akola', 'akola', NULL, '', 16, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(105, 'amravati', 'amravati', NULL, '', 16, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(106, 'boisar', 'boisar', NULL, '', 16, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(107, 'dombivli', 'dombivli', NULL, '', 16, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(108, 'jalgaon', 'jalgaon', NULL, '', 16, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(109, 'mumbai', 'mumbai', NULL, '', 16, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(110, 'nanded', 'nanded', NULL, '', 16, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(111, 'navi mumbai', 'navi-mumbai', NULL, '', 16, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(112, 'pune', 'pune', NULL, '', 16, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(113, 'satara', 'satara', NULL, '', 16, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(114, 'solapur', 'solapur', NULL, '', 16, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(115, 'talegaon', 'talegaon', NULL, '', 16, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(116, 'thane', 'thane', NULL, '', 16, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(117, 'berhampur', 'berhampur', NULL, '', 17, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(118, 'bhubaneshwar', 'bhubaneshwar', NULL, '', 17, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(119, 'rourkela', 'rourkela', NULL, '', 17, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(120, 'sambalpur', 'sambalpur', NULL, '', 17, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(121, 'amritsar', 'amritsar', NULL, '', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(122, 'bathinda', 'bathinda', NULL, '', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(123, 'jalandhar', 'jalandhar', NULL, '', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(124, 'ludhiana', 'ludhiana', NULL, '', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(125, 'mohali', 'mohali', NULL, '', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(126, 'patiala', 'patiala', NULL, '', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(127, 'ajmer', 'ajmer', NULL, '', 19, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(128, 'alwar', 'alwar', NULL, '', 19, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(129, 'bhilwara', 'bhilwara', NULL, '', 19, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(130, 'jaipur', 'jaipur', NULL, '', 19, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(131, 'jodhpur', 'jodhpur', NULL, '', 19, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(132, 'kota', 'kota', NULL, '', 19, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(133, 'chennai', 'chennai', NULL, '', 20, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(134, 'erode', 'erode', NULL, '', 20, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(135, 'nagercoil', 'nagercoil', NULL, '', 20, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(136, 'ramanathapuram', 'ramanathapuram', NULL, '', 20, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(137, 'salem', 'salem', NULL, '', 20, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(138, 'tiruchirapalli', 'tiruchirapalli', NULL, '', 20, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(139, 'tirupur', 'tirupur', NULL, '', 20, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(140, 'vellore', 'vellore', NULL, '', 20, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(141, 'hyderabad', 'hyderabad', NULL, '', 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(142, 'secunderabad', 'secunderabad', NULL, '', 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(143, 'agra', 'agra', NULL, '', 22, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(144, 'allahabad', 'allahabad', NULL, '', 22, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(145, 'badlapur', 'badlapur', NULL, '', 22, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(146, 'bareilly', 'bareilly', NULL, '', 22, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(147, 'faizabad', 'faizabad', NULL, '', 22, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(148, 'ghaziabad', 'ghaziabad', NULL, '', 22, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(149, 'greater noida', 'greater-noida', NULL, '', 22, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(150, 'lucknow', 'lucknow', NULL, '', 22, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(151, 'mathura', 'mathura', NULL, '', 22, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(152, 'moradabad', 'moradabad', NULL, '', 22, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(153, 'noida', 'noida', NULL, '', 22, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(154, 'saharanpur', 'saharanpur', NULL, '', 22, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(155, 'varanasi', 'varanasi', NULL, '', 22, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(156, 'haridwar', 'haridwar', NULL, '', 23, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(157, 'asansol', 'asansol', NULL, '', 24, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(158, 'howrah', 'howrah', NULL, '', 24, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(159, 'kolkata', 'kolkata', NULL, '', 24, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cms_pages`
--

CREATE TABLE `tbl_cms_pages` (
  `page_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `page_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `friendly_url` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `page_description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `page_short_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `image` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=Inactive,1=Active,2=Deleted',
  `page_updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cms_pages`
--

INSERT INTO `tbl_cms_pages` (`page_id`, `parent_id`, `page_name`, `friendly_url`, `page_description`, `page_short_description`, `image`, `status`, `page_updated_date`) VALUES
(1, 0, 'Home', 'home', '<p><strong>Home common footer content Lorem ipsum dolor sit amet, consectetur adipisicing elit,</strong> sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', NULL, NULL, '1', '2014-07-29 11:13:03'),
(2, 0, 'About Us', 'about_us', '<div class=\"about nopadding\">\r\n<div class=\"container\">\r\n<div class=\"col-md-6 w3_about_grid\">\r\n<h3>Brief Description about mercantile</h3>\r\n\r\n<p><em>Ut porta at felis non mattis. Morbi tincidunt ipsum et congue tristique. Donec placerat ipsum fringilla suscipit viverra. Aenean vulputate odio sem, vel rutrum nibh eleifend at.</em> Sed scelerisque dignissim malesuada. Sed eget molestie nibh, ut pellentesque nulla. Vestibulum id augue ac sapien ornare porttitor et quis elit. Donec a dolor in enim blandit rhoncus. Nunc vel commodo nisi. Cras lobortis vulputate suscipit. Quisque ut ullamcorper sem, lobortis malesuada massa. Pellentesque at quam eros.Aenean vulputate odio sem, vel rutrum nibh eleifend at.</p>\r\n</div>\r\n\r\n<div class=\"col-md-6 w3_about_grid\"><img alt=\" \" class=\"img-responsive\" src=\"images/16.jpg\"></div>\r\n\r\n<div class=\"clearfix\"> </div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"skills\">\r\n<div class=\"container\">\r\n<h3>Our Skills</h3>\r\n\r\n<p>Vestibulum commodo urna sit amet volutpat.</p>\r\n\r\n<div class=\"agileits_skills_grids\">\r\n<div class=\"col-md-6 agileits_skills_grid\">\r\n<div class=\"bar_group\">\r\n      <div class=\"bar_group__bar thin elastic\" label=\"HTML / CSS Design\" value=\"230\"></div>\r\n      <div class=\"bar_group__bar thin elastic\" label=\"Graphic Design\" value=\"130\"></div>\r\n      <div class=\"bar_group__bar thin elastic\" label=\"SEO\" value=\"160\"></div>\r\n      <div class=\"bar_group__bar thin elastic\" label=\"Wordpress\" value=\"340\"></div>\r\n     </div>\r\n</div>\r\n\r\n<div class=\"col-md-6 agileits_skills_grid\">\r\n<div class=\"bar_group\"><div class=\"bar_group__bar thin elastic\" label=\"App Development\" value=\"190\"></div>\r\n      <div class=\"bar_group__bar thin elastic\" label=\"IT Consultancy\" value=\"250\"></div>\r\n      <div class=\"bar_group__bar thin elastic\" label=\"Agency\" value=\"120\"></div>\r\n      <div class=\"bar_group__bar thin elastic\" label=\"Theme Development\" value=\"160\"></div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"clearfix\"> </div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"team\">\r\n<div class=\"container\">\r\n<h3>Meet Our Team</h3>\r\n\r\n<p>Vestibulum commodo urna sit amet volutpat.</p>\r\n\r\n<div class=\"agile_team_grids\">\r\n<div class=\"col-md-3 agile_team_grid\">\r\n<div class=\"agile_team_grid_main\"><img alt=\" \" class=\"img-responsive\" src=\"images/17.jpg\">\r\n<div class=\"p-mask\">\r\n<ul>\r\n <li> </li>\r\n <li> </li>\r\n <li> </li>\r\n <li> </li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"agile_team_grid1\">\r\n<h3>Linda Carl</h3>\r\n\r\n<p>Business Women</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-3 agile_team_grid\">\r\n<div class=\"agile_team_grid_main\"><img alt=\" \" class=\"img-responsive\" src=\"images/18.jpg\">\r\n<div class=\"p-mask\">\r\n<ul>\r\n <li> </li>\r\n <li> </li>\r\n <li> </li>\r\n <li> </li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"agile_team_grid1\">\r\n<h3>Williamson</h3>\r\n\r\n<p>Business Man</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-3 agile_team_grid\">\r\n<div class=\"agile_team_grid_main\"><img alt=\" \" class=\"img-responsive\" src=\"images/19.jpg\">\r\n<div class=\"p-mask\">\r\n<ul>\r\n <li> </li>\r\n <li> </li>\r\n <li> </li>\r\n <li> </li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"agile_team_grid1\">\r\n<h3>Laura Crisp</h3>\r\n\r\n<p>Business Women</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-3 agile_team_grid\">\r\n<div class=\"agile_team_grid_main\"><img alt=\" \" class=\"img-responsive\" src=\"images/20.jpg\">\r\n<div class=\"p-mask\">\r\n<ul>\r\n <li> </li>\r\n <li> </li>\r\n <li> </li>\r\n <li> </li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"agile_team_grid1\">\r\n<h3>Rosy Paul</h3>\r\n\r\n<p>Business Women</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"clearfix\"> </div>\r\n</div>\r\n</div>\r\n</div>\r\n', NULL, NULL, '1', '2016-08-06 19:31:02'),
(3, 0, 'Terms of Use', 'terms-of-use', '<p>Terms of use Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br />\r\n<br />\r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<h2>Advantage or Phillip Super Sales</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.</p>\r\n\r\n<ul>\r\n <li>Full-fledged engineering and construction solutions</li>\r\n <li>State-of-the-art, well-equipped fabrication yard</li>\r\n <li>Highly-skilled and experienced technical crew</li>\r\n</ul>\r\n\r\n<ol>\r\n <li>Architectural and structural steel installation services</li>\r\n <li>Project mobilization, planning &amp; engineering services</li>\r\n</ol>\r\n', NULL, NULL, '1', '2014-07-29 11:15:50'),
(4, 0, 'Privacy Policy', 'privacy-policy', '<p><strong>Privacy Policy</strong> Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br />\r\n<br />\r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<h2>Advantage or Phillip Super Sales</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.</p>\r\n\r\n<ul>\r\n <li>Full-fledged engineering and construction solutions</li>\r\n <li>State-of-the-art, well-equipped fabrication yard</li>\r\n <li>Highly-skilled and experienced technical crew</li>\r\n</ul>\r\n\r\n<ol>\r\n <li>Architectural and structural steel installation services</li>\r\n <li>Project mobilization, planning &amp; engineering services</li>\r\n</ol>\r\n', NULL, NULL, '1', '2014-07-29 11:16:33'),
(5, 0, 'Disclaimer', 'disclaimer', '<p>Disclaimer Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br />\r\n<br />\r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<h2>Advantage or Phillip Super Sales</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.</p>\r\n\r\n<ul>\r\n <li>Full-fledged engineering and construction solutions</li>\r\n <li>State-of-the-art, well-equipped fabrication yard</li>\r\n <li>Highly-skilled and experienced technical crew</li>\r\n</ul>\r\n\r\n<ol>\r\n <li>Architectural and structural steel installation services</li>\r\n <li>Project mobilization, planning &amp; engineering services</li>\r\n</ol>\r\n', NULL, NULL, '1', '2014-07-29 11:19:29'),
(11, 0, 'Contact Us', 'contact-us', '<p class=\"b fs14 mt5 red\">e-Chemhub</p>\r\n<p class=\"mt5 b p10\" style=\"background:#eee;\">33 &amp; 33A, Rama Road Industrial Area, Kirti Nagar, <br>\r\n        New Delhi - 110015, INDIA</p>\r\n<p class=\"mt15 lh20px\">Call Us : 0124-6128000<br>\r\n          Email Us : <span class=\"orange\"><a href=\"#\" class=\"underline\">customercare@echemhub.com</a></span></p>', NULL, NULL, '1', '2014-07-30 05:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `courses_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `lession_id` int(11) DEFAULT NULL,
  `courses_name` varchar(200) NOT NULL,
  `courses_friendly_url` varchar(110) DEFAULT NULL,
  `courses_code` varchar(64) NOT NULL,
  `courses_description` longtext NOT NULL,
  `str_total_time` varchar(255) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `courses_added_date` datetime NOT NULL,
  `courses_updated_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_courses`
--

INSERT INTO `tbl_courses` (`courses_id`, `category_id`, `lession_id`, `courses_name`, `courses_friendly_url`, `courses_code`, `courses_description`, `str_total_time`, `status`, `courses_added_date`, `courses_updated_date`) VALUES
(1, 0, NULL, 'Function in C Language', 'function-in-c-language', 'Function in C Language', '<h3>UNIT &ndash; 3 FUNCTIONS</h3>\r\n\r\n<div class=\"content-item-description lesson-description\" style=\"box-sizing: inherit; margin-bottom: 20px; font-family: \"Libre Franklin\", \"Helvetica Neue\", helvetica, arial, sans-serif; font-size: 16px;\">\r\n<p><strong>F</strong><strong>unctions</strong></p>\r\n\r\n<p>Until now, in all the C programs that we have written, the program consists of a&nbsp;<strong>main&nbsp;</strong>function and inside that we are writing the logic of the program. The disadvantage of this method is, if the logic/code in the&nbsp;<strong>main&nbsp;</strong>function becomes huge or complex, it will become difficult to debug the program or test the program or maintain the program. So, generally while writing the programs, the entire logic is divided into smaller parts and each part is treated as a function. This type of approach for solving the given problems is known as&nbsp;<strong>Top Down&nbsp;</strong>approach. The top-down approach of solving the given problem can be seen below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Definition:&nbsp;</strong>A function is a self contained block of code that performs a certain task/job. For example, we can write a function for reading an integer or we can write a function to add numbers from 1 to</p>\r\n\r\n<p>100 etc.</p>\r\n\r\n<p>Generally a function can be imagined like a&nbsp;<strong>Black Box</strong>, which accepts data input and transforms the data into output results. The user knows only about the inputs and outputs. User has no knowledge of the process going on inside the box which converts the given input into output. This can be seen diagrammatically as shown below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Types of Functions</strong></p>\r\n\r\n<p>Based on the nature of functions, they can be divided into two categories. They are:</p>\r\n\r\n<ol>\r\n <li>Predefined functions / Library functions</li>\r\n <li>User defined functions</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Predefined functions / Library functions</strong></p>\r\n\r\n<p>A predefined function or library function is a function which is already written by another developer. The users generally use these library functions in their own programs for performing the desired task. The predefined functions are available in the header files. So, the user has to include the respective header file to use the predefined functions available in it.</p>\r\n\r\n<p>For example, the&nbsp;<strong>printf&nbsp;</strong>function which is available in the&nbsp;<strong>stdio.h&nbsp;</strong>header file is used for printing information onto the console. Other examples of predefined functions are: scanf, gets, puts, getchar, putchar, strlen, strcat etc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>User defined functions</strong></p>\r\n\r\n<p>A user defined function is a function which is declared and defined by the user himself. While writing programs, if there are no available library functions for performing a particular task, we write our own function to perform that task. Example for user defined function is&nbsp;<strong>main&nbsp;</strong>function.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Need for functions</strong></p>\r\n\r\n<p>Functions have many advantages in programming. Almost all the languages support the concept of functions in some way. Some of the advantages of writing/using functions are:</p>\r\n\r\n<ol>\r\n <li>Functions support top-down modular programming.</li>\r\n <li>By using functions, the length of the source code decreases.</li>\r\n <li>Writing functions makes it easier to isolate and debug the errors.</li>\r\n <li>Functions allow us to reuse the code.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Functions Terminology</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Creating functions</strong></p>\r\n\r\n<p>For creating functions in C programs, we have to perform two steps. They are: 1) Declaring the function and 2) Defining the function.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Declaring functions</em></strong></p>\r\n\r\n<p>The function declaration is the blue print of the function. The function declaration can also be called as the function&rsquo;s prototype. The function declaration tells the compiler and the user about what is the function&rsquo;s name, inputs and output(s) of the function and the return type of the function. The syntax for declaring a function is shown below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>return-type function-name(parameters list);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int readint( );</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the above example,&nbsp;<strong>readint&nbsp;</strong>is the name of the function,&nbsp;<strong>int&nbsp;</strong>is the return type of the function. In our example,&nbsp;<strong>readint&nbsp;</strong>function has no parameters. The parameters list is optional. The functions are generally declared in the global declaration section of the program.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Defining functions</em></strong></p>\r\n\r\n<p>The function definition specifies how the function will be working i.e the logic of the function will be specified in this step. The syntax of function definition is shown below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>return-type func-name(parameters list&hellip;)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>local variable declarations;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&mdash;&ndash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&mdash;&ndash; return(expression);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the above syntax the&nbsp;<strong>return-type&nbsp;</strong>can be any valid data type in C like: int, float, double, char &nbsp;etc. &nbsp;The &nbsp;<strong>func-name&nbsp;&nbsp;</strong>is &nbsp;the &nbsp;name &nbsp;of &nbsp;the &nbsp;function &nbsp;and &nbsp;it &nbsp;can &nbsp;be &nbsp;any &nbsp;valid &nbsp;identifier. &nbsp;The&nbsp;<strong>parameters list&nbsp;</strong>is optional. The&nbsp;<strong>local variables&nbsp;</strong>are the variables which belong to the function only. They are used within the body of the function, not outside the function. The&nbsp;<strong>return&nbsp;</strong>is a keyword in C. It is an unconditional branch statement. Generally, the&nbsp;<strong>return&nbsp;</strong>statement is used to return a value.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int readint( )</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int num;</p>\r\n\r\n<p>printf(&ldquo;Enter a number: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;num);</p>\r\n\r\n<p>return num;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the above example,&nbsp;<strong>readint&nbsp;</strong>is the name of the function,&nbsp;<strong>int&nbsp;</strong>is the return type. The identifier&nbsp;<strong>num&nbsp;</strong>is a local variable with respect to&nbsp;<strong>readint&nbsp;</strong>function. The above function is reading an integer from the keyboard and returning that value back with the help of the&nbsp;<strong>return&nbsp;</strong>statement.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>N</strong><strong>ote:&nbsp;</strong><em>Care must be taken that the return type of the function and the data type of the value returned by the return statement must match with one another.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Using Functions</strong></p>\r\n\r\n<p>After declaring and defining the functions, we can use the functions in our program. For using the functions, we must&nbsp;<strong>call&nbsp;</strong>the function by its name. The syntax for calling a function is as shown below:</p>\r\n\r\n<p>function-name(parameters list);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The function name along with the parameters list is known as the&nbsp;<strong>function signature.&nbsp;</strong>Care must be taken that while calling the method, the syntax of the function call must match with the function signature. Let&rsquo;s see an example for function call:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>readint( );</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Whenever the compiler comes across a function call, it takes the control of execution to the first statement in the function&rsquo;s definition. After the completion of function i.e., whenever the compiler comes across the&nbsp;<strong>return&nbsp;</strong>statement or the closing brace of the function&rsquo;s body, the control will return back to the next statement after the function call. Let&rsquo;s see this in the following example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>User defined functions</p>\r\n\r\n<p>main( )</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int x;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>x =&nbsp;<u>readint( )</u>;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>printf(&ldquo;Value of x is: %d&rdquo;, x);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Function Call or</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Calling function</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int readint( )</p>\r\n\r\n<p>{</p>\r\n\r\n<p>Called function</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int num;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Function</p>\r\n\r\n<p>Definition</p>\r\n\r\n<p>printf(&ldquo;Enter a number: &ldquo;);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;num);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>return num;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>printf and scanf are predefined functions</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Calling function and Called function</strong></p>\r\n\r\n<p>The point at which the function is being invoked or called is known as the&nbsp;<strong>calling function</strong>. The function which is being executed due to the function call is known as the&nbsp;<strong>called function.&nbsp;</strong>Example for both calling function and the called function is given in the above example.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Formal Parameters and Actual Parameters</strong></p>\r\n\r\n<p>A &nbsp;parameter&nbsp; or &nbsp;argument is &nbsp;data &nbsp;which &nbsp;is &nbsp;taken &nbsp;as &nbsp;input &nbsp;or &nbsp;considered&nbsp; as &nbsp;additional information by the function for further processing. There are two types of parameters or arguments. The parameters which are passed in the function call are known as&nbsp;<strong>actual parameters or actual arguments.&nbsp;</strong>The parameters which are received by the called function are known as&nbsp;<strong>formal parameters or formal arguments.&nbsp;</strong>Example is shown below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>main( )</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int x = 10, y = 20;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>add(x, y);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>void add(int a, int b)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>printf(&ldquo;Sum is: %d&rdquo;,(a+b));</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the above example,&nbsp;<strong>x and y&nbsp;</strong>are known as actual parameters and&nbsp;<strong>a and b&nbsp;</strong>are known as formal parameters. In the above code, we can see that the return type of the function&nbsp;<strong>add&nbsp;</strong>is&nbsp;<strong>void.&nbsp;</strong>This is a keyword in C. The&nbsp;<strong>void&nbsp;</strong>keyword is a datatype. If the function does not return any value, we specify the data type&nbsp;<strong>void.&nbsp;</strong>Generally&nbsp;<strong>void&nbsp;</strong>means nothing / no value.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>N</strong><strong>ote:&nbsp;</strong>The formal parameters and actual parameters can have the same names i.e., if the actual parameters are x and y, then the formal parameters can also be x and y. But, it is recommended to use different names for actual and formal parameters.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Classification of Functions</strong></p>\r\n\r\n<p>Based on the parameters and return values, functions can be categorized into four types. They are:</p>\r\n\r\n<ol>\r\n <li>Function without arguments and without return value.</li>\r\n <li>Function without arguments and with return value.</li>\r\n <li>Function with arguments and with return value.</li>\r\n <li>Function with arguments and without return value.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Function without arguments and without return value</strong></p>\r\n\r\n<p>In this type of functions there are no parameters/arguments in the function definition and the function does not return any value back to&nbsp; the calling function. Generally, these types of functions are used to perform housekeeping tasks such as printing some characters etc.</p>\r\n\r\n<p>Example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>void printstars( )</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int i;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>for(i = 0; i &lt; 20; i++)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>printf(&ldquo; * &rdquo;);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>return;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>In the above example,&nbsp;<strong>printstars&nbsp;</strong>function does not have any parameters. Its task is to print</p>\r\n\r\n<p>20 stars whenever it is called in a program. Also&nbsp;<strong>printstars&nbsp;</strong>function does not return any value back.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Function without arguments and with return value</strong></p>\r\n\r\n<p>In &nbsp;this &nbsp;type &nbsp;of &nbsp;functions,&nbsp; the &nbsp;function&nbsp; definition &nbsp;does &nbsp;not &nbsp;contain &nbsp;arguments. But &nbsp;the function returns a value back to the point at which it was called. An example for this type of function is given below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Example:</p>\r\n\r\n<p>int readint( )</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int num;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>printf(&ldquo;Enter a number: &ldquo;);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;num);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>return num;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>In the above example,&nbsp;<strong>readint&nbsp;</strong>function has no parameters/arguments. The task of this function is to read a integer from the keyboard and return back to the point at which the function was called.</p>\r\n\r\n<p><strong>Function with arguments and with return value</strong></p>\r\n\r\n<p>In this type of functions, the function definition consists of parameters/arguments. Also, these functions returns a value back to the point at which the function was called. These types of functions are the most frequently used in programming. An example for this type of function can be seen below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int add(int x, int y)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int result; result = x + y; return result;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the above example, the function&nbsp;<strong>add&nbsp;</strong>consists of two arguments or parameters&nbsp;<strong>x&nbsp;</strong>and&nbsp;<strong>y</strong>. The function adds both&nbsp;<strong>x&nbsp;</strong>and&nbsp;<strong>y&nbsp;</strong>and returns that value stored in the local variable&nbsp;<strong>result&nbsp;</strong>back to the point at which the function was called.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Predefined / Library Functions</strong></p>\r\n\r\n<p>A function is said to be a predefined function or library function, if they are already declared and defined by another developer. These predefined functions will be available in the library header files. So, if we want to use a predefined function, we have to include the respective header file in our program. For example, if we want to use&nbsp;<strong>printf&nbsp;</strong>function in our program, we have to include the&nbsp;<strong>stdio.h&nbsp;</strong>header file, as the function&nbsp;<strong>printf&nbsp;</strong>has been declared inside it.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Some of the header files in C are:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Some of the predefined functions available in&nbsp;<strong>ctype.h&nbsp;</strong>header file are:</p>\r\n\r\n<p>Some of the predefined functions available in&nbsp;<strong>math.h&nbsp;</strong>header file are:</p>\r\n\r\n<p>Some of the predefined functions in&nbsp;<strong>stdio.h&nbsp;</strong>header file are:</p>\r\n\r\n<p>Some of the predefined functions in&nbsp;<strong>stdlib.h&nbsp;</strong>header file are:</p>\r\n\r\n<p>Some of the predefined functions in&nbsp;<strong>string.h&nbsp;</strong>header file are:</p>\r\n\r\n<p>Some of the predefined functions available in&nbsp;<strong>time.h&nbsp;</strong>header file are</p>\r\n\r\n<p><strong>Programs:</strong></p>\r\n\r\n<p>/* C program to demonstrate functions */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int readint(); /*Function Declaration*/</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int x;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>x = readint();</p>\r\n\r\n<p>printf(&ldquo;Value of x is: %d&rdquo;,x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>int readint() /* Function Definition */</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int n;</p>\r\n\r\n<p>printf(&ldquo;Enter a integer value: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;n);</p>\r\n\r\n<p>return n;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to add numbers by using a function */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int addint();</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int sum;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>sum = addint();</p>\r\n\r\n<p>printf(&ldquo;Sum is: %d&rdquo;,sum);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>int addint()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a,b;</p>\r\n\r\n<p>printf(&ldquo;Enter the values of a and b: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d%d&rdquo;,&amp;a,&amp;b);</p>\r\n\r\n<p>return a+b;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to print 200 stars using a function */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt; void printstars(); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr(); printstars(); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void printstars()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i;</p>\r\n\r\n<p>for(i = 0; i &lt; 200; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;* &ldquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to add two numbers by using a function with parameters */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int addint(int x, int y);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a, b, sum;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the values of a and b: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d%d&rdquo;,&amp;a,&amp;b); sum = addint(a, b); printf(&ldquo;Sum is: %d&rdquo;, sum); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>int addint(int x, int y)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>return x + y;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to print n number of stars using a function */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt; void printstars(int n); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int n;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the value of n: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;n);</p>\r\n\r\n<p>printstars(n);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void printstars(int n)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i;</p>\r\n\r\n<p>for(i = 0; i &lt; n; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;* &ldquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to find whether the given number is even or odd using a function</p>\r\n\r\n<p>*/</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt; void evenodd(int x); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int n;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter a number: &ldquo;); scanf(&ldquo;%d&rdquo;,&amp;n); evenodd(n);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void evenodd(int x)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>if(x % 2 == 0)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;Entered number is even&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;Entered number is odd&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to find the factorial of a given number using a function */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt; void factorial(int x); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int n;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the value of n: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;n);</p>\r\n\r\n<p>factorial(n);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void factorial(int x)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i, fact = 1;</p>\r\n\r\n<p>if(x == 0)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;Factorial of 0 is: 1&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>for(i = 1; i &lt;= x; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>fact = fact * i;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>printf(&ldquo;Factorial of %d is : %d&rdquo;, x, fact);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to generate the first n terms of the Fibonacci sequence using a function*/</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>void fib(int n);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int number;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the number of terms: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;number);</p>\r\n\r\n<p>fib(number);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void fib(int n)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i;</p>\r\n\r\n<p>int a = 0,b = 1,temp = 0;</p>\r\n\r\n<p>if(n == 1)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d&rdquo;,0);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else if(n == 2)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d %d &ldquo;,0,1);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d %d &ldquo;,a,b);</p>\r\n\r\n<p>for(i = 2; i &lt; n; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>temp = a+b;</p>\r\n\r\n<p>a = b;</p>\r\n\r\n<p>b = temp;</p>\r\n\r\n<p>printf(&ldquo;%d &ldquo;,b);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p><strong>Nested Functions</strong></p>\r\n\r\n<p>A &nbsp;function&nbsp; calling &nbsp;another function&nbsp; within &nbsp;its &nbsp;function&nbsp; definition is &nbsp;known&nbsp; as &nbsp;a &nbsp;nested function. So, far we are declaring a&nbsp;<strong>main&nbsp;</strong>function and calling other user-defined functions and predefined functions like&nbsp;<strong>printf, scanf, gets, puts&nbsp;</strong>etc., So,&nbsp;<strong>main&nbsp;</strong>function can be treated as a nested function. Let&rsquo;s see the following example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr(); func1(); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>for(i = 1; i&lt;= 10; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>func2();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func2()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d\\n&rdquo;,i);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the above example, the&nbsp;<strong>main&nbsp;</strong>function is calling three functions namely:&nbsp;<strong>clrscr</strong>,&nbsp;<strong>func1&nbsp;</strong>and&nbsp;<strong>getch</strong>. So,&nbsp;<strong>main&nbsp;</strong>is a nested function. Also, in the definition of&nbsp;<strong>func1</strong>, it is calling another function&nbsp;<strong>func2.&nbsp;</strong>So,&nbsp;<strong>func1&nbsp;</strong>is also a nested function.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Note:&nbsp;</em></strong><em>In programs containing nested functions, the enclosing or outer function returns back only when all the inner functions complete their task.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Program:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to demonstrate a nested function */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int i;</p>\r\n\r\n<p>void func1(); void func2(); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr(); func1(); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>for(i = 1; i&lt;= 10; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>func2();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func2()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d\\n&rdquo;,i);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>R</strong><strong>ecursion</strong></p>\r\n\r\n<p>A function is said to be recursive, if a function calls itself within the function&rsquo;s definition. Let&rsquo;s see the following example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int i = 0; i++; printf(&ldquo;%d\\n&rdquo;,i);</p>\r\n\r\n<p>func1(); &nbsp;/*Recursive Call */</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the above example, func1 is calling itself in the last line of its definition. When we write recursive functions, the function only returns back to the main program when all the recursive calls return back.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Note:&nbsp;</em></strong><em>When writing recursive functions, proper care must be taken that the recursive calls return a value back at some point. Otherwise, the function calls itself infinite number of times.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Program:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C Program to demostrate recursion */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>void func1();</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>clrscr(); func1(); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i = 0; i++; printf(&ldquo;%d\\n&rdquo;,i); func1();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to find the factorial of a given number using a recursive function</p>\r\n\r\n<p>*/</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt; int factorial(int x); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int n, fact;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the value of n: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;n);</p>\r\n\r\n<p>fact = factorial(n);</p>\r\n\r\n<p>printf(&ldquo;Factorial of %d is: %d&rdquo;, n, fact);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>int factorial(int x)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>if(x == 0)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>return 1;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>return x*factorial(x-1);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to generate the first n terms of the Fibonacci sequence using a recursive function*/</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int fib(int n);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i, number;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the number of terms: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;number);</p>\r\n\r\n<p>if(number == 1)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;0&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else if(number == 2)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;0 1&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;0 1 &ldquo;);</p>\r\n\r\n<p>for(i = 3; i &lt;= number; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d &ldquo;, fib(i));</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>int fib(int n)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i, temp;</p>\r\n\r\n<p>if(n == 1)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>return 0;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else if(n == 2)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>return 1;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>temp = fib(n-1) + fib(n-2);</p>\r\n\r\n<p>return temp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Types of Variables</strong></p>\r\n\r\n<p>A variable is a memory location inside memory which is referred using a name. The value inside a variable changes throughout the execution of the program. Based on where the variable is declared in the program, variables can be divided into two types. They are:</p>\r\n\r\n<ol>\r\n <li>Local Variables</li>\r\n <li>Global Variables</li>\r\n</ol>\r\n\r\n<p><strong>Local Variables</strong></p>\r\n\r\n<p>A variable is said to be a local variable if it is declared inside a function or inside a block. The scope of the local variable is within the function or block in which it was declared. A local variable remains &nbsp;in &nbsp;memory &nbsp;until &nbsp;the &nbsp;execution&nbsp; of &nbsp;the &nbsp;function &nbsp;or &nbsp;block &nbsp;in &nbsp;which &nbsp;it &nbsp;was &nbsp;declared &nbsp;in completes. Let&rsquo;s see the following example:</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int x;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>printf(&ldquo;x = %d&rdquo;,x);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>In the above example, the variable&nbsp;<strong>x&nbsp;</strong>is a local variable with respect to the&nbsp;<strong>main&nbsp;</strong>function. Variable&nbsp;<strong>x&nbsp;</strong>is not accessible outside main function and&nbsp;<strong>x&nbsp;</strong>remains in the memory until the execution of the&nbsp;<strong>main&nbsp;</strong>function completes.</p>\r\n\r\n<p><strong>Global Variables</strong></p>\r\n\r\n<p>A variable is said to be a global variable if it is declared outside all the functions in the program. A&nbsp; global variable can be accessed throughout the program by any function. A global variable remains in the memory until the program terminates. In a multi-file program, a global can be accessed in other files wherever the variable is declared with the storage class&nbsp;<strong>extern</strong>.</p>\r\n\r\n<p>Types of variables and their scope and lifetime can be summarized as shown below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table style=\"border-collapse:collapse; box-sizing:inherit; margin:0px 0px 1.5em; width:900px\">\r\n <tbody>\r\n  <tr>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>Type of Variable</strong></p>\r\n   </td>\r\n   <td><strong>Dec</strong><strong>laration</strong>\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>Loca</strong><strong>t</strong><strong>ion</strong></p>\r\n   </td>\r\n   <td><strong>Sc</strong><strong>ope</strong>\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>(V</strong><strong>isibility)</strong></p>\r\n   </td>\r\n   <td><strong>Lifetime</strong>\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>(Alive)</strong></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Local Variable</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Inside a function/block</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Within the function/block</p>\r\n   </td>\r\n   <td>Until the function/block completes</td>\r\n  </tr>\r\n  <tr>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Global Variable</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Outside a function/block</p>\r\n   </td>\r\n   <td>Within the file and\r\n   <p>&nbsp;</p>\r\n\r\n   <p>other files marked with extern</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Until the program terminates</p>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Program</strong></p>\r\n\r\n<p>/* C program to demonstrate local and global variables */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int g = 10;</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int x = 20;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Inside main, g = %d&rdquo;,g);</p>\r\n\r\n<p>printf(&ldquo;\\nInside main, x = %d&rdquo;,x);</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int y = 30;</p>\r\n\r\n<p>printf(&ldquo;\\nInside block, g = %d&rdquo;,g); printf(&ldquo;\\nInside block, y = %d&rdquo;,y); printf(&ldquo;\\nInside block, x = %d&rdquo;,x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>printf(&ldquo;\\nOutside block, g = %d&rdquo;,g);</p>\r\n\r\n<p>/*printf(&ldquo;Outside block, y = %d&rdquo;,y);*/ printf(&ldquo;\\nOutside block, x = %d&rdquo;,x); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>In the above example,&nbsp;<strong>g&nbsp;</strong>is a global variable and&nbsp;<strong>x&nbsp;</strong>is a local variable with respect to main and&nbsp;<strong>y&nbsp;</strong>is a local variable within the block. The variable&nbsp;<strong>y&nbsp;</strong>cannot be accessed outside the block. That is why the&nbsp;<strong>printf&nbsp;</strong>statement outside the block accessing the value of the variable&nbsp;<strong>y&nbsp;</strong>has been commented out.</p>\r\n\r\n<p><strong>Storage Classes</strong></p>\r\n\r\n<p>The storage classes specify the scope and lifetime of a variable in a C program. The&nbsp;<strong>scope (active)&nbsp;</strong>specifies in which parts of the program is the variable accessible and the&nbsp;<strong>lifetime (alive)&nbsp;</strong>specifies how long a variable is available in the memory so that the program will be able to access that variable. There are four storage classes in C. They are:</p>\r\n\r\n<ol>\r\n <li>auto</li>\r\n <li>register</li>\r\n <li>extern</li>\r\n <li>static</li>\r\n</ol>\r\n\r\n<p>The storage classes&rsquo;&nbsp;<strong>auto</strong>,&nbsp;<strong>register and static&nbsp;</strong>can be applied to local variables and the storage</p>\r\n\r\n<p>classes&rsquo;&nbsp;<strong>extern&nbsp;</strong>and&nbsp;<strong>static&nbsp;</strong>can be applied to global variables.</p>\r\n\r\n<p><strong>auto</strong></p>\r\n\r\n<p>When a variable is declared with the storage class&nbsp;<strong>auto,&nbsp;</strong>the variable&rsquo;s scope is within the</p>\r\n\r\n<p>function or block in which it is declared and the lifetime is until the function or block in which it is declared completes. Syntax for declaring&nbsp;<strong>auto&nbsp;</strong>variable is shown below:</p>\r\n\r\n<p>auto datatype variablename;</p>\r\n\r\n<p>In any program, if a local variable is declared without any storage class then it is automatically set to</p>\r\n\r\n<p><strong>auto&nbsp;</strong>storage class.</p>\r\n\r\n<p><strong>r</strong><strong>egister</strong></p>\r\n\r\n<p>When a variable is declared with the storage class&nbsp;<strong>register</strong>, the variable will be stored inside one of the registers of the CPU. The registers are under the direct control of CPU. So, data inside the register can be processed at a faster rate than the data that resides in the main memory. For a program to execute faster, it is always best to store the most frequently used data inside register. The scope and lifetime of a&nbsp;<strong>register&nbsp;</strong>variable is same as that of a&nbsp;<strong>auto&nbsp;</strong>variable. Syntax for declaring a&nbsp;<strong>register&nbsp;</strong>variable is as shown below:</p>\r\n\r\n<p>register datatype variablename;</p>\r\n\r\n<p><strong>extern</strong></p>\r\n\r\n<p>The&nbsp;<strong>extern&nbsp;</strong>storage class specifies that the variable is declared in some part of the program.</p>\r\n\r\n<p>Generally this storage class is used to refer global variables in a program. Note that&nbsp;<strong>extern&nbsp;</strong>variables cannot be initialized. The scope of a&nbsp;<strong>extern&nbsp;</strong>variable is throughout the entire program and the lifetime is until the program completes its execution.</p>\r\n\r\n<p>In a multi-file program, a global variable in one file can be accessed from another file by using the storage class&nbsp;<strong>extern.&nbsp;</strong>Syntax for declaring a&nbsp;<strong>extern&nbsp;</strong>variable is as shown below:</p>\r\n\r\n<p>extern datatype variablename</p>\r\n\r\n<p><strong>static</strong></p>\r\n\r\n<p>The&nbsp;<strong>static&nbsp;</strong>storage class can be applied to both local variables and global variables. The&nbsp;<strong>s</strong><strong>tatic</strong></p>\r\n\r\n<p>local variables are accessible only within the function or block in which they are declared, but their lifetime is throughout the program. The&nbsp;<strong>static&nbsp;</strong>global variables are accessible throughout the file in which they are declared but not in other files. Syntax for declaring&nbsp;<strong>static&nbsp;</strong>variable is shown below:</p>\r\n\r\n<p>static datatype variablename;</p>\r\n\r\n<p>The four storage classes can be summarized as shown below:</p>\r\n\r\n<table style=\"border-collapse:collapse; box-sizing:inherit; margin:0px 0px 1.5em; width:900px\">\r\n <tbody>\r\n  <tr>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>S</strong><strong>t</strong><strong>orage Class</strong></p>\r\n   </td>\r\n   <td><strong>Dec</strong><strong>laration</strong>\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>Loca</strong><strong>t</strong><strong>ion</strong></p>\r\n   </td>\r\n   <td><strong>Sc</strong><strong>ope</strong>\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>(V</strong><strong>isibility)</strong></p>\r\n   </td>\r\n   <td><strong>Lifetime</strong>\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>(Alive)</strong></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>auto</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Inside a function/block</p>\r\n   </td>\r\n   <td>Within the\r\n   <p>&nbsp;</p>\r\n\r\n   <p>function/block</p>\r\n   </td>\r\n   <td>Until the function/block\r\n   <p>&nbsp;</p>\r\n\r\n   <p>completes</p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>register</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Inside a function/block</p>\r\n   </td>\r\n   <td>Within the\r\n   <p>&nbsp;</p>\r\n\r\n   <p>function/block</p>\r\n   </td>\r\n   <td>Until the function/block\r\n   <p>&nbsp;</p>\r\n\r\n   <p>completes</p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>extern</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Outside all functions</p>\r\n   </td>\r\n   <td>Entire file plus other files where the variable is declared as extern</td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Until the program terminates</p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>static\r\n   <p>&nbsp;</p>\r\n\r\n   <p>(local)</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Inside a function/block</p>\r\n   </td>\r\n   <td>Within the function/block</td>\r\n   <td>Until the program terminates</td>\r\n  </tr>\r\n  <tr>\r\n   <td>static\r\n   <p>&nbsp;</p>\r\n\r\n   <p>(global)</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Outside all functions</p>\r\n   </td>\r\n   <td>Entire file in which it is declared</td>\r\n   <td>Until the program terminates</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Note:&nbsp;</em></strong><em>The&nbsp;<strong>extern&nbsp;</strong>variables cannot be initialized. The default value for&nbsp;<strong>static&nbsp;</strong>variables is zero.</em></p>\r\n\r\n<p><strong>Programs:</strong></p>\r\n\r\n<p>/* C program to demostrate auto storage class */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt; void func1(); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>/* x is local variable with respect to main function */</p>\r\n\r\n<p>auto int x;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>x = 20;</p>\r\n\r\n<p>printf(&ldquo;\\nValue of x is: %d&rdquo;,x);</p>\r\n\r\n<p>func1();</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>/*Since x is a auto or local variable of function main, it is not accessible in func1*/</p>\r\n\r\n<p>x = 10;</p>\r\n\r\n<p>printf(&ldquo;\\nValue of x is: %d&rdquo;,x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate register storage class */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt; void printx(); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr(); printx(); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void printx()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>register int i;</p>\r\n\r\n<p>for(i = 1;i &lt;= 10000;i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d &ldquo;,i);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate global variables */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int x;</p>\r\n\r\n<p>void func1(); void func2(); void func3(); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>x = 10;</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>func1();</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>func2();</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>func3();</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func2()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func3()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int x = 10;</p>\r\n\r\n<p>/* C program to demostrate extern storage class */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>void func1(); void func2(); void func3(); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>extern int x;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>x = 10;</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>func1();</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>func2();</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>func3();</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>extern int x;</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>int x;</p>\r\n\r\n<p>void func2()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func3()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int x = 10;</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to demostrate extern storage class in multiple files */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#include&rdquo;extf2.c&rdquo; int x;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>extf1.c</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>x = 10; func1(); func2(); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to demostrate extern storage class in multiple files */</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>extern int x;</p>\r\n\r\n<p>printf(&ldquo;\\nx = %d&rdquo;,x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>extf2.c</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>void func2()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int x = 20;</p>\r\n\r\n<p>printf(&ldquo;\\nx = %d&rdquo;,x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to demostrate static storage class &ndash; local variables */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int count();</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Value is: %d\\n&rdquo;,count()); printf(&ldquo;Value is: %d\\n&rdquo;,count()); printf(&ldquo;Value is: %d\\n&rdquo;,count()); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>int count()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>static int x = 0;</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>return x;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to demostrate static storage class &ndash; global variables */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#include&rdquo;statg2.c&rdquo;</p>\r\n\r\n<p>static int x; void func1(); main()</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x = 10;</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>func1();</p>\r\n\r\n<p>func2();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>statg1.c</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to demonstrate static storage class &ndash; global variables */</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>void func2()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>statg2.c</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p><strong>Passing arrays to functions</strong></p>\r\n\r\n<p><strong>Passing one-dimensional arrays</strong></p>\r\n\r\n<p>We can also pass arrays as parameters to the called function. While passing one-dimensional array to a function, you should follow three rules. They are:</p>\r\n\r\n<ol>\r\n <li>In the function declaration you should write a pair of square brackets [ ] beside the name of the array. No need to specify the size of the array.</li>\r\n <li>In the function definition you should write a pair of square brackets [ ] beside the name of the array. Again no need to specify the size of the array.</li>\r\n <li>In the function call, it is enough to just pass the array name as the actual parameter. No need to write the square brackets after the array name.</li>\r\n</ol>\r\n\r\n<p>When an array is passed as an actual parameter, the formal parameter also refers to the same array which is passed as an actual parameter. When passing an array as a parameter, you are passing the address of the array, not the values in the array. So, if you make changes in the array using the formal name of the array, the changes are also reflected on the actual array.</p>\r\n\r\n<p><strong>Programs:</strong></p>\r\n\r\n<p>/* C program to find the largest number in a group of numbers using a function</p>\r\n\r\n<p>*/</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>void largest(int a[], int n);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a[5], i;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>for(i = 0; i &lt; 5; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;Enter a[%d]: &ldquo;,i+1);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;a[i]);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>largest(a,5);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void largest(int a[], int n)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i, max;</p>\r\n\r\n<p>max = a[0];</p>\r\n\r\n<p>for(i = 1; i &lt; n; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>if(max&lt;a[i])</p>\r\n\r\n<p>{</p>\r\n\r\n<p>max = a[i];</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>printf(&ldquo;The largest number is: %d&rdquo;,max);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to find the smallest number in a group of numbers using a function */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>void smallest(int a[], int n);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a[5], i;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>for(i = 0; i &lt; 5; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;Enter a[%d]: &ldquo;,i+1);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;a[i]);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>smallest(a,5);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void smallest(int a[], int n)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i, min;</p>\r\n\r\n<p>min = a[0];</p>\r\n\r\n<p>for(i = 1; i &lt; n; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>if(min&gt;a[i])</p>\r\n\r\n<p>{</p>\r\n\r\n<p>min = a[i];</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>printf(&ldquo;The smallest number is: %d&rdquo;,min);</p>\r\n\r\n<p>}</p>\r\n\r\n<p><strong>Passing two-dimensional arrays</strong></p>\r\n\r\n<p>We can also pass two-dimensional arrays as parameters to a function. While passing two- dimensional arrays as parameters you should keep in mind the following things:</p>\r\n\r\n<ol>\r\n <li>In the function declaration you should write two sets of square brackets after the array name. You should specify the size of the second dimension i.e., the number of columns.</li>\r\n <li>In the function call you should write two sets of square brackets after the array name. Also</li>\r\n</ol>\r\n\r\n<p>you should specify the size of the second dimension i.e., the number of columns.</p>\r\n\r\n<ol start=\"3\">\r\n <li>In the function call, it is enough to pass the name of the array as a parameter. No need to mention the square brackets.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Program:</strong></p>\r\n\r\n<p>/* C program to pass a two dimensional array as a parameter to a function */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>void printmatrix(int a[][3],int m,int n);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a[3][3],i,j;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>for(i = 0; i &lt; 3; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>for(j = 0; j &lt; 3; j++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;Enter a[%d][%d]: &ldquo;,i,j);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;a[i][j]);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>printmatrix(a,3,3);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void printmatrix(int a[][3],int m,int n)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i, j;</p>\r\n\r\n<p>for(i = 0; i &lt; 3; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>for(j = 0; j &lt; 3; j++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d &ldquo;,a[i][j]);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>printf(&ldquo;\\n&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/*C program to insert a sub-string into a string at a specified position*/</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#include&lt;string.h&gt;</p>\r\n\r\n<p>void strinst(char x[],char y[], int loc);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>char str[20], substr[20];</p>\r\n\r\n<p>int pos;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the string: &ldquo;);</p>\r\n\r\n<p>gets(str);</p>\r\n\r\n<p>printf(&ldquo;Enter the substring: &ldquo;);</p>\r\n\r\n<p>gets(substr);</p>\r\n\r\n<p>printf(&ldquo;Enter the position number: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;pos);</p>\r\n\r\n<p>strinst(str, substr, pos);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void strinst(char x[],char y[], int loc)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>char result[40];</p>\r\n\r\n<p>int i, j, k;</p>\r\n\r\n<p>for(i=0; i&lt;loc; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>result[i] = x[i];</p>\r\n\r\n<p>}</p>\r\n\r\n<p>for(j=0, k=i; j&lt;strlen(y); j++, k++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>result[k] = y[j];</p>\r\n\r\n<p>}</p>\r\n\r\n<p>for(k=i+strlen(y); k&lt;strlen(x)+strlen(y); k++,i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>result[k] = x[i];</p>\r\n\r\n<p>}</p>\r\n\r\n<p>result[k] = &lsquo;\\0&rsquo;;</p>\r\n\r\n<p>puts(result);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to delete n characters from the specified position in a string */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#include&lt;string.h&gt;</p>\r\n\r\n<p>void strdel(char x[],int num,int loc);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>char str[20]; int n, pos; clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter a string: &ldquo;);</p>\r\n\r\n<p>gets(str);</p>\r\n\r\n<p>printf(&ldquo;How many characters you want to delete? &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;n);</p>\r\n\r\n<p>printf(&ldquo;Enter the position: &ldquo;); scanf(&ldquo;%d&rdquo;,&amp;pos); strdel(str,n,pos);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void strdel(char x[],int num,int loc)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>char result[20];</p>\r\n\r\n<p>int i,j;</p>\r\n\r\n<p>for(i=0; i&lt;loc; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>result[i] = x[i];</p>\r\n\r\n<p>}</p>\r\n\r\n<p>for(j=i,i=i+num; j&lt;(strlen(x)-num); j++,i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>result[j] = x[i];</p>\r\n\r\n<p>}</p>\r\n\r\n<p>result[j] = &lsquo;\\0&rsquo;;</p>\r\n\r\n<p>puts(result);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/*C program to replace a character at beginning or ending or at the specified location in a string */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#include&lt;string.h&gt;</p>\r\n\r\n<p>void strrepb(char x[], char c);</p>\r\n\r\n<p>void strrepe(char x[], char c);</p>\r\n\r\n<p>void strrep(char x[], char c, char loc);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>char str[10], ch;</p>\r\n\r\n<p>int choice, pos;</p>\r\n\r\n<p>/*clrscr();*/</p>\r\n\r\n<p>printf(&ldquo;Enter a string: &ldquo;);</p>\r\n\r\n<p>gets(str);</p>\r\n\r\n<p>while(1)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;1. Replace a character at the begining of the string\\n&rdquo;); printf(&ldquo;2. Replace a character at the ending of the string\\n&rdquo;); printf(&ldquo;3. Replace a cahracter at specific position\\n&rdquo;);</p>\r\n\r\n<p>printf(&ldquo;4. Exit\\n&rdquo;); printf(&ldquo;Enter your choice: &ldquo;); scanf(&ldquo;%d&rdquo;,&amp;choice); switch(choice)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>case 1:</p>\r\n\r\n<p>fflush(stdin);</p>\r\n\r\n<p>printf(&ldquo;Enter the character: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%c&rdquo;,&amp;ch); strrepb(str, ch); break;</p>\r\n\r\n<p>case 2:</p>\r\n\r\n<p>fflush(stdin);</p>\r\n\r\n<p>printf(&ldquo;Enter the character: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%c&rdquo;,&amp;ch); strrepe(str, ch); break;</p>\r\n\r\n<p>case 3:</p>\r\n\r\n<p>printf(&ldquo;Enter the position: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;pos);</p>\r\n\r\n<p>fflush(stdin);</p>\r\n\r\n<p>printf(&ldquo;Enter the character: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%c&rdquo;,&amp;ch); strrep(str, ch, pos); break;</p>\r\n\r\n<p>case 4:</p>\r\n\r\n<p>exit(0);</p>\r\n\r\n<p>default:</p>\r\n\r\n<p>printf(&ldquo;Invalid option. Try again&hellip;\\n&rdquo;);</p>\r\n\r\n<p>break;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void strrepb(char x[], char c)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x[0] = c; puts(x); printf(&ldquo;\\n&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void strrepe(char x[], char c)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x[strlen(x)-1] = c;</p>\r\n\r\n<p>puts(x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void strrep(char x[], char c, char loc)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x[loc-1] = c;</p>\r\n\r\n<p>puts(x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p><strong>Preprocessor Directives</strong></p>\r\n\r\n<p>C provides many features like structures, unions and pointers. Another unique feature of the C language is the preprocessor. The C preprocessor provides several tools that are not present in other high-level languages. The programmer can use these tools to make his program easy to read, easy to modify, portable and more efficient.</p>\r\n\r\n<p>The preprocessor is a program that processes the source code before it passes through the compiler. Preprocessor directives are placed in the source program before the main line. Before the source code passes through the compiler, it is examined by the preprocessor for any preprocessor directives. If there are any, appropriate actions are taken and then the source program is handed over to the compiler.</p>\r\n\r\n<p>All the preprocessor directives follow special syntax rules that are different from the normal C syntax. Every preprocessor directive begins with the symbol&nbsp;<strong>#&nbsp;</strong>and is followed by the respective preprocessor directive. The preprocessor directives are divided into three categories. They are:</p>\r\n\r\n<ol>\r\n <li>Macro Substitution Directives</li>\r\n <li>File Inclusion Directives</li>\r\n <li>Compiler Control Directives</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Macro Substitution Directives</strong></p>\r\n\r\n<p>Macro substitution is a process where an identifier in a program is replaced by a predefined string composed of one or more tokens. The preprocessor accomplishes this task under the direction of&nbsp;<strong>#define&nbsp;</strong>statement. This statement, usually known as a&nbsp;<em>macro definition&nbsp;</em>takes the following form:</p>\r\n\r\n<p>#define identifier string</p>\r\n\r\n<p>If this statement is included in the program at the beginning, then the preprocessor replaces every occurrence of the&nbsp;<strong>identifier&nbsp;</strong>in the source code by the string.</p>\r\n\r\n<p><strong>N</strong><strong>ote:&nbsp;</strong><em>Care should be taken that there is no space between the&nbsp;<strong>#&nbsp;</strong>and the word&nbsp;<strong>define</strong>. Also there should be atleast a single space between&nbsp;<strong>#define&nbsp;</strong>and the&nbsp;<strong>identifier&nbsp;</strong>and between the&nbsp;<strong>identifier&nbsp;</strong>and the&nbsp;<strong>string</strong>. Also, there will be no semi-colon at the end of the statement.</em></p>\r\n\r\n<p>There are different forms of macro substitution. The most common are:</p>\r\n\r\n<ol>\r\n <li>Simple macro substitution</li>\r\n <li>Argumented macro substitution</li>\r\n <li>Nested macro substitution</li>\r\n</ol>\r\n\r\n<p><strong>Simple Macro Substitution</strong></p>\r\n\r\n<p>The simple macro substitutions are generally used for declaring constants in a C program. Some valid examples for simple macro substitution are:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table style=\"border-collapse:collapse; box-sizing:inherit; margin:0px 0px 1.5em; width:900px\">\r\n <tbody>\r\n  <tr>\r\n   <td>#define</td>\r\n   <td>PI</td>\r\n   <td>3.1412</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#define</td>\r\n   <td>MAX</td>\r\n   <td>100</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#define</td>\r\n   <td>START</td>\r\n   <td>main() {</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#define</td>\r\n   <td>STOP</td>\r\n   <td>}</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>Whenever the preprocessor comes across the simple macros, the identifier will be replaced with the corresponding string. For example, in a C program, all the occurrences of PI will be replaced with</p>\r\n\r\n<p>3.1412.</p>\r\n\r\n<p><strong>Argumented Macro Substitution</strong></p>\r\n\r\n<p>The preprocessor allows us to define more complex and more useful form of substitutions. The Argumented macro substitution takes the following form:</p>\r\n\r\n<p>#define &nbsp;identifier(arg1, arg2, &hellip;.. , argn)&nbsp; &nbsp;string</p>\r\n\r\n<p>Care should be taken that there is no space between the identifier and the left parentheses. The identifiers arg1, arg2, &hellip;. , argn are the formal macro arguments that are analogous to the formal arguments in a function definition. In the program, the occurrence of a macro with arguments is known as a&nbsp;<strong>macro call</strong>. When a macro is called, the preprocessor substitutes the string, replacing the formal parameters with actual parameters.</p>\r\n\r\n<p>For example, if the Argumented macro is declared as shown below:</p>\r\n\r\n<p>#define&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;CUBE(x)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;(x*x*x)</p>\r\n\r\n<p>and the macro is called as shown below:</p>\r\n\r\n<p>volume = CUBE(side);</p>\r\n\r\n<p>Then the preprocessor will expand the above statement as:</p>\r\n\r\n<p>volume = (side * side * side);</p>\r\n\r\n<p><strong>Nested Macro Substitution</strong></p>\r\n\r\n<p>We can use one macro inside the definition of another macro. Such macros are known as nested macros. Example for a nested macro is shown below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table style=\"border-collapse:collapse; box-sizing:inherit; margin:0px 0px 1.5em; width:900px\">\r\n <tbody>\r\n  <tr>\r\n   <td>#define</td>\r\n   <td>SQUARE(x)</td>\r\n   <td>x*x</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#define</td>\r\n   <td>CUBE(x)</td>\r\n   <td>SQUARE(x) * x</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Programs</strong></p>\r\n\r\n<p>/* C program to demonstrate simple macro substitution */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define MAX 100 main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int n;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the value of n: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;n);</p>\r\n\r\n<p>if(n &lt; MAX)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d is less than MAX&rdquo;,n);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d is greater than MAX&rdquo;,n);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demonstrate argumented macro substitution */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define SQUARE(x) x*x main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>for(i = 1; i &lt;= 10; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d\\n&rdquo;,SQUARE(i));</p>\r\n\r\n<p>}</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to demonstrate nested macro substitution */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define SQUARE(x) x*x</p>\r\n\r\n<p>#define AREA(x) 3.14*SQUARE(x)</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int r;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the radius: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;r);</p>\r\n\r\n<p>printf(&ldquo;Area of the circle is: %f&rdquo;,AREA(r));</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p><strong>File Inclusion Directives</strong></p>\r\n\r\n<p>The external files containing functions or macro definitions can be linked with our program so that there is no need to write the functions and macro definitions again. This can be achieved by using the&nbsp;<strong>#include&nbsp;</strong>directive. The syntax for this directive is as shown below:</p>\r\n\r\n<p>#include &ldquo;filename&rdquo; OR</p>\r\n\r\n<p>#include&lt;filename&gt;</p>\r\n\r\n<p>We can use either of the above statements to link our program with other files. If the&nbsp;<strong>filename&nbsp;</strong>is included in double quotes, the file is searched in the local directory. If the&nbsp;<strong>filename&nbsp;</strong>is included in angular brackets, then the file is searched in the standard directories.</p>\r\n\r\n<p><strong>Compiler Control Directives</strong></p>\r\n\r\n<p>Following are the compiler control directives:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table style=\"border-collapse:collapse; box-sizing:inherit; margin:0px 0px 1.5em; width:900px\">\r\n <tbody>\r\n  <tr>\r\n   <td>Directive</td>\r\n   <td>Purpose</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#ifdef</td>\r\n   <td>Test for a macro definition</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#endif</td>\r\n   <td>Specifies the end of #if</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#ifndef</td>\r\n   <td>Tests whether a macro is not defined</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#if</td>\r\n   <td>Test a compile-time condition</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#else</td>\r\n   <td>Specifies alternative when #if fails</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>These compiler control directives are used in different situations. They are:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Situation 1</strong></p>\r\n\r\n<p>You have included a file containing some macro definitions. It is not known whether a certain macro has been defined in that header file. However, you want to be certain that the macro is defined.</p>\r\n\r\n<p>This situation refers to the conditional definition of a macro. We want to ensure that the</p>\r\n\r\n<p>macro TEST is always defined, irrespective of whether it has been defined in the header file or not. This can be achieved as follows:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>#include&rdquo;DEFINE.H&rdquo;</p>\r\n\r\n<p>#ifndef TEST</p>\r\n\r\n<p>#define TEST 1</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>DEFINE.H&nbsp;</strong>is the header that is supposed to contain the definition of&nbsp;<strong>TEST&nbsp;</strong>macro. The directive</p>\r\n\r\n<p><strong>#ifndef TEST&nbsp;</strong>searches the definition of&nbsp;<strong>TEST&nbsp;</strong>in the header file and if it is not defined, then all the lines between the&nbsp;<strong>#ifndef&nbsp;</strong>and the corresponding&nbsp;<strong>#endif&nbsp;</strong>directive are executed in the program.</p>\r\n\r\n<p><strong>Situation 2</strong></p>\r\n\r\n<p>Suppose a customer has two different types of computers and you are required to write a program that will run on both the systems. You want to use the same program, although a certain lines of code must be different for each system.</p>\r\n\r\n<p>The main concern here is to make the program portable. This can be achieved as shown</p>\r\n\r\n<p>below:</p>\r\n\r\n<p>#ifdef IBM_PC</p>\r\n\r\n<p>{</p>\r\n\r\n<p>}</p>\r\n\r\n<p>#else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p>&mdash;-</p>\r\n\r\n<p>&mdash;-</p>\r\n\r\n<p>&mdash;-</p>\r\n\r\n<p>&mdash;-</p>\r\n\r\n<p>If we want to run the program on a IBM PC, we include the directive&nbsp;<strong>#define IBM_PC,&nbsp;</strong>otherwise we won&rsquo;t.</p>\r\n\r\n<p><strong>Situation 3</strong></p>\r\n\r\n<p>You are developing a program for selling in the open market. Some customers may insist on having certain additional features. However, you would like to have a single program that would satisfy both types of customers.</p>\r\n\r\n<p>This situation is similar to the above situation and therefore the control directives take the following form:</p>\r\n\r\n<p>#idef ABC</p>\r\n\r\n<p>Group-A lines</p>\r\n\r\n<p>#else</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p>Group-B lines</p>\r\n\r\n<p>Group-A lines are included if the customer ABC is defined. Otherwise, Group-B lines are included.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Situation 4</strong></p>\r\n\r\n<p>Suppose if you want to test a large program, you would like to include print calls in the program in certain places to display intermediate results and messages in order to trace the flow of execution and errors.</p>\r\n\r\n<p>For this purpose we can use&nbsp;<strong>#if&nbsp;</strong>and&nbsp;<strong>#else&nbsp;</strong>directive as shown below:</p>\r\n\r\n<p>#if constant expression</p>\r\n\r\n<p>{</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>}</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p>Statement 1; Statement 2;</p>\r\n\r\n<p>&mdash;&ndash;</p>\r\n\r\n<p>Statement 1; Statement 2;</p>\r\n\r\n<p>&mdash;&ndash;</p>\r\n\r\n<p><strong>Programs</strong></p>\r\n\r\n<p>/* C program to demostrate #undef preprocessor directive */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define NAME &ldquo;teja&rdquo;</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>puts(NAME);</p>\r\n\r\n<p>#undef NAME puts(NAME); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate #ifdef and #endif preprocessor directives */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define MAX 100 main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>#ifdef MAX</p>\r\n\r\n<p>#define COUNT 10</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p>printf(&ldquo;COUNT = %d&rdquo;,COUNT);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate #ifndef and #endif preprocessor directives */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#ifndef MAX</p>\r\n\r\n<p>#define MAX 100</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;MAX = %d&rdquo;,MAX);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate #if and #else preprocessor directives */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define MAX 100</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>#ifdef MAX</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;MAX is defined&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>#else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;MAX is not defined&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>#endif getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p><strong>A</strong><strong>NSI Preprocessor Directives</strong></p>\r\n\r\n<p>The ANSI committee has added some more preprocessor directives to the existing list. They</p>\r\n\r\n<p>are:</p>\r\n\r\n<table style=\"border-collapse:collapse; box-sizing:inherit; margin:0px 0px 1.5em; width:900px\">\r\n <tbody>\r\n  <tr>\r\n   <td><strong>Directive</strong></td>\r\n   <td><strong>Purpose</strong></td>\r\n  </tr>\r\n  <tr>\r\n   <td>#elif</td>\r\n   <td>Provides alternative test facility</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#pragma</td>\r\n   <td>Specifies compiler instructions</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#error</td>\r\n   <td>Stops compilation when an error occurs</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>#elif &nbsp;Directive</strong></p>\r\n\r\n<p>The&nbsp;<strong>#elif&nbsp;</strong>directive enables us to establish an &ldquo;if&hellip;else&hellip;if&rdquo; sequence for testing multiple conditions. The syntax is as shown below:</p>\r\n\r\n<p>#if expr1</p>\r\n\r\n<p>Stmts;</p>\r\n\r\n<p>#elif expr2</p>\r\n\r\n<p>Stmts;</p>\r\n\r\n<p>#elif expr3</p>\r\n\r\n<p>Stmts;</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p><strong>#pragma Directive</strong></p>\r\n\r\n<p>The &nbsp;<strong>#</strong><strong>pragma&nbsp;</strong>directive is &nbsp;an &nbsp;implementation oriented directive that &nbsp;allows the &nbsp;user&nbsp; to specify various instructions to be given to the compiler. Syntax is as follows:</p>\r\n\r\n<p>#pragma name</p>\r\n\r\n<p>Where&nbsp;<strong>name &nbsp;</strong>is &nbsp;the name of &nbsp;the pragma we want. For&nbsp; example, under Microsoft C, &nbsp;<strong>#pragma loop_opt(on)&nbsp;</strong>causes loop optimization to be performed.</p>\r\n\r\n<p><strong>#error Directive</strong></p>\r\n\r\n<p>The&nbsp;<strong>#error&nbsp;</strong>directive is used to produce diagnostic messages during debugging. The general format is</p>\r\n\r\n<p>#error error-message</p>\r\n\r\n<p>When &nbsp;the &nbsp;<strong>#error &nbsp;</strong>directive &nbsp;is &nbsp;encountered by &nbsp;the &nbsp;compiler, &nbsp;it &nbsp;displays &nbsp;the &nbsp;error &nbsp;message and terminates the program.</p>\r\n\r\n<p>Example:</p>\r\n\r\n<p>#if !defined(FILE_G)</p>\r\n\r\n<p>#error NO GRAPHICS FILE</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p><strong>Preprocessor Operations</strong></p>\r\n\r\n<p><strong>Stringizing Operator #</strong></p>\r\n\r\n<p>ANSI C provides an operator&nbsp;<strong>#&nbsp;</strong>called stringizing operator to be used in the definition of macro functions. This operator converts a formal argument into a string. For example, if the macro is defined as follows:</p>\r\n\r\n<p>#define&nbsp;&nbsp; &nbsp;sum(xy)&nbsp;&nbsp; &nbsp;printf(#xy &ldquo; = %f \\n&rdquo;, xy)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>and somewhere in &nbsp;the &nbsp;program the &nbsp;statement is &nbsp;written as:&nbsp;&nbsp;<strong>sum(a+b);&nbsp;</strong>then the preprocessor converts this line as shown below:</p>\r\n\r\n<p>printf(&ldquo;a+b&rdquo; &ldquo; = %f \\n&rdquo;, a+b);</p>\r\n\r\n<p><strong>Token Pasting Operator ##</strong></p>\r\n\r\n<p>The token pasting operator&nbsp;<strong>##&nbsp;</strong>defined by ANSI enables us to combine two tokens within a macro definition to form a single token.</p>\r\n\r\n<p><strong>Programs</strong></p>\r\n\r\n<p>/*C program to demonstrate Stringizing operator # */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define sum(x) printf(#x&rdquo;= %d&rdquo;,x);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a,b;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>a = 10, b = 20; sum(a+b); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demonstrate preprocessor directives */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define START main() {</p>\r\n\r\n<p>#define STOP }</p>\r\n\r\n<p>#define PRINT(x) printf(#x)</p>\r\n\r\n<p>#define COMBINE(x,y,z) x##y##z</p>\r\n\r\n<p>#define hai &ldquo;hai&rdquo; START</p>\r\n\r\n<p>clrscr(); printf(COMBINE(h,a,i)); PRINT(\\nhello world); getch();</p>\r\n\r\n<p>STOP</p>\r\n\r\n<p><strong>F</strong><strong>unctions</strong></p>\r\n\r\n<p>Until now, in all the C programs that we have written, the program consists of a&nbsp;<strong>main&nbsp;</strong>function and inside that we are writing the logic of the program. The disadvantage of this method is, if the logic/code in the&nbsp;<strong>main&nbsp;</strong>function becomes huge or complex, it will become difficult to debug the program or test the program or maintain the program. So, generally while writing the programs, the entire logic is divided into smaller parts and each part is treated as a function. This type of approach for solving the given problems is known as&nbsp;<strong>Top Down&nbsp;</strong>approach. The top-down approach of solving the given problem can be seen below:</p>\r\n\r\n<p><strong>Definition:&nbsp;</strong>A function is a self contained block of code that performs a certain task/job. For example, we can write a function for reading an integer or we can write a function to add numbers from 1 to</p>\r\n\r\n<p>100 etc.</p>\r\n\r\n<p>Generally a function can be imagined like a&nbsp;<strong>Black Box</strong>, which accepts data input and transforms the data into output results. The user knows only about the inputs and outputs. User has no knowledge of the process going on inside the box which converts the given input into output. This can be seen diagrammatically as shown below:</p>\r\n\r\n<p><strong>Types of Functions</strong></p>\r\n\r\n<p>Based on the nature of functions, they can be divided into two categories. They are:</p>\r\n\r\n<ol>\r\n <li>Predefined functions / Library functions</li>\r\n <li>User defined functions</li>\r\n</ol>\r\n\r\n<p><strong>Predefined functions / Library functions</strong></p>\r\n\r\n<p>A predefined function or library function is a function which is already written by another developer. The users generally use these library functions in their own programs for performing the desired task. The predefined functions are available in the header files. So, the user has to include the respective header file to use the predefined functions available in it.</p>\r\n\r\n<p>For example, the&nbsp;<strong>printf&nbsp;</strong>function which is available in the&nbsp;<strong>stdio.h&nbsp;</strong>header file is used for printing information onto the console. Other examples of predefined functions are: scanf, gets, puts, getchar, putchar, strlen, strcat etc</p>\r\n\r\n<p><strong>User defined functions</strong></p>\r\n\r\n<p>A user defined function is a function which is declared and defined by the user himself. While writing programs, if there are no available library functions for performing a particular task, we write our own function to perform that task. Example for user defined function is&nbsp;<strong>main&nbsp;</strong>function</p>\r\n\r\n<p><strong>Need for functions</strong></p>\r\n\r\n<p>Functions have many advantages in programming. Almost all the languages support the concept of functions in some way. Some of the advantages of writing/using functions are:</p>\r\n\r\n<ol>\r\n <li>Functions support top-down modular programming.</li>\r\n <li>By using functions, the length of the source code decreases.</li>\r\n <li>Writing functions makes it easier to isolate and debug the errors.</li>\r\n <li>Functions allow us to reuse the code.</li>\r\n</ol>\r\n\r\n<p><strong>Functions Terminology</strong></p>\r\n\r\n<p><strong>Creating functions</strong></p>\r\n\r\n<p>For creating functions in C programs, we have to perform two steps. They are: 1) Declaring the function and 2) Defining the function.</p>\r\n\r\n<p><strong><em>Declaring functions</em></strong></p>\r\n\r\n<p>The function declaration is the blue print of the function. The function declaration can also be called as the function&rsquo;s prototype. The function declaration tells the compiler and the user about what is the function&rsquo;s name, inputs and output(s) of the function and the return type of the function. The syntax for declaring a function is shown below:</p>\r\n\r\n<p>return-type function-name(parameters list);</p>\r\n\r\n<p>Example:</p>\r\n\r\n<p>int readint( );</p>\r\n\r\n<p>In the above example,&nbsp;<strong>readint&nbsp;</strong>is the name of the function,&nbsp;<strong>int&nbsp;</strong>is the return type of the function. In our example,&nbsp;<strong>readint&nbsp;</strong>function has no parameters. The parameters list is optional. The functions are generally declared in the global declaration section of the program.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Defining functions</em></strong></p>\r\n\r\n<p>The function definition specifies how the function will be working i.e the logic of the function will be specified in this step. The syntax of function definition is shown below:</p>\r\n\r\n<p>return-type func-name(parameters list&hellip;)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>local variable declarations;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&mdash;&ndash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&mdash;&ndash; return(expression);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>In the above syntax the&nbsp;<strong>return-type&nbsp;</strong>can be any valid data type in C like: int, float, double, char &nbsp;etc. &nbsp;The &nbsp;<strong>func-name&nbsp;&nbsp;</strong>is &nbsp;the &nbsp;name &nbsp;of &nbsp;the &nbsp;function &nbsp;and &nbsp;it &nbsp;can &nbsp;be &nbsp;any &nbsp;valid &nbsp;identifier. &nbsp;The&nbsp;<strong>parameters list&nbsp;</strong>is optional. The&nbsp;<strong>local variables&nbsp;</strong>are the variables which belong to the function only. They are used within the body of the function, not outside the function. The&nbsp;<strong>return&nbsp;</strong>is a keyword in C. It is an unconditional branch statement. Generally, the&nbsp;<strong>return&nbsp;</strong>statement is used to return a value.</p>\r\n\r\n<p>Example:</p>\r\n\r\n<p>int readint( )</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int num;</p>\r\n\r\n<p>printf(&ldquo;Enter a number: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;num);</p>\r\n\r\n<p>return num;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>In the above example,&nbsp;<strong>readint&nbsp;</strong>is the name of the function,&nbsp;<strong>int&nbsp;</strong>is the return type. The identifier&nbsp;<strong>num&nbsp;</strong>is a local variable with respect to&nbsp;<strong>readint&nbsp;</strong>function. The above function is reading an integer from the keyboard and returning that value back with the help of the&nbsp;<strong>return&nbsp;</strong>statement</p>\r\n\r\n<p><strong>N</strong><strong>ote:&nbsp;</strong><em>Care must be taken that the return type of the function and the data type of the value returned by the return statement must match with one another.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Using Functions</strong></p>\r\n\r\n<p>After declaring and defining the functions, we can use the functions in our program. For using the functions, we must&nbsp;<strong>call&nbsp;</strong>the function by its name. The syntax for calling a function is as shown below:</p>\r\n\r\n<p>function-name(parameters list);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The function name along with the parameters list is known as the&nbsp;<strong>function signature.&nbsp;</strong>Care must be taken that while calling the method, the syntax of the function call must match with the function signature. Let&rsquo;s see an example for function call:</p>\r\n\r\n<p>Example</p>\r\n\r\n<p>readint( );</p>\r\n\r\n<p>Whenever the compiler comes across a function call, it takes the control of execution to the first statement in the function&rsquo;s definition. After the completion of function i.e., whenever the compiler comes across the&nbsp;<strong>return&nbsp;</strong>statement or the closing brace of the function&rsquo;s body, the control will return back to the next statement after the function call. Let&rsquo;s see this in the following example:</p>\r\n\r\n<p>User defined functions</p>\r\n\r\n<p>main( )</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int x;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>x =&nbsp;<u>readint( )</u>;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>printf(&ldquo;Value of x is: %d&rdquo;, x);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Function Call or</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Calling function</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int readint( )</p>\r\n\r\n<p>{</p>\r\n\r\n<p>Called function</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int num;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Function</p>\r\n\r\n<p>Definition</p>\r\n\r\n<p>printf(&ldquo;Enter a number: &ldquo;);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;num);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>return num;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>printf and scanf are predefined functions</p>\r\n\r\n<p><strong>Calling function and Called function</strong></p>\r\n\r\n<p>The point at which the function is being invoked or called is known as the&nbsp;<strong>calling function</strong>. The function which is being executed due to the function call is known as the&nbsp;<strong>called function.&nbsp;</strong>Example for both calling function and the called function is given in the above example.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Formal Parameters and Actual Parameters</strong></p>\r\n\r\n<p>A &nbsp;parameter&nbsp; or &nbsp;argument is &nbsp;data &nbsp;which &nbsp;is &nbsp;taken &nbsp;as &nbsp;input &nbsp;or &nbsp;considered&nbsp; as &nbsp;additional information by the function for further processing. There are two types of parameters or arguments. The parameters which are passed in the function call are known as&nbsp;<strong>actual parameters or actual arguments.&nbsp;</strong>The parameters which are received by the called function are known as&nbsp;<strong>formal parameters or formal arguments.&nbsp;</strong>Example is shown below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>main( )</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int x = 10, y = 20;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>add(x, y);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>void add(int a, int b)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>printf(&ldquo;Sum is: %d&rdquo;,(a+b));</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>In the above example,&nbsp;<strong>x and y&nbsp;</strong>are known as actual parameters and&nbsp;<strong>a and b&nbsp;</strong>are known as formal parameters. In the above code, we can see that the return type of the function&nbsp;<strong>add&nbsp;</strong>is&nbsp;<strong>void.&nbsp;</strong>This is a keyword in C. The&nbsp;<strong>void&nbsp;</strong>keyword is a datatype. If the function does not return any value, we specify the data type&nbsp;<strong>void.&nbsp;</strong>Generally&nbsp;<strong>void&nbsp;</strong>means nothing / no value.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>N</strong><strong>ote:&nbsp;</strong>The formal parameters and actual parameters can have the same names i.e., if the actual parameters are x and y, then the formal parameters can also be x and y. But, it is recommended to use different names for actual and formal parameters</p>\r\n\r\n<p><strong>Classification of Functions</strong></p>\r\n\r\n<p>Based on the parameters and return values, functions can be categorized into four types. They are:</p>\r\n\r\n<ol>\r\n <li>Function without arguments and without return value.</li>\r\n <li>Function without arguments and with return value.</li>\r\n <li>Function with arguments and with return value.</li>\r\n <li>Function with arguments and without return value.</li>\r\n</ol>\r\n\r\n<p><strong>Function without arguments and without return value</strong></p>\r\n\r\n<p>In this type of functions there are no parameters/arguments in the function definition and the function does not return any value back to&nbsp; the calling function. Generally, these types of functions are used to perform housekeeping tasks such as printing some characters etc.</p>\r\n\r\n<p>Example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>void printstars( )</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int i;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>for(i = 0; i &lt; 20; i++)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>printf(&ldquo; * &rdquo;);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>return;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>In the above example,&nbsp;<strong>printstars&nbsp;</strong>function does not have any parameters. Its task is to print</p>\r\n\r\n<p>20 stars whenever it is called in a program. Also&nbsp;<strong>printstars&nbsp;</strong>function does not return any value back.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Function without arguments and with return value</strong></p>\r\n\r\n<p>In &nbsp;this &nbsp;type &nbsp;of &nbsp;functions,&nbsp; the &nbsp;function&nbsp; definition &nbsp;does &nbsp;not &nbsp;contain &nbsp;arguments. But &nbsp;the function returns a value back to the point at which it was called. An example for this type of function is given below</p>\r\n\r\n<p>Example:</p>\r\n\r\n<p>int readint( )</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int num;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>printf(&ldquo;Enter a number: &ldquo;);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;num);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>return num;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>In the above example,&nbsp;<strong>readint&nbsp;</strong>function has no parameters/arguments. The task of this function is to read a integer from the keyboard and return back to the point at which the function was called.</p>\r\n\r\n<p><strong>Function with arguments and with return value</strong></p>\r\n\r\n<p>In this type of functions, the function definition consists of parameters/arguments. Also, these functions returns a value back to the point at which the function was called. These types of functions are the most frequently used in programming. An example for this type of function can be seen below:</p>\r\n\r\n<p>Example:</p>\r\n\r\n<p>int add(int x, int y)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int result; result = x + y; return result;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>In the above example, the function&nbsp;<strong>add&nbsp;</strong>consists of two arguments or parameters&nbsp;<strong>x&nbsp;</strong>and&nbsp;<strong>y</strong>. The function adds both&nbsp;<strong>x&nbsp;</strong>and&nbsp;<strong>y&nbsp;</strong>and returns that value stored in the local variable&nbsp;<strong>result&nbsp;</strong>back to the point at which the function was called.</p>\r\n\r\n<p><strong>Predefined / Library Functions</strong></p>\r\n\r\n<p>A function is said to be a predefined function or library function, if they are already declared and defined by another developer. These predefined functions will be available in the library header files. So, if we want to use a predefined function, we have to include the respective header file in our program. For example, if we want to use&nbsp;<strong>printf&nbsp;</strong>function in our program, we have to include the&nbsp;<strong>stdio.h&nbsp;</strong>header file, as the function&nbsp;<strong>printf&nbsp;</strong>has been declared inside it.</p>\r\n\r\n<p>Some of the header files in C are</p>\r\n\r\n<p>Some of the predefined functions available in&nbsp;<strong>ctype.h&nbsp;</strong>header file are</p>\r\n\r\n<p>Some of the predefined functions available in&nbsp;<strong>math.h&nbsp;</strong>header file are:</p>\r\n\r\n<p>Some of the predefined functions in&nbsp;<strong>stdio.h&nbsp;</strong>header file are:</p>\r\n\r\n<p>Some of the predefined functions in&nbsp;<strong>stdlib.h&nbsp;</strong>header file are:</p>\r\n\r\n<p>Some of the predefined functions in&nbsp;<strong>string.h&nbsp;</strong>header file are:</p>\r\n\r\n<p>Some of the predefined functions available in&nbsp;<strong>time.h&nbsp;</strong>header file are</p>\r\n\r\n<p><strong>Programs:</strong></p>\r\n\r\n<p>/* C program to demonstrate functions */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int readint(); /*Function Declaration*/</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int x;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>x = readint();</p>\r\n\r\n<p>printf(&ldquo;Value of x is: %d&rdquo;,x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>int readint() /* Function Definition */</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int n;</p>\r\n\r\n<p>printf(&ldquo;Enter a integer value: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;n);</p>\r\n\r\n<p>return n;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to add numbers by using a function */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int addint();</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int sum;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>sum = addint();</p>\r\n\r\n<p>printf(&ldquo;Sum is: %d&rdquo;,sum);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>int addint()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a,b;</p>\r\n\r\n<p>printf(&ldquo;Enter the values of a and b: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d%d&rdquo;,&amp;a,&amp;b);</p>\r\n\r\n<p>return a+b;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to print 200 stars using a function */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt; void printstars(); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr(); printstars(); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void printstars()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i;</p>\r\n\r\n<p>for(i = 0; i &lt; 200; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;* &ldquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to add two numbers by using a function with parameters */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int addint(int x, int y);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a, b, sum;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the values of a and b: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d%d&rdquo;,&amp;a,&amp;b); sum = addint(a, b); printf(&ldquo;Sum is: %d&rdquo;, sum); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>int addint(int x, int y)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>return x + y;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to print n number of stars using a function */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt; void printstars(int n); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int n;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the value of n: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;n);</p>\r\n\r\n<p>printstars(n);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void printstars(int n)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i;</p>\r\n\r\n<p>for(i = 0; i &lt; n; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;* &ldquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to find whether the given number is even or odd using a function</p>\r\n\r\n<p>*/</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt; void evenodd(int x); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int n;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter a number: &ldquo;); scanf(&ldquo;%d&rdquo;,&amp;n); evenodd(n);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void evenodd(int x)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>if(x % 2 == 0)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;Entered number is even&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;Entered number is odd&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to find the factorial of a given number using a function */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt; void factorial(int x); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int n;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the value of n: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;n);</p>\r\n\r\n<p>factorial(n);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void factorial(int x)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i, fact = 1;</p>\r\n\r\n<p>if(x == 0)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;Factorial of 0 is: 1&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>for(i = 1; i &lt;= x; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>fact = fact * i;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>printf(&ldquo;Factorial of %d is : %d&rdquo;, x, fact);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to generate the first n terms of the Fibonacci sequence using a function*/</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>void fib(int n);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int number;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the number of terms: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;number);</p>\r\n\r\n<p>fib(number);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void fib(int n)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i;</p>\r\n\r\n<p>int a = 0,b = 1,temp = 0;</p>\r\n\r\n<p>if(n == 1)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d&rdquo;,0);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else if(n == 2)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d %d &ldquo;,0,1);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d %d &ldquo;,a,b);</p>\r\n\r\n<p>for(i = 2; i &lt; n; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>temp = a+b;</p>\r\n\r\n<p>a = b;</p>\r\n\r\n<p>b = temp;</p>\r\n\r\n<p>printf(&ldquo;%d &ldquo;,b);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Nested Functions</strong></p>\r\n\r\n<p>A &nbsp;function&nbsp; calling &nbsp;another function&nbsp; within &nbsp;its &nbsp;function&nbsp; definition is &nbsp;known&nbsp; as &nbsp;a &nbsp;nested function. So, far we are declaring a&nbsp;<strong>main&nbsp;</strong>function and calling other user-defined functions and predefined functions like&nbsp;<strong>printf, scanf, gets, puts&nbsp;</strong>etc., So,&nbsp;<strong>main&nbsp;</strong>function can be treated as a nested function. Let&rsquo;s see the following example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr(); func1(); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>for(i = 1; i&lt;= 10; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>func2();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func2()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d\\n&rdquo;,i);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the above example, the&nbsp;<strong>main&nbsp;</strong>function is calling three functions namely:&nbsp;<strong>clrscr</strong>,&nbsp;<strong>func1&nbsp;</strong>and&nbsp;<strong>getch</strong>. So,&nbsp;<strong>main&nbsp;</strong>is a nested function. Also, in the definition of&nbsp;<strong>func1</strong>, it is calling another function&nbsp;<strong>func2.&nbsp;</strong>So,&nbsp;<strong>func1&nbsp;</strong>is also a nested function.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Note:&nbsp;</em></strong><em>In programs containing nested functions, the enclosing or outer function returns back only when all the inner functions complete their task.</em></p>\r\n\r\n<p><strong>Program:</strong></p>\r\n\r\n<p>/* C program to demonstrate a nested function */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int i;</p>\r\n\r\n<p>void func1(); void func2(); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr(); func1(); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>for(i = 1; i&lt;= 10; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>func2();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func2()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d\\n&rdquo;,i);</p>\r\n\r\n<p>}</p>\r\n\r\n<p><strong>R</strong><strong>ecursion</strong></p>\r\n\r\n<p>A function is said to be recursive, if a function calls itself within the function&rsquo;s definition. Let&rsquo;s see the following example:</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int i = 0; i++; printf(&ldquo;%d\\n&rdquo;,i);</p>\r\n\r\n<p>func1(); &nbsp;/*Recursive Call */</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>In the above example, func1 is calling itself in the last line of its definition. When we write recursive functions, the function only returns back to the main program when all the recursive calls return back.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Note:&nbsp;</em></strong><em>When writing recursive functions, proper care must be taken that the recursive calls return a value back at some point. Otherwise, the function calls itself infinite number of times</em></p>\r\n\r\n<p><strong>Program:</strong></p>\r\n\r\n<p>/* C Program to demostrate recursion */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>void func1();</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>clrscr(); func1(); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i = 0; i++; printf(&ldquo;%d\\n&rdquo;,i); func1();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to find the factorial of a given number using a recursive function</p>\r\n\r\n<p>*/</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt; int factorial(int x); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int n, fact;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the value of n: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;n);</p>\r\n\r\n<p>fact = factorial(n);</p>\r\n\r\n<p>printf(&ldquo;Factorial of %d is: %d&rdquo;, n, fact);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>int factorial(int x)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>if(x == 0)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>return 1;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>return x*factorial(x-1);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to generate the first n terms of the Fibonacci sequence using a recursive function*/</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int fib(int n);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i, number;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the number of terms: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;number);</p>\r\n\r\n<p>if(number == 1)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;0&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else if(number == 2)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;0 1&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;0 1 &ldquo;);</p>\r\n\r\n<p>for(i = 3; i &lt;= number; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d &ldquo;, fib(i));</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>int fib(int n)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i, temp;</p>\r\n\r\n<p>if(n == 1)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>return 0;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else if(n == 2)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>return 1;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>temp = fib(n-1) + fib(n-2);</p>\r\n\r\n<p>return temp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Types of Variables</strong></p>\r\n\r\n<p>A variable is a memory location inside memory which is referred using a name. The value inside a variable changes throughout the execution of the program. Based on where the variable is declared in the program, variables can be divided into two types. They are:</p>\r\n\r\n<ol>\r\n <li>Local Variables</li>\r\n <li>Global Variables</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Local Variables</strong></p>\r\n\r\n<p>A variable is said to be a local variable if it is declared inside a function or inside a block. The scope of the local variable is within the function or block in which it was declared. A local variable remains &nbsp;in &nbsp;memory &nbsp;until &nbsp;the &nbsp;execution&nbsp; of &nbsp;the &nbsp;function &nbsp;or &nbsp;block &nbsp;in &nbsp;which &nbsp;it &nbsp;was &nbsp;declared &nbsp;in completes. Let&rsquo;s see the following example:</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int x;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>printf(&ldquo;x = %d&rdquo;,x);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>In the above example, the variable&nbsp;<strong>x&nbsp;</strong>is a local variable with respect to the&nbsp;<strong>main&nbsp;</strong>function. Variable&nbsp;<strong>x&nbsp;</strong>is not accessible outside main function and&nbsp;<strong>x&nbsp;</strong>remains in the memory until the execution of the&nbsp;<strong>main&nbsp;</strong>function completes.</p>\r\n\r\n<p><strong>Global Variables</strong></p>\r\n\r\n<p>A variable is said to be a global variable if it is declared outside all the functions in the program. A&nbsp; global variable can be accessed throughout the program by any function. A global variable remains in the memory until the program terminates. In a multi-file program, a global can be accessed in other files wherever the variable is declared with the storage class&nbsp;<strong>extern</strong>.</p>\r\n\r\n<p>Types of variables and their scope and lifetime can be summarized as shown below:</p>\r\n\r\n<table style=\"border-collapse:collapse; box-sizing:inherit; margin:0px 0px 1.5em; width:900px\">\r\n <tbody>\r\n  <tr>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>Type of Variable</strong></p>\r\n   </td>\r\n   <td><strong>Dec</strong><strong>laration</strong>\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>Loca</strong><strong>t</strong><strong>ion</strong></p>\r\n   </td>\r\n   <td><strong>Sc</strong><strong>ope</strong>\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>(V</strong><strong>isibility)</strong></p>\r\n   </td>\r\n   <td><strong>Lifetime</strong>\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>(Alive)</strong></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Local Variable</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Inside a function/block</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Within the function/block</p>\r\n   </td>\r\n   <td>Until the function/block completes</td>\r\n  </tr>\r\n  <tr>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Global Variable</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Outside a function/block</p>\r\n   </td>\r\n   <td>Within the file and\r\n   <p>&nbsp;</p>\r\n\r\n   <p>other files marked with extern</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Until the program terminates</p>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Program</strong></p>\r\n\r\n<p>/* C program to demonstrate local and global variables */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int g = 10;</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int x = 20;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Inside main, g = %d&rdquo;,g);</p>\r\n\r\n<p>printf(&ldquo;\\nInside main, x = %d&rdquo;,x);</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int y = 30;</p>\r\n\r\n<p>printf(&ldquo;\\nInside block, g = %d&rdquo;,g); printf(&ldquo;\\nInside block, y = %d&rdquo;,y); printf(&ldquo;\\nInside block, x = %d&rdquo;,x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>printf(&ldquo;\\nOutside block, g = %d&rdquo;,g);</p>\r\n\r\n<p>/*printf(&ldquo;Outside block, y = %d&rdquo;,y);*/ printf(&ldquo;\\nOutside block, x = %d&rdquo;,x); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>In the above example,&nbsp;<strong>g&nbsp;</strong>is a global variable and&nbsp;<strong>x&nbsp;</strong>is a local variable with respect to main and&nbsp;<strong>y&nbsp;</strong>is a local variable within the block. The variable&nbsp;<strong>y&nbsp;</strong>cannot be accessed outside the block. That is why the&nbsp;<strong>printf&nbsp;</strong>statement outside the block accessing the value of the variable&nbsp;<strong>y&nbsp;</strong>has been commented out.</p>\r\n\r\n<p><strong>Storage Classes</strong></p>\r\n\r\n<p>The storage classes specify the scope and lifetime of a variable in a C program. The&nbsp;<strong>scope (active)&nbsp;</strong>specifies in which parts of the program is the variable accessible and the&nbsp;<strong>lifetime (alive)&nbsp;</strong>specifies how long a variable is available in the memory so that the program will be able to access that variable. There are four storage classes in C. They are:</p>\r\n\r\n<ol>\r\n <li>auto</li>\r\n <li>register</li>\r\n <li>extern</li>\r\n <li>static</li>\r\n</ol>\r\n\r\n<p>The storage classes&rsquo;&nbsp;<strong>auto</strong>,&nbsp;<strong>register and static&nbsp;</strong>can be applied to local variables and the storage</p>\r\n\r\n<p>classes&rsquo;&nbsp;<strong>extern&nbsp;</strong>and&nbsp;<strong>static&nbsp;</strong>can be applied to global variables.</p>\r\n\r\n<p><strong>auto</strong></p>\r\n\r\n<p>When a variable is declared with the storage class&nbsp;<strong>auto,&nbsp;</strong>the variable&rsquo;s scope is within the</p>\r\n\r\n<p>function or block in which it is declared and the lifetime is until the function or block in which it is declared completes. Syntax for declaring&nbsp;<strong>auto&nbsp;</strong>variable is shown below:</p>\r\n\r\n<p>auto datatype variablename;</p>\r\n\r\n<p>In any program, if a local variable is declared without any storage class then it is automatically set to</p>\r\n\r\n<p><strong>auto&nbsp;</strong>storage class.</p>\r\n\r\n<p><strong>r</strong><strong>egister</strong></p>\r\n\r\n<p>When a variable is declared with the storage class&nbsp;<strong>register</strong>, the variable will be stored inside one of the registers of the CPU. The registers are under the direct control of CPU. So, data inside the register can be processed at a faster rate than the data that resides in the main memory. For a program to execute faster, it is always best to store the most frequently used data inside register. The scope and lifetime of a&nbsp;<strong>register&nbsp;</strong>variable is same as that of a&nbsp;<strong>auto&nbsp;</strong>variable. Syntax for declaring a&nbsp;<strong>register&nbsp;</strong>variable is as shown below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>register datatype variablename;</p>\r\n\r\n<p><strong>extern</strong></p>\r\n\r\n<p>The&nbsp;<strong>extern&nbsp;</strong>storage class specifies that the variable is declared in some part of the program.</p>\r\n\r\n<p>Generally this storage class is used to refer global variables in a program. Note that&nbsp;<strong>extern&nbsp;</strong>variables cannot be initialized. The scope of a&nbsp;<strong>extern&nbsp;</strong>variable is throughout the entire program and the lifetime is until the program completes its execution.</p>\r\n\r\n<p>In a multi-file program, a global variable in one file can be accessed from another file by using the storage class&nbsp;<strong>extern.&nbsp;</strong>Syntax for declaring a&nbsp;<strong>extern&nbsp;</strong>variable is as shown below:</p>\r\n\r\n<p>extern datatype variablename;</p>\r\n\r\n<p><strong>static</strong></p>\r\n\r\n<p>The&nbsp;<strong>static&nbsp;</strong>storage class can be applied to both local variables and global variables. The&nbsp;<strong>s</strong><strong>tatic</strong></p>\r\n\r\n<p>local variables are accessible only within the function or block in which they are declared, but their lifetime is throughout the program. The&nbsp;<strong>static&nbsp;</strong>global variables are accessible throughout the file in which they are declared but not in other files. Syntax for declaring&nbsp;<strong>static&nbsp;</strong>variable is shown below:</p>\r\n\r\n<p>static datatype variablename;</p>\r\n\r\n<p>The four storage classes can be summarized as shown below:</p>\r\n\r\n<table style=\"border-collapse:collapse; box-sizing:inherit; margin:0px 0px 1.5em; width:900px\">\r\n <tbody>\r\n  <tr>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>S</strong><strong>t</strong><strong>orage Class</strong></p>\r\n   </td>\r\n   <td><strong>Dec</strong><strong>laration</strong>\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>Loca</strong><strong>t</strong><strong>ion</strong></p>\r\n   </td>\r\n   <td><strong>Sc</strong><strong>ope</strong>\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>(V</strong><strong>isibility)</strong></p>\r\n   </td>\r\n   <td><strong>Lifetime</strong>\r\n   <p>&nbsp;</p>\r\n\r\n   <p><strong>(Alive)</strong></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>auto</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Inside a function/block</p>\r\n   </td>\r\n   <td>Within the\r\n   <p>&nbsp;</p>\r\n\r\n   <p>function/block</p>\r\n   </td>\r\n   <td>Until the function/block\r\n   <p>&nbsp;</p>\r\n\r\n   <p>completes</p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>register</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Inside a function/block</p>\r\n   </td>\r\n   <td>Within the\r\n   <p>&nbsp;</p>\r\n\r\n   <p>function/block</p>\r\n   </td>\r\n   <td>Until the function/block\r\n   <p>&nbsp;</p>\r\n\r\n   <p>completes</p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>extern</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Outside all functions</p>\r\n   </td>\r\n   <td>Entire file plus other files where the variable is declared as extern</td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Until the program terminates</p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>static\r\n   <p>&nbsp;</p>\r\n\r\n   <p>(local)</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Inside a function/block</p>\r\n   </td>\r\n   <td>Within the function/block</td>\r\n   <td>Until the program terminates</td>\r\n  </tr>\r\n  <tr>\r\n   <td>static\r\n   <p>&nbsp;</p>\r\n\r\n   <p>(global)</p>\r\n   </td>\r\n   <td>&nbsp;\r\n   <p>&nbsp;</p>\r\n\r\n   <p>Outside all functions</p>\r\n   </td>\r\n   <td>Entire file in which it is declared</td>\r\n   <td>Until the program terminates</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Note:&nbsp;</em></strong><em>The&nbsp;<strong>extern&nbsp;</strong>variables cannot be initialized. The default value for&nbsp;<strong>static&nbsp;</strong>variables is zero.</em></p>\r\n\r\n<p><strong>Programs:</strong></p>\r\n\r\n<p>/* C program to demostrate auto storage class */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt; void func1(); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>/* x is local variable with respect to main function */</p>\r\n\r\n<p>auto int x;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>x = 20;</p>\r\n\r\n<p>printf(&ldquo;\\nValue of x is: %d&rdquo;,x);</p>\r\n\r\n<p>func1();</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>/*Since x is a auto or local variable of function main, it is not accessible in func1*/</p>\r\n\r\n<p>x = 10;</p>\r\n\r\n<p>printf(&ldquo;\\nValue of x is: %d&rdquo;,x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate register storage class */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt; void printx(); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr(); printx(); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void printx()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>register int i;</p>\r\n\r\n<p>for(i = 1;i &lt;= 10000;i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d &ldquo;,i);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate global variables */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int x;</p>\r\n\r\n<p>void func1(); void func2(); void func3(); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>x = 10;</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>func1();</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>func2();</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>func3();</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func2()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func3()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int x = 10;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate extern storage class */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>void func1(); void func2(); void func3(); main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>extern int x;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>x = 10;</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>func1();</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>func2();</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>func3();</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>extern int x;</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>int x;</p>\r\n\r\n<p>void func2()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void func3()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int x = 10;</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate extern storage class in multiple files */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#include&rdquo;extf2.c&rdquo; int x;</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>extf1.c</p>\r\n\r\n<p>x = 10; func1(); func2(); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate extern storage class in multiple files */</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>extern int x;</p>\r\n\r\n<p>printf(&ldquo;\\nx = %d&rdquo;,x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>extf2.c</p>\r\n\r\n<p>void func2()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int x = 20;</p>\r\n\r\n<p>printf(&ldquo;\\nx = %d&rdquo;,x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate static storage class &ndash; local variables */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>int count();</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Value is: %d\\n&rdquo;,count()); printf(&ldquo;Value is: %d\\n&rdquo;,count()); printf(&ldquo;Value is: %d\\n&rdquo;,count()); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>int count()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>static int x = 0;</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>return x;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate static storage class &ndash; global variables */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#include&rdquo;statg2.c&rdquo;</p>\r\n\r\n<p>static int x; void func1(); main()</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x = 10;</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>func1();</p>\r\n\r\n<p>func2();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>statg1.c</p>\r\n\r\n<p>void func1()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demonstrate static storage class &ndash; global variables */</p>\r\n\r\n<p>void func2()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x++;</p>\r\n\r\n<p>printf(&ldquo;x = %d\\n&rdquo;,x);</p>\r\n\r\n<p>statg2.c</p>\r\n\r\n<p>}</p>\r\n\r\n<p><strong>Passing arrays to functions</strong></p>\r\n\r\n<p><strong>Passing one-dimensional arrays</strong></p>\r\n\r\n<p>We can also pass arrays as parameters to the called function. While passing one-dimensional array to a function, you should follow three rules. They are:</p>\r\n\r\n<ol>\r\n <li>In the function declaration you should write a pair of square brackets [ ] beside the name of the array. No need to specify the size of the array.</li>\r\n <li>In the function definition you should write a pair of square brackets [ ] beside the name of the array. Again no need to specify the size of the array.</li>\r\n <li>In the function call, it is enough to just pass the array name as the actual parameter. No need to write the square brackets after the array name</li>\r\n</ol>\r\n\r\n<p>When an array is passed as an actual parameter, the formal parameter also refers to the same array which is passed as an actual parameter. When passing an array as a parameter, you are passing the address of the array, not the values in the array. So, if you make changes in the array using the formal name of the array, the changes are also reflected on the actual array.</p>\r\n\r\n<p><strong>Programs:</strong></p>\r\n\r\n<p>/* C program to find the largest number in a group of numbers using a function</p>\r\n\r\n<p>*/</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>void largest(int a[], int n);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a[5], i;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>for(i = 0; i &lt; 5; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;Enter a[%d]: &ldquo;,i+1);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;a[i]);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>largest(a,5);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void largest(int a[], int n)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i, max;</p>\r\n\r\n<p>max = a[0];</p>\r\n\r\n<p>for(i = 1; i &lt; n; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>if(max&lt;a[i])</p>\r\n\r\n<p>{</p>\r\n\r\n<p>max = a[i];</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>printf(&ldquo;The largest number is: %d&rdquo;,max);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to find the smallest number in a group of numbers using a function */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>void smallest(int a[], int n);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a[5], i;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>for(i = 0; i &lt; 5; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;Enter a[%d]: &ldquo;,i+1);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;a[i]);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>smallest(a,5);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void smallest(int a[], int n)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i, min;</p>\r\n\r\n<p>min = a[0];</p>\r\n\r\n<p>for(i = 1; i &lt; n; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>if(min&gt;a[i])</p>\r\n\r\n<p>{</p>\r\n\r\n<p>min = a[i];</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>printf(&ldquo;The smallest number is: %d&rdquo;,min);</p>\r\n\r\n<p>}</p>\r\n\r\n<p><strong>Passing two-dimensional arrays</strong></p>\r\n\r\n<p>We can also pass two-dimensional arrays as parameters to a function. While passing two- dimensional arrays as parameters you should keep in mind the following things:</p>\r\n\r\n<ol>\r\n <li>In the function declaration you should write two sets of square brackets after the array name. You should specify the size of the second dimension i.e., the number of columns.</li>\r\n <li>In the function call you should write two sets of square brackets after the array name. Also</li>\r\n</ol>\r\n\r\n<p>you should specify the size of the second dimension i.e., the number of columns.</p>\r\n\r\n<ol start=\"3\">\r\n <li>In the function call, it is enough to pass the name of the array as a parameter. No need to mention the square brackets.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Program</strong></p>\r\n\r\n<p>/* C program to pass a two dimensional array as a parameter to a function */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>void printmatrix(int a[][3],int m,int n);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a[3][3],i,j;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>for(i = 0; i &lt; 3; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>for(j = 0; j &lt; 3; j++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;Enter a[%d][%d]: &ldquo;,i,j);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;a[i][j]);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>printmatrix(a,3,3);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void printmatrix(int a[][3],int m,int n)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i, j;</p>\r\n\r\n<p>for(i = 0; i &lt; 3; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>for(j = 0; j &lt; 3; j++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d &ldquo;,a[i][j]);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>printf(&ldquo;\\n&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/*C program to insert a sub-string into a string at a specified position*/</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#include&lt;string.h&gt;</p>\r\n\r\n<p>void strinst(char x[],char y[], int loc);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>char str[20], substr[20];</p>\r\n\r\n<p>int pos;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the string: &ldquo;);</p>\r\n\r\n<p>gets(str);</p>\r\n\r\n<p>printf(&ldquo;Enter the substring: &ldquo;);</p>\r\n\r\n<p>gets(substr);</p>\r\n\r\n<p>printf(&ldquo;Enter the position number: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;pos);</p>\r\n\r\n<p>strinst(str, substr, pos);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void strinst(char x[],char y[], int loc)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>char result[40];</p>\r\n\r\n<p>int i, j, k;</p>\r\n\r\n<p>for(i=0; i&lt;loc; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>result[i] = x[i];</p>\r\n\r\n<p>}</p>\r\n\r\n<p>for(j=0, k=i; j&lt;strlen(y); j++, k++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>result[k] = y[j];</p>\r\n\r\n<p>}</p>\r\n\r\n<p>for(k=i+strlen(y); k&lt;strlen(x)+strlen(y); k++,i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>result[k] = x[i];</p>\r\n\r\n<p>}</p>\r\n\r\n<p>result[k] = &lsquo;\\0&rsquo;;</p>\r\n\r\n<p>puts(result);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to delete n characters from the specified position in a string */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#include&lt;string.h&gt;</p>\r\n\r\n<p>void strdel(char x[],int num,int loc);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>char str[20]; int n, pos; clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter a string: &ldquo;);</p>\r\n\r\n<p>gets(str);</p>\r\n\r\n<p>printf(&ldquo;How many characters you want to delete? &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;n);</p>\r\n\r\n<p>printf(&ldquo;Enter the position: &ldquo;); scanf(&ldquo;%d&rdquo;,&amp;pos); strdel(str,n,pos);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void strdel(char x[],int num,int loc)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>char result[20];</p>\r\n\r\n<p>int i,j;</p>\r\n\r\n<p>for(i=0; i&lt;loc; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>result[i] = x[i];</p>\r\n\r\n<p>}</p>\r\n\r\n<p>for(j=i,i=i+num; j&lt;(strlen(x)-num); j++,i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>result[j] = x[i];</p>\r\n\r\n<p>}</p>\r\n\r\n<p>result[j] = &lsquo;\\0&rsquo;;</p>\r\n\r\n<p>puts(result);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/*C program to replace a character at beginning or ending or at the specified location in a string */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#include&lt;string.h&gt;</p>\r\n\r\n<p>void strrepb(char x[], char c);</p>\r\n\r\n<p>void strrepe(char x[], char c);</p>\r\n\r\n<p>void strrep(char x[], char c, char loc);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>char str[10], ch;</p>\r\n\r\n<p>int choice, pos;</p>\r\n\r\n<p>/*clrscr();*/</p>\r\n\r\n<p>printf(&ldquo;Enter a string: &ldquo;);</p>\r\n\r\n<p>gets(str);</p>\r\n\r\n<p>while(1)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;1. Replace a character at the begining of the string\\n&rdquo;); printf(&ldquo;2. Replace a character at the ending of the string\\n&rdquo;); printf(&ldquo;3. Replace a cahracter at specific position\\n&rdquo;);</p>\r\n\r\n<p>printf(&ldquo;4. Exit\\n&rdquo;); printf(&ldquo;Enter your choice: &ldquo;); scanf(&ldquo;%d&rdquo;,&amp;choice); switch(choice)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>case 1:</p>\r\n\r\n<p>fflush(stdin);</p>\r\n\r\n<p>printf(&ldquo;Enter the character: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%c&rdquo;,&amp;ch); strrepb(str, ch); break;</p>\r\n\r\n<p>case 2:</p>\r\n\r\n<p>fflush(stdin);</p>\r\n\r\n<p>printf(&ldquo;Enter the character: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%c&rdquo;,&amp;ch); strrepe(str, ch); break;</p>\r\n\r\n<p>case 3:</p>\r\n\r\n<p>printf(&ldquo;Enter the position: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;pos);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>fflush(stdin);</p>\r\n\r\n<p>printf(&ldquo;Enter the character: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%c&rdquo;,&amp;ch); strrep(str, ch, pos); break;</p>\r\n\r\n<p>case 4:</p>\r\n\r\n<p>exit(0);</p>\r\n\r\n<p>default:</p>\r\n\r\n<p>printf(&ldquo;Invalid option. Try again&hellip;\\n&rdquo;);</p>\r\n\r\n<p>break;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void strrepb(char x[], char c)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x[0] = c; puts(x); printf(&ldquo;\\n&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void strrepe(char x[], char c)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x[strlen(x)-1] = c;</p>\r\n\r\n<p>puts(x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>void strrep(char x[], char c, char loc)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>x[loc-1] = c;</p>\r\n\r\n<p>puts(x);</p>\r\n\r\n<p>}</p>\r\n\r\n<p><strong>Preprocessor Directives</strong></p>\r\n\r\n<p>C provides many features like structures, unions and pointers. Another unique feature of the C language is the preprocessor. The C preprocessor provides several tools that are not present in other high-level languages. The programmer can use these tools to make his program easy to read, easy to modify, portable and more efficient.</p>\r\n\r\n<p>The preprocessor is a program that processes the source code before it passes through the compiler. Preprocessor directives are placed in the source program before the main line. Before the source code passes through the compiler, it is examined by the preprocessor for any preprocessor directives. If there are any, appropriate actions are taken and then the source program is handed over to the compiler.</p>\r\n\r\n<p>All the preprocessor directives follow special syntax rules that are different from the normal C syntax. Every preprocessor directive begins with the symbol&nbsp;<strong>#&nbsp;</strong>and is followed by the respective preprocessor directive. The preprocessor directives are divided into three categories. They are:</p>\r\n\r\n<ol>\r\n <li>Macro Substitution Directives</li>\r\n <li>File Inclusion Directives</li>\r\n <li>Compiler Control Directives</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Macro Substitution Directives</strong></p>\r\n\r\n<p>Macro substitution is a process where an identifier in a program is replaced by a predefined string composed of one or more tokens. The preprocessor accomplishes this task under the direction of&nbsp;<strong>#define&nbsp;</strong>statement. This statement, usually known as a&nbsp;<em>macro definition&nbsp;</em>takes the following form:</p>\r\n\r\n<p>#define identifier string</p>\r\n\r\n<p>If this statement is included in the program at the beginning, then the preprocessor replaces every occurrence of the&nbsp;<strong>identifier&nbsp;</strong>in the source code by the string.</p>\r\n\r\n<p><strong>N</strong><strong>ote:&nbsp;</strong><em>Care should be taken that there is no space between the&nbsp;<strong>#&nbsp;</strong>and the word&nbsp;<strong>define</strong>. Also there should be atleast a single space between&nbsp;<strong>#define&nbsp;</strong>and the&nbsp;<strong>identifier&nbsp;</strong>and between the&nbsp;<strong>identifier&nbsp;</strong>and the&nbsp;<strong>string</strong>. Also, there will be no semi-colon at the end of the statement.</em></p>\r\n\r\n<p>There are different forms of macro substitution. The most common are:</p>\r\n\r\n<ol>\r\n <li>Simple macro substitution</li>\r\n <li>Argumented macro substitution</li>\r\n <li>Nested macro substitution</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Simple Macro Substitution</strong></p>\r\n\r\n<p>The simple macro substitutions are generally used for declaring constants in a C program. Some valid examples for simple macro substitution are:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table style=\"border-collapse:collapse; box-sizing:inherit; margin:0px 0px 1.5em; width:900px\">\r\n <tbody>\r\n  <tr>\r\n   <td>#define</td>\r\n   <td>PI</td>\r\n   <td>3.1412</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#define</td>\r\n   <td>MAX</td>\r\n   <td>100</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#define</td>\r\n   <td>START</td>\r\n   <td>main() {</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#define</td>\r\n   <td>STOP</td>\r\n   <td>}</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>Whenever the preprocessor comes across the simple macros, the identifier will be replaced with the corresponding string. For example, in a C program, all the occurrences of PI will be replaced with</p>\r\n\r\n<p>3.1412.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Argumented Macro Substitution</strong></p>\r\n\r\n<p>The preprocessor allows us to define more complex and more useful form of substitutions. The Argumented macro substitution takes the following form:</p>\r\n\r\n<p>#define &nbsp;identifier(arg1, arg2, &hellip;.. , argn)&nbsp; &nbsp;string</p>\r\n\r\n<p>Care should be taken that there is no space between the identifier and the left parentheses. The identifiers arg1, arg2, &hellip;. , argn are the formal macro arguments that are analogous to the formal arguments in a function definition. In the program, the occurrence of a macro with arguments is known as a&nbsp;<strong>macro call</strong>. When a macro is called, the preprocessor substitutes the string, replacing the formal parameters with actual parameters.</p>\r\n\r\n<p>For example, if the Argumented macro is declared as shown below:</p>\r\n\r\n<p>#define&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;CUBE(x)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;(x*x*x)</p>\r\n\r\n<p>and the macro is called as shown below:</p>\r\n\r\n<p>volume = CUBE(side);</p>\r\n\r\n<p>Then the preprocessor will expand the above statement as:</p>\r\n\r\n<p>volume = (side * side * side)</p>\r\n\r\n<p><strong>Nested Macro Substitution</strong></p>\r\n\r\n<p>We can use one macro inside the definition of another macro. Such macros are known as nested macros. Example for a nested macro is shown below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table style=\"border-collapse:collapse; box-sizing:inherit; margin:0px 0px 1.5em; width:900px\">\r\n <tbody>\r\n  <tr>\r\n   <td>#define</td>\r\n   <td>SQUARE(x)</td>\r\n   <td>x*x</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#define</td>\r\n   <td>CUBE(x)</td>\r\n   <td>SQUARE(x) * x</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Programs</strong></p>\r\n\r\n<p>/* C program to demonstrate simple macro substitution */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define MAX 100 main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int n;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the value of n: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;n);</p>\r\n\r\n<p>if(n &lt; MAX)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d is less than MAX&rdquo;,n);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d is greater than MAX&rdquo;,n);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demonstrate argumented macro substitution */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define SQUARE(x) x*x main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int i;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>for(i = 1; i &lt;= 10; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d\\n&rdquo;,SQUARE(i));</p>\r\n\r\n<p>}</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demonstrate nested macro substitution */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define SQUARE(x) x*x</p>\r\n\r\n<p>#define AREA(x) 3.14*SQUARE(x)</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int r;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;Enter the radius: &ldquo;);</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,&amp;r);</p>\r\n\r\n<p>printf(&ldquo;Area of the circle is: %f&rdquo;,AREA(r));</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p><strong>File Inclusion Directives</strong></p>\r\n\r\n<p>The external files containing functions or macro definitions can be linked with our program so that there is no need to write the functions and macro definitions again. This can be achieved by using the&nbsp;<strong>#include&nbsp;</strong>directive. The syntax for this directive is as shown below:</p>\r\n\r\n<p>#include &ldquo;filename&rdquo; OR</p>\r\n\r\n<p>#include&lt;filename&gt;</p>\r\n\r\n<p>We can use either of the above statements to link our program with other files. If the&nbsp;<strong>filename&nbsp;</strong>is included in double quotes, the file is searched in the local directory. If the&nbsp;<strong>filename&nbsp;</strong>is included in angular brackets, then the file is searched in the standard directories.</p>\r\n\r\n<p><strong>Compiler Control Directives</strong></p>\r\n\r\n<p>Following are the compiler control directives:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table style=\"border-collapse:collapse; box-sizing:inherit; margin:0px 0px 1.5em; width:900px\">\r\n <tbody>\r\n  <tr>\r\n   <td>Directive</td>\r\n   <td>Purpose</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#ifdef</td>\r\n   <td>Test for a macro definition</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#endif</td>\r\n   <td>Specifies the end of #if</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#ifndef</td>\r\n   <td>Tests whether a macro is not defined</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#if</td>\r\n   <td>Test a compile-time condition</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#else</td>\r\n   <td>Specifies alternative when #if fails</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>These compiler control directives are used in different situations. They are:</p>\r\n\r\n<p><strong>Situation 1</strong></p>\r\n\r\n<p>You have included a file containing some macro definitions. It is not known whether a certain macro has been defined in that header file. However, you want to be certain that the macro is defined.</p>\r\n\r\n<p>This situation refers to the conditional definition of a macro. We want to ensure that the</p>\r\n\r\n<p>macro TEST is always defined, irrespective of whether it has been defined in the header file or not. This can be achieved as follows:</p>\r\n\r\n<p>#include&rdquo;DEFINE.H&rdquo;</p>\r\n\r\n<p>#ifndef TEST</p>\r\n\r\n<p>#define TEST 1</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p><strong>DEFINE.H&nbsp;</strong>is the header that is supposed to contain the definition of&nbsp;<strong>TEST&nbsp;</strong>macro. The directive</p>\r\n\r\n<p><strong>#ifndef TEST&nbsp;</strong>searches the definition of&nbsp;<strong>TEST&nbsp;</strong>in the header file and if it is not defined, then all the lines between the&nbsp;<strong>#ifndef&nbsp;</strong>and the corresponding&nbsp;<strong>#endif&nbsp;</strong>directive are executed in the program.</p>\r\n\r\n<p><strong>Situation 2</strong></p>\r\n\r\n<p>Suppose a customer has two different types of computers and you are required to write a program that will run on both the systems. You want to use the same program, although a certain lines of code must be different for each system.</p>\r\n\r\n<p>The main concern here is to make the program portable. This can be achieved as shown</p>\r\n\r\n<p>below:</p>\r\n\r\n<p>#ifdef IBM_PC</p>\r\n\r\n<p>{</p>\r\n\r\n<p>}</p>\r\n\r\n<p>#else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>}</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p>&mdash;-</p>\r\n\r\n<p>&mdash;-</p>\r\n\r\n<p>&mdash;-</p>\r\n\r\n<p>&mdash;-</p>\r\n\r\n<p>If we want to run the program on a IBM PC, we include the directive&nbsp;<strong>#define IBM_PC,&nbsp;</strong>otherwise we won&rsquo;t.</p>\r\n\r\n<p><strong>Situation 3</strong></p>\r\n\r\n<p>You are developing a program for selling in the open market. Some customers may insist on having certain additional features. However, you would like to have a single program that would satisfy both types of customers.</p>\r\n\r\n<p>This situation is similar to the above situation and therefore the control directives take the following form:</p>\r\n\r\n<p>#idef ABC</p>\r\n\r\n<p>Group-A lines</p>\r\n\r\n<p>#else</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p>Group-B lines</p>\r\n\r\n<p>Group-A lines are included if the customer ABC is defined. Otherwise, Group-B lines are included.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Situation 4</strong></p>\r\n\r\n<p>Suppose if you want to test a large program, you would like to include print calls in the program in certain places to display intermediate results and messages in order to trace the flow of execution and errors.</p>\r\n\r\n<p>For this purpose we can use&nbsp;<strong>#if&nbsp;</strong>and&nbsp;<strong>#else&nbsp;</strong>directive as shown below:</p>\r\n\r\n<p>#if constant expression</p>\r\n\r\n<p>{</p>\r\n\r\n<p>}</p>\r\n\r\n<p>else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>Statement 1; Statement 2;</p>\r\n\r\n<p>&mdash;&ndash;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p>Statement 1; Statement 2;</p>\r\n\r\n<p>&mdash;-</p>\r\n\r\n<p><strong>Programs</strong></p>\r\n\r\n<p>/* C program to demostrate #undef preprocessor directive */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define NAME &ldquo;teja&rdquo;</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>puts(NAME);</p>\r\n\r\n<p>#undef NAME puts(NAME); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate #ifdef and #endif preprocessor directives */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define MAX 100 main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>#ifdef MAX</p>\r\n\r\n<p>#define COUNT 10</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p>printf(&ldquo;COUNT = %d&rdquo;,COUNT);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate #ifndef and #endif preprocessor directives */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#ifndef MAX</p>\r\n\r\n<p>#define MAX 100</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>printf(&ldquo;MAX = %d&rdquo;,MAX);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demostrate #if and #else preprocessor directives */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define MAX 100</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>#ifdef MAX</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;MAX is defined&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>#else</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;MAX is not defined&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>#endif getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p><strong>A</strong><strong>NSI Preprocessor Directives</strong></p>\r\n\r\n<p>The ANSI committee has added some more preprocessor directives to the existing list. They</p>\r\n\r\n<p>are:</p>\r\n\r\n<table style=\"border-collapse:collapse; box-sizing:inherit; margin:0px 0px 1.5em; width:900px\">\r\n <tbody>\r\n  <tr>\r\n   <td><strong>Directive</strong></td>\r\n   <td><strong>Purpose</strong></td>\r\n  </tr>\r\n  <tr>\r\n   <td>#elif</td>\r\n   <td>Provides alternative test facility</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#pragma</td>\r\n   <td>Specifies compiler instructions</td>\r\n  </tr>\r\n  <tr>\r\n   <td>#error</td>\r\n   <td>Stops compilation when an error occurs</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>#elif &nbsp;Directive</strong></p>\r\n\r\n<p>The&nbsp;<strong>#elif&nbsp;</strong>directive enables us to establish an &ldquo;if&hellip;else&hellip;if&rdquo; sequence for testing multiple conditions. The syntax is as shown below:</p>\r\n\r\n<p>#if expr1</p>\r\n\r\n<p>Stmts;</p>\r\n\r\n<p>#elif expr2</p>\r\n\r\n<p>Stmts;</p>\r\n\r\n<p>#elif expr3</p>\r\n\r\n<p>Stmts;</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p><strong>#pragma Directive</strong></p>\r\n\r\n<p>The &nbsp;<strong>#</strong><strong>pragma&nbsp;</strong>directive is &nbsp;an &nbsp;implementation oriented directive that &nbsp;allows the &nbsp;user&nbsp; to specify various instructions to be given to the compiler. Syntax is as follows:</p>\r\n\r\n<p>#pragma name</p>\r\n\r\n<p>Where&nbsp;<strong>name &nbsp;</strong>is &nbsp;the name of &nbsp;the pragma we want. For&nbsp; example, under Microsoft C, &nbsp;<strong>#pragma loop_opt(on)&nbsp;</strong>causes loop optimization to be performed.</p>\r\n\r\n<p><strong>#error Directive</strong></p>\r\n\r\n<p>The&nbsp;<strong>#error&nbsp;</strong>directive is used to produce diagnostic messages during debugging. The general format is:</p>\r\n\r\n<p>#error error-message</p>\r\n\r\n<p>When &nbsp;the &nbsp;<strong>#error &nbsp;</strong>directive &nbsp;is &nbsp;encountered by &nbsp;the &nbsp;compiler, &nbsp;it &nbsp;displays &nbsp;the &nbsp;error &nbsp;message and terminates the program.</p>\r\n\r\n<p>Example:</p>\r\n\r\n<p>#if !defined(FILE_G)</p>\r\n\r\n<p>#error NO GRAPHICS FILE</p>\r\n\r\n<p>#endif</p>\r\n\r\n<p><strong>Preprocessor Operation</strong></p>\r\n\r\n<p><strong>Stringizing Operator #</strong></p>\r\n\r\n<p>ANSI C provides an operator&nbsp;<strong>#&nbsp;</strong>called stringizing operator to be used in the definition of macro functions. This operator converts a formal argument into a string. For example, if the macro is defined as follows:</p>\r\n\r\n<p>#define&nbsp;&nbsp; &nbsp;sum(xy)&nbsp;&nbsp; &nbsp;printf(#xy &ldquo; = %f \\n&rdquo;, xy)</p>\r\n\r\n<p>and somewhere in &nbsp;the &nbsp;program the &nbsp;statement is &nbsp;written as:&nbsp;&nbsp;<strong>sum(a+b);&nbsp;</strong>then the preprocessor converts this line as shown below:</p>\r\n\r\n<p>printf(&ldquo;a+b&rdquo; &ldquo; = %f \\n&rdquo;, a+b);</p>\r\n\r\n<p><strong>Token Pasting Operator ##</strong></p>\r\n\r\n<p>The token pasting operator&nbsp;<strong>##&nbsp;</strong>defined by ANSI enables us to combine two tokens within a macro definition to form a single token.</p>\r\n\r\n<p><strong>Programs</strong></p>\r\n\r\n<p>/*C program to demonstrate Stringizing operator # */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define sum(x) printf(#x&rdquo;= %d&rdquo;,x);</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a,b;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>a = 10, b = 20; sum(a+b); getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>/* C program to demonstrate preprocessor directives */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>#define START main() {</p>\r\n\r\n<p>#define STOP }</p>\r\n\r\n<p>#define PRINT(x) printf(#x)</p>\r\n\r\n<p>#define COMBINE(x,y,z) x##y##z</p>\r\n\r\n<p>#define hai &ldquo;hai&rdquo; START</p>\r\n\r\n<p>clrscr(); printf(COMBINE(h,a,i)); PRINT(\\nhello world); getch();</p>\r\n</div>', '30 Minutes', '1', '2019-11-26 12:08:16', NULL);
INSERT INTO `tbl_courses` (`courses_id`, `category_id`, `lession_id`, `courses_name`, `courses_friendly_url`, `courses_code`, `courses_description`, `str_total_time`, `status`, `courses_added_date`, `courses_updated_date`) VALUES
(2, 0, NULL, 'C Language', 'c-language', 'C Language', '<h3>UNIT &ndash; 4 POINTERS</h3>\r\n\r\n<div class=\"content-item-description lesson-description\" style=\"box-sizing: inherit; margin-bottom: 20px; font-family: \">\r\n<p><strong>Pointers</strong></p>\r\n\r\n<p>A pointer is a derived data type in C. It is built from one of the fundamental data types available in C. Pointers contain memory addresses as their values. Since these memory addresses are the locations in the computer memory where program instructions and data are stored, pointers can be used to access and manipulate data stored in the memory.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Advantages of Pointers</strong></p>\r\n\r\n<p>Pointers are used frequently in C, as they offer a number of benefits to the programmers. They include the following:</p>\r\n\r\n<ol>\r\n <li>Pointers are more efficient in handling arrays and data tables.</li>\r\n <li>Pointers can be used to return multiple values from a function via function arguments.</li>\r\n <li>Pointers allow passing a function as argument to other functions.</li>\r\n <li>The use of pointer arrays to character strings results in saving of data storage space in memory.</li>\r\n <li>Pointers allow C to support dynamic memory management.</li>\r\n <li>Pointers &nbsp;provide &nbsp;an &nbsp;efficient &nbsp;way &nbsp;for &nbsp;manipulating &nbsp;dynamic &nbsp;data &nbsp;structures &nbsp;such &nbsp;as structures, linked lists, queues, stacks and trees.</li>\r\n <li>Pointers increase the execution speed and thus reduce the program execution time.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Understanding Pointers</strong></p>\r\n\r\n<p>The computer&rsquo;s memory is a sequential collection of storage cells. Each cell, commonly known as a &nbsp;byte, has a &nbsp;number called&nbsp;<em>address&nbsp;</em>associated with it.&nbsp; Typically, the addresses are numbered consecutively, starting from&nbsp; zero.&nbsp; The &nbsp;last &nbsp;address depends on &nbsp;the &nbsp;memory size. &nbsp;A computer system having 64k memory will have its last address as 65,535.</p>\r\n\r\n<p>Whenever we declare a variable in our programs, the system allocates somewhere in the</p>\r\n\r\n<p>memory, an appropriate location to hold the value of the variable. This location will have its own address number. Consider the following example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The above statement&nbsp;<strong>int var&nbsp;</strong>creates a location in the memory to hold integer value. That location will have an address for example assume it is 5000. The statement&nbsp;<strong>var = 200&nbsp;</strong>stores the value 200 at the location whose address is 5000. So, in our example,&nbsp;<strong>var&nbsp;</strong>is the variable name,&nbsp;<strong>200&nbsp;</strong>is the value stored in var and&nbsp;<strong>5000&nbsp;</strong>is the address of the memory location containing the variable&nbsp;<strong>var</strong>.</p>\r\n\r\n<p>So, we can access the value&nbsp;<strong>200&nbsp;</strong>either by using the variable name&nbsp;<strong>var&nbsp;</strong>or by using the address of the memory location which is&nbsp;<strong>5000</strong>. We can access using the second method by storing the address in another variable.&nbsp;<strong><em>This concept of storing memory address in a variable and accessing the value available at that address is known as a pointer variable.&nbsp;</em></strong>Since the pointer is also variable, it will also have a memory address just like any other variable.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Pointer Constants</em></strong></p>\r\n\r\n<p>The memory addresses within a computer are referred to as&nbsp;<em>pointer constants</em>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Pointer Values</em></strong></p>\r\n\r\n<p>We cannot assign the memory addresses directly to a variable. We can only get the address of a variable by using the address operator (&amp;). The value thus obtained is known as&nbsp;<em>pointer value</em>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Pointer Variables</em></strong></p>\r\n\r\n<p>Once we obtain the pointer value, we can store it in a variable. Such variable which stores the memory address is known as a&nbsp;<em>pointer variable</em>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Accessing the Address of a Variable</strong></p>\r\n\r\n<p>The actual location of a variable in memory is system dependent. A programmer cannot know the address of a variable immediately. We can retrieve the address of a variable by using the&nbsp;<em>address of&nbsp;</em>(&amp;) operator. Let&rsquo;s look at the following example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int a = 10;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int *p;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>p = &amp;a;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the above example, let the variable&nbsp;<strong>a&nbsp;</strong>is stored at memory address 5000. This can be retrieved by using the address of operator as&nbsp;<strong>&amp;a</strong>. So the value stored in variable&nbsp;<strong>p&nbsp;</strong>is 5000 which is the memory address of variable&nbsp;<strong>a</strong>. So, both the variable&nbsp;<strong>a,&nbsp;</strong>and&nbsp;<strong>p&nbsp;</strong>point to the same memory location.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Declaring and Initializing Pointer Variables</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Declaration</em></strong></p>\r\n\r\n<p>In C, every variable must be declared for its type. Since pointer variables contain addresses that belong to a specific data type, they must be declared as pointers before we use them. The syntax for declaring a pointer is as shown below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>datatype &nbsp;*pointer-name;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This tells the compiler three things about the variable&nbsp;<strong>pointer-name</strong>. They are:</p>\r\n\r\n<ol>\r\n <li>The asterisk (*) tells that the variable&nbsp;<strong>pointer-name&nbsp;</strong>is a pointer variable.</li>\r\n <li><strong>pointer-name&nbsp;</strong>needs a memory location.</li>\r\n <li><strong>pointer-name&nbsp;</strong>points to a variable of type&nbsp;<strong>datatype</strong>.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Consider the following example for declaring pointers:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int *p;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>float *p;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Initialization</em></strong></p>\r\n\r\n<p>After declaring a pointer variable we can store the memory address into it. This process is known as initialization. All uninitialized pointers will have some unknown values that will be interpreted as memory addresses. Since compilers do not detect these errors, the programs with uninitialized pointers will produce erroneous results.</p>\r\n\r\n<p>Once &nbsp;the &nbsp;pointer &nbsp;variable &nbsp;has &nbsp;been &nbsp;declared, &nbsp;we &nbsp;can &nbsp;use &nbsp;the &nbsp;assignment operator &nbsp;to</p>\r\n\r\n<p>initialize the variable. Consider the following example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int var = 20;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int *p;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>p = &amp;var;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the above example, we are assigning the address of variable&nbsp;<strong>var&nbsp;</strong>to the pointer variable&nbsp;<strong>p&nbsp;</strong>by using the assignment operator. We can also combine the declaration and initialization into a single line as shown below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int var = 20;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int *p = &amp;var;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Accessing a Variable Using Pointer</strong></p>\r\n\r\n<p>After declaring and initializing a pointer variable, we can access the value of the variable pointed by the pointer variable using the * operator. The * operator is also known as&nbsp;<em>indirection</em></p>\r\n\r\n<p><em>operator&nbsp;</em>or&nbsp;<em>dereferencing operator</em>. Consider the following example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int var = 20;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int *p = &amp;var;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>printf(&rdquo;Var = %d&rdquo;, *p);</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the above example, we are printing the value of the variable&nbsp;<strong>var&nbsp;</strong>by using the pointer variable&nbsp;<strong>p</strong></p>\r\n\r\n<p>along with the * operator.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Programs</strong></p>\r\n\r\n<p>/* C program to print the address of variables */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a,b; clrscr(); a = 10; b = 20;</p>\r\n\r\n<p>printf(&ldquo;Value of a is: %d and address is: %u\\n&rdquo;,a,&amp;a); printf(&ldquo;Value of b is: %d and address is: %u\\n&rdquo;,b,&amp;b); getch();</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to demonstrate pointers */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a, b;</p>\r\n\r\n<p>int *p1, *p2;</p>\r\n\r\n<p>clrscr(); a = 10; b = 20;</p>\r\n\r\n<p>p1 = &amp;a;</p>\r\n\r\n<p>p2 = &amp;b;</p>\r\n\r\n<p>printf(&ldquo;a&rsquo;s value &ndash; %d, address &ndash; %u\\n&rdquo;,a,&amp;a); printf(&ldquo;b&rsquo;s value &ndash; %d, address &ndash; %u\\n&rdquo;,b,&amp;b); printf(&ldquo;Value at p1: %d\\n&rdquo;,*p1);</p>\r\n\r\n<p>printf(&ldquo;Value at p2: %d\\n&rdquo;,*p2);</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Pointers and Arrays</strong></p>\r\n\r\n<p>When an array is declared in a program, the compiler allocates a base address and sufficient amount of storage to contain all the elements of the array in contiguous (continuous) memory locations. The base address is the location of the first element (index 0) of the array. The compiler also defines the array name as a constant pointer to the first element. Suppose array x is declared as shown below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>int x[5] = {1,2,3,4,5};</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Suppose the array is allocated memory as shown below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The name&nbsp;<strong>x&nbsp;</strong>is defined as a constant pointer pointing to the first element,&nbsp;<strong>x[0]&nbsp;</strong>and therefore the value of&nbsp;<strong>x&nbsp;</strong>is 2000, the location where&nbsp;<strong>x[0]&nbsp;</strong>is stored.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If we declare&nbsp;<strong>p&nbsp;</strong>as an integer pointer, then we can make the pointer&nbsp;<strong>p&nbsp;</strong>point to the array&nbsp;<strong>x&nbsp;</strong>by the following assignment:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>p = x</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In &nbsp;a &nbsp;one &nbsp;dimensional &nbsp;array &nbsp;the &nbsp;address &nbsp;of &nbsp;element &nbsp;<strong>n &nbsp;</strong>can &nbsp;be &nbsp;calculated &nbsp;by &nbsp;using &nbsp;the &nbsp;below expression:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>address = base address + (index * scale factor)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In a two dimensional array with m rows and n columns the address of an element can be calculated as shown below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>address = base address + [(i * n + j) * scale factor]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Where i represents ith row and j represents jth column.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Programs</strong></p>\r\n\r\n<p>/* C program to access one dimensional array using pointer */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a[5], *p, i;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>p = a;</p>\r\n\r\n<p>printf(&ldquo;Enter 5 numbers: &ldquo;);</p>\r\n\r\n<p>for(i = 0; i &lt; 5; i++,p++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>scanf(&ldquo;%d&rdquo;,p);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>p = a; i = 0; while(i &lt; 5)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d &ldquo;, *p);</p>\r\n\r\n<p>p++;</p>\r\n\r\n<p>i++;</p>\r\n\r\n<p>}</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>/* C program to access two dimensional array using pointer */</p>\r\n\r\n<p>#include&lt;stdio.h&gt;</p>\r\n\r\n<p>#include&lt;conio.h&gt;</p>\r\n\r\n<p>main()</p>\r\n\r\n<p>{</p>\r\n\r\n<p>int a[3][3] = {{1,2,3},{4,5,6},{7,8,9}}, *p, i, j;</p>\r\n\r\n<p>clrscr();</p>\r\n\r\n<p>p = &amp;a[0][0];</p>\r\n\r\n<p>for(i = 0; i &lt; 3; i++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>for(j = 0; j &lt; 3; j++)</p>\r\n\r\n<p>{</p>\r\n\r\n<p>printf(&ldquo;%d &ldquo;, *(p+(i*3+j)));</p>\r\n\r\n<p>}</p>\r\n\r\n<p>printf(&ldquo;\\n&rdquo;);</p>\r\n\r\n<p>}</p>\r\n\r\n<p>getch();</p>\r\n\r\n<p>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>', '02 hourse', '1', '2019-11-26 11:57:58', NULL),
(3, 0, NULL, 'Basic Computers', 'basic-computers', 'BC01', '<p style=\"margin-left:6.0pt\"><strong>Memory: </strong>Memory is the place where the programs and data are stored temporarily during processing. There are two types of memory in the computer system. They are: 1) Main memory or Primary memory and 2) Auxiliary memory or Secondary memory.</p>\n\n<p style=\"margin-left:6.0pt\"><strong><em>Main memory: </em></strong>This is the place where the programs and data are stored temporarily during processing. The data in the main memory are erased when we turn off the computer or when we log off.</p>\n\n<p style=\"margin-left:6.0pt\"><strong><em>Auxiliary memory: </em></strong>This memory is the place where the programs and data are stored permanently. When we turn off the computer, our programs and data remain in the secondary storage, ready for the next time we need them.</p>\n\n<p style=\"margin-left:6.0pt\"><strong>I/O Devices: </strong>The input devices allow the user to give data as input to the computer and the output devices allow the</p>\n\n<p style=\"margin-left:6.0pt\">computer to show information to the user. Examples of input devices are: keyboard, mouse, and scanner. Examples of output devices are monitor, speakers and printer</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Hardware Components insi</strong></p>\n\n<p>&nbsp;</p>', '1', '1', '2019-11-26 13:51:38', NULL),
(4, 8, NULL, 'test', 'test', 'test', '0', '0', '1', '2019-11-29 07:27:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses_media`
--

CREATE TABLE `tbl_courses_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `courses_id` int(10) UNSIGNED NOT NULL,
  `color_id` varchar(255) DEFAULT NULL,
  `media_type` enum('photo','video','pdf') NOT NULL DEFAULT 'photo',
  `media` varchar(255) NOT NULL,
  `is_default` enum('Y','N') NOT NULL DEFAULT 'N',
  `sort_order` int(11) DEFAULT NULL,
  `media_date_added` datetime NOT NULL,
  `media_status` enum('0','1','2') DEFAULT '1' COMMENT '0=inactive,1=active,2=delete'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_courses_media`
--

INSERT INTO `tbl_courses_media` (`id`, `courses_id`, `color_id`, `media_type`, `media`, `is_default`, `sort_order`, `media_date_added`, `media_status`) VALUES
(1, 1, NULL, 'photo', 'a2tge0.png', 'Y', NULL, '2017-09-01 12:36:15', '1'),
(2, 1, NULL, 'photo', '8qrha.jpg', 'N', NULL, '2017-09-01 12:42:37', '1'),
(3, 1, NULL, 'photo', 'a19rkU.png', 'N', NULL, '2017-09-01 12:42:37', '1'),
(4, 3, '1,2,3', 'photo', 'a2qv5t.png', 'Y', NULL, '2017-09-01 13:04:43', '1'),
(5, 3, '1,2,3', 'photo', 'a63Afh.png', 'N', NULL, '2017-09-01 13:04:43', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_lession`
--

CREATE TABLE `tbl_course_lession` (
  `lession_id` int(11) NOT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `lession` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `courses_description` text,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `lession_added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course_lession`
--

INSERT INTO `tbl_course_lession` (`lession_id`, `subject_id`, `lession`, `courses_description`, `sort_order`, `status`, `lession_added_date`) VALUES
(5, '6', 'tested', '<p>tested</p>', 0, '1', '2019-11-25 12:32:12'),
(6, '8', 'Array', '<p>&nbsp;Array&nbsp;Array&nbsp;Array &nbsp; &nbsp; &nbsp;Array</p>', 0, '1', '2019-11-27 07:05:05'),
(7, '6', 'test', '<p>courses_model</p>', 0, '1', '2019-11-29 06:55:35'),
(8, '5', 'sadfdsafdas', '<p>sdfsdfdsf</p>', 0, '1', '2019-11-29 07:21:09'),
(9, '8', 'Pointer', '<p>Pointer</p>', 0, '1', '2019-11-29 07:31:32'),
(10, '9', 'mathmatic 1', '<p>mathmatic 1</p>', 0, '1', '2019-11-29 08:19:35'),
(11, '4', 'tested', '<p>tested</p>', 0, '1', '2019-11-29 07:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customers_id` int(11) NOT NULL,
  `user_name` varchar(80) NOT NULL COMMENT 'customer  email  id used as username',
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `first_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('M','F','O') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'M',
  `birth_date` date DEFAULT NULL,
  `customer_photo` varchar(255) DEFAULT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `actkey` varchar(32) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=Inactive,1=Active,2=Deleted ',
  `is_verified` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=unverfied,1=verfied',
  `login_type` enum('normal','facebook','twitter') NOT NULL DEFAULT 'normal',
  `account_created_date` datetime DEFAULT NULL,
  `current_login` datetime NOT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `ip_address` varchar(25) NOT NULL,
  `is_blocked` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=unblocked,1=blocked',
  `block_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `number_of_login_try` int(4) NOT NULL DEFAULT '0',
  `uid` varchar(200) DEFAULT NULL,
  `user_type` enum('user','admin') NOT NULL DEFAULT 'user',
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `lot` varchar(255) DEFAULT NULL,
  `upsc_roll` varchar(255) DEFAULT NULL,
  `optional_subject` varchar(255) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `batch_from` varchar(255) DEFAULT NULL,
  `batch_to` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `exp_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customers_id`, `user_name`, `password`, `title`, `first_name`, `last_name`, `gender`, `birth_date`, `customer_photo`, `phone_number`, `actkey`, `status`, `is_verified`, `login_type`, `account_created_date`, `current_login`, `last_login_date`, `ip_address`, `is_blocked`, `block_time`, `number_of_login_try`, `uid`, `user_type`, `state`, `city`, `branch`, `lot`, `upsc_roll`, `optional_subject`, `id_number`, `batch_from`, `batch_to`, `start_date`, `exp_date`) VALUES
(60, 'rohitdigitalmart@gmail.com', 'vkjecj1qIjtljY9pgGtuV_CUWWb_gfhQuqdIlC3sHUw', NULL, 'lokesh', 'khaitan', 'M', '1993-01-01', 'Reuvo.jpg', '9873169230', 'b2c1b64ccd0ce07340f6c818546871cd', '1', '1', 'normal', '2019-11-29 10:41:55', '2019-11-29 10:42:23', '2019-11-29 10:41:55', '103.73.155.117', '0', '0000-00-00 00:00:00', 0, NULL, 'user', '22', 'faizabad', NULL, '7,8,9', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'bobbymahim@gmail.com', 'XWnbNtNRArujbqkfkoeNHSdiCRZ14MEL8Gd0QyJrlcE', NULL, 'Bobby', NULL, 'M', NULL, NULL, '0', '3a52e7c20f139b6ff79bcf00791ac8e7', '1', '1', 'normal', '2019-11-16 16:51:41', '2019-11-29 07:31:29', '2019-11-25 09:05:55', '42.111.24.243', '0', '0000-00-00 00:00:00', 0, NULL, 'user', '14', 'ernakulam', NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'vimal.digitalmart@gmail.com', 'Jn_H-ABioUi5qV0nmhKJHegyJOOR1LFdKrv3xFRrQQc', NULL, 'vimal kumar', NULL, 'M', NULL, NULL, '0', '559cbe050a98fce3d7ece8174aca85be', '1', '1', 'normal', '2019-11-17 05:24:28', '2019-11-26 11:39:37', '2019-11-19 13:54:27', '203.89.99.84', '0', '0000-00-00 00:00:00', 0, NULL, 'user', '9', 'faridabad', NULL, '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers_address_book`
--

CREATE TABLE `tbl_customers_address_book` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(250) DEFAULT NULL,
  `zipcode` varchar(25) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(80) DEFAULT NULL,
  `reciv_date` datetime DEFAULT NULL,
  `address_type` enum('Bill','Ship') DEFAULT NULL,
  `default_status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers_address_book`
--

INSERT INTO `tbl_customers_address_book` (`address_id`, `customer_id`, `name`, `address`, `address2`, `zipcode`, `phone`, `fax`, `city`, `state`, `country`, `reciv_date`, `address_type`, `default_status`) VALUES
(18, 50, '0', '0', NULL, '0', '0', NULL, '0', '0', '0', '2017-08-22 10:09:51', 'Bill', 'Y'),
(19, 50, '0', '0', NULL, '0', '0', NULL, '0', '0', '0', '2017-08-22 10:09:51', 'Ship', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `friendly_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(3) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1','2') COLLATE utf8_bin NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `meta_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_keywords` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_description` varchar(225) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`category_id`, `category_name`, `friendly_url`, `category_image`, `category_description`, `parent_id`, `sort_order`, `date_added`, `date_modified`, `status`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(4, 'Non Medical', 'non-medical', '', '', 0, NULL, '2019-10-30 14:33:11', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(6, 'commerce', 'commerce', '', '', 0, NULL, '2019-11-15 05:23:48', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(7, 'Science', 'science', '', '', 0, NULL, '2019-11-15 06:17:51', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(8, 'Arts', 'arts', '', '', 0, NULL, '2019-11-16 05:15:45', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(9, 'Medical', 'medical', '', '', 0, NULL, '2019-11-16 17:22:37', '0000-00-00 00:00:00', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE `tbl_exam` (
  `exam_id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `lession_id` int(11) NOT NULL,
  `t_que` int(11) NOT NULL,
  `t_mark` int(11) NOT NULL,
  `n_mark` int(11) DEFAULT NULL,
  `exam_date` datetime NOT NULL,
  `ip_address` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`exam_id`, `userId`, `lession_id`, `t_que`, `t_mark`, `n_mark`, `exam_date`, `ip_address`) VALUES
(16, 59, 12, 2, 20, NULL, '2019-10-31 14:05:52', '::1'),
(17, 59, 12, 2, 20, NULL, '2019-11-04 13:47:41', '::1'),
(18, 60, 15, 2, 10, NULL, '2019-11-14 13:15:46', '103.97.137.207'),
(19, 60, 14, 2, 10, NULL, '2019-11-15 05:11:23', '203.89.99.232'),
(20, 60, 16, 2, 10, NULL, '2019-11-15 05:15:41', '203.89.99.232'),
(21, 60, 18, 2, 10, NULL, '2019-11-15 05:38:51', '203.89.99.232'),
(22, 60, 18, 2, 10, NULL, '2019-11-15 05:41:49', '203.89.99.232'),
(23, 60, 18, 2, 10, NULL, '2019-11-15 06:25:32', '203.89.99.232'),
(24, 60, 19, 1, 10, NULL, '2019-11-15 06:54:29', '203.89.99.232'),
(25, 60, 18, 2, 10, NULL, '2019-11-15 06:55:37', '203.89.99.232'),
(26, 60, 18, 2, 10, NULL, '2019-11-15 06:56:31', '203.89.99.232'),
(27, 60, 17, 2, 10, NULL, '2019-11-16 05:28:19', '106.198.173.102'),
(28, 60, 20, 50, 50, NULL, '2019-11-16 06:17:13', '106.223.34.166');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `files_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'parent_id= last level of category ',
  `category_links` varchar(80) NOT NULL,
  `files_name` varchar(200) NOT NULL,
  `files_friendly_url` varchar(110) DEFAULT NULL,
  `files_img` varchar(255) NOT NULL,
  `files_description` text,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `files_added_date` datetime NOT NULL,
  `files_updated_date` datetime DEFAULT NULL,
  `files_viewed` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`files_id`, `category_id`, `category_links`, `files_name`, `files_friendly_url`, `files_img`, `files_description`, `status`, `files_added_date`, `files_updated_date`, `files_viewed`) VALUES
(4, 6, '6,1', 'Adjective', 'adjective', 'adjectiveVGxw.pdf', NULL, '1', '2018-03-15 09:26:59', '2018-03-15 09:29:56', 0),
(5, 7, '7,1', 'Adverb', 'adverb', '4._Adverb_BIoJ.pdf', NULL, '1', '2018-03-15 10:22:03', NULL, 0),
(3, 4, '4,1', 'Articles', 'articles', 'articlesKzRc.pdf', NULL, '1', '2018-03-12 11:14:02', NULL, 0),
(6, 8, '8,1', 'Modals', 'modals', 'modal_(Autosaved)AKIZ.pdf', NULL, '1', '2018-03-15 10:23:15', NULL, 0),
(7, 9, '9,1', 'Sentences', 'sentences', 'SentencelNab.pdf', NULL, '1', '2018-03-15 10:28:34', NULL, 0),
(8, 10, '10,1', 'Parts of speech', 'parts-of-speech', 'Parts_of_SpeechOHtm.pdf', NULL, '1', '2018-03-15 10:30:15', NULL, 0),
(9, 11, '11,1', 'Active and passive voice', 'active-and-passive-voice', 'Active_and_Passive_VoicebmiP.pdf', NULL, '1', '2018-03-27 10:21:27', NULL, 0),
(10, 12, '12,1', 'Preposition', 'preposition', '7._Prepositions_kdXc.pdf', NULL, '1', '2018-03-30 06:36:41', NULL, 0),
(11, 13, '13,1', 'Verb', 'verb', '2._Verb_KCBK.pdf', NULL, '1', '2018-03-30 06:39:39', NULL, 0),
(12, 14, '14,1', 'Narration', 'narration', 'narration_(2)gjPq.pdf', NULL, '1', '2018-03-30 06:41:58', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lession`
--

CREATE TABLE `tbl_lession` (
  `lession_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `lession` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `exam_type` enum('0','1') NOT NULL DEFAULT '0',
  `total_question` int(11) NOT NULL,
  `str_total_mark` varchar(255) DEFAULT NULL,
  `courses_description` text,
  `exam_date` date NOT NULL,
  `str_total_time` varchar(255) DEFAULT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `lession_added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lession`
--

INSERT INTO `tbl_lession` (`lession_id`, `subject_id`, `lession`, `exam_type`, `total_question`, `str_total_mark`, `courses_description`, `exam_date`, `str_total_time`, `sort_order`, `status`, `lession_added_date`) VALUES
(12, 4, 'Chapter 1', '0', 2, '20', 'chapter 1 test', '2019-11-04', '00:30', 0, '1', '2019-10-31 14:03:38'),
(13, 4, 'Chapter 02', '0', 2, '20', 'Science Exam', '2019-11-05', '00:10', 0, '1', '2019-11-04 14:10:23'),
(14, 5, 'Computer Knowledge', '0', 2, '10', 'Thermodynamics is the branch of physics', '2019-11-15', '00:10', 0, '1', '2019-11-14 12:29:27'),
(15, 5, 'Thermodynamic', '0', 2, '10', 'test', '2019-11-14', '00:29', 0, '1', '2019-11-14 13:11:43'),
(16, 6, 'advance', '0', 2, '10', 'advance', '2019-11-15', '00:5', 0, '1', '2019-11-15 05:02:35'),
(17, 7, 'Accounting Process', '0', 2, '10', 'Accounting Process', '2019-11-17', '00:30', 0, '1', '2019-11-15 05:34:10'),
(18, 7, 'Accounting', '0', 2, '10', 'Accounting', '2019-11-17', '00:30', 0, '1', '2019-11-15 05:38:19'),
(19, 8, 'Sets', '0', 2, '10', 'Sets', '2019-11-17', '00:30', 0, '1', '2019-11-15 06:00:32'),
(20, 9, 'Physics', '0', 2, '10', 'Physics', '2019-11-17', '00:30', 0, '1', '2019-11-16 06:02:17'),
(21, 10, 'English', '0', 2, '10', 'English', '2019-11-17', '00:30', 0, '1', '2019-11-17 05:54:55'),
(22, 11, 'Indian Art', '0', 2, '10', 'Indian Art', '2019-11-17', '00:30', 0, '1', '2019-11-17 06:05:41'),
(23, 12, 'section1', '0', 2, '10', 'section1', '2019-11-17', '00:30', 0, '1', '2019-11-17 06:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `courses_id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL COMMENT 'parent_id= last level of category ',
  `exam_type` enum('0','1') NOT NULL DEFAULT '0',
  `lession_id` int(11) NOT NULL,
  `courses_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `courses_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `courses_added_date` datetime NOT NULL,
  `courses_updated_date` datetime DEFAULT NULL,
  `courses_viewed` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `str_total_time` varchar(255) DEFAULT NULL,
  `str_total_mark` varchar(255) DEFAULT NULL,
  `last_date_application` date DEFAULT NULL,
  `date_of_exam` datetime DEFAULT NULL,
  `subject_id` text,
  `total_question` int(11) NOT NULL DEFAULT '20'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meta_tags`
--

CREATE TABLE `tbl_meta_tags` (
  `meta_id` int(11) NOT NULL,
  `is_fixed` enum('Y','N') NOT NULL DEFAULT 'N',
  `entity_type` varchar(80) DEFAULT NULL COMMENT 'name of controllers  ',
  `entity_id` int(11) NOT NULL DEFAULT '0',
  `page_url` varchar(200) NOT NULL,
  `meta_title` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` varchar(460) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mock`
--

CREATE TABLE `tbl_mock` (
  `mock_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `mock_title` varchar(200) NOT NULL,
  `mock_friendly_url` varchar(110) DEFAULT NULL,
  `exam_type` enum('0','1') NOT NULL DEFAULT '0',
  `mock_description` text NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `mock_added_date` datetime NOT NULL,
  `mock_updated_date` datetime DEFAULT NULL,
  `mock_viewed` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `exam_date` date DEFAULT NULL,
  `mode_of_exam` enum('Online','Offline') DEFAULT NULL,
  `str_total_time` varchar(255) DEFAULT NULL,
  `str_total_mark` varchar(255) DEFAULT NULL,
  `str_negative_mark` varchar(255) DEFAULT NULL,
  `exam_fee` text,
  `date_of_exam` date DEFAULT NULL,
  `total_question` int(11) NOT NULL DEFAULT '20'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_mock`
--

INSERT INTO `tbl_mock` (`mock_id`, `department_id`, `mock_title`, `mock_friendly_url`, `exam_type`, `mock_description`, `status`, `mock_added_date`, `mock_updated_date`, `mock_viewed`, `exam_date`, `mode_of_exam`, `str_total_time`, `str_total_mark`, `str_negative_mark`, `exam_fee`, `date_of_exam`, `total_question`) VALUES
(8, 4, 'Mock Test', 'mock-test', '0', 'Mock Test Description', '1', '2019-11-14 11:17:08', NULL, 0, '2019-11-06', NULL, '00:30', '50', NULL, NULL, NULL, 2),
(9, 5, 'computer', '', '0', 'basic computer', '1', '2019-11-14 12:36:45', NULL, 0, '2019-11-14', NULL, '00:15', '20', NULL, NULL, NULL, 2),
(14, 6, 'Accounts_Test', '', '0', 'Accounts_Test 1st year', '1', '2019-11-17 06:06:59', NULL, 0, '2019-11-17', NULL, '00:50', '50', NULL, NULL, NULL, 50),
(12, 7, 'test1', '', '0', 'test', '1', '2019-11-16 05:17:34', NULL, 0, '2019-11-16', NULL, '00:10', '10', NULL, NULL, NULL, 2),
(13, 9, 'testing', '', '0', 'Hi, if you are reading this post, it means you are looking for some great digital marketing options for your business. You can do Digital marketing yourself as well as you can hire someone like DGTLmart. DGTLmart is one of the Best Digital Marketing Companies around. And, we provide our services at a very low price. However, the quality is world class. You can always count on us for Best in Class Digital Marketing or Social Media Promotion.\n\nBest Digital Marketing Company India\n\n \nHiring a company is always a wise decision as the hired team works professionally and on a regular basis. Best Digital Marketing Company India\nOur aim is to grow your business digitally and at the lowest possible rates.\n\nOnline Advertising\n\nWe work on multiple things when we do online advertising for your business. First of all, your business name should appear on Google’s first page. It creates a great brand image in the Market.\n\nNext thing is, establishing a regular conversation with prospective and existing customers through Social Media like:  Facebook, Twitter, Instagram, Google+, LinkedIn, Etc.\n\nHash tags play a pivotal role in online campaigns, hence, we make sure proper and most popular hash tags relevant to your business are included in the posts.\n\nDigital Marketing Managers\n\nOur digital marketing managers are sensitive to your business needs and reputation. Accordingly, they make a strategy and deliver the results. They create Brand awareness as well as increase traffic to your business and to your website as well Depending on your priority. They make sure your business gets genuine leads which have high conversion power.\n\nDigital marketing managers also seek new technologies and platforms. In this way, they are more efficient and your business does not lack behind in the online world.\n\nThey use the latest tools and software to track the growth and effectiveness of digital advertising.\n\nBest in Class Digital Marketing\n\nAs we are into Digital Marketing, we do many things from developing Social media Strategy that keeps our clients brand in front of their preferred audience to developing unique content and ensuring wholesome effect in the market.\n\nThese competitive times, you as a business owner should try all types of advertisements and campaigns but should not avoid digital platforms and a company like JustBaazaar.\n\nPromote Your Business Online\n\nWhere offline publicity can cost you millions, digital marketing will be a few thousand. But this digital marketing has a deep reach and permanency. Digital marketing has a long lasting effect in establishing your brand in your preferred market.\n\nYour digital marketing manager should be passionate and unstoppable will to create new ideas in terms of engaging your customers.\n\nDigital Marketing Includes Not Only:\n\nCreating Posts\nSharing on All Possible Social Media Platforms\nCreating Videos with attractive content\nEmail Marketing\nSending SMSs\nManage and Maintain Your Business website\nContinuous SEO improvement\nArrange webinars\nIf required, use services like Adwords or any other PPC service\nContent Writing\nIdentify New Trends\nEvaluate New Technologies\nAttend Product Launches and Networking Events\nCreating Online Listings in Leading and High PR and High DA directories\nKeep the information updated', '1', '2019-11-16 17:24:42', NULL, 0, '2019-11-17', NULL, '04:0', '10', NULL, NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mock_exam`
--

CREATE TABLE `tbl_mock_exam` (
  `exam_id` int(11) NOT NULL,
  `mock_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `t_que` int(11) NOT NULL,
  `t_mark` int(11) NOT NULL,
  `n_mark` int(11) DEFAULT NULL,
  `exam_date` datetime NOT NULL,
  `ip_address` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mock_exam`
--

INSERT INTO `tbl_mock_exam` (`exam_id`, `mock_id`, `subject_id`, `department_id`, `userId`, `t_que`, `t_mark`, `n_mark`, `exam_date`, `ip_address`) VALUES
(16, 8, 6, 4, 59, 2, 50, NULL, '2019-11-06 06:05:56', '::1'),
(17, 8, 6, 4, 60, 2, 50, NULL, '2019-11-14 10:53:02', '103.97.137.207'),
(18, 8, 6, 4, 60, 2, 50, NULL, '2019-11-14 11:03:47', '103.97.137.207'),
(19, 8, 6, 4, 60, 2, 50, NULL, '2019-11-14 11:16:17', '103.97.137.207'),
(20, 8, 6, 4, 60, 2, 50, NULL, '2019-11-14 11:20:59', '103.97.137.207'),
(21, 8, 6, 4, 60, 2, 50, NULL, '2019-11-14 11:43:20', '103.97.137.207'),
(22, 8, 6, 4, 60, 2, 50, NULL, '2019-11-14 12:39:43', '103.97.137.207'),
(23, 8, 6, 4, 60, 2, 50, NULL, '2019-11-14 12:40:58', '103.97.137.207'),
(24, 8, 6, 4, 60, 2, 50, NULL, '2019-11-14 12:42:04', '103.97.137.207'),
(25, 9, 7, 5, 60, 2, 20, NULL, '2019-11-14 13:16:17', '103.97.137.207'),
(26, 9, 7, 5, 60, 2, 20, NULL, '2019-11-15 05:09:13', '203.89.99.232'),
(27, 10, 8, 6, 60, 2, 10, NULL, '2019-11-15 05:29:14', '203.89.99.232'),
(28, 11, 9, 6, 60, 1, 10, NULL, '2019-11-15 06:29:03', '203.89.99.232'),
(29, 11, 9, 6, 60, 1, 10, NULL, '2019-11-15 06:29:03', '203.89.99.232'),
(30, 11, 9, 6, 60, 1, 10, NULL, '2019-11-15 06:44:45', '203.89.99.232'),
(31, 11, 9, 6, 60, 1, 10, NULL, '2019-11-15 06:48:58', '203.89.99.232'),
(32, 11, 9, 6, 60, 1, 10, NULL, '2019-11-16 05:23:32', '106.198.173.102'),
(33, 12, 10, 7, 61, 2, 10, NULL, '2019-11-16 16:50:33', '42.111.24.243'),
(34, 12, 12, 7, 60, 2, 10, NULL, '2019-11-17 07:03:09', '203.89.99.84'),
(35, 13, 11, 9, 62, 10, 10, NULL, '2019-11-26 11:40:45', '106.0.57.12'),
(36, 12, 10, 7, 60, 2, 10, NULL, '2019-11-29 10:43:01', '103.73.155.117'),
(37, 12, 12, 7, 60, 2, 10, NULL, '2019-11-29 10:57:08', '103.73.155.117');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mock_question`
--

CREATE TABLE `tbl_mock_question` (
  `question_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `question` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `que_img` varchar(255) DEFAULT NULL,
  `option_i` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `option_ii` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `option_iii` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `option_iv` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `option_v` text,
  `option_vi` text,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `question_added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mock_question`
--

INSERT INTO `tbl_mock_question` (`question_id`, `department_id`, `subject_id`, `question`, `que_img`, `option_i`, `option_ii`, `option_iii`, `option_iv`, `option_v`, `option_vi`, `answer`, `status`, `question_added_date`) VALUES
(4, 4, 3, 'test', '', '1', '2', '3', '4', '', '', '1', '1', '2019-10-31 14:18:08'),
(5, 4, 3, 'test 02', '', '1', '2', '3', '4', '', '', '3', '1', '2019-10-31 14:18:31'),
(6, 4, 4, 'test', '', '1', '2', '3', '4', '', '', '4', '1', '2019-11-01 10:49:47'),
(7, 4, 4, 'test', '', '1', '2', '3', '4', NULL, NULL, '2', '1', '2019-11-01 10:33:58'),
(8, 4, 5, '', '124-1246834_take-a-look-at-our-latest-guide-on.png_Ch6v.jpg', 'TEST1', 'TEST2', 'TEST3', 'TEST4', NULL, NULL, 'TEST2', '1', '2019-11-01 11:21:27'),
(9, 4, 6, 'test', '', '1', '2', '3', '4', NULL, NULL, '2', '1', '2019-11-05 07:04:38'),
(10, 4, 6, 'test 02', '', '1', '2', '3', '4', NULL, NULL, '2', '1', '2019-11-05 07:04:50'),
(11, 5, 7, 'Correct Spelling is ______?', '', 'Keydoard', 'CPV', 'Mouse', 'Monitir', NULL, NULL, 'Mouse', '1', '2019-11-14 12:38:35'),
(12, 6, 8, 'test1', '', '1', '2', '3', '4', NULL, NULL, '1', '1', '2019-11-15 05:26:01'),
(13, 6, 8, 'test2', '', '1', '2', '3', '4', NULL, NULL, '2', '1', '2019-11-15 05:26:30'),
(15, 6, 9, 'question1', '', '1', '2', '3', '4', NULL, NULL, '1', '1', '2019-11-15 06:14:08'),
(16, 7, 10, 'question1', '', '1', '2', '3', '4', NULL, NULL, '1', '1', '2019-11-16 05:18:57'),
(17, 7, 10, '', 'tigerDdSB.jpg', 'Tiger', 'Lion', 'Cat', 'Dog', NULL, NULL, 'Tiger', '1', '2019-11-16 05:19:35'),
(18, 9, 11, 'who you are?', '', 'ty', 'hy', 'uo', 'nbbb', NULL, NULL, 'ty', '1', '2019-11-16 17:26:13'),
(19, 7, 12, 'A man presses more weight on earth at :', '', 'Sitting position', 'Standing Position', 'Lying Position', 'None of these', NULL, NULL, 'None of these', '1', '2019-11-17 05:47:37'),
(20, 7, 12, 'A piece of ice is dropped in a vesel containing kerosene. When ice melts, the level of kerosene will', '', 'RiseB', 'Fall', 'Remain Same', 'None of these', NULL, NULL, 'Fall', '1', '2019-11-17 05:48:34'),
(21, 7, 12, 'Young\'s modulus is the property of', '', 'Gas only', 'Both Solid and Liquid', 'Liquid only', 'Solid only', NULL, NULL, 'Both Solid and Liquid', '1', '2019-11-17 05:49:46'),
(22, 7, 12, 'An artificial Satellite revolves round the Earth in circular orbit, which quantity remains constant?', '', 'Angular Momentum', 'Linear Velocity', 'Angular Displacement', 'None of these', NULL, NULL, 'Linear Velocity', '1', '2019-11-17 05:50:46'),
(23, 7, 12, 'If electrical conductivity increases with the increase of temperature of a substance, then it is a:', '', 'Conductor', 'Semiconductor', 'InsulatorD', 'Carborator', NULL, NULL, 'Semiconductor', '1', '2019-11-17 05:51:49'),
(24, 7, 12, 'Minimum distance between and object and real image of a convex lense is:', '', '4<i>f</i>', '3<i>f</i>', '2<i>f</i>', '<i>f</i>', NULL, NULL, '2<i>f</i>', '1', '2019-11-17 05:54:07'),
(25, 7, 12, 'a', '', '0', '0', '1', '2', NULL, NULL, '0', '1', '2019-11-17 05:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mock_result`
--

CREATE TABLE `tbl_mock_result` (
  `result_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `ans` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `user_ans` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mock_result`
--

INSERT INTO `tbl_mock_result` (`result_id`, `exam_id`, `subject_id`, `question`, `ans`, `user_ans`) VALUES
(3, 16, 6, 'test', '2', '2'),
(4, 16, 6, 'test 02', '2', '3'),
(5, 17, 6, 'test', '2', '1'),
(6, 17, 6, 'test 02', '2', '2'),
(7, 18, 6, 'test', '2', '2'),
(8, 18, 6, 'test 02', '2', '2'),
(9, 19, 6, 'test', '2', '2'),
(10, 19, 6, 'test 02', '2', '2'),
(11, 20, 6, 'test', '2', '2'),
(12, 20, 6, 'test 02', '2', '2'),
(13, 21, 6, 'test', '2', '2'),
(14, 21, 6, 'test 02', '2', '2'),
(15, 22, 6, 'test', '2', '2'),
(16, 22, 6, 'test 02', '2', '2'),
(17, 23, 6, 'test', '2', '2'),
(18, 23, 6, 'test 02', '2', '2'),
(19, 24, 6, 'test', '2', ''),
(20, 24, 6, 'test 02', '2', ''),
(21, 25, 7, 'Correct Spelling is ______?', 'Mouse', 'CPV'),
(22, 26, 7, 'Correct Spelling is ______?', 'Mouse', 'Mouse'),
(23, 27, 8, 'test1', '1', '1'),
(24, 27, 8, 'test2', '2', '2'),
(25, 28, 9, 'question1', '1', ''),
(26, 29, 9, 'question1', '1', ''),
(27, 30, 9, 'question1', '1', '1'),
(28, 31, 9, 'question1', '1', '2'),
(29, 32, 9, 'question1', '1', '1'),
(30, 33, 10, 'question1', '1', '2'),
(31, 33, 10, '', 'Tiger', 'Dog'),
(32, 34, 12, 'A man presses more weight on earth at :', 'None of these', 'Standing Position'),
(33, 34, 12, 'A piece of ice is dropped in a vesel containing kerosene. When ice melts, the level of kerosene will', 'Fall', 'Remain Same'),
(34, 34, 12, 'Young\'s modulus is the property of', 'Both Solid and Liquid', 'Both Solid and Liquid'),
(35, 34, 12, 'An artificial Satellite revolves round the Earth in circular orbit, which quantity remains constant?', 'Linear Velocity', ''),
(36, 34, 12, 'If electrical conductivity increases with the increase of temperature of a substance, then it is a:', 'Semiconductor', ''),
(37, 34, 12, 'Minimum distance between and object and real image of a convex lense is:', '2<i>f</i>', '2<i>f</i>'),
(38, 34, 12, 'a', '0', '2'),
(39, 35, 11, 'who you are?', 'ty', 'uo'),
(40, 36, 10, 'question1', '1', '2'),
(41, 36, 10, '', 'Tiger', 'Tiger'),
(42, 37, 12, 'A man presses more weight on earth at :', 'None of these', 'Standing Position'),
(43, 37, 12, 'A piece of ice is dropped in a vesel containing kerosene. When ice melts, the level of kerosene will', 'Fall', 'Remain Same'),
(44, 37, 12, 'Young\'s modulus is the property of', 'Both Solid and Liquid', 'Both Solid and Liquid'),
(45, 37, 12, 'An artificial Satellite revolves round the Earth in circular orbit, which quantity remains constant?', 'Linear Velocity', 'Linear Velocity'),
(46, 37, 12, 'If electrical conductivity increases with the increase of temperature of a substance, then it is a:', 'Semiconductor', 'Semiconductor'),
(47, 37, 12, 'Minimum distance between and object and real image of a convex lense is:', '2<i>f</i>', '2<i>f</i>'),
(48, 37, 12, 'a', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mock_subject`
--

CREATE TABLE `tbl_mock_subject` (
  `subject_id` int(11) NOT NULL,
  `mock_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `subject_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `total_mark` int(11) NOT NULL,
  `total_que` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `subject_added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mock_subject`
--

INSERT INTO `tbl_mock_subject` (`subject_id`, `mock_id`, `department_id`, `subject_name`, `total_mark`, `total_que`, `status`, `subject_added_date`) VALUES
(3, 3, 4, 'science', 20, 2, '1', '2019-10-31 14:18:53'),
(4, 7, 4, 'mathmatics', 20, 2, '1', '2019-11-01 09:54:00'),
(5, 4, 4, 'english', 20, 2, '1', '2019-11-01 10:57:28'),
(6, 8, 4, 'Test 1', 20, 20, '1', '2019-11-05 07:01:34'),
(7, 9, 5, 'computer', 20, 2, '1', '2019-11-14 12:37:07'),
(8, 10, 6, 'demo', 10, 2, '1', '2019-11-15 05:25:25'),
(9, 11, 6, 'subject1', 10, 1, '1', '2019-11-15 06:08:32'),
(10, 12, 7, 'computer', 10, 2, '1', '2019-11-16 05:18:05'),
(11, 13, 9, 'dgtlma', 10, 10, '1', '2019-11-16 17:25:18'),
(12, 12, 7, 'Physics', 50, 50, '1', '2019-11-17 05:44:02'),
(13, 12, 7, 'chemistry', 50, 50, '1', '2019-11-17 05:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `question_id` int(11) NOT NULL,
  `lession_id` int(11) NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `que_img` varchar(255) DEFAULT NULL,
  `option_i` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `option_ii` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `option_iii` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `option_iv` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `question_added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`question_id`, `lession_id`, `question`, `que_img`, `option_i`, `option_ii`, `option_iii`, `option_iv`, `answer`, `status`, `question_added_date`) VALUES
(713, 12, '<p>question 1</p>\r\n', '', '1', '2', '3', '4', '1', '1', '2019-10-31 14:04:08'),
(714, 12, '<p>qustion 2</p>\r\n', '', '1', '2', '3', '4', '3', '1', '2019-10-31 14:04:23'),
(715, 14, '<p>What is Computer?</p>\n', '', 'machine', 'things', 'cloths', 'clone', 'machine', '1', '2019-11-14 12:31:23'),
(716, 14, '<p>CPU</p>\n', '', 'Centeral Processing Unit', 'Center processing unit', 'Centeral Process Unit', 'Centeral Processing Uninon', 'Centeral Processing Unit', '1', '2019-11-14 12:34:04'),
(717, 15, '<p>questinon1</p>\n', '', '1', '2', '3', '4', '1', '1', '2019-11-14 13:12:36'),
(718, 15, '<p>question2</p>\n', '', '1', '2', '3', '4', '2', '1', '2019-11-14 13:12:58'),
(719, 16, '', 'tiger5oRH.jpg', 'Tiger', 'Lion', 'Cat', 'Dog', 'Tiger', '1', '2019-11-15 05:05:10'),
(720, 17, '<p><strong>Accounting provides information on</strong></p>\n', '', 'Cost and income for managers', 'Company’s tax liability for a particular year', 'Financial conditions of an institution', 'All of the above', 'All of the above', '1', '2019-11-17 05:38:48'),
(721, 17, '<p><strong>Patents, Copyrights and Trademarks are</strong></p>\n', '', 'Current assets', 'Fixed assets', 'Intangible assets', 'Investments', 'Intangible assets', '1', '2019-11-17 05:39:54'),
(724, 19, '<p><span style=\"background-color:rgb(253, 253, 253); color:rgb(85, 85, 85); font-family:arial,helvetica,sans-serif; font-size:14px\">What is the Cartesian product of A = {1, 2} and B = {a, b}?</span></p>\n', '', '{(1, a), (1, b), (2, a), (b, b)}', '{(1, 1), (2, 2), (a, a), (b, b)}', '{(1, a), (2, a), (1, b), (2, b)}', '{(1, 1), (a, a), (2, a), (1, b)}', '{(1, a), (2, a), (1, b), (2, b)}', '1', '2019-11-17 05:46:37'),
(725, 13, '<p>question1</p>\n', '', '1', '2', '3', '4', '1', '1', '2019-11-15 06:05:21'),
(726, 13, '<p>question2</p>\n', '', '1', '2', '3', '4', '2', '1', '2019-11-15 06:05:45'),
(727, 18, '<p>quesion1</p>\n', '', '1', '2', '3', '4', '1', '1', '2019-11-15 06:30:49'),
(728, 18, '<p>question2</p>\n', '', '1', '2', '3', '4', '2', '1', '2019-11-15 06:31:12'),
(729, 20, '<p><strong>A man presses more weight on earth at :</strong></p>\n', '', 'Sitting position', 'Standing Position', 'Lying Position', 'None of these', 'Standing Position', '1', '2019-11-17 05:27:26'),
(730, 20, '<p><strong>Young&#39;s modulus is the property of</strong></p>\n', '', 'Gas only', 'Both Solid and Liquid', 'Liquid only', 'Liquid only', 'Liquid only', '1', '2019-11-17 05:28:43'),
(731, 21, '<p><span style=\"color:rgb(101, 101, 101); font-family:roboto,sans-serif; font-size:16px\">Select&nbsp;Correct Word</span></p>\n', '', 'Aceleration', 'Aceeleration', 'Accelaration', 'Acceleration ', 'Acceleration ', '1', '2019-11-17 05:56:13'),
(732, 22, '<p><strong>Drupad Dhamar style of singing was started by</strong></p>\n', '', 'Raja Man Singh Tomar', 'Tansen', 'Vishnu Digambar Paluskar', 'Amir Khusro', 'Amir Khusro', '1', '2019-11-17 06:06:45'),
(733, 23, '<p><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:14px\">Ordinary table salt is sodium chloride. What is baking soda?</span></p>\n', '', 'Potassium chloride', 'Potassium carbonate', 'Potassium hydroxide', 'Sodium bicarbonate', 'Sodium bicarbonate', '1', '2019-11-17 06:10:12'),
(734, 23, '<p><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:14px\">Plants receive their nutrients mainly from</span></p>\n', '', 'chlorophyll', 'atmosphere', 'light', 'soil', 'soil', '1', '2019-11-17 06:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE `tbl_result` (
  `result_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `ans` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `user_ans` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`result_id`, `exam_id`, `question`, `ans`, `user_ans`) VALUES
(138, 16, '<p>question 1</p>\r\n', '1', '1'),
(139, 16, '<p>qustion 2</p>\r\n', '3', '3'),
(140, 17, '<p>question 1</p>\r\n', '1', '2'),
(141, 17, '<p>qustion 2</p>\r\n', '3', '3'),
(142, 18, '<p>questinon1</p>\n', '1', '2'),
(143, 18, '<p>question2</p>\n', '2', '2'),
(144, 19, '<p>What is Computer?</p>\n', 'machine', 'machine'),
(145, 19, '<p>CPU</p>\n', 'Centeral Processing Unit', 'Centeral Processing Unit'),
(146, 20, '', 'Tiger', 'Tiger'),
(147, 24, '<p>lession1</p>\n', '1', '1'),
(148, 25, '<p>quesion1</p>\n', '1', '1'),
(149, 25, '<p>question2</p>\n', '2', ''),
(150, 26, '<p>quesion1</p>\n', '1', '3'),
(151, 26, '<p>question2</p>\n', '2', ''),
(152, 27, '<p>test1</p>\n', '1', '1'),
(153, 27, '<p>test2</p>\n', '2', '2'),
(154, 28, '<p>2x + 3y = 5</p>\n\n<p>5x + 6y = 11</p>\n', 'x=1 y=1', 'x=1 y=1'),
(155, 28, '<p>x=0</p>\n\n<p>3x + 4y = 8</p>\n', 'y=2', 'y=2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `subject_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `subject_added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `department_id`, `subject_name`, `sort_order`, `status`, `subject_added_date`) VALUES
(4, 4, 'chemistry', 0, '1', '2019-11-17 06:14:21'),
(5, 5, 'Basic', 0, '1', '2019-11-14 12:32:11'),
(6, 5, 'Advance', 0, '1', '2019-11-15 05:01:25'),
(7, 6, 'Accountancy', 0, '1', '2019-11-17 05:30:27'),
(8, 6, 'maths', 0, '1', '2019-11-17 05:30:16'),
(9, 7, 'physics', 0, '1', '2019-11-17 05:24:10'),
(10, 8, 'English', 0, '1', '2019-11-17 05:49:24'),
(11, 8, 'History', 0, '1', '2019-11-17 05:49:44'),
(12, 9, 'Biology', 0, '1', '2019-11-17 06:07:37'),
(13, 10, 'test1', 0, '1', '2019-11-17 07:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_enquery`
--

CREATE TABLE `tb_enquery` (
  `inquery_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `enquery_msg` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_enquery`
--

INSERT INTO `tb_enquery` (`inquery_id`, `name`, `mobile_no`, `email`, `enquery_msg`, `date`, `location`) VALUES
(1090, 'Suraj rathi', '7906837823', 'surajrathi1101@gmail.com', 'I want learn English speaking', '2019-09-24 17:11:16', 'Meerut'),
(1108, 'rasanarayan', '8285713026', 'rasanarayan@itmnc.co.in', 'goood', '2019-10-24 10:49:14', 'noida');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_cms_pages`
--
ALTER TABLE `tbl_cms_pages`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `friendly_url` (`friendly_url`);

--
-- Indexes for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`courses_id`);

--
-- Indexes for table `tbl_courses_media`
--
ALTER TABLE `tbl_courses_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_products_images_products_id` (`courses_id`);

--
-- Indexes for table `tbl_course_lession`
--
ALTER TABLE `tbl_course_lession`
  ADD PRIMARY KEY (`lession_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customers_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `tbl_customers_address_book`
--
ALTER TABLE `tbl_customers_address_book`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`files_id`);

--
-- Indexes for table `tbl_lession`
--
ALTER TABLE `tbl_lession`
  ADD PRIMARY KEY (`lession_id`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`courses_id`);

--
-- Indexes for table `tbl_meta_tags`
--
ALTER TABLE `tbl_meta_tags`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `page_url` (`page_url`),
  ADD KEY `entity_type` (`entity_type`),
  ADD KEY `entity_id` (`entity_id`);

--
-- Indexes for table `tbl_mock`
--
ALTER TABLE `tbl_mock`
  ADD PRIMARY KEY (`mock_id`);

--
-- Indexes for table `tbl_mock_exam`
--
ALTER TABLE `tbl_mock_exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `tbl_mock_question`
--
ALTER TABLE `tbl_mock_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `tbl_mock_result`
--
ALTER TABLE `tbl_mock_result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `tbl_mock_subject`
--
ALTER TABLE `tbl_mock_subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `sb` (`subject_id`),
  ADD KEY `rk` (`subject_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tb_enquery`
--
ALTER TABLE `tb_enquery`
  ADD PRIMARY KEY (`inquery_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `tbl_cms_pages`
--
ALTER TABLE `tbl_cms_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_courses_media`
--
ALTER TABLE `tbl_courses_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_course_lession`
--
ALTER TABLE `tbl_course_lession`
  MODIFY `lession_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_customers_address_book`
--
ALTER TABLE `tbl_customers_address_book`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `files_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_lession`
--
ALTER TABLE `tbl_lession`
  MODIFY `lession_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `courses_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_meta_tags`
--
ALTER TABLE `tbl_meta_tags`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_mock`
--
ALTER TABLE `tbl_mock`
  MODIFY `mock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_mock_exam`
--
ALTER TABLE `tbl_mock_exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_mock_question`
--
ALTER TABLE `tbl_mock_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_mock_result`
--
ALTER TABLE `tbl_mock_result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_mock_subject`
--
ALTER TABLE `tbl_mock_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=735;

--
-- AUTO_INCREMENT for table `tbl_result`
--
ALTER TABLE `tbl_result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_enquery`
--
ALTER TABLE `tb_enquery`
  MODIFY `inquery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
