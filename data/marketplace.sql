-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 06:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--
CREATE DATABASE `marketplace`;
Use `marketplace`;
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `ads_id` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`ads_id`, `description`, `start_date`, `end_date`, `prod_id`) VALUES
(1, 'Hot Picks!', '2022-11-29', '2022-12-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `buyer_id` int(11) NOT NULL,
  `shipping_add` varchar(100) NOT NULL,
  `billing_add` varchar(100) DEFAULT NULL,
  `credit` varchar(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyer_id`, `shipping_add`, `billing_add`, `credit`, `profile_id`) VALUES
(1, 'Montreal, CA', 'Montreal, CA', '500', 2),
(2, 'Ontario, CA', 'Ontario, CA', '0.00', 4),
(3, '4210 ave montreal', '4210 ave montreal', '200', 5);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` enum('paid','unpaid') NOT NULL,
  `buyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_number`, `order_date`, `order_status`, `buyer_id`) VALUES
(6, '142145240', '2022-12-01', 'unpaid', 1),
(7, '2125997832', '2022-12-15', 'unpaid', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `unit_discount` int(11) NOT NULL,
  `unit_qty` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `unit_price`, `unit_discount`, `unit_qty`, `order_id`, `prod_id`) VALUES
(48, 999, 0, 1, 6, 1),
(49, 60, 0, 1, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_desc` text NOT NULL,
  `date_added` datetime NOT NULL,
  `rating` int(6) DEFAULT NULL,
  `prod_cost` int(11) NOT NULL,
  `num_of_stock` int(11) NOT NULL,
  `has_discount` tinyint(1) NOT NULL,
  `has_ads` tinyint(1) NOT NULL,
  `product_image` varchar(90) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `prod_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_desc`, `date_added`, `rating`, `prod_cost`, `num_of_stock`, `has_discount`, `has_ads`, `product_image`, `vendor_id`, `prod_cat_id`) VALUES
(1, 'Steam Deck', 'Steam\'s handheld device!\r\nPortable PC\r\nRunning in Steam OS', '2022-11-30 03:49:20', NULL, 999, 9, 0, 1, '6386c4b01b6c4.jpg', 1, 6),
(2, 'BoomBox', 'Vintage BoomBox', '2022-11-30 03:50:32', NULL, 250, 1, 0, 0, '6386c4f8318d1.jpg', 1, 8),
(3, 'Iphone X', 'Open Box***\r\nLike new Condition', '2022-11-30 03:53:47', NULL, 800, 1, 1, 0, '6386c5bb2cc78.jpg', 1, 6),
(4, 'Spiderman PS5', 'Spiderman Miles Morales', '2022-12-01 05:24:17', NULL, 90, 10, 0, 0, '63882c71912d9.jpg', 2, 2),
(5, 'Horizon Forbidden West', 'Join Aloy as she braves the Forbidden West – a majestic but dangerous frontier that conceals mysterious new threats.\r\nPS5 Game', '2022-12-01 05:28:26', NULL, 60, 4, 1, 0, '63882d6a9f531.jpg', 2, 2),
(6, 'Sony PS4 Platinum Wireless Headset', 'Hi quality gaming wireless headset', '2022-12-02 06:00:05', NULL, 250, 4, 0, 0, '638986559f7cc.jpg', 1, 6),
(7, 'Mac M1', 'Perfect laptop for coding', '2022-12-04 09:17:52', NULL, 999, 4, 1, 0, '638d0070518c6.jpg', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `prod_rating_id` int(11) NOT NULL,
  `comments` text NOT NULL,
  `product_rate` varchar(6) DEFAULT NULL,
  `prod_id` int(11) NOT NULL,
  `order_details_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prod_category`
--

CREATE TABLE `prod_category` (
  `prod_cat_id` int(11) NOT NULL,
  `prod_category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prod_category`
--

INSERT INTO `prod_category` (`prod_cat_id`, `prod_category`) VALUES
(1, 'App & Games'),
(2, 'App & Games'),
(3, 'Automotive'),
(4, 'Books'),
(5, 'Clothing'),
(6, 'Electronics'),
(7, 'Grocery'),
(8, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL,
  `profile_photo` varchar(30) DEFAULT 'blank.jpg',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `first_name`, `last_name`, `role`, `profile_photo`, `user_id`) VALUES
(1, 'Peter', 'James', 'vendor', '6386c46589925.jpg', 1),
(2, 'jeffrey', 'grospe', 'buyer', '6386cca35a177.jpg', 2),
(3, 'Robert ', 'Downey', 'vendor', 'blank.jpg', 3),
(4, 'Mike', 'Benz', 'buyer', '638cf2beb3040.jpg', 4),
(5, 'james', 'smith', 'buyer', 'blank.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promo_id` int(11) NOT NULL,
  `promo_name` varchar(25) NOT NULL,
  `discount_percent` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promo_id`, `promo_name`, `discount_percent`, `prod_id`) VALUES
(1, 'OPEN BOX', 5, 3),
(2, 'Cyber Monday', 10, 5),
(3, 'Christmas Special', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `service_transaction`
--

CREATE TABLE `service_transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_cost` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `ads_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `ship_id` int(11) NOT NULL,
  `tracking_number` int(12) NOT NULL,
  `ship_date` date NOT NULL,
  `expected_arrival` date NOT NULL,
  `ship_to` varchar(50) NOT NULL,
  `ship_from` varchar(50) NOT NULL,
  `shipping_status` enum('preparing','shipped','delivered','delayed') NOT NULL,
  `note` varchar(100) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(90) NOT NULL,
  `secret_key` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `secret_key`) VALUES
(1, 'Peter', '$2y$10$7bIO.yRqetLEcMtaABe7ke1RJnUkPi1rlaYMJbT5pTovHzKp3eGly', NULL),
(2, 'jeffrey', '$2y$10$r3o0vd5ocZEou6IKT2z/je4ZaRiiWnH1QLsb5J0URN6dM4eP2CUPK', NULL),
(3, 'rj', '$2y$10$38U24aV1wrmbQgwCeGSbZuh8WvFRt3BTKaxA31hW3eT6E6ndkc9eK', NULL),
(4, 'Mike', '$2y$10$OD9j84ecOZSFH1BR/6wfHeMlW17NEAijdP.bsXz/JoVKP/c0f3sjK', NULL),
(9, 'james', '$2y$10$FUdskpO9Q4uvY7MsjJADDerA0X9IgEcon80DmUPoIaLD90m23bQmu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `vendor_profit` varchar(11) NOT NULL,
  `vendor_desc` text NOT NULL,
  `vendor_location` varchar(150) NOT NULL,
  `profile_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `vendor_profit`, `vendor_desc`, `vendor_location`, `profile_id`) VALUES
(1, 'Amazona', '2000', 'Hi, I sell awesome electronics ', 'Downtown, Montreal', 1),
(2, 'EV Games', '1500', 'Your one stop online gaming store', 'Ontario, Canada', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_rating`
--

CREATE TABLE `vendor_rating` (
  `vendorRating_id` int(11) NOT NULL,
  `v_comments` text DEFAULT NULL,
  `vendor_rate` varchar(6) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `buyer_id`, `date_added`, `prod_id`) VALUES
(61, 1, '2022-12-04', 6),
(62, 1, '2022-12-04', 1),
(63, 2, '2022-12-04', 4),
(77, 3, '2022-12-15', 7),
(78, 3, '2022-12-15', 6),
(79, 3, '2022-12-15', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `profile_id` (`profile_id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`ads_id`),
  ADD UNIQUE KEY `prod_id_unique` (`prod_id`) USING BTREE;

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyer_id`),
  ADD UNIQUE KEY `profile_id` (`profile_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `prod_cat_id` (`prod_cat_id`) USING BTREE;

--
-- Indexes for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`prod_rating_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `productRating_orderDetails` (`order_details_id`);

--
-- Indexes for table `prod_category`
--
ALTER TABLE `prod_category`
  ADD PRIMARY KEY (`prod_cat_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promo_id`),
  ADD UNIQUE KEY `prod_id` (`prod_id`);

--
-- Indexes for table `service_transaction`
--
ALTER TABLE `service_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD UNIQUE KEY `order_id` (`order_id`) USING BTREE,
  ADD KEY `admin_id` (`admin_id`) USING BTREE,
  ADD KEY `ads_id` (`ads_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`ship_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`),
  ADD UNIQUE KEY `vendor_name` (`vendor_name`),
  ADD UNIQUE KEY `profile_id_unique` (`profile_id`) USING BTREE;

--
-- Indexes for table `vendor_rating`
--
ALTER TABLE `vendor_rating`
  ADD PRIMARY KEY (`vendorRating_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `buyer_id_unique` (`buyer_id`) USING BTREE,
  ADD KEY `prod_id` (`prod_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `ads_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `prod_rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prod_category`
--
ALTER TABLE `prod_category`
  MODIFY `prod_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_rating`
--
ALTER TABLE `vendor_rating`
  MODIFY `vendorRating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_profile_fk` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE;

--
-- Constraints for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `ads_product_unique` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE;

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `orderDetails_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderDetails_prod` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_prod_cat_fk` FOREIGN KEY (`prod_cat_id`) REFERENCES `prod_category` (`prod_cat_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD CONSTRAINT `productRating_orderDetails` FOREIGN KEY (`order_details_id`) REFERENCES `order_details` (`order_details_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_rating_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promo_product_unique` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE;

--
-- Constraints for table `service_transaction`
--
ALTER TABLE `service_transaction`
  ADD CONSTRAINT `admim_service` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_ads_index` FOREIGN KEY (`ads_id`) REFERENCES `advertisement` (`ads_id`),
  ADD CONSTRAINT `service_order_index` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

--
-- Constraints for table `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `vendor_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_rating`
--
ALTER TABLE `vendor_rating`
  ADD CONSTRAINT `vendor_buyer` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`),
  ADD CONSTRAINT `vendor_rating_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_buyer_fk` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_prod_fk` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
