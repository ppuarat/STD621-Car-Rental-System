CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(50),
  `last_name` varchar(50),
  `address` varchar(100),
  `created_at` datetime,
  `email` varchar(50) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int,
  `is_active` boolean DEFAULT true
);

CREATE TABLE `cars` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `detail` varchar(100),
  `brand` varchar(50),
  `model` varchar(50),
  `created_at` datetime,
  `is_available` boolean NOT NULL DEFAULT true,
  `is_active` boolean DEFAULT true
);

CREATE TABLE `roles` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(10),
  `description` varchar(255),
  `created_at` datetime,
  `is_active` boolean DEFAULT true
);

CREATE TABLE `rentals` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `rent_from_date` date,
  `rent_end_date` date,
  `car_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `is_approve` boolean,
  `description` varchar(255),
  `created_at` datetime,
  `is_active` boolean DEFAULT true
);

ALTER TABLE `users` ADD FOREIGN KEY (`role`) REFERENCES `roles` (`id`);

ALTER TABLE `rentals` ADD FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`);

ALTER TABLE `rentals` ADD FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

ALTER TABLE `rentals` ADD FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`);
