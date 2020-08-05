-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2020 at 03:18 AM
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
(26, '1980 shoal crest way', 'cumming', 'GA', '30041', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `flight_status`
--

CREATE TABLE `flight_status` (
  `id` int(11) NOT NULL,
  `status` varchar(64) NOT NULL,
  `abbr` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `bags` int(2) NOT NULL,
  `flight_id` varchar(128) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(14, 'Suchit', 'Vemula', '$2y$10$fGflYzC1CWQhAVJEGUix2uwGFvPMJJUJAaAmO.NeaajjkcqxH2mVu', 'M.', 'm.', 'jr.', '2020-05-13', 'M', 26, '4078088396', 'vemulasuchit3@gmail.com', '1+1', '1+1', '1+1', '2', '2', '2', 2, 1);

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
  ADD KEY `status_id` (`status_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `flight_status`
--
ALTER TABLE `flight_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `flight_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
