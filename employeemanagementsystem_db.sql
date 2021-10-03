-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 06:50 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeemanagementsystem_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(20) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `manager_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`, `manager_id`) VALUES
(1, 'IT', 102),
(2, 'Human Resource', 102),
(3, 'Finance', 103),
(4, 'Sales', 101),
(5, 'Marketing', 101),
(6, 'Production', 104),
(7, 'Customer Support', 103);

-- --------------------------------------------------------

--
-- Table structure for table `employee_table`
--

CREATE TABLE `employee_table` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` double NOT NULL,
  `department_id` int(20) NOT NULL,
  `salary` int(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_table`
--

INSERT INTO `employee_table` (`id`, `name`, `email`, `phone`, `department_id`, `salary`, `address`) VALUES
(21, 'Himanshi Tiwari', 'tiwari@gmail.com', 476546546, 3, 1, 'ukhimath uttarakhand India...'),
(26, 'sarvam', 'cnccj@shsdd.cddlk', 467867864, 1, 5, 'dfvgbgb Dehradun Uttarakhand '),
(29, 'OM', 'kkshfjdfhgd@dagwe.hsdf', 47687678, 4, 3, 'hdvjhjvh Ukhimath UK INDIA'),
(31, 'dabbu', 'dfkhsjhjfh@fdhagf.fsjk', 8788347573, 3, 6, 'fvxbgb'),
(33, 'Gullu', 'gullu@gullu.com', 6768779798798, 2, 2, 'vghgfhgfghfjhj'),
(34, 'Himanshi', 'sghg@gmail.com', 64757362562, 1, 4, 'hvjhxjfh UK'),
(35, 'pinki', 'pinki@outlook.com', 778568256, 2, 3, 'Dehradun');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(255) NOT NULL,
  `manager_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `manager_name`) VALUES
(101, 'Suhani'),
(102, 'Ankit'),
(103, 'Shaksam'),
(104, 'Joy');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `grade` int(20) NOT NULL,
  `min_salary` double NOT NULL,
  `max_salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`grade`, `min_salary`, `max_salary`) VALUES
(1, 10000, 15000),
(2, 15001, 25000),
(3, 25001, 35000),
(4, 35001, 45000),
(5, 45001, 55000),
(6, 55001, 65000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `manager_foreign_key` (`manager_id`);

--
-- Indexes for table `employee_table`
--
ALTER TABLE `employee_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `salary_foreign_key` (`salary`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`grade`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_table`
--
ALTER TABLE `employee_table`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `manager_foreign_key` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`manager_id`);

--
-- Constraints for table `employee_table`
--
ALTER TABLE `employee_table`
  ADD CONSTRAINT `employee_table_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`d_id`),
  ADD CONSTRAINT `salary_foreign_key` FOREIGN KEY (`salary`) REFERENCES `salary` (`grade`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
