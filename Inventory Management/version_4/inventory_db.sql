-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 01:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category`) VALUES
('Electronics'),
('Fashion'),
('Appliances'),
('Sports'),
('Home & Living'),
('Beauty & Personal Care'),
('Books & Stationery'),
('Toys & Games'),
('Health & Wellness'),
('Food & Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `category` varchar(40) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `category`, `quantity`, `price`) VALUES
(1001, 'Redmi Note 9S Mobile', 'Electronics', 37, 32510.61),
(1002, 'JanSport Classic Backpack', 'Fashion', 4, 4972.84),
(1003, 'Keurig K-Elite Coffee Make', 'Electronics', 7, 9750.68),
(1004, 'Nike Air Zoom Running Shoes', 'Sports', 10, 6491.62),
(1005, 'Samsung 55', 'Electronics', 10, 86673.38),
(1006, 'Apple iPad Air', 'Electronics', 5, 54143.12),
(1007, 'Levi\s 501 Original Jeans', 'Fashion', 10, 6491.62),
(1008, 'Cuisinart Food Processor', 'Appliances', 10, 14084.91),
(1009, 'Adidas UltraBoost Sneakers', 'Sports', 10, 16238.12),
(1010, 'LG 27\" UltraGear Gaming Monitor', 'Electronics', 10, 37830.82),
(1011, 'Sony WH-1000XM4 Headphones', 'Electronics', 10, 37830.82),
(1012, 'Calvin Klein T-Shirt', 'Fashion', 10, 3247.18),
(1013, 'Ninja Professional Blender', 'Appliances', 10, 9750.68),
(1014, 'Adidas Running Shorts', 'Sports', 10, 2166.78),
(1015, 'Amazon Echo Dot (3rd Gen)', 'Electronics', 10, 5390.14),
(1016, 'Fossil Gen 5 Smartwatch', 'Fashion', 10, 21667.86),
(1017, 'Instant Pot Duo 8-Qt', 'Appliances', 10, 10838),
(1018, 'Yoga Mat Comfort', 'Electronics', 10, 2708.66),
(1019, 'Samsung Galaxy Tab S7', 'Electronics', 10, 64824.28),
(1020, 'Michael Kors Crossbody Bag', 'Fashion', 10, 16238.12),
(1021, 'iPhone 13 Pro', 'Electronics', 10, 108380),
(1022, 'Ralph Lauren Polo Shirt', 'Fashion', 10, 5414.31),
(1023, 'Breville Toaster Oven', 'Appliances', 10, 14133.06),
(1024, 'Nike Dri-FIT Workout Leggings', 'Sports', 10, 3783.08),
(1025, 'Google Nest Hub (2nd Gen)', 'Electronics', 10, 9750.68),
(1026, 'Ray-Ban Aviator Sunglasses', 'Fashion', 10, 16238.12),
(1027, 'KitchenAid Stand Mixer', 'Appliances', 10, 32470.61),
(1028, 'Yoga Block Set', 'Sports', 10, 2166.78),
(1029, 'Sony Alpha a6400 Camera', 'Electronics', 10, 97506.82),
(1030, 'Michael Kors Watch', 'Fashion', 10, 27086.61),
(1031, 'Samsung Galaxy Buds Pro', 'Electronics', 10, 7566.82),
(1032, 'Casual Denim Jacket', 'Fashion', 10, 5293.97),
(1033, 'Instant Pot Blender', 'Appliances', 10, 9461.73),
(1034, 'Spalding Basketball', 'Sports', 10, 1628.47),
(1035, 'LED Desk Lamp', 'Home & Living', 10, 2708.66),
(1036, 'Skincare Set', 'Beauty & Personal Care', 10, 5405.99),
(1037, 'Hardcover Notebook Set', 'Books & Stationery', 10, 1408.49),
(1038, 'LEGO Creator Expert Building', 'Toys & Games', 10, 9750.68),
(1039, 'Yoga Mat and Towel Set', 'Health & Wellness', 10, 3247.18),
(1040, 'Gourmet Cheese Selection', 'Food & Beverages', 10, 2708.66),
(1041, 'Microsoft Surface Laptop 4', 'Electronics', 10, 108380),
(1042, 'Classic Leather Belt', 'Fashion', 10, 2708.66),
(1043, 'Air Fryer Toaster Oven', 'Appliances', 10, 8923.47),
(1044, 'Soccer Ball', 'Sports', 10, 1408.49),
(1045, 'Decorative Throw Blanket', 'Home & Living', 10, 3783.08),
(1046, 'Mens Grooming Set', 'Beauty & Personal Care', 10, 2432.24),
(1047, 'Leather Journal Set', 'Books & Stationery', 10, 1083.8),
(1048, 'LEGO Technic Building Kit', 'Toys & Games', 10, 6996.72),
(1049, 'Resistance Band Kit', 'Health & Wellness', 10, 1628.47),
(1050, 'Assorted Tea Collection', 'Food & Beverages', 10, 1083.8),
(1051, 'Smart Watch Series 8', 'Electronics', 10, 43209.48),
(1052, 'Leather Messenger Bag', 'Fashion', 10, 10838),
(1053, 'Air Purifier', 'Appliances', 10, 7566.82),
(1054, 'Yoga Block Set', 'Sports', 10, 2166.78),
(1055, 'Cozy Throw Pillow', 'Home & Living', 10, 1628.47),
(1056, 'Hair Care Gift Set', 'Beauty & Personal Care', 10, 3247.18),
(1057, 'Leather Notebook Cover', 'Books & Stationery', 10, 2708.66),
(1058, 'LEGO Star Wars Set', 'Toys & Games', 10, 5414.31),
(1059, 'Resistance Band Set', 'Health & Wellness', 10, 1408.49),
(1060, 'Premium Coffee Collection', 'Food & Beverages', 10, 1408.49),
(1061, 'Wireless Earbuds', 'Electronics', 10, 4320.95),
(1062, 'Leather Belt', 'Fashion', 10, 2708.66),
(1063, 'Blender', 'Appliances', 10, 7566.82),
(1064, 'Running Shoes', 'Sports', 10, 2166.78),
(1065, 'LED Desk Lamp', 'Home & Living', 10, 3247.18),
(1066, 'Skincare Set', 'Beauty & Personal Care', 10, 4320.95),
(1067, 'Hardcover Notebook Set', 'Books & Stationery', 10, 1408.49),
(1068, 'LEGO Architecture Set', 'Toys & Games', 10, 6491.62),
(1069, 'Yoga Mat and Towel Set', 'Health & Wellness', 10, 3247.18),
(1070, 'Gourmet Coffee Collection', 'Food & Beverages', 10, 2708.66),
(1071, 'iPad Pro', 'Electronics', 10, 64916.14),
(1072, 'Leather Wallet', 'Fashion', 10, 2166.78),
(1073, 'Air Fryer', 'Appliances', 10, 8923.47),
(1074, 'Tennis Racket', 'Sports', 10, 1628.47),
(1075, 'Throw Blanket', 'Home & Living', 10, 3247.18),
(1076, 'Skincare Essentials Set', 'Beauty & Personal Care', 10, 4320.95),
(1077, 'Hardcover Planner', 'Books & Stationery', 10, 1083.8),
(1078, 'LEGO Star Wars Set', 'Toys & Games', 10, 6996.72),
(1079, 'Resistance Band Kit', 'Health & Wellness', 10, 1628.47),
(1080, 'Assorted Tea Collection', 'Food & Beverages', 10, 1083.8),
(1081, 'MacBook Pro M1', 'Electronics', 10, 108380),
(1082, 'Leather Messenger Bag', 'Fashion', 10, 10838),
(1083, 'Air Purifier', 'Appliances', 10, 7566.82),
(1084, 'Running Hydration Pack', 'Sports', 10, 2708.66),
(1085, 'Cozy Throw Pillow', 'Home & Living', 10, 1628.47),
(1086, 'Hair Care Gift Set', 'Beauty & Personal Care', 10, 3247.18),
(1087, 'Leather Notebook Cover', 'Books & Stationery', 10, 2708.66),
(1088, 'LEGO Technic Building Kit', 'Toys & Games', 10, 5414.31),
(1089, 'Resistance Band Set', 'Health & Wellness', 10, 1408.49),
(1090, 'Gourmet Coffee Collection', 'Food & Beverages', 10, 1408.49),
(1091, 'Wireless Earbuds', 'Electronics', 10, 4320.95),
(1092, 'Leather Belt', 'Fashion', 10, 2708.66),
(1093, 'Blender', 'Appliances', 10, 7566.82),
(1094, 'Running Shoes', 'Sports', 10, 2166.78),
(1095, 'LED Desk Lamp', 'Home & Living', 10, 3247.18),
(1096, 'Skincare Set', 'Beauty & Personal Care', 10, 4320.95),
(1097, 'Hardcover Notebook Set', 'Books & Stationery', 10, 1408.49),
(1098, 'LEGO Architecture Set', 'Toys & Games', 10, 6491.62),
(1099, 'Yoga Mat and Towel Set', 'Health & Wellness', 10, 3247.18),
(1100, 'Gourmet Cheese Selection', 'Food & Beverages', 10, 2708.66),
(1122, 'Pureit Water Filter', 'Health', 3, 2500),
(1123, 'Dell Latitude 7400', 'Electronics', 2, 119000),
(1124, 'Puma Fast Shoe', 'Electronics', 2, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('rajinsiam', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
