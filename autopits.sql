-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2025 at 08:50 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autopits`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_category`
--

CREATE TABLE `add_category` (
  `category_id` int(50) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_category`
--

INSERT INTO `add_category` (`category_id`, `category_name`) VALUES
(10, 'CAR SERVICING'),
(11, 'AUTO PAINTING'),
(12, 'AUTO CLEANING');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `service_id`, `name`, `comment`) VALUES
(5, 1, 'hii', ',,,,mmm'),
(6, 1, 'manila', 'nice'),
(7, 2, 'geethu', 'good one');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emergency`
--

CREATE TABLE `tbl_emergency` (
  `owner_id` int(100) NOT NULL,
  `provider_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `emergency_type` varchar(100) NOT NULL,
  `location` longtext NOT NULL,
  `district` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_emergency`
--

INSERT INTO `tbl_emergency` (`owner_id`, `provider_id`, `name`, `emergency_type`, `location`, `district`, `contact_number`, `status`) VALUES
(1, 0, 'sreelakshmi', 'Engine Failure', 'dsgfjtrj', 'AFSDSGFDH', '9961728489', ''),
(2, 0, 'Tinto Thomas', 'Breakdown', 'konnakkad alps', 'kasragod', '8157836104', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `username` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL,
  `usertype` varchar(88) NOT NULL,
  `status` varchar(88) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`username`, `password`, `usertype`, `status`) VALUES
('admin12@gmail.com', 'admin', 'admin', '1'),
('doctor1@gmail.com', '1234', 'provider', '1'),
('kelza98764@gmail.com', 'abcd', 'provider', '1'),
('manila12@gmail.com', 'manila', 'owner', '1'),
('miya@gmail.com', '1234', 'owner', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_owner`
--

CREATE TABLE `tbl_owner` (
  `owner_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` longtext NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_owner`
--

INSERT INTO `tbl_owner` (`owner_id`, `name`, `email`, `address`, `phone`, `image`) VALUES
(27, 'Manila', 'manila12@gmail.com', 'manila house', '8876543221', '../uploads/testimonial-4.jpg'),
(29, 'miya', 'miya@gmail.com', 'miya house', '8876543289', '../uploads/testimonial-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `request_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle model` varchar(100) NOT NULL,
  `vehiclenumber` varchar(50) NOT NULL,
  `phn_num` varchar(15) NOT NULL,
  `days` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `address` longtext NOT NULL,
  `req_status` varchar(50) NOT NULL,
  `pay_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`request_id`, `service_id`, `provider_id`, `user_id`, `vehicle model`, `vehiclenumber`, `phn_num`, `days`, `amount`, `date`, `description`, `address`, `req_status`, `pay_status`) VALUES
(19, 1, 15, 27, 'BMW', 'KL09875', '9956431008', 2, 7000, '06-10-2025', 'CAR SERVIVING', 'liza house', 'APPROVED', 'PAID'),
(20, 1, 15, 27, 'audi', 'kl09876', '7034457611', 3, 7000, '06-10-2025', 'removes old paints if necessary', 'Midhun villa', 'APPROVED', 'PAID'),
(21, 1, 15, 27, 'SCODA', 'KL098765', '9956431008', 1, 7000, '06-10-2025', 'sddddddddd', 'kollam', 'PENDING', 'NULL'),
(23, 1, 15, 27, 'AUDI', 'KL098765', '9978654332', 5, 7000, '06-10-2025', 'removes old paints if necessary', 'QAAAAAA', 'PENDING', 'NULL'),
(24, 2, 16, 29, 'CHEVERLOT', 'KL-09876', '9061774582', 3, 8500, '06-10-2025', 'paint and polish the car using black color', 'kunnemel house', 'APPROVED', 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `category` varchar(77) NOT NULL,
  `district` varchar(77) NOT NULL,
  `city` varchar(77) NOT NULL,
  `amount` varchar(77) NOT NULL,
  `mobileno` varchar(77) NOT NULL,
  `days` varchar(77) NOT NULL,
  `description` varchar(77) NOT NULL,
  `availibility` varchar(77) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `provider_id`, `category`, `district`, `city`, `amount`, `mobileno`, `days`, `description`, `availibility`) VALUES
(1, 15, 'CAR SERVICING', 'kollam', 'kollam', '7000', '9946421007', '2', 'for car washing and servicing', 'yes'),
(2, 16, 'AUTO PAINTING', 'Thrissur', 'thrissur', '8500', '8876541998', '4', 'for car polishing and painting', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_provider`
--

CREATE TABLE `tbl_service_provider` (
  `provider_id` int(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address` longtext NOT NULL,
  `experience` varchar(100) NOT NULL,
  `proof` longtext NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `license_number` varchar(50) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_service_provider`
--

INSERT INTO `tbl_service_provider` (`provider_id`, `company_name`, `address`, `experience`, `proof`, `phone`, `email`, `website`, `license_number`, `image`) VALUES
(15, ' Gearhead Garage', 'kelza house', 'about car repair services', '../uploads/gallery-6.jpg', '9987654332', 'kelza98764@gmail.com', 'www.kelza.com', 'GHY6543', '../uploads/gallery-6.jpg'),
(16, 'The Car Doctor', 'near panampilly', 'for car auto cleaning and repairs', '../uploads/gallery-4.jpg', '9946421007', 'doctor1@gmail.com', 'www.the auto.com', 'GH1234', '../uploads/carousel-1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_category`
--
ALTER TABLE `add_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_emergency`
--
ALTER TABLE `tbl_emergency`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_owner`
--
ALTER TABLE `tbl_owner`
  ADD PRIMARY KEY (`owner_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_service_provider`
--
ALTER TABLE `tbl_service_provider`
  ADD PRIMARY KEY (`provider_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_category`
--
ALTER TABLE `add_category`
  MODIFY `category_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_emergency`
--
ALTER TABLE `tbl_emergency`
  MODIFY `owner_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_owner`
--
ALTER TABLE `tbl_owner`
  MODIFY `owner_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_service_provider`
--
ALTER TABLE `tbl_service_provider`
  MODIFY `provider_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
