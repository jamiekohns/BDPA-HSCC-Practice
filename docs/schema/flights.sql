CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `title` enum('M.','Ms.','Mrs.','Mr.') NOT NULL DEFAULT 'M.',
  `middle_name` varchar(128) DEFAULT NULL,
  `suffix` varchar(6) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `address_id` int(11) NOT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `security_question_1` varchar(255) NOT NULL,
  `security_question_2` varchar(255) NOT NULL,
  `security_question_3` varchar(255) NOT NULL,
  `security_answer_1` varchar(255) NOT NULL,
  `security_answer_2` varchar(255) NOT NULL,
  `security_answer_3` varchar(255) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(128) NOT NULL,
  `zip` varchar(16) NOT NULL,
  `country` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

ALTER TABLE `users`
    ADD CONSTRAINT `addresses_fk`
    FOREIGN KEY (`address_id`)
    REFERENCES `addresses`(`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;

ALTER TABLE `users`
    ADD CONSTRAINT `user_type_fk`
    FOREIGN KEY (`user_type_id`)
    REFERENCES `user_type`(`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;

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
  ) ENGINE=InnoDB;

  ALTER TABLE `tickets`
    ADD PRIMARY KEY (`id`),
    ADD KEY `tickets_ibfk_1` (`status_id`);
