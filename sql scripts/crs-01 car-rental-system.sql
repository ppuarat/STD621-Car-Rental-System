CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(50),
  `last_name` varchar(50),
  `address` varchar(255),
  `email` varchar(100) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `fk_role_id` int,
  `created_at` datetime DEFAULT (now()),
  `is_active` boolean DEFAULT true
);

CREATE TABLE `cars` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100),
  `detail` varchar(255),
  `brand` varchar(100),
  `model` varchar(100),
  `transmission` varchar(30),
  `door` int,
  `seat` int,
  `daily_rate` double,
  `is_available` boolean NOT NULL DEFAULT true,
  `created_at` datetime DEFAULT (now()),
  `is_active` boolean DEFAULT true
);

CREATE TABLE `car_images` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `fk_car_id` int,
  `caption` varchar(50),
  `image_src` varchar(255)
);

CREATE TABLE `roles` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50),
  `description` varchar(255),
  `created_at` datetime DEFAULT (now()),
  `is_active` boolean DEFAULT true
);

CREATE TABLE `rentals` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `rent_from_date` date,
  `rent_end_date` date,
  `fk_car_id` int NOT NULL,
  `fk_customer_id` int NOT NULL,
  `fk_staff_id` int NOT NULL,
  `total_price` double,
  `is_approve` boolean,
  `description` varchar(255),
  `created_at` datetime DEFAULT (now()),
  `is_active` boolean DEFAULT true
);

CREATE TABLE `feedbacks` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `subject` varchar(100),
  `feedback` varchar(255),
  `fk_customer_id` int,
  `created_at` datetime DEFAULT (now()),
  `is_active` boolean DEFAULT true
);

ALTER TABLE `users` ADD FOREIGN KEY (`fk_role_id`) REFERENCES `roles` (`id`);

ALTER TABLE `car_images` ADD FOREIGN KEY (`fk_car_id`) REFERENCES `cars` (`id`);

ALTER TABLE `rentals` ADD FOREIGN KEY (`fk_car_id`) REFERENCES `cars` (`id`);

ALTER TABLE `rentals` ADD FOREIGN KEY (`fk_customer_id`) REFERENCES `users` (`id`);

ALTER TABLE `rentals` ADD FOREIGN KEY (`fk_staff_id`) REFERENCES `users` (`id`);

ALTER TABLE `feedbacks` ADD FOREIGN KEY (`fk_customer_id`) REFERENCES `users` (`id`);
