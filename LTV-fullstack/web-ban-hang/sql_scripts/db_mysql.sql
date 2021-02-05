CREATE TABLE `customers` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `address` text,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `orders` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `customer_id` int,
  `status` varchar(255),
  `created_at` timestamp
);

CREATE TABLE `order_items` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `order_id` int,
  `product_id` int,
  `quantity` int
);

CREATE TABLE `products` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `price` int,
  `feature_image` varchar(255),
  `content` text,
  `user_id` int,
  `category_id` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `categories` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `parent_id` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `product_image` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `image` varchar(255),
  `product_id` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `tags` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `product_tag` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `product_id` int,
  `tag_id` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `menus` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `parent_id` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `sliders` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `description` varchar(255),
  `image` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `settings` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `config_key` varchar(255),
  `config_value` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

ALTER TABLE `orders` ADD FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

ALTER TABLE `products` ADD FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

ALTER TABLE `order_items` ADD FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

ALTER TABLE `order_items` ADD FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

ALTER TABLE `product_image` ADD FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

ALTER TABLE `product_tag` ADD FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

ALTER TABLE `product_tag` ADD FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

ALTER TABLE `products` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
