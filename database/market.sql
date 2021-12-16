-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 05:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_payment` timestamp NOT NULL DEFAULT current_timestamp(),
  `result_code` varchar(2) NOT NULL,
  `amount` double NOT NULL,
  `ref_no` varchar(15) NOT NULL,
  `gbp_ref_no` varchar(15) NOT NULL,
  `currency_code` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `customer_id`, `product_id`, `date_order`, `date_payment`, `result_code`, `amount`, `ref_no`, `gbp_ref_no`, `currency_code`) VALUES
(186, 2147483647, 2, '2021-12-16 03:59:15', '2021-12-16 03:59:15', '00', 75, '201212724', 'gbp149411989712', ''),
(187, 2147483647, 4, '2021-12-16 04:00:39', '2021-12-16 04:00:39', '05', 32, '201212731', 'gbp149411989713', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `price` float NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `detail`, `price`, `img`) VALUES
(1, 'OPPO A53', 'มือถือ OPPO A53', 25, 'https://cdn.siamphone.com/spec/oppo/images/a53/oppo_a53_1.jpg'),
(2, 'Xiaomi 11T Pro', 'มือถือ Xiaomi 11T Pro', 75, 'https://cdn.siamphone.com/spec/xiaomi/images/11t_pro/xiaomi_11t_pro_1.jpg'),
(3, 'Samsung Galaxy A03s', 'มือถือ Samsung Galaxy A03s', 41, 'https://cdn.siamphone.com/spec/samsung/images/galaxy_a03s/samsung_galaxy_a03s_1.jpg'),
(4, 'Redmi 10', 'มือถือ Redmi 10', 32, 'https://cdn.siamphone.com/spec/redmi/images/10/redmi_10_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
