-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 12:29 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctorchamber_install`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `schedule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chamber_id` int(11) NOT NULL,
  `is_visited` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `timestamp`, `schedule`, `patient_id`, `user_id`, `chamber_id`, `is_visited`) VALUES
(1, 1573322400, '9:00 AM - 11:00 AM', 1, 1, 1, 0),
(2, 1573495200, '12:00 PM - 6:00 PM', 2, 1, 3, 0),
(3, 1573686000, '6:00 PM - 12:00 AM', 3, 2, 3, 0),
(4, 1573513200, '12:00 PM - 6:00 PM', 3, 2, 3, 0),
(5, 1573772400, '6:00 PM - 10:30 PM', 3, 1, 3, 0),
(6, 1573513200, '12:00 PM - 6:00 PM', 3, 1, 3, 0),
(7, 1573513200, '12:00 PM - 6:00 PM', 4, 2, 3, 1),
(10, 1573945200, '9:00 AM - 11:00 AM', 4, 1, 1, 0),
(11, 1573945200, '9:00 AM - 11:00 AM', 5, 1, 1, 0),
(12, 1574118000, '11:00 AM - 11:30 AM', 5, 1, 1, 0),
(13, 1574118000, '11:00 AM - 11:30 AM', 6, 6, 1, 0),
(14, 1578092400, NULL, 7, 1, 4, 1),
(15, 1578524400, '6:00 PM - 12:00 AM', 2, 4, 3, 0),
(16, 1578956400, '12:00 PM - 6:00 PM', 3, 4, 3, 0),
(17, 1578524400, '11:30 AM - 12:00 PM', 4, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chamber`
--

CREATE TABLE `chamber` (
  `chamber_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `schedule` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chamber`
--

INSERT INTO `chamber` (`chamber_id`, `name`, `address`, `about`, `schedule`) VALUES
(1, 'Sydney Home', 'Some address', 'Something', '[{\"day\":\"sunday\",\"key\":0,\"status\":\"open\",\"morning_open\":\"8:00 AM\",\"morning_close\":\"12:30 PM\",\"morning\":\"8:00 AM - 12:30 PM\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"7:00 PM\",\"evening_close\":\"9:00 PM\",\"evening\":\"7:00 PM - 9:00 PM\"},{\"day\":\"monday\",\"key\":1,\"status\":\"open\",\"morning_open\":\"8:00 AM\",\"morning_close\":\"9:30 AM\",\"morning\":\"8:00 AM - 9:30 AM\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"tuesday\",\"key\":2,\"status\":\"open\",\"morning_open\":\"11:00 AM\",\"morning_close\":\"11:30 AM\",\"morning\":\"11:00 AM - 11:30 AM\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"wednesday\",\"key\":3,\"status\":\"open\",\"morning_open\":\"8:00 AM\",\"morning_close\":\"1:00 PM\",\"morning\":\"8:00 AM - 1:00 PM\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"6:30 PM\",\"evening_close\":\"8:00 PM\",\"evening\":\"6:30 PM - 8:00 PM\"},{\"day\":\"thursday\",\"key\":4,\"status\":\"open\",\"morning_open\":\"11:30 AM\",\"morning_close\":\"12:00 PM\",\"morning\":\"11:30 AM - 12:00 PM\",\"afternoon_open\":\"2:30 PM\",\"afternoon_close\":\"4:00 PM\",\"afternoon\":\"2:30 PM - 4:00 PM\",\"evening_open\":\"9:30 PM\",\"evening_close\":\"11:30 PM\",\"evening\":\"9:30 PM - 11:30 PM\"},{\"day\":\"friday\",\"key\":5,\"status\":\"open\",\"morning_open\":\"8:00 AM\",\"morning_close\":\"10:00 AM\",\"morning\":\"8:00 AM - 10:00 AM\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"saturday\",\"key\":6,\"status\":\"open\",\"morning_open\":\"10:00 AM\",\"morning_close\":\"11:30 AM\",\"morning\":\"10:00 AM - 11:30 AM\",\"afternoon_open\":\"2:00 PM\",\"afternoon_close\":\"4:00 PM\",\"afternoon\":\"2:00 PM - 4:00 PM\",\"evening_open\":\"7:30 PM\",\"evening_close\":\"9:30 PM\",\"evening\":\"7:30 PM - 9:30 PM\"}]'),
(3, 'Dhaka', 'dhaka', '', '[{\"day\":\"sunday\",\"key\":0,\"status\":\"open\",\"morning_open\":\"\",\"morning_close\":\"8:00 AM\",\"morning\":\"\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"9:30 PM\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"monday\",\"key\":1,\"status\":\"closed\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"tuesday\",\"key\":2,\"status\":\"open\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"12:00 PM\",\"afternoon_close\":\"6:00 PM\",\"afternoon\":\"12:00 PM - 6:00 PM\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"wednesday\",\"key\":3,\"status\":\"open\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"thursday\",\"key\":4,\"status\":\"open\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"6:00 PM\",\"evening_close\":\"12:00 AM\",\"evening\":\"6:00 PM - 12:00 AM\"},{\"day\":\"friday\",\"key\":5,\"status\":\"open\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"6:00 PM\",\"evening_close\":\"10:30 PM\",\"evening\":\"6:00 PM - 10:30 PM\"},{\"day\":\"saturday\",\"key\":6,\"status\":\"open\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"}]'),
(4, 'chittagong', 'chittagong city', '', '[{\"day\":\"sunday\",\"key\":0,\"status\":\"open\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"monday\",\"key\":1,\"status\":\"closed\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"tuesday\",\"key\":2,\"status\":\"open\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"wednesday\",\"key\":3,\"status\":\"closed\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"thursday\",\"key\":4,\"status\":\"open\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"friday\",\"key\":5,\"status\":\"closed\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"saturday\",\"key\":6,\"status\":\"open\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('8thduccm5881v6rbi03kbsvksl6vrf19', '::1', 1578298538, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383239383533383b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('4efrvr90qe93dn9hd8fiu37hv91voav4', '::1', 1578300640, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383330303634303b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('5kh74tqu5hvu638qv21ekk8mr2bj7dqe', '::1', 1578300944, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383330303934343b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('pr39iqbuvf7cjv228k31mt44gjbtfbnr', '::1', 1578301673, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383330313637333b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('qqmt1j87gphu8qg76p9onfdgdudhpeso', '::1', 1578303670, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383330333637303b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('gjomp4rcfqfo34bpucqbrqt13d65gjfd', '::1', 1578304060, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383330343036303b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('s23r993agc1q52t3ntvf3asj758evb6q', '::1', 1578304366, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383330343336363b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('hsbneo3a7ot2qh407r99fccp7smr2n3t', '::1', 1578304982, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383330343938323b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('kairrqr82m38pqpe16s05s4dmohc4fhp', '::1', 1578305377, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383330353337373b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('al7gh9njvpj80anl1u0mm4l6tumu79ru', '::1', 1578305377, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383330353337373b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('htf33bo5eonj2gva58ls10ls7n07elbi', '::1', 1578459640, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383435393634303b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b73746166665f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a353a227374616666223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a393a22616c6c656e686f6f6b223b757365725f747970657c733a313a2232223b70686f6e657c733a393a22313233313233313233223b757365725f656d61696c7c733a32313a22616c6c656e686f6f6b406578616d706c652e636f6d223b6368616d6265725f69647c733a313a2231223b),
('jse5emu6aeuvor2oje3b97qqjacbp56d', '::1', 1578460448, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383436303434383b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b73746166665f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a353a227374616666223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a393a22616c6c656e686f6f6b223b757365725f747970657c733a313a2232223b70686f6e657c733a393a22313233313233313233223b757365725f656d61696c7c733a32313a22616c6c656e686f6f6b406578616d706c652e636f6d223b6368616d6265725f69647c733a313a2231223b),
('a0mcuiocd22sprqb8b7vtrg1tt28hu4g', '::1', 1578460943, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383436303934333b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b73746166665f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a353a227374616666223b6c6f67696e5f757365725f69647c733a313a2234223b6e616d657c733a353a2268616c656e223b757365725f747970657c733a313a2232223b70686f6e657c733a393a22303132333436373839223b757365725f656d61696c7c733a31373a2268616c656e406578616d706c652e636f6d223b6368616d6265725f69647c733a313a2233223b),
('ug5pk9l13qmkifo7m8eanr6dqk2eef49', '::1', 1578461260, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383436313236303b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b73746166665f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a353a227374616666223b6c6f67696e5f757365725f69647c733a313a2235223b6e616d657c733a31313a2272757373656c20616c616d223b757365725f747970657c733a313a2232223b70686f6e657c733a31313a223031393130303030303032223b757365725f656d61696c7c733a31383a2272757373656c406578616d706c652e636f6d223b6368616d6265725f69647c733a313a2233223b),
('96l49d4mmn1cqq9siu8rb9t4tc9mev2t', '::1', 1578462274, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383436323237343b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('dkdiq04agufd5qa7hpuh7hu134ipscf8', '::1', 1578463316, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383436333331363b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('vodeq7l91v80cpmo710i652j6thn92ge', '::1', 1578463860, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383436333836303b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('uh39uhft5k10jc0ug1fsjfcaeloef1dd', '::1', 1578468904, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383436383930343b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b73746166665f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a353a227374616666223b6c6f67696e5f757365725f69647c733a313a2237223b6e616d657c733a31323a2272616e612061626564756c20223b757365725f747970657c733a313a2232223b70686f6e657c733a31313a223031373137363736373637223b757365725f656d61696c7c733a31363a2272616e61406578616d706c652e636f6d223b6368616d6265725f69647c733a313a2233223b),
('2d0bprci3v3c39l5oca7ffg13jjnsdr0', '::1', 1578474137, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383437343133373b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('kchpoinus0beo9g2sauqne7h5ugj5vff', '::1', 1578476035, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383437363033353b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('2cabmmeseis5ab4r723q40odnika7e4v', '::1', 1578480586, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383438303538363b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('tq6c4gd8tona91ghhm02pplkt8ivq6o1', '::1', 1578480597, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383438303538363b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('pjps89mctl83kshs7a70gd68em3vp2v7', '::1', 1578489928, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383438393932353b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('63hgb2ftl507urbtmpae2q8p7kkmtfcb', '127.0.0.1', 1578556258, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383535363235383b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('atd2k2bcc4ct5pij7o1mfcqg74ekassl', '127.0.0.1', 1578556258, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383535363235383b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('4j7gh0tkcotdodp8qajv3fb43303fhlm', '127.0.0.1', 1578568824, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383536383832343b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b),
('lla5aa6mv2ucebsq1h7b4bma52gmq85r', '127.0.0.1', 1578568998, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383536383832343b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b646f63746f725f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a363a22646f63746f72223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a226a6f686e20646f65223b757365725f747970657c733a313a2231223b70686f6e657c733a31313a223031373137303535373430223b757365725f656d61696c7c733a31383a22646f63746f72406578616d706c652e636f6d223b);

-- --------------------------------------------------------

--
-- Table structure for table `fend_blog`
--

CREATE TABLE `fend_blog` (
  `blog_id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `fend_blog`
--

INSERT INTO `fend_blog` (`blog_id`, `image`, `title`, `timestamp`, `description`) VALUES
(1, 'Koala - Copy.jpg', 'Scary Thing That You Don’t Get ', 1574982000, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.\r\nFar far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.\r\nFar far away, behin'),
(2, 'Desert.jpg', 'Scary Thing ', 1574982000, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.'),
(3, 'index.jpg', 'Caring for military veterans ', 1578265200, 'Although the United States government designates a single day (Veterans Day) to specifically honor persons with a history of military service, family physicians provide care to veterans all 365 days of the year. A review article and editorial in the Novem');

-- --------------------------------------------------------

--
-- Table structure for table `fend_promocontent`
--

CREATE TABLE `fend_promocontent` (
  `promo_id` int(11) NOT NULL,
  `font_awesome_class` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `promo_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `promo_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `fend_promocontent`
--

INSERT INTO `fend_promocontent` (`promo_id`, `font_awesome_class`, `promo_title`, `promo_description`) VALUES
(8, 'fas fa-car', 'Emergency Care', 'loren epsum sit ament'),
(9, 'fas fa-adjust', 'Good Care', 'basaSA  AHKHASDHAS AS\r\nASDJLASJDAS'),
(10, 'fab fa-amazon-pay', 'CURRENT SUPPORT', 'ZDASA ASDASDASDSAD');

-- --------------------------------------------------------

--
-- Table structure for table `fend_qualification`
--

CREATE TABLE `fend_qualification` (
  `qualification_id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qualification_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `fend_qualification`
--

INSERT INTO `fend_qualification` (`qualification_id`, `image`, `qualification_title`, `description`) VALUES
(1, 'about-2.jpg', 'Medical specialty concerned with the care ', 'On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word');

-- --------------------------------------------------------

--
-- Table structure for table `fend_slidercontent`
--

CREATE TABLE `fend_slidercontent` (
  `promo_id` int(11) NOT NULL,
  `tag_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `fend_slidercontent`
--

INSERT INTO `fend_slidercontent` (`promo_id`, `tag_title`, `title`, `short_description`, `slider_image`) VALUES
(18, 'Our support', 'make you happy', 'loren epsum sit ament', 'Lighthouse.jpg'),
(19, 'we care', 'client staisfaction', 'adasdads', 'Chrysanthemum.jpg'),
(20, 'Our moto', 'Quick Response', 'loren epsum sit ament', 'Jellyfish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fend_testimonial`
--

CREATE TABLE `fend_testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `testimonial_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `fend_testimonial`
--

INSERT INTO `fend_testimonial` (`testimonial_id`, `user_name`, `description`, `user_image`, `testimonial_title`) VALUES
(1, 'Rodel Golez', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'Jellyfish.jpg', '0'),
(2, 'jeson roy', 'service is good. qualified doctor and staff', 'Penguins.jpg', '0'),
(3, 'john', 'good service and helpfull satff', 'index.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `patient_id` int(11) NOT NULL DEFAULT 0,
  `appointment_id` int(11) NOT NULL DEFAULT 0,
  `charge` decimal(10,0) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1-paid 0-unpaid',
  `user_id` int(11) NOT NULL DEFAULT 0,
  `chamber_id` int(11) NOT NULL DEFAULT 0,
  `timestamp` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `code`, `title`, `patient_id`, `appointment_id`, `charge`, `status`, `user_id`, `chamber_id`, `timestamp`) VALUES
(1, 'ff0320e', 'yyyygvg', 1, 0, '20', 1, 1, 3, 1573322400),
(2, '5e376ed', 'test payment', 5, 0, '200', 1, 1, 1, 1574204400);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medical_info` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `user_id`, `name`, `phone`, `address`, `about`, `age`, `gender`, `medical_info`) VALUES
(1, NULL, 'md alam', '01708454693', NULL, NULL, '', 'male', NULL),
(2, NULL, 'sejan', '8892789823', 'Dhaka', NULL, '30', 'male', '[{\"blood_group\":\"A+\",\"height\":\"5\",\"weight\":\"65\",\"blood_pressure\":\"\",\"pulse\":\"\",\"respiration\":\"\",\"allergy\":\"\",\"diet\":\"yes\"}]'),
(3, NULL, 'Jahan', '01708787878', NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'Faisal', '(465) 464-5646', '', NULL, '', 'male', '[{\"blood_group\":\"\",\"height\":\"\",\"weight\":\"\",\"blood_pressure\":\"\",\"pulse\":\"\",\"respiration\":\"\",\"allergy\":\"\",\"diet\":\"\"}]'),
(5, NULL, 'wolker', '019198989889', '', NULL, '', 'male', '[{\"blood_group\":\"A+\",\"height\":\"5.6\",\"weight\":\"80\",\"blood_pressure\":\"80\",\"pulse\":\"123\",\"respiration\":\"3\",\"allergy\":\"no\",\"diet\":\"yes\"}]'),
(6, NULL, 'salam', '01898234567', NULL, NULL, NULL, NULL, NULL),
(7, NULL, 'salam sikder', '01717428100', '', NULL, '', 'male', '[{\"blood_group\":\"\",\"height\":\"\",\"weight\":\"\",\"blood_pressure\":\"\",\"pulse\":\"\",\"respiration\":\"\",\"allergy\":\"\",\"diet\":\"\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `symptom` text COLLATE utf8_unicode_ci NOT NULL,
  `diagnosis` text COLLATE utf8_unicode_ci NOT NULL,
  `medicine` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'json',
  `test` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'json',
  `patient_id` int(11) NOT NULL,
  `chamber_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `appointment_id`, `symptom`, `diagnosis`, `medicine`, `test`, `patient_id`, `chamber_id`, `timestamp`) VALUES
(1, 1, '', '', '[]', '[]', 1, 1, 1574895600),
(2, 2, '', '', '', '', 2, 3, 1573322400),
(3, 3, '', '', '', '', 3, 3, 1573426800),
(4, 4, '', '', '', '', 3, 3, 1573513200),
(5, 6, '', '', '', '', 3, 3, 1573513200),
(6, 5, '', '', '', '', 3, 3, 1573513200),
(7, 7, '', '', '', '', 4, 3, 1573513200),
(8, 8, '', '', '', '', 2, 1, 1573945200),
(9, 10, '', '', '', '', 4, 1, 1573945200),
(10, 11, '', '', '', '', 5, 1, 1573945200),
(11, 12, '', '', '[{\"medicine_name\":\"medicine 1\",\"note\":\"s\\/n\\/e\"}]', '[{\"test_name\":\"blood\",\"note\":\"\"},{\"test_name\":\"urine\",\"note\":\"\"},{\"test_name\":\"pressure\",\"note\":\"\"}]', 5, 1, 1574204400),
(12, 13, '', '', '', '', 6, 1, 1574118000),
(13, 14, '', '', '', '', 7, 4, 1578092400),
(14, 15, '', '', '', '', 2, 4, 1578438000),
(15, 16, '', '', '', '', 3, 4, 1578438000),
(16, 17, '', '', '[{\"medicine_name\":\"\",\"note\":\"\"}]', '[]', 4, 1, 1578524400);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'doctor_name', 'John Doe'),
(2, 'chamber_id', '1'),
(3, 'currency', 'USD'),
(4, 'language', 'english'),
(5, 'logo', 'favicon.png'),
(6, 'doctor_email', 'doctor@doctorchamber.com');

-- --------------------------------------------------------

--
-- Table structure for table `staffusers`
--

CREATE TABLE `staffusers` (
  `user_id` int(11) NOT NULL,
  `user_type` int(3) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_login` int(11) DEFAULT NULL,
  `chamber` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffusers`
--

INSERT INTO `staffusers` (`user_id`, `user_type`, `name`, `email`, `password`, `phone`, `last_login`, `chamber`) VALUES
(1, 2, 'allenhook', 'allenhook@example.com', 'd5f12e53a182c062b6bf30c1445153faff12269a', '123123123', 1578458818, 1),
(2, 2, 'Robert ', 'joeRoot@example.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01717454545', 1574160596, 1),
(3, 2, 'rubel', 'jorge@example.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '07145235689', 1574170279, 3),
(4, 2, 'halen', 'halen@example.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '012346789', 1578460543, 3),
(5, 2, 'russel alam', 'russel@example.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01910000002', 1578461083, 3),
(6, 2, 'taslim', 'taslim@example.com', 'd5f12e53a182c062b6bf30c1445153faff12269a', '01234567', 1574362255, 1),
(7, 2, 'rana abedul ', 'rana@example.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01717676767', 1578463864, 3),
(8, 2, 'anawar', 'anawar@example.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01717428100', 1574165291, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` int(3) NOT NULL,
  `name` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `auth_token` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `name`, `email`, `password`, `phone`, `last_login`, `auth_token`) VALUES
(1, 1, 'john doe', 'doctor@example.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01717055740', 1578566845, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `chamber`
--
ALTER TABLE `chamber`
  ADD PRIMARY KEY (`chamber_id`);

--
-- Indexes for table `fend_blog`
--
ALTER TABLE `fend_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `fend_promocontent`
--
ALTER TABLE `fend_promocontent`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `fend_qualification`
--
ALTER TABLE `fend_qualification`
  ADD PRIMARY KEY (`qualification_id`);

--
-- Indexes for table `fend_slidercontent`
--
ALTER TABLE `fend_slidercontent`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `fend_testimonial`
--
ALTER TABLE `fend_testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `staffusers`
--
ALTER TABLE `staffusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `chamber`
--
ALTER TABLE `chamber`
  MODIFY `chamber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fend_blog`
--
ALTER TABLE `fend_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fend_promocontent`
--
ALTER TABLE `fend_promocontent`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fend_qualification`
--
ALTER TABLE `fend_qualification`
  MODIFY `qualification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fend_slidercontent`
--
ALTER TABLE `fend_slidercontent`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `fend_testimonial`
--
ALTER TABLE `fend_testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staffusers`
--
ALTER TABLE `staffusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
