-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 07:33 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `explorepak1`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `checkout_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `name`, `address`, `mobile`, `checkout_id`) VALUES
(1, 2, 'ilsa', 'B:27,saima plaza gulistan-e-dastagir colony naka, Hyderabad ,71000,pakistan', '7890654321', '607e0316b6e11'),
(2, 3, 'usama', 'shahi bazaar, Hyderabad ,1212,pakistan', '7681112345', '607e28b8a45cb');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'usama@gmail.com', 'usama12'),
(2, 'tabish', 'tabish12'),
(3, 'aliraza', 'aliraza12'),
(4, 'badal', 'badal12');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(255) NOT NULL,
  `pack_id` varchar(100) NOT NULL,
  `pack_name` varchar(200) NOT NULL,
  `pack_img` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `pack_id`, `pack_name`, `pack_img`, `price`, `total_price`, `quantity`, `user_id`) VALUES
(1, '2', 'Naran Kaghan', '\n                      img/nara.jpg', '16990', '33980', '2', 1),
(2, '1', 'Nellum Valley', '\n                      img/neelum.jpg', '16990', '50970', '3', 1),
(3, '7', 'Gorakh Hill', '\n                      img/gorakh.jpg', '14000', '28000', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `name`, `mobile`) VALUES
(1, 'atharilsa@gmail.com', '$2y$10$dUIPVw.J2dAoyoTisoUMnOvUFtfeeUBjn/JXPDKG94A2PbOq./7WG', 'ilsa usama', '7890654321'),
(2, 'usama@gmail.com', '$2y$10$lywn1Esl/9FafT.7VsuGpuDkS3X8vsgn/c/dftpHORJz95FB5b3B6', 'usama', '71234567897');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `sno` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `pack_id` varchar(200) NOT NULL,
  `pack_name` varchar(255) NOT NULL,
  `img` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date_of_purchase` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `paid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`sno`, `order_id`, `pack_id`, `pack_name`, `img`, `price`, `quantity`, `total_price`, `user_id`, `date_of_purchase`, `status`, `payment_method`, `paid`) VALUES
(1, '10782366193', '7', 'Gorakh Hill', '\n                      img/gorakh.jpg', '14000', 1, '14000', '3', '2021-04-20 02:54:52', 'order placed', 'COD', 'no'),
(2, '2923769593', '4', 'Azad Kashmir', '\n                      img/kashmir.jpg', '29999', 1, '29999', '3', '2021-04-20 02:54:52', 'order placed', 'COD', 'no'),
(3, '3851452423', '7', 'Gorakh Hill', '\n                      img/gorakh.jpg', '14000', 1, '14000', '3', '2021-04-20 03:05:20', 'order placed', 'COD', 'no'),
(4, '21073201993', '4', 'Azad Kashmir', '\n                      img/kashmir.jpg', '29999', 1, '29999', '3', '2021-04-20 03:05:20', 'order placed', 'COD', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `order_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`id`, `address_id`, `order_id`) VALUES
(1, 2, '3851452423'),
(2, 2, '21073201993');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `pack_id` int(11) NOT NULL,
  `pack_name` varchar(200) NOT NULL,
  `pack_img` varchar(300) NOT NULL,
  `guide` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `hotel` varchar(200) NOT NULL,
  `stay` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`pack_id`, `pack_name`, `pack_img`, `guide`, `price`, `category`, `hotel`, `stay`) VALUES
(1, 'Nellum Valley', 'img/neelum.jpg', 'Mr Ali Raza Lalani', 16990, '3 Star Package', 'Green Village Resort', '3 days 2 nights'),
(2, 'Naran Kaghan', 'img/nara.jpg', 'Mr Usama Rajput', 16990, '3 Star Package', 'Centurion Hotel', '3 days 2 nights'),
(3, 'Swat Valley', 'img/swat.jpg', 'Mr Tabish Rehmatullah', 29999, '4 Star Package', 'Hotel Hilton Palace', '5 days 4 nights'),
(4, 'Azad Kashmir', 'img/kashmir.jpg', 'Mr Badal Lohana', 29999, '4 Star Package', 'Shalimar Hotel', '5 days 4 nights'),
(5, 'Hunza Valley', 'img/hunza.jpg', 'Mr Ali Raza Lalani', 48000, '5 Star Package', 'Pearl Continental Hotel', '7 days 6 nights'),
(6, 'Murree Hills', 'img/murree.jpg', 'Mr Usama Rajput', 45000, '5 Star Package', 'Hotel One Bhurban', '7 days 6 nights'),
(7, 'Gorakh Hill', 'img/gorakh.jpg', 'Mr Tabish Rehmatullah', 14000, '3 Star Package', 'Gorakh Summer Huts', '3 days 2 nights'),
(8, 'Swat Valley', 'img/swat1.jpg', 'Mr Badal Lohana', 29999, '4 Star Package', 'Marriot Hotel', '5 days 4 nights'),
(9, 'Gilgit Valley ', 'img/hunza1.jpg', 'Mr Ali Raza Lalani', 48000, '5 star Package', 'Palm Hotel', '7 days 6 nights');

-- --------------------------------------------------------

--
-- Table structure for table `profile_images`
--

CREATE TABLE `profile_images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tab_cart`
--

CREATE TABLE `tab_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indexes for table `profile_images`
--
ALTER TABLE `profile_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_cart`
--
ALTER TABLE `tab_cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profile_images`
--
ALTER TABLE `profile_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_cart`
--
ALTER TABLE `tab_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
