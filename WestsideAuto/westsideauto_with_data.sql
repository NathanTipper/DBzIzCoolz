-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2018 at 12:56 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `westsideauto`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `drivers_license_no` varchar(25) NOT NULL,
  `TaxID` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `province` varchar(25) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `DOB` date DEFAULT NULL,
  `phone_no` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `damage`
--

CREATE TABLE `damage` (
  `dmg_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  `est_cost` int(11) NOT NULL,
  `actual_cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(11) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `city` varchar(30) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `province` varchar(25) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `date_purchased` date NOT NULL,
  `price_sold` int(11) NOT NULL,
  `down_payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentID` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `no_payments_made` int(11) NOT NULL,
  `no_late_payments` int(11) DEFAULT NULL,
  `bank_info` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `purchase_ID` int(11) NOT NULL,
  `date_of_purchase` date NOT NULL,
  `seller` varchar(60) NOT NULL,
  `isAuction` tinyint(1) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `r_customerpayments`
--

CREATE TABLE `r_customerpayments` (
  `paymentID` int(11) NOT NULL,
  `drivers_license_no` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `r_purchasedrelationship`
--

CREATE TABLE `r_purchasedrelationship` (
  `purchase_ID` int(11) NOT NULL,
  `VIN` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `r_soldby`
--

CREATE TABLE `r_soldby` (
  `empid` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `r_soldto`
--

CREATE TABLE `r_soldto` (
  `drivers_license_no` varchar(25) NOT NULL,
  `invoice_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `r_vehicledamage`
--

CREATE TABLE `r_vehicledamage` (
  `VIN` varchar(25) CHARACTER SET utf8 NOT NULL,
  `dmg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_vehiclesold`
--

CREATE TABLE `r_vehiclesold` (
  `invoice_no` int(11) NOT NULL,
  `VIN` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `r_vehicleunderwarranty`
--

CREATE TABLE `r_vehicleunderwarranty` (
  `warranty_name` varchar(50) NOT NULL,
  `VIN` varchar(25) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `VIN` varchar(25) NOT NULL,
  `price` int(11) NOT NULL,
  `book_price` int(11) NOT NULL,
  `make` varchar(20) NOT NULL,
  `model` varchar(30) NOT NULL,
  `trim` varchar(25) NOT NULL,
  `year` year(4) NOT NULL,
  `color` varchar(20) NOT NULL,
  `current_condition` varchar(25) NOT NULL,
  `km` int(11) NOT NULL,
  `style` varchar(35) NOT NULL,
  `interior_color` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `warranty`
--

CREATE TABLE `warranty` (
  `warranty_name` varchar(50) NOT NULL,
  `length` int(11) NOT NULL,
  `cost` double NOT NULL,
  `deductible` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`drivers_license_no`);

--
-- Indexes for table `damage`
--
ALTER TABLE `damage`
  ADD PRIMARY KEY (`dmg_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`purchase_ID`);

--
-- Indexes for table `r_customerpayments`
--
ALTER TABLE `r_customerpayments`
  ADD UNIQUE KEY `paymentID` (`paymentID`),
  ADD UNIQUE KEY `drivers_license_no` (`drivers_license_no`);

--
-- Indexes for table `r_purchasedrelationship`
--
ALTER TABLE `r_purchasedrelationship`
  ADD UNIQUE KEY `purchase_ID_Index` (`purchase_ID`),
  ADD UNIQUE KEY `VIN_Purchase_Index` (`VIN`);

--
-- Indexes for table `r_soldby`
--
ALTER TABLE `r_soldby`
  ADD UNIQUE KEY `invoice_no` (`invoice_no`),
  ADD KEY `empid` (`empid`) USING BTREE;

--
-- Indexes for table `r_soldto`
--
ALTER TABLE `r_soldto`
  ADD UNIQUE KEY `invoice_no` (`invoice_no`),
  ADD KEY `drivers_license_no` (`drivers_license_no`) USING BTREE;

--
-- Indexes for table `r_vehicledamage`
--
ALTER TABLE `r_vehicledamage`
  ADD KEY `vehicle_dmg` (`VIN`),
  ADD KEY `damage_vehicle` (`dmg_id`);

--
-- Indexes for table `r_vehiclesold`
--
ALTER TABLE `r_vehiclesold`
  ADD UNIQUE KEY `invoice_no` (`invoice_no`),
  ADD UNIQUE KEY `VIN_const_2` (`VIN`) USING BTREE;

--
-- Indexes for table `r_vehicleunderwarranty`
--
ALTER TABLE `r_vehicleunderwarranty`
  ADD KEY `warranty_name_index` (`warranty_name`) USING BTREE,
  ADD KEY `VIN` (`VIN`) USING BTREE;

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`VIN`);

--
-- Indexes for table `warranty`
--
ALTER TABLE `warranty`
  ADD PRIMARY KEY (`warranty_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `damage`
--
ALTER TABLE `damage`
  MODIFY `dmg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `purchase_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `r_customerpayments`
--
ALTER TABLE `r_customerpayments`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `r_soldby`
--
ALTER TABLE `r_soldby`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `r_soldto`
--
ALTER TABLE `r_soldto`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `r_vehiclesold`
--
ALTER TABLE `r_vehiclesold`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `r_customerpayments`
--
ALTER TABLE `r_customerpayments`
  ADD CONSTRAINT `drivers_license_const` FOREIGN KEY (`drivers_license_no`) REFERENCES `customer` (`drivers_license_no`),
  ADD CONSTRAINT `payments_ID_Const` FOREIGN KEY (`paymentID`) REFERENCES `payments` (`paymentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `r_purchasedrelationship`
--
ALTER TABLE `r_purchasedrelationship`
  ADD CONSTRAINT `VIN_constraint` FOREIGN KEY (`VIN`) REFERENCES `vehicle` (`VIN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_id_const` FOREIGN KEY (`purchase_ID`) REFERENCES `purchased` (`purchase_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `r_soldby`
--
ALTER TABLE `r_soldby`
  ADD CONSTRAINT `empid_const` FOREIGN KEY (`empid`) REFERENCES `employee` (`empid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_no_constraint` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);

--
-- Constraints for table `r_soldto`
--
ALTER TABLE `r_soldto`
  ADD CONSTRAINT `drivers_license_no_constraint` FOREIGN KEY (`drivers_license_no`) REFERENCES `customer` (`drivers_license_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_const` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `r_vehicledamage`
--
ALTER TABLE `r_vehicledamage`
  ADD CONSTRAINT `damage_vehicle` FOREIGN KEY (`dmg_id`) REFERENCES `damage` (`dmg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicle_damage` FOREIGN KEY (`VIN`) REFERENCES `vehicle` (`VIN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `r_vehiclesold`
--
ALTER TABLE `r_vehiclesold`
  ADD CONSTRAINT `VIN_const_2` FOREIGN KEY (`VIN`) REFERENCES `vehicle` (`VIN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_no_constr` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `r_vehicleunderwarranty`
--
ALTER TABLE `r_vehicleunderwarranty`
  ADD CONSTRAINT `VIN_warranty` FOREIGN KEY (`VIN`) REFERENCES `vehicle` (`VIN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `warranty_name_constraint` FOREIGN KEY (`warranty_name`) REFERENCES `warranty` (`warranty_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
