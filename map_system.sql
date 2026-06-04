-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2026 at 04:02 PM
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
-- Database: `map_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `role`) VALUES
(1, 'Γιάννης', 'Παπαδόπουλος', 'Ηλεκτρολόγος'),
(2, 'Μαρία', 'Αντωνίου', 'Χειρίστρια Μηχανημάτων'),
(3, 'Κώστας', 'Νικολάου', 'Εργάτης Αποθήκης');

-- --------------------------------------------------------

--
-- Table structure for table `issuances`
--

CREATE TABLE `issuances` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `issue_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issuances`
--

INSERT INTO `issuances` (`id`, `employee_id`, `item_id`, `issue_date`) VALUES
(1, 1, 1, '2026-05-23'),
(2, 1, 3, '2026-05-23'),
(3, 2, 3, '2026-05-23'),
(4, 2, 2, '2026-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `ppe_items`
--

CREATE TABLE `ppe_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `stock_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ppe_items`
--

INSERT INTO `ppe_items` (`id`, `item_name`, `stock_quantity`) VALUES
(1, 'Κράνος Ασφαλείας (Κίτρινο)', 50),
(2, 'Γάντια Εργασίας (Δερμάτινα)', 119),
(3, 'Γυαλιά Προστασίας', 79),
(4, 'Φόρμα Εργασίας (Ολόσωμη)', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issuances`
--
ALTER TABLE `issuances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `ppe_items`
--
ALTER TABLE `ppe_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `issuances`
--
ALTER TABLE `issuances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ppe_items`
--
ALTER TABLE `ppe_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issuances`
--
ALTER TABLE `issuances`
  ADD CONSTRAINT `issuances_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `issuances_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `ppe_items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
