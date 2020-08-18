-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 19, 2020 at 01:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flights`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(128) NOT NULL,
  `zip` varchar(16) NOT NULL,
  `country` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address`, `city`, `state`, `zip`, `country`) VALUES
(1, '1980 shoal crest way', 'cumming', 'GA', '30041', 'USA'),
(4, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(5, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(6, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(7, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(8, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(9, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(10, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(11, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(12, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(13, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(14, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(15, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(16, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(17, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(18, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(19, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(20, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(21, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(22, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(23, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(24, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(25, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(26, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(27, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States'),
(28, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(29, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(30, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(31, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(32, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(33, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(34, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(35, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(36, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(37, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(38, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(39, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(40, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(41, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(42, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(43, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(44, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(45, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(46, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(47, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(48, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(49, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(50, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(51, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(52, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(53, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(54, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(55, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(56, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(57, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(58, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(59, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(60, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(61, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(62, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(63, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(64, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(65, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(66, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(67, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(68, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(69, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(70, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(71, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(72, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(73, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(74, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(75, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(76, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(77, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(78, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(79, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(80, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(81, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(82, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(83, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(84, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(85, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(86, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US'),
(87, '1980 shoal crest way', 'cumming', 'GA', '30041', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `flight_status`
--

CREATE TABLE `flight_status` (
  `id` int(11) NOT NULL,
  `status` varchar(64) NOT NULL,
  `abbr` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight_status`
--

INSERT INTO `flight_status` (`id`, `status`, `abbr`) VALUES
(1, 'Test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `expiration_date` date NOT NULL,
  `cvc` varchar(5) NOT NULL,
  `cardholder_name` varchar(255) NOT NULL,
  `address_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `card_number`, `expiration_date`, `cvc`, `cardholder_name`, `address_id`, `user_id`) VALUES
(2, '123', '2020-08-06', '123', 'Suchit', 56, NULL),
(5, '123', '2020-08-13', '123', 'Suchit', 64, NULL),
(9, '1123', '2020-08-20', '123', 'Suchit', 82, 14),
(10, '123', '2020-08-12', '123', 'Suchit', 84, NULL),
(11, '123', '2020-08-12', '123', 'Suchit', 86, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `dob` date NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `seat_assignment` varchar(20) NOT NULL,
  `checkin_bags` int(2) NOT NULL,
  `carryon_bags` int(11) NOT NULL,
  `flight_id` varchar(128) NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `phone_number`, `email_address`, `payment_id`, `seat_assignment`, `checkin_bags`, `carryon_bags`, `flight_id`, `status_id`, `user_id`, `address_id`) VALUES
(11, 'Suchit', 'm.', 'Vemula', 'M', '2020-08-12', '4078088396', 'vemulasuchit3@gmail.com', 5, 'A1', 1, 1, '5f2342e09c4d62d7b65d83ad', 1, NULL, 65),
(15, 'Suchit', 'm.', 'Vemula', 'M', '2020-08-05', '4078088396', 'vemulasuchit3@gmail.com', 9, 'B1', 1, 1, '5f2342e09c4d62d7b65d83ad', 1, 14, 83),
(17, 'Suchit', 'm.', 'Vemula', 'M', '2020-08-12', '4078088396', 'vemulasuchit3@gmail.com', 11, 'A8', 1, 1, '5f2342e09c4d62d7b65d83ad', 1, NULL, 87);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `title` enum('M.','Ms.','Mrs.','Mr.') NOT NULL DEFAULT 'M.',
  `middle_name` varchar(128) DEFAULT NULL,
  `suffix` varchar(6) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `security_question_1` varchar(255) DEFAULT NULL,
  `security_question_2` varchar(255) DEFAULT NULL,
  `security_question_3` varchar(255) DEFAULT NULL,
  `security_answer_1` varchar(255) DEFAULT NULL,
  `security_answer_2` varchar(255) DEFAULT NULL,
  `security_answer_3` varchar(255) DEFAULT NULL,
  `user_type_id` int(11) NOT NULL,
  `confirmed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password_hash`, `title`, `middle_name`, `suffix`, `dob`, `gender`, `address_id`, `phone_number`, `email_address`, `security_question_1`, `security_question_2`, `security_question_3`, `security_answer_1`, `security_answer_2`, `security_answer_3`, `user_type_id`, `confirmed`) VALUES
(14, 'Suchit', 'Vemula', '$2y$10$fGflYzC1CWQhAVJEGUix2uwGFvPMJJUJAaAmO.NeaajjkcqxH2mVu', 'M.', 'm.', 'jr.', '2020-05-13', 'M', 26, '4078088396', 'vemulasuchit3@gmail.com', '1+1', '1+1', '1+1', '2', '2', '2', 2, 1),
(15, 'Suchit3', 'Vemula', '$2y$10$uigRDGiYV..m3rMkCA4uX.9/zL.ase1fYE4cDU6t4wTtUOJRI7YEC', 'M.', 'm.', NULL, NULL, NULL, NULL, NULL, 'vemulasuchit3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(16, 'Suchit2', 'Vemula2', '$2y$10$5AJOOQ4BW2I2j7eiSZ3Uru5tX.oOa9N7Asb7FO23zj/vY95zYCHHu', 'M.', 'm.2', 'jr.', '2020-08-06', 'M', 27, '4078088396', 'vemulasuchit3@gmail.com', '1+1', '1+1', '1+1', '2', '2', '2', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_login_ip` varchar(15) NOT NULL,
  `last_login_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `user_id`, `last_login_ip`, `last_login_datetime`) VALUES
(1, 2, '192.168.64.1', '2020-08-18 15:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'Costumer'),
(2, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_status`
--
ALTER TABLE `flight_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_users_fk` (`user_id`),
  ADD KEY `payments_addresses_fk` (`address_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `tickets_ibfk_2` (`payment_id`),
  ADD KEY `tickets_ibfk_3` (`user_id`),
  ADD KEY `tickets_ibfk_4` (`address_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_fk` (`address_id`),
  ADD KEY `user_type_fk` (`user_type_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `flight_status`
--
ALTER TABLE `flight_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_addresses_fk` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `payments_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `flight_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `addresses_fk` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_type_fk` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
