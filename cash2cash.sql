-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2018 at 04:20 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cash2cash`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `confirm_pay`(IN `lid` INT(11), IN `mid` INT(11))
BEGIN
	UPDATE users
    SET status=2
    WHERE user_id=lid;
	
	UPDATE users as u,(select a.user_id from users as a where a.email=(select b.referral from users as b where b.user_id=lid)) as m
    SET u.referral_complied=1 
    WHERE u.user_id=m.user_id;
    
    UPDATE users as u,(select a.user_id from mergedusers as a where a.merge_id=mid) as m, (SELECT count(*) as ct from evidenceofpay where confirm_pay=1 and merge_id=mid) as c
    SET u.status=5
    WHERE u.user_id=m.user_id AND c.ct=2;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_short` varchar(10) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `bank_short`, `bank_name`) VALUES
(1, 'access', 'Access Bank'),
(2, 'citibank', 'Citibank'),
(3, 'diamond', 'Diamond Bank'),
(4, 'ecobank', 'Ecobank'),
(5, 'enterprise', 'Enterprise Bank'),
(6, 'fidelity', 'Fidelity Bank'),
(7, 'first', 'First Bank'),
(8, 'fcmb', 'First City Monument Bank (FCMB)'),
(9, 'gtb', 'Guarantee Trust Bank (GTB)'),
(10, 'heritage', 'Heritage Bank'),
(11, 'keystone', 'Keystone Bank'),
(12, 'mainstreet', 'MainStreet Bank'),
(13, 'skye', 'Skye Bank'),
(14, 'stanbic', 'Stanbic IBTC Bank'),
(15, 'standard', 'Standard Chartered Bank'),
(16, 'sterling', 'Sterling Bank'),
(17, 'suntrust', 'Suntrust Bank'),
(18, 'union', 'Union Bank'),
(19, 'uba', 'United Bank for Africa (UBA)'),
(20, 'unity', 'Unity Bank'),
(21, 'wema', 'Wema Bank'),
(22, 'zenith', 'Zenith Bank');

-- --------------------------------------------------------

--
-- Table structure for table `blockedusers`
--

CREATE TABLE IF NOT EXISTS `blockedusers` (
  `block_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `block_reason` text NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=216 ;

--
-- Dumping data for table `blockedusers`
--

INSERT INTO `blockedusers` (`block_id`, `user_id`, `block_reason`) VALUES
(1, 4, 'Failed to PH.'),
(2, 4, 'Failed to PH.'),
(3, 4, 'Failed to PH.'),
(4, 4, 'Failed to PH.'),
(5, 4, 'Failed to PH.'),
(6, 4, 'Failed to PH.'),
(7, 4, 'Failed to PH.'),
(8, 4, 'Failed to PH.'),
(9, 4, 'Failed to PH.'),
(10, 4, 'Failed to PH.'),
(11, 4, 'Failed to PH.'),
(12, 4, 'Failed to PH.'),
(13, 4, 'Failed to PH.'),
(14, 4, 'Failed to PH.'),
(15, 4, 'Failed to PH.'),
(16, 4, 'Failed to PH.'),
(17, 4, 'Failed to PH.'),
(18, 4, 'Failed to PH.'),
(19, 4, 'Failed to PH.'),
(20, 4, 'Failed to PH.'),
(21, 4, 'Failed to PH.'),
(22, 4, 'Failed to PH.'),
(23, 4, 'Failed to PH.'),
(24, 4, 'Failed to PH.'),
(25, 4, 'Failed to PH.'),
(26, 4, 'Failed to PH.'),
(27, 4, 'Failed to PH.'),
(28, 4, 'Failed to PH.'),
(29, 4, 'Failed to PH.'),
(30, 4, 'Failed to PH.'),
(31, 4, 'Failed to PH.'),
(32, 4, 'Failed to PH.'),
(33, 4, 'Failed to PH.'),
(34, 4, 'Failed to PH.'),
(35, 4, 'Failed to PH.'),
(36, 4, 'Failed to PH.'),
(37, 4, 'Failed to PH.'),
(38, 4, 'Failed to PH.'),
(39, 4, 'Failed to PH.'),
(40, 4, 'Failed to PH.'),
(41, 3, 'Failed to PH.'),
(42, 3, 'Failed to PH.'),
(43, 3, 'Failed to PH.'),
(44, 3, 'Failed to PH.'),
(45, 3, 'Failed to PH.'),
(46, 3, 'Failed to PH.'),
(47, 3, 'Failed to PH.'),
(48, 3, 'Failed to PH.'),
(49, 3, 'Failed to PH.'),
(50, 3, 'Failed to PH.'),
(51, 3, 'Failed to PH.'),
(52, 3, 'Failed to PH.'),
(53, 3, 'Failed to PH.'),
(54, 3, 'Failed to PH.'),
(55, 3, 'Failed to PH.'),
(56, 3, 'Failed to PH.'),
(57, 3, 'Failed to PH.'),
(58, 3, 'Failed to PH.'),
(59, 3, 'Failed to PH.'),
(60, 3, 'Failed to PH.'),
(61, 3, 'Failed to PH.'),
(62, 3, 'Failed to PH.'),
(63, 3, 'Failed to PH.'),
(64, 3, 'Failed to PH.'),
(65, 3, 'Failed to PH.'),
(66, 3, 'Failed to PH.'),
(67, 3, 'Failed to PH.'),
(68, 3, 'Failed to PH.'),
(69, 3, 'Failed to PH.'),
(70, 3, 'Failed to PH.'),
(71, 3, 'Failed to PH.'),
(72, 3, 'Failed to PH.'),
(73, 3, 'Failed to PH.'),
(74, 3, 'Failed to PH.'),
(75, 3, 'Failed to PH.'),
(76, 3, 'Failed to PH.'),
(77, 3, 'Failed to PH.'),
(78, 3, 'Failed to PH.'),
(79, 3, 'Failed to PH.'),
(80, 3, 'Failed to PH.'),
(81, 3, 'Failed to PH.'),
(82, 3, 'Failed to PH.'),
(83, 3, 'Failed to PH.'),
(84, 3, 'Failed to PH.'),
(85, 3, 'Failed to PH.'),
(86, 3, 'Failed to PH.'),
(87, 3, 'Failed to PH.'),
(88, 3, 'Failed to PH.'),
(89, 3, 'Failed to PH.'),
(90, 3, 'Failed to PH.'),
(91, 3, 'Failed to PH.'),
(92, 3, 'Failed to PH.'),
(93, 3, 'Failed to PH.'),
(94, 3, 'Failed to PH.'),
(95, 3, 'Failed to PH.'),
(96, 3, 'Failed to PH.'),
(97, 3, 'Failed to PH.'),
(98, 3, 'Failed to PH.'),
(99, 3, 'Failed to PH.'),
(100, 3, 'Failed to PH.'),
(101, 3, 'Failed to PH.'),
(102, 3, 'Failed to PH.'),
(103, 3, 'Failed to PH.'),
(104, 3, 'Failed to PH.'),
(105, 3, 'Failed to PH.'),
(106, 3, 'Failed to PH.'),
(107, 3, 'Failed to PH.'),
(108, 3, 'Failed to PH.'),
(109, 3, 'Failed to PH.'),
(110, 3, 'Failed to PH.'),
(111, 3, 'Failed to PH.'),
(112, 3, 'Failed to PH.'),
(113, 3, 'Failed to PH.'),
(114, 3, 'Failed to PH.'),
(115, 3, 'Failed to PH.'),
(116, 3, 'Failed to PH.'),
(117, 3, 'Failed to PH.'),
(118, 3, 'Failed to PH.'),
(119, 3, 'Failed to PH.'),
(120, 3, 'Failed to PH.'),
(121, 3, 'Failed to PH.'),
(122, 3, 'Failed to PH.'),
(123, 3, 'Failed to PH.'),
(124, 3, 'Failed to PH.'),
(125, 3, 'Failed to PH.'),
(126, 3, 'Failed to PH.'),
(127, 3, 'Failed to PH.'),
(128, 3, 'Failed to PH.'),
(129, 3, 'Failed to PH.'),
(130, 3, 'Failed to PH.'),
(131, 3, 'Failed to PH.'),
(132, 3, 'Failed to PH.'),
(133, 3, 'Failed to PH.'),
(134, 3, 'Failed to PH.'),
(135, 3, 'Failed to PH.'),
(136, 3, 'Failed to PH.'),
(137, 3, 'Failed to PH.'),
(138, 3, 'Failed to PH.'),
(139, 3, 'Failed to PH.'),
(140, 3, 'Failed to PH.'),
(141, 3, 'Failed to PH.'),
(142, 3, 'Failed to PH.'),
(143, 3, 'Failed to PH.'),
(144, 3, 'Failed to PH.'),
(145, 3, 'Failed to PH.'),
(146, 3, 'Failed to PH.'),
(147, 3, 'Failed to PH.'),
(148, 3, 'Failed to PH.'),
(149, 3, 'Failed to PH.'),
(150, 3, 'Failed to PH.'),
(151, 3, 'Failed to PH.'),
(152, 3, 'Failed to PH.'),
(153, 3, 'Failed to PH.'),
(154, 3, 'Failed to PH.'),
(155, 3, 'Failed to PH.'),
(156, 3, 'Failed to PH.'),
(157, 3, 'Failed to PH.'),
(158, 3, 'Failed to PH.'),
(159, 3, 'Failed to PH.'),
(160, 3, 'Failed to PH.'),
(161, 3, 'Failed to PH.'),
(162, 3, 'Failed to PH.'),
(163, 3, 'Failed to PH.'),
(164, 3, 'Failed to PH.'),
(165, 3, 'Failed to PH.'),
(166, 3, 'Failed to PH.'),
(167, 3, 'Failed to PH.'),
(168, 3, 'Failed to PH.'),
(169, 3, 'Failed to PH.'),
(170, 3, 'Failed to PH.'),
(171, 3, 'Failed to PH.'),
(172, 3, 'Failed to PH.'),
(173, 3, 'Failed to PH.'),
(174, 3, 'Failed to PH.'),
(175, 3, 'Failed to PH.'),
(176, 3, 'Failed to PH.'),
(177, 3, 'Failed to PH.'),
(178, 3, 'Failed to PH.'),
(179, 3, 'Failed to PH.'),
(180, 3, 'Failed to PH.'),
(181, 3, 'Failed to PH.'),
(182, 3, 'Failed to PH.'),
(183, 3, 'Failed to PH.'),
(184, 3, 'Failed to PH.'),
(185, 3, 'Failed to PH.'),
(186, 3, 'Failed to PH.'),
(187, 3, 'Failed to PH.'),
(188, 3, 'Failed to PH.'),
(189, 3, 'Failed to PH.'),
(190, 3, 'Failed to PH.'),
(191, 3, 'Failed to PH.'),
(192, 3, 'Failed to PH.'),
(193, 3, 'Failed to PH.'),
(194, 3, 'Failed to PH.'),
(195, 3, 'Failed to PH.'),
(196, 3, 'Failed to PH.'),
(197, 3, 'Failed to PH.'),
(198, 3, 'Failed to PH.'),
(199, 3, 'Failed to PH.'),
(200, 3, 'Failed to PH.'),
(201, 3, 'Failed to PH.'),
(202, 3, 'Failed to PH.'),
(203, 3, 'Failed to PH.'),
(204, 3, 'Failed to PH.'),
(205, 3, 'Failed to PH.'),
(206, 3, 'Failed to PH.'),
(207, 3, 'Failed to PH.'),
(208, 3, 'Failed to PH.'),
(209, 3, 'Failed to PH.'),
(210, 3, 'Failed to PH.'),
(211, 3, 'Failed to PH.'),
(212, 3, 'Failed to PH.'),
(213, 3, 'Failed to PH.'),
(214, 3, 'Failed to PH.'),
(215, 1, 'Failed to GH.');

-- --------------------------------------------------------

--
-- Table structure for table `downlines`
--

CREATE TABLE IF NOT EXISTS `downlines` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `clearpass` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `package` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `referral` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `evidenceofpay`
--

CREATE TABLE IF NOT EXISTS `evidenceofpay` (
  `eop_id` int(11) NOT NULL AUTO_INCREMENT,
  `merge_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `evidence_of_pay` varchar(255) DEFAULT NULL,
  `confirm_pay` tinyint(4) NOT NULL,
  PRIMARY KEY (`eop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `evidenceofpay`
--

INSERT INTO `evidenceofpay` (`eop_id`, `merge_id`, `user_id`, `evidence_of_pay`, `confirm_pay`) VALUES
(1, 1, 3, NULL, 1),
(2, 1, 4, '1__4__glory.png', 1),
(3, 2, 2, NULL, 0),
(4, 2, 2, NULL, 0),
(5, 3, 2, '3__2__charles.pdf', 1),
(6, 3, 2, '3__2__charles.pdf', 1),
(7, 4, 3, NULL, 0),
(8, 4, 4, NULL, 0),
(9, 5, 3, NULL, 0),
(10, 5, 4, NULL, 0),
(11, 7, 3, NULL, 0),
(12, 7, 4, NULL, 0),
(13, 8, 3, '', 1),
(14, 8, 4, '', 1),
(15, 9, 3, NULL, 0),
(16, 9, 4, NULL, 0),
(17, 10, 3, NULL, 0),
(18, 10, 4, NULL, 0),
(19, 11, 3, NULL, 0),
(20, 11, 3, NULL, 0),
(21, 12, 3, NULL, 0),
(22, 12, 4, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(5) NOT NULL AUTO_INCREMENT,
  `location_value` varchar(255) NOT NULL,
  `location_description` varchar(255) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_value`, `location_description`) VALUES
(1, 'abuja_fct', 'ABUJA FCT'),
(2, 'abia', 'Abia'),
(3, 'adamawa', 'Adamawa'),
(4, 'akwa_ibom', 'Akwa Ibom'),
(5, 'anambra', 'Anambra'),
(6, 'bauchi', 'Bauchi'),
(7, 'bayelsa', 'Bayelsa'),
(8, 'benue', 'Benue'),
(9, 'borno', 'Borno'),
(10, 'cross_river', 'Cross River'),
(11, 'delta', 'Delta'),
(12, 'ebonyi', 'Ebonyi'),
(13, 'edo', 'Edo'),
(14, 'ekiti', 'Ekiti'),
(15, 'enugu', 'Enugu'),
(16, 'gombe', 'Gombe'),
(17, 'imo', 'Imo'),
(18, 'jigawa', 'Jigawa'),
(19, 'kaduna', 'Kaduna'),
(20, 'kano', 'Kano'),
(21, 'kastina', 'Kastina'),
(22, 'kebbi', 'Kebbi'),
(23, 'kogi', 'Kogi'),
(24, 'kwara', 'Kwara'),
(25, 'lagos', 'Lagos'),
(26, 'nassarawa', 'Nassarawa'),
(27, 'niger', 'Niger'),
(28, 'ogun', 'Ogun'),
(29, 'ondo', 'Ondo'),
(30, 'osun', 'Osun'),
(31, 'oyo', 'Oyo'),
(32, 'plateau', 'Plateau'),
(33, 'rivers', 'Rivers'),
(34, 'sokoto', 'Sokoto'),
(35, 'taraba', 'Taraba'),
(36, 'yobe', 'Yobe'),
(37, 'zamfara', 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `loh`
--

CREATE TABLE IF NOT EXISTS `loh` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `testimonial` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mergedusers`
--

CREATE TABLE IF NOT EXISTS `mergedusers` (
  `merge_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `merge1` int(11) NOT NULL,
  `merge2` int(11) NOT NULL,
  `package` varchar(255) NOT NULL,
  `merge_time` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`merge_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `mergedusers`
--

INSERT INTO `mergedusers` (`merge_id`, `user_id`, `merge1`, `merge2`, `package`, `merge_time`, `status`, `datetime`) VALUES
(2, 5, 2, 2, 'Standard', '', -1, '2017-05-17 14:12:18'),
(3, 5, 2, 2, 'Standard', '', 0, '2017-05-17 14:20:44'),
(7, 1, 3, 4, 'Booster', '1496099136', -1, '2017-05-28 23:05:36'),
(8, 1, 3, 4, 'Booster', '1496153962', -1, '2017-05-29 14:19:22'),
(9, 1, 3, 4, 'booster', '1496483557', -1, '2017-06-02 09:52:37'),
(10, 1, 3, 4, 'Booster', '1497183724', -1, '2017-06-10 12:22:04'),
(11, 1, 3, 3, 'Booster', '', -1, '2017-06-10 12:26:55'),
(12, 1, 3, 4, 'Booster', '1497277467', 0, '2017-06-11 14:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_topic` varchar(255) NOT NULL,
  `notification_content` text NOT NULL,
  `notification_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `notification_topic`, `notification_content`, `notification_datetime`) VALUES
(1, 'Welcome!', 'You are welcome to Cash2Cash! Your change of story begins now.', '2017-04-18 10:02:59'),
(2, 'Welcome!', 'You are welcome to Cash2Cash! Your change of story begins now.', '2017-04-18 10:03:19'),
(3, 'Welcome!', 'You are welcome to Cash2Cash! Your change of story begins now.', '2017-04-18 10:03:57'),
(4, 'Welcome!', 'You are welcome to Cash2Cash! Your change of story begins now.', '2017-04-18 10:04:08'),
(5, 'Happy Easter!', 'Celebrate easter with love from cash2cash.', '2017-04-18 10:29:43'),
(6, 'Happy Easter!', 'Celebrate easter with love from cash2cash.', '2017-04-18 10:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `package_id` int(5) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_price` varchar(255) NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `package_price`) VALUES
(1, 'Starter', '10,000'),
(2, 'Mobile', '20,000'),
(3, 'Standard', '30,000'),
(4, 'Booster', '50,000'),
(5, 'Investors', '100,000'),
(6, 'Achievers', '200,000'),
(7, 'Tycoons', '300,000'),
(8, 'Enterpreneurs', '500,000');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(-1, 'Blocked'),
(0, 'Ready for merge'),
(1, 'Merged to Pay'),
(2, 'Qualified for merge'),
(3, 'Merged for pay');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passport` varchar(255) DEFAULT 'profile_img.png',
  `clearpass` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `package` varchar(255) NOT NULL,
  `referral` varchar(255) NOT NULL,
  `referral_complied` int(11) NOT NULL,
  `myref` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `current_merge_id` int(11) NOT NULL DEFAULT '0',
  `next_merge` varchar(25) DEFAULT NULL,
  `account_blocked` int(11) NOT NULL DEFAULT '0',
  `user_cycles` int(11) NOT NULL DEFAULT '0',
  `recycle_time` varchar(25) DEFAULT 'unix_timestamp()',
  `isadmin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `location`, `email`, `passport`, `clearpass`, `password`, `phone_number`, `bank_name`, `account_name`, `account_number`, `package`, `referral`, `referral_complied`, `myref`, `datetime`, `status`, `current_merge_id`, `next_merge`, `account_blocked`, `user_cycles`, `recycle_time`, `isadmin`) VALUES
(1, 'Ben', 'Onabe', 'abuja_fct', 'realbenten@gmail.com', 'realbenten.png', 'password', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '07035484893', 'diamond', 'Benedict Bisong Onabe', '0088456322', 'Booster', '', 1, 'KltUZ', '2017-06-11 14:24:27', 4, 12, '1497277467', 0, 9, '1496153888', 1),
(2, 'charles', 'nsa', 'abuja_fct', 'charles@gmail.com', 'charles.png', 'password', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '08035484893', 'diamond', 'charles nsa', '0088456321', 'Standard', 'realbenten@gmail.com', 1, 'GivZf', '2017-06-09 11:26:22', 3, 3, '1496615499', 0, 3, '1496096866', 0),
(3, 'uduak', 'obong', 'abuja_fct', 'uduak@gmail.com', NULL, 'password', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '09089762134', 'heritage', 'uduak obong', '0034324234', 'Booster', 'realbenten@gmail.com', 0, 'xkJj7', '2017-06-11 14:24:27', 1, 12, '1497277467', 0, 0, '1495647542', 0),
(4, 'glory', 'nsa', 'abuja_fct', 'glory@gmail.com', NULL, 'password', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '09035484893', 'uba', 'Glory Nsa', '0088993344', 'Booster', 'charles@gmail.com', 0, 'xPj7u', '2017-06-11 14:24:27', 1, 12, '1497277467', 0, 0, '1495647542', 0),
(5, 'Standard', 'Admin', 'abuja_fct', 'standard_admin@cash2cashclub.com', 'profile_img.png', 'password', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '07011223344', 'diamond', 'Standard Admin', '0099374872', 'Standard', 'admin@cash2cashclub.com', 1, '', '2017-05-17 14:34:42', 5, 3, '', 0, 1, '0000-00-00 00:00:00', 1);

--
-- Triggers `users`
--
DROP TRIGGER IF EXISTS `user_cycle`;
DELIMITER //
CREATE TRIGGER `user_cycle` BEFORE UPDATE ON `users`
 FOR EACH ROW IF (NEW.status=5) THEN
	SET new.user_cycles = new.user_cycles+1, new.recycle_time = UNIX_TIMESTAMP(TIMESTAMPADD(DAY,1,NOW()));
 ELSEIF ((NEW.status=2 AND OLD.referral_complied=1) OR (OLD.status=2 AND NEW.referral_complied=1)) THEN
	SET NEW.status = 3, new.next_merge = UNIX_TIMESTAMP(TIMESTAMPADD(DAY,7,now()));
END IF
//
DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
