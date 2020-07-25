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

CREATE TABLE `payments` (
    `id` int(11) NOT NULL,
    `card_number` varchar(16) NOT NULL,
    `expiration_date` date() NOT NULL,
    `cvc` varchar(5) NOT NULL,
    `cardholder_name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

ALTER TABLE `payments`
    ADD CONSTRAINT `payments_users_fk`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`);

ALTER TABLE `payments`
    ADD CONSTRAINT `payments_addresses_fk`
    FOREIGN KEY (`address_id`)
    REFERENCES `addresses` (`id`);

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
    `status_id` int(11) NOT NULL,
    `address_id` int(11) NOT NULL,
    `user_id` int(11) NULL,
    `payment_id` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `flight_status` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `status` varchar(64) NOT NULL,
    `abbr` varchar(6) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

ALTER TABLE `tickets`
    ADD FOREIGN KEY (`status_id`)
    REFERENCES `flight_status`(`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;

ALTER TABLE `tickets`
    ADD FOREIGN KEY (`address_id`)
    REFERENCES `addresses` (`id`);

ALTER TABLE `tickets`
    ADD FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`);

ALTER TABLE `tickets`
    ADD FOREIGN KEY (`payment_id`)
    REFERENCES `payments` (`id`);

CREATE TABLE `user_log`
  (
     `id`                  INT(11) NOT NULL auto_increment,
     `user_id`             INT(11) NOT NULL,
     `last_login_ip`       VARCHAR(15) NOT NULL,
     `last_login_datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (`id`)
  ) ENGINE = InnoDB;

ALTER TABLE `user_log`
  ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE no action ON
  UPDATE no action;
