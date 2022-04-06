-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 10:51 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` varchar(8888) NOT NULL,
  `price` float NOT NULL,
  `total_products` int(11) NOT NULL,
  `product_preview_link` varchar(3000) NOT NULL,
  `product_image_link` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `name`, `author`, `description`, `price`, `total_products`, `product_preview_link`, `product_image_link`) VALUES
(1, 4, 'Pride and Prejudice', 'Jane Austen', 'One of the best important book.', 150, 20, 'Assets/BookPreviews/1.pdf', 'Assets/BookImages/1.jpg'),
(2, 4, 'Emma', 'Jane Austen', 'Great book with great outcomes.', 185, 25, 'Assets/BookPreviews/2.pdf', 'Assets/BookImages/2.jpg'),
(3, 2, 'The Art of War', 'Sun Tzu', 'The truth inner way of every battle must overcome the righteousness.', 215, 30, 'Assets/BookPreviews/3.pdf', 'Assets/BookImages/3.jpg'),
(4, 2, 'Adventures of Huckleberry Finn', 'Mark Twain', 'Adventures of Huckleberry Finn one of the best series.', 100, 20, 'Assets/BookPreviews/4.pdf', 'Assets/BookImages/4.jpg'),
(5, 3, 'Alice in Wonderland', 'Lewis Carroll', 'Alice in Wonderland one of the best stories.', 340, 29, 'Assets/BookPreviews/5.pdf', 'Assets/BookImages/5.jpg'),
(6, 3, 'Collected Works of Poe', 'Edgar Allan Poe', 'Collected Works of Poe is a fantasy book.', 268, 27, 'Assets/BookPreviews/6.pdf', 'Assets/BookImages/6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book_cart`
--

CREATE TABLE `book_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_cart`
--

INSERT INTO `book_cart` (`id`, `user_id`, `product_id`, `user_name`, `product_name`, `price`) VALUES
(1, 4, 5, 'Samin', 'Alice in Wonderland', 340),
(2, 4, 5, 'Samin', 'Alice in Wonderland', 340),
(3, 4, 4, 'Samin', 'Adventures of Huckleberry Finn', 100),
(4, 4, 3, 'Samin', 'The Art of War', 215),
(5, 4, 5, 'Samin', 'Alice in Wonderland', 340);

-- --------------------------------------------------------

--
-- Table structure for table `book_purchase`
--

CREATE TABLE `book_purchase` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Action & Adventure'),
(3, 'Fantasy'),
(4, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `location` varchar(2550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `name`, `password`, `role`, `location`) VALUES
(1, 'admin', 'admin@gmail.com', 'Admin', '18301028', 'admin', 'Dhaka, Bangladesh'),
(2, 'sam123', 'sam@gmail.com', 'Sam', 'sam@gmail.com', 'user', '2/5, Lalmatia D-Block, Dhaka, Bangladesh - 1294'),
(3, 'mark', 'mark@gmail.com', 'Mark', 'mark@gmail.com', 'user', '4B, Gulshan, Dhaka-1204'),
(4, 'samin', 'samin@gmail.com', 'Samin', 'samin@gmail.com', 'user', '12, Adabor, Dhaka, Bangladesh'),
(5, 'asif', 'asif@gmail.com', 'Asif', 'asif@gmail.com', 'user', '12, Nikunjo, Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `book_cart`
--
ALTER TABLE `book_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `book_purchase`
--
ALTER TABLE `book_purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_purchase`
--
ALTER TABLE `book_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `book_cart`
--
ALTER TABLE `book_cart`
  ADD CONSTRAINT `book_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `book_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `book_purchase`
--
ALTER TABLE `book_purchase`
  ADD CONSTRAINT `book_purchase_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `book_purchase_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
