yes-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2026 at 10:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `cat_name` text DEFAULT NULL,
  `cat_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `cat_name`, `cat_img`) VALUES
(8, 'CHINESE', 'images (1).jpeg'),
(9, 'DESI', 'DESI.jpeg'),
(10, 'FAST FOOD', 'ff.jpeg'),
(13, 'BBQ', 'bbq1.jpeg'),
(16, 'DRINKS', 'DRINKS.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `admin_name` text DEFAULT NULL,
  `admin_email` text DEFAULT NULL,
  `admin_pass` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'waj', 'wajeeha@gmail.com', 'wajeeha');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `payment_method` text NOT NULL,
  `total_amount` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `payment_method`, `total_amount`) VALUES
(4, 'wajeeha ', 'afsd', 'gsdgsgh', 'Cash on Delivery', '2950'),
(5, 'wajeeha ', '325465', 'hgf hjgj', 'Cash on Delivery', '1100'),
(6, 'wajeeha ', '325465', 'xyz', 'Cash on Delivery', '1050'),
(7, 'wajeeha ', '2165456', 'Hyderbad', 'Card', '850'),
(8, 'suhail', '2165456', 'KOTRI', 'Card', '600'),
(9, 'wajeeha ', '2165456', 'jhggfh', 'Cash on Delivery', '750'),
(10, 'dada', '546465', 'hyd', 'Cash on Delivery', '2200'),
(14, 'dada', '42353464457', 'sfhngjdj', 'Cash on Delivery', '570'),
(15, 'dada', '42353464457', 'sfhngjdj', 'Cash on Delivery', '250'),
(16, 'anjaaaa', '3433374', 'hyd', 'Cash on Delivery', '600'),
(17, 'damni', '554444', 'huiiii', 'Cash on Delivery', '750'),
(23, 'dammmm', '325465', 'ndljwndwa', 'Card', '1450'),
(24, 'asma', '54646', 'sacaf', 'Cash on Delivery', '600'),
(25, 'dammmm', '325465', 'ndljwndwa', 'Card', '250'),
(26, 'fizz', '32353464', 'hyd', 'Cash on Delivery', '2550'),
(27, 'damni', '24235225', 'khi', 'Cash on Delivery', '1970'),
(28, 'wahh', '6465', 'dsdss', 'Cash on Delivery', '1800'),
(29, 'dada', '325465', 'kjhkjh', 'Cash on Delivery', '2300'),
(30, 'waj', '222333444', 'qasimabad', 'Cash on Delivery', '1200'),
(31, 'anabia', '235689', 'latifabad', 'Cash on Delivery', '2040'),
(32, 'fiza', '23356', 'hyd', 'Cash on Delivery', '600'),
(33, 'asmaa', '2345678', 'hyd', 'Cash on Delivery', '1720');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_price` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `product_price`, `quantity`, `product_image`) VALUES
(47, 33, 'Corn Soup', '500', 1, 'admin/img/images.jpeg'),
(48, 33, 'Makhni Daal', '350', 1, 'admin/img/daal.jpeg'),
(49, 33, 'Beef Kabab', '620', 1, 'admin/img/bbq.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `p_name` text DEFAULT NULL,
  `p_desc` text DEFAULT NULL,
  `p_price` text DEFAULT NULL,
  `p_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `cat_id`, `p_name`, `p_desc`, `p_price`, `p_img`) VALUES
(2, 8, 'Corn Soup', 'Best', '500', 'images.jpeg'),
(3, 9, 'Chicken Biryani', 'Best', '350', 'biryani.jpeg'),
(6, 9, 'Makhni Handi', 'Best', '1100', 'handi.jpeg'),
(7, 8, 'Dynamic Chicken', 'Best', '600', 'dc.jpeg'),
(8, 9, 'Makhni Daal', 'Best', '350', 'daal.jpeg'),
(9, 10, 'Chatni Roll', 'Best', '320', 'roll.jpeg'),
(10, 8, 'Munchurian with Rice', 'Best', '750', 'mr.jpeg'),
(11, 10, 'Chicken Broast', 'Best', '550', 'b.jpeg'),
(12, 10, 'Pizza', 'Best', '800', 'pizza.jpeg'),
(13, 13, 'Beef Kabab', 'Best', '620', 'bbq.jpeg'),
(14, 13, 'Turkish Kabab', 'Best', '850', 'tk.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_name`, `product_image`, `product_price`, `quantity`, `subtotal`, `created_at`) VALUES
(1, 'Pizza', 'admin/img/pizza.jpeg', 800.00, 1, 800.00, '2025-08-12 23:12:52'),
(2, 'Biryani', 'admin/img/biryani.jpeg', 350.00, 1, 350.00, '2025-08-12 23:12:52'),
(3, 'Soup', 'admin/img/images.jpeg', 500.00, 1, 500.00, '2025-08-12 23:12:52'),
(4, 'Biryani', 'admin/img/biryani.jpeg', 350.00, 2, 700.00, '2025-08-12 23:12:52'),
(5, 'Soup', 'admin/img/images.jpeg', 500.00, 4, 2000.00, '2025-08-12 23:12:52'),
(6, 'Dynamic Chicken', 'admin/img/dc.jpeg', 600.00, 1, 600.00, '2025-08-12 23:12:52'),
(7, 'Makhni Daal', 'admin/img/daal.jpeg', 350.00, 1, 350.00, '2025-08-12 23:12:52'),
(8, 'Soup', 'admin/img/images.jpeg', 500.00, 1, 500.00, '2025-08-12 23:12:52'),
(9, 'Turkish Kabab', 'admin/img/tk.jpeg', 850.00, 1, 850.00, '2025-08-12 23:12:52'),
(10, 'Soup', 'admin/img/images.jpeg', 500.00, 1, 500.00, '2025-08-12 23:12:52'),
(11, 'Dynamic Chicken', 'admin/img/dc.jpeg', 600.00, 1, 600.00, '2025-08-12 23:12:52'),
(12, 'Makhni Daal', 'admin/img/daal.jpeg', 350.00, 1, 350.00, '2025-08-12 23:12:52'),
(13, 'Biryani', 'admin/img/biryani.jpeg', 350.00, 1, 350.00, '2025-08-12 23:12:52'),
(14, 'Soup', 'admin/img/images.jpeg', 500.00, 1, 500.00, '2025-08-12 23:12:52'),
(15, 'Makhni Daal', 'admin/img/daal.jpeg', 350.00, 1, 350.00, '2025-08-12 23:12:52'),
(16, 'Corn Soup', 'admin/img/images.jpeg', 500.00, 3, 1500.00, '2025-08-12 23:12:52'),
(17, 'Makhni Handi', 'admin/img/handi.jpeg', 1100.00, 1, 1100.00, '2025-08-12 23:12:52'),
(18, 'Munchurian with Rice', 'admin/img/mr.jpeg', 750.00, 1, 750.00, '2025-08-12 23:12:52'),
(19, 'Pizza', 'admin/img/pizza.jpeg', 800.00, 1, 800.00, '2025-08-12 23:12:52'),
(20, 'Chicken Biryani', 'admin/img/biryani.jpeg', 350.00, 3, 1050.00, '2025-08-12 23:12:52'),
(21, 'Corn Soup', 'admin/img/images.jpeg', 500.00, 2, 1000.00, '2025-08-12 23:12:52'),
(22, 'Makhni Daal', 'admin/img/daal.jpeg', 350.00, 1, 350.00, '2025-08-12 23:12:52'),
(23, 'Dynamic Chicken', 'admin/img/dc.jpeg', 600.00, 1, 600.00, '2025-08-12 23:12:52'),
(24, 'Chicken Broast', 'admin/img/b.jpeg', 550.00, 1, 550.00, '2025-08-18 17:44:40'),
(25, 'Beef Kabab', 'admin/img/bbq.jpeg', 620.00, 2, 1240.00, '2025-08-18 17:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `table_bookings`
--

CREATE TABLE `table_bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `persons` int(11) NOT NULL,
  `booking_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_bookings`
--

INSERT INTO `table_bookings` (`id`, `name`, `phone`, `email`, `persons`, `booking_date`) VALUES
(1, 'duaaaaaaaaaaa', '5478746', 'duaaaa@gmail.com', 2, '2025-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `pass` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `pass`) VALUES
(4, 'waj', 'batool@gmail.com', '123'),
(5, 'wajeeha ', 'batool123@gmail.com', '123456'),
(6, 'wajeeha ', 'wajeeha@gmail.com', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_bookings`
--
ALTER TABLE `table_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `table_bookings`
--
ALTER TABLE `table_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `cat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
