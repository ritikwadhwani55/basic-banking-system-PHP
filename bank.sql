-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 06:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `transaction` (`p_amount` INTEGER, `p_customer_id` INTEGER, `p_reciever_acc_no` INTEGER)  BEGIN
	update account set current_balance=current_balance-p_amount where customer_id=p_customer_id;
    update account set current_balance=current_balance+p_amount where account_number=p_reciever_acc_no;
    insert into transfers(customer_id,reciever_acc_number,amount) values(p_customer_id,p_reciever_acc_no,p_amount);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_number` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `current_balance` decimal(15,2) DEFAULT NULL,
  `opening_date` date DEFAULT NULL,
  `closing_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_number`, `customer_id`, `current_balance`, `opening_date`, `closing_date`) VALUES
(1000, 1, '34050.00', '2021-01-02', NULL),
(1001, 2, '10400.00', '2021-01-02', NULL),
(1002, 3, '28800.00', '2021-01-03', NULL),
(1003, 4, '19850.00', '2021-01-03', NULL),
(1004, 5, '16000.00', '2021-01-03', NULL),
(1005, 6, '26000.00', '2021-01-03', NULL),
(1006, 7, '11500.00', '2021-01-04', NULL),
(1007, 8, '29000.00', '2021-01-05', NULL),
(1008, 9, '6970.00', '2021-01-06', NULL),
(1009, 10, '6530.00', '2021-01-07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `address` varchar(100) NOT NULL,
  `email_id` varchar(80) NOT NULL,
  `contact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `full_name`, `age`, `gender`, `address`, `email_id`, `contact`) VALUES
(1, 'Ritik Wadhwani', 20, 'M', 'Rose villa,evergreen Complex,Santacruz', 'ritik@gmail.com', 9863259864),
(2, 'Girish Vaswani', 20, 'M', 'Flat no.101,B Wing,Gokuldham Society,evergreen Complex,Santacruz', 'girish@gmail.com', 7635496321),
(3, 'Abhishek Hemwani', 28, 'M', 'Flat no.403,Fortune Apartment,near evergreen Complex,Santacruz', 'abhishek@gmail.com', 9986412203),
(4, 'Megha Shahri', 32, 'F', 'Flat no.802, A Wing,Mayflower Garden,Santacruz', 'megha@gmail.com', 9812359864),
(5, 'Nisha Hemwani', 38, 'F', 'Flat no. 102,Mohan Suburbia ,Santacruz', 'nisha@gmail.com', 9230156864),
(6, 'Harshad Mehta', 43, 'M', 'Flat no. 1101,Rose villa,evergreen Complex,Santacruz', 'harshad@gmail.com', 8763258964),
(7, 'Yash Tanna', 33, 'M', 'Flat no.204,Mohan Puram,Santacruz', 'yash@gmail.com', 7563059864),
(8, 'Chandler Bing', 51, 'M', 'Flat no.702,C wing,Rose villa,evergreen Complex,Santacruz', 'chandler@gmail.com', 8620159864),
(9, 'Kamlesh Gidwani', 34, 'M', 'Flat no. 301,evergreen Complex,Santacruz', 'kamlesh@gmail.com', 8632012365),
(10, 'Anuja Shetye', 20, 'F', 'Flat no. 405,evergreen Complex,Santacruz', 'anuja@gmail.com', 9863252364);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `transfer_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reciever_acc_number` bigint(20) NOT NULL,
  `amount` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`transfer_id`, `customer_id`, `reciever_acc_number`, `amount`) VALUES
(1, 1, 1000, '780.00'),
(2, 4, 1004, '4200.00'),
(3, 3, 1006, '2600.00'),
(4, 3, 1006, '2600.00'),
(5, 1, 1001, '2300.00'),
(7, 1, 1004, '200.00'),
(8, 1, 1004, '100.00'),
(9, 7, 1008, '200.00'),
(11, 1, 1009, '300.00'),
(12, 10, 1008, '670.00'),
(24, 6, 1000, '500.00'),
(25, 4, 1000, '950.00'),
(26, 6, 1000, '500.00'),
(27, 5, 1009, '700.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_number`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`transfer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
