-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2016 at 01:13 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `area_name` varchar(60) NOT NULL,
  `no_park` int(11) NOT NULL DEFAULT '0',
  `city_id` int(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`area_id`, `area_name`, `no_park`, `city_id`) VALUES
(1, 'Anna Nagar', 5, 1),
(2, 'Arumbakkam', 0, 1),
(3, 'Besantnagar', 0, 1),
(5, 'Chetput', 0, 1),
(6, 'Egmore', 0, 1),
(7, 'Gopalapuram', 0, 1),
(8, 'Kasturibai Nagar', 0, 1),
(9, 'Mannady', 0, 1),
(10, 'Ramakrishna Nagar', 0, 1),
(11, 'Saidapet', 0, 1),
(12, 'Velacheri', 0, 1),
(13, 'Vyasarpadi', 0, 1),
(14, 'Vepery', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `cus_id` int(4) NOT NULL,
  `book_date` date NOT NULL,
  `book_time` time NOT NULL,
  `cost` int(6) NOT NULL,
  `duration` int(4) NOT NULL,
  `p_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'chennai'),
(2, 'Delhi'),
(3, 'Mumbai'),
(4, 'Chennai'),
(5, 'Kolkata'),
(6, 'Hyderabad'),
(7, 'Haridwar'),
(8, 'Mussorie'),
(9, 'Udaipur'),
(10, 'Patiyala'),
(11, 'Banglore'),
(12, 'Pune'),
(13, 'Jaipur');

-- --------------------------------------------------------

--
-- Table structure for table `customer_det`
--

CREATE TABLE `customer_det` (
  `cus_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wallet` int(5) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `emp_name` varchar(60) NOT NULL,
  `emp_password` int(70) NOT NULL,
  `p_id` varchar(80) NOT NULL,
  `salary` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_password`, `p_id`, `salary`) VALUES
(111, 'Anushka', 1167, '1', 40000),
(112, 'Abhishek', 1327, '2', 40000),
(113, 'Geetanjali', 1337, '3', 40000),
(114, 'Aditi', 1122, '4', 40000),
(115, 'Mrunmayi', 1377, '5', 40000),
(116, 'Anjali', 3210, '6', 40000),
(121, 'Farah', 1243, '7', 40000),
(122, 'Jui', 1277, '8', 40000),
(123, 'Dharmesh', 1345, '9', 40000),
(124, 'Suresh', 1456, '10', 40000),
(125, 'Emily', 6789, '11', 40000),
(131, 'Remini', 7654, '12', 40000),
(132, 'Thory', 5676, '13', 40000),
(133, 'Amir', 9876, '14', 40000),
(134, 'Avritti', 1457, '15', 40000),
(135, 'Juliee', 2987, '16', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `parking_area`
--

CREATE TABLE `parking_area` (
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `manager_id` int(4) NOT NULL,
  `total_slots` int(4) NOT NULL DEFAULT '30',
  `vacant_slots` int(4) NOT NULL DEFAULT '30',
  `area_id` int(4) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking_area`
--

INSERT INTO `parking_area` (`p_id`, `manager_id`, `total_slots`, `vacant_slots`, `area_id`, `location`) VALUES
(1, 1, 30, 30, 1, '87 B Block near Anna Park'),
(2, 2, 30, 30, 1, 'A Block 2nd lane \r\n'),
(3, 1, 30, 30, 1, '2nd Avenue C Block '),
(4, 4, 30, 30, 1, 'D Block'),
(5, 5, 30, 30, 1, 'E block'),
(6, 1, 30, 30, 1, '2nd Avenue C Block '),
(7, 1, 30, 30, 2, 'AB great avenue'),
(8, 2, 30, 30, 2, 'Jeeva park'),
(9, 3, 30, 30, 2, 'Radio Tower,Sunshine field'),
(10, 4, 30, 30, 2, 'Red tower,church hill'),
(11, 5, 30, 30, 2, 'Gallery of arts'),
(12, 1, 30, 30, 3, 'Snow world'),
(13, 2, 30, 30, 3, 'Wild west mall'),
(14, 3, 30, 30, 3, 'Gate of fame'),
(15, 4, 30, 30, 3, 'Snacks and fun food courts'),
(16, 5, 30, 30, 3, 'Post office Red mails');

-- --------------------------------------------------------

--
-- Table structure for table `parking_slot`
--

CREATE TABLE `parking_slot` (
  `slot_id` bigint(20) UNSIGNED NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`area_id`),
  ADD UNIQUE KEY `area_id` (`area_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_id` (`book_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD UNIQUE KEY `city_id` (`city_id`);

--
-- Indexes for table `customer_det`
--
ALTER TABLE `customer_det`
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `cus_id` (`cus_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `parking_area`
--
ALTER TABLE `parking_area`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_id` (`p_id`);

--
-- Indexes for table `parking_slot`
--
ALTER TABLE `parking_slot`
  ADD PRIMARY KEY (`slot_id`),
  ADD UNIQUE KEY `slot_id` (`slot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `area_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `customer_det`
--
ALTER TABLE `customer_det`
  MODIFY `cus_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `parking_area`
--
ALTER TABLE `parking_area`
  MODIFY `p_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `parking_slot`
--
ALTER TABLE `parking_slot`
  MODIFY `slot_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
