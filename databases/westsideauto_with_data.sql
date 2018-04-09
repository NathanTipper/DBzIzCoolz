-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2018 at 04:50 AM
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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`drivers_license_no`, `TaxID`, `address`, `city`, `province`, `postal_code`, `first_name`, `last_name`, `gender`, `DOB`, `phone_no`) VALUES
('155285-281', 0, '106 Purdue Ct. W', 'Lethbridge', 'AB', 'T1K4R8', 'Nathan', 'Tipper', 'Male', '1991-07-22', '403-360-6998'),
('198762-755', 0, '122 Red Crow Blvd.', 'Lethbridge', 'AB', 'T1K7J8', 'Jim', 'Pitt', 'Male', '1976-02-13', '403-795-9901'),
('225612-762', 0, '441 Cowichan Crt. W', 'Lethbridge', 'AB', 'T5S3Y3', 'Katelyn', 'Duke', 'Female', '1996-01-29', '403-393-4558'),
('245671-234', 0, '136 6th St S', 'Lethbridge', 'AB', 'T437Y5', 'Adam', 'Varbark', 'Male', '1984-11-09', '403-795-6948'),
('279081-013', 0, '101 Stardew Rd.', 'Calgary', 'AB', 'C5S3X0', 'Shane', 'Tippitappi', 'Male', '1987-04-21', '403-393-8792'),
('345219-213', 0, '598 Canyon Blvd. W', 'Lethbridge', 'AB', 'T1K9P2', 'Carley', 'Herbert', 'Female', '1992-05-09', '403-393-4451'),
('762182-629', 0, '287 5th St N', 'Lethbridge', 'AB', 'T1KH5J', 'Jessica', 'Jones', 'Female', '1984-08-01', '403-360-1369'),
('819221-190', 0, '323 14th St S', 'Lethbridge', 'AB', 'T1KJ7T', 'Francis', 'Duke', 'Male', '1891-03-03', '403-795-5661'),
('965231-901', 0, '119 Jerry Potts Blvd.', 'Lethbridge', 'AB', 'T1K6R3', 'Deborah', 'Smith', 'Female', '1996-09-18', '403-360-2443');

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

--
-- Dumping data for table `damage`
--

INSERT INTO `damage` (`dmg_id`, `description`, `est_cost`, `actual_cost`) VALUES
(1, 'Locks need to be rewired', 890, NULL),
(2, 'Timing chain needs to be replaced', 3120, NULL),
(3, 'Couple of dings need to be fixed up', 1100, NULL),
(4, 'Headlights need replacing', 800, NULL),
(5, 'Needs a new battery', 1800, NULL);

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

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `dept`, `first_name`, `last_name`, `phone_no`, `city`, `postal_code`, `province`, `address`) VALUES
(1, 'Sales', 'Jerry', 'Seinfeld', '4037957123', 'Lethbridge', 'T7N9J2', 'AB', '1001 Uplands Blvd. N'),
(2, 'Mechanic', 'Maria', 'Suarez', '4033600914', 'Lethbridge', 'T2N2V7', 'AB', '421 15th St N'),
(3, 'Sales', 'Rachel', 'Greene', '4033732291', 'Lethbridge', 'T1J2J3', 'AB', '92 Chilcotin Rd. W'),
(4, 'Sales', 'Chandler', 'Bing', '4037955556', 'Lethbridge', 'T6S2Y1', 'AB', '42 16th St. W'),
(5, 'Sales', 'Melissa', 'Kingley', '4033607781', 'Lethbridge', 'T1J3K2', 'AB', '102 Rutgers Rd. W'),
(6, 'Sales', 'Matt', 'Damon', '4037951452', 'Lethbridge', 'T5V4V2', 'AB', '324 Mt. Blakiston Rd. W');

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

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`purchase_ID`, `date_of_purchase`, `seller`, `isAuction`, `location`) VALUES
(1, '2018-04-04', 'Bridge City', 0, 'Lethbridge, Alberta'),
(2, '2018-01-27', 'Balog Auction', 1, 'Lethbridge, Alberta'),
(3, '2018-02-10', 'Ford', 0, 'Edmonton, Alberta'),
(4, '2018-02-06', 'Ford', 0, 'Edmonton, Alberta'),
(5, '2018-03-28', 'Bridge City', 0, 'Lethbridge, Alberta'),
(6, '2017-12-28', 'Harry Lenz Auction', 1, 'Lethbridge, Alberta'),
(7, '2018-03-28', 'Bridge City', 0, 'Lethbridge, Alberta'),
(8, '2018-03-22', 'Honda', 0, 'Calgary, Alberta'),
(9, '2018-01-05', 'Harry Lenz', 1, 'Lethbridge, Alberta'),
(10, '2018-01-22', 'Balog', 1, 'Lethbridge, Alberta'),
(11, '2017-11-30', 'Harry Lenz', 1, 'Lethbridge, Alberta');

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

--
-- Dumping data for table `r_purchasedrelationship`
--

INSERT INTO `r_purchasedrelationship` (`purchase_ID`, `VIN`) VALUES
(1, '233FR398W3RF23145'),
(7, '245PL2RT765WD9P8I'),
(2, '2FRJOI1PSF23145PL'),
(4, '2LAWPSFIBVA72509'),
(3, '3RFR1AYPSF98145PL'),
(9, '85FG3W6Y89CA9023B'),
(8, 'K34R89UA49TPY0M21'),
(6, 'M12RPL81623P32JU2'),
(11, 'O9HNM67540JHA23R2'),
(5, 'P96AP7LYUTA145PL'),
(10, 'U6TRF897F6YCKA30L');

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

--
-- Dumping data for table `r_vehicledamage`
--

INSERT INTO `r_vehicledamage` (`VIN`, `dmg_id`) VALUES
('233FR398W3RF23145', 1),
('233FR398W3RF23145', 2),
('233FR398W3RF23145', 3),
('2FRJOI1PSF23145PL', 4),
('2FRJOI1PSF23145PL', 5);

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

--
-- Dumping data for table `r_vehicleunderwarranty`
--

INSERT INTO `r_vehicleunderwarranty` (`warranty_name`, `VIN`, `start_date`) VALUES
('WestSide Auto Exterior', '3RFR1AYPSF98145PL', '2018-04-01'),
('Gold Package', '2LAWPSFIBVA72509', '2018-03-25'),
('Vehicle Theft', '2LAWPSFIBVA72509', '2018-03-25'),
('WestSide Auto Exterior', 'P96AP7LYUTA145PL', '2018-04-02'),
('Vehicle Theft', 'P96AP7LYUTA145PL', '2018-04-02');

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

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`VIN`, `price`, `book_price`, `make`, `model`, `trim`, `year`, `color`, `current_condition`, `km`, `style`, `interior_color`) VALUES
('233FR398W3RF23145', 10500, 9000, 'Dodge', 'Dart', 'None', 2012, 'Black', 'Good', 100234, 'Sedan', 'Black'),
('245PL2RT765WD9P8I', 5250, 2900, 'Dodge', 'Dakota', 'None', 2009, 'Black', 'Great', 110012, 'Truck', 'Grey'),
('2FRJOI1PSF23145PL', 5000, 2750, 'Volkswagon', 'Jetta', 'None', 2002, 'Grey', 'Poor', 120912, 'Sedan', 'Grey'),
('2LAWPSFIBVA72509', 6900, 3600, 'Ford', 'Focus', 'None', 2010, 'Blue', 'Great', 131910, 'Sedan', 'Grey'),
('3RFR1AYPSF98145PL', 14400, 10900, 'Ford', 'Mustang', 'None', 2014, 'Red', 'Excellent', 80781, 'Other', 'Black'),
('85FG3W6Y89CA9023B', 9800, 5400, 'Hyundai', 'Elantra', 'None', 2012, 'Red', 'Great', 100912, 'Sedan', 'Black'),
('K34R89UA49TPY0M21', 8350, 6100, 'Honda', 'Accord', 'None', 2005, 'Blue', 'Good', 178190, 'Sedan', 'Grey'),
('M12RPL81623P32JU2', 8900, 5100, 'Toyota', 'Camry', 'None', 2010, 'Red', 'Poor', 270982, 'Sedan', 'Black'),
('O9HNM67540JHA23R2', 9500, 4950, 'Chrysler', '200', 'None', 2010, 'Grey', 'Good', 180657, 'Sedan', 'Black'),
('P96AP7LYUTA145PL', 12900, 7800, 'Dodge', 'Challenger', 'None', 2009, 'Orange', 'Excellent', 80623, 'Other', 'Black'),
('U6TRF897F6YCKA30L', 8100, 3100, 'Jeep', 'Wrangler', 'None', 2016, 'Blue', 'Excellent', 60981, 'Offroad', 'Grey');

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
-- Dumping data for table `warranty`
--

INSERT INTO `warranty` (`warranty_name`, `length`, `cost`, `deductible`) VALUES
('Gold Package', 24, 1500, 140),
('Vehicle Theft', 36, 3000, 500),
('WestSide Auto Exterior', 12, 1200, 120);

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
-- AUTO_INCREMENT for table `r_purchasedrelationship`
--
ALTER TABLE `r_purchasedrelationship`
  MODIFY `purchase_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  ADD CONSTRAINT `r_purchase_id_constraint` FOREIGN KEY (`purchase_ID`) REFERENCES `purchased` (`purchase_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
