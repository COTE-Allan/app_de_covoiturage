--
-- Current Database: `carpooling`
--
DROP DATABASE IF EXISTS `carpooling`;
CREATE DATABASE `carpooling` CHARACTER SET UTF8;

USE `carpooling`;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(150) NOT NULL,
  `last_name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(250) NOT NULL,
  `password` VARCHAR(70) NOT NULL,
  `phone` VARCHAR(14) NOT NULL,
  `avatar` VARCHAR(5) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UC_user_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `rides`
--

DROP TABLE IF EXISTS `rides`;

CREATE TABLE `rides` (
  `ride_id` INT(11) NOT NULL AUTO_INCREMENT,
  `starting_at` VARCHAR(150) NOT NULL,
  `going_to` VARCHAR(150) NOT NULL,
  `date` DATETIME NOT NULL,
  `seats` INT(11) NOT NULL,
  `seats_available` INT(11) NULL,
  `price` DECIMAL(5,2) NOT NULL,
  `luggage` ENUM('Small', 'Medium', 'Large', 'Extra') NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`ride_id`),
  CONSTRAINT `CHK_seats_available` CHECK(`seats_available` >= 0),
  CONSTRAINT `FK_rides_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `ride_books`;

CREATE TABLE `bookings` (
  `booking_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `ride_id` INT(11) NOT NULL,
  PRIMARY KEY (`booking_id`),
  CONSTRAINT `FK_bookings_rides_ride_id` FOREIGN KEY (`ride_id`) REFERENCES `rides` (`ride_id`),
  CONSTRAINT `FK_bookings_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Trigger update seats available
--

DELIMITER |

CREATE TRIGGER after_insert_bookings AFTER INSERT ON `bookings` FOR EACH ROW
BEGIN
    UPDATE `rides` SET `seats_available` = `seats_available` - 1
    WHERE `rides`.`ride_id` = NEW.ride_id;
END |

CREATE TRIGGER after_delete_bookings AFTER DELETE ON `bookings` FOR EACH ROW
BEGIN
    UPDATE `rides` SET `seats_available` = `seats_available` + 1
    WHERE `rides`.`ride_id` = OLD.ride_id;
END |

DELIMITER ;