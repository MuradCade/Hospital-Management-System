-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 07:08 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `p_fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `p_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `doctor_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `department_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `uid`, `p_fname`, `p_phone`, `doctor_name`, `department_name`, `date_time`) VALUES
(3, 1, 'mumin', '2', 'doctor', 'Department', '2022-12-14'),
(5, 5, 'murad', '6544567', 'doctor', 'Department', '2022-12-14'),
(6, 5, 'heeeello', '4', 'doctor1', 'Department', '2022-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(4) NOT NULL,
  `dept_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(4) NOT NULL,
  `h_img` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `h_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `h_address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `h_email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `h_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `h_mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `h_img`, `h_name`, `h_address`, `h_email`, `h_phone`, `h_mobile`) VALUES
(1, 'pharm.webp', 'kalkaal', 'jigjiga', 'kalkaal12@hospital.com', '323224', '4224442');

-- --------------------------------------------------------

--
-- Table structure for table `labtest`
--

CREATE TABLE `labtest` (
  `id` int(4) NOT NULL,
  `p_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `p_phone` int(20) NOT NULL,
  `p_ailment` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lab_test` varchar(490) COLLATE utf8_unicode_ci NOT NULL,
  `lab_result` varchar(490) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `labtest`
--

INSERT INTO `labtest` (`id`, `p_name`, `p_phone`, `p_ailment`, `lab_test`, `lab_result`, `date`, `timestamp`) VALUES
(12, 'cdscdc', 23, 'cdscdsc', 'csdcdsc', 'csdcdsc', '2022-12-06', '2022-12-16 20:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(4) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('admin','doctor','register','lab','patient','pharmacy') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `pwd`, `role`) VALUES
(1, 'register', 'test', 'register'),
(2, 'admin', 'admin12', 'admin'),
(3, 'doctor', 'doctor', 'doctor'),
(4, 'lab', 'lab', 'lab'),
(5, 'patient', 'test', 'patient'),
(6, 'pharmacy', 'test', 'pharmacy');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(4) NOT NULL,
  `p_fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `p_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `p_address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `p_age` int(10) NOT NULL,
  `p_gender` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `p_ailment` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `p_fee` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `p_entered_date` date DEFAULT NULL,
  `p_leaving_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(4) NOT NULL,
  `p_fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `p_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `doctor_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `department_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `payment_amount` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `p_fname`, `p_phone`, `doctor_name`, `department_name`, `payment_type`, `payment_amount`, `date_time`) VALUES
(1, 'cscsdc', '32424', 'doctor1', 'Department', 'laboratory', '5', '2022-12-12'),
(2, 'murad', '87654', 'cade', 'cdscsdcsd', 'zaad', '10', '2022-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `id` int(4) NOT NULL,
  `med_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `med_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `med_quantity` int(10) NOT NULL,
  `expire_date` date NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`id`, `med_name`, `med_price`, `med_quantity`, `expire_date`, `date`) VALUES
(1, 'panadol', '10', 1, '2022-12-07', '2022-12-07 08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(4) NOT NULL,
  `p_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `p_phone` int(30) NOT NULL,
  `p_age` int(21) NOT NULL,
  `p_ailment` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Prescription` varchar(590) COLLATE utf8_unicode_ci NOT NULL,
  `doctor_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `p_name`, `p_phone`, `p_age`, `p_ailment`, `Prescription`, `doctor_name`, `date`, `status`) VALUES
(4, 'murad', 6544567, 98, 'feafer', 'panadole', 'csdcsdcsdcsd', '2022-12-07', 'unactive');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(4) NOT NULL,
  `fname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `fname`, `img`, `email`, `phone`, `address`) VALUES
(1, 'reception', 'card-img.png', 'example@example.com', '232332', 'cscsdcdscds'),
(2, 'admin', 'doc-icon.png', 'admin@example.com', '32323', 'dfvfdvdfvf'),
(3, 'doctor', 'bg-logo.jpg', 'doctor@example.com', '233232', 'csdcsdcsdc'),
(4, 'labatory', 'bg.jpg', 'lab@example.com', '2322323', 'cdvfdvdfv'),
(5, 'patient', 'bg-logo.jpg', 'patient@example.com', '232332', 'cscsdcdscds'),
(6, 'pharmacy', 'patient.png', 'pharmacy@example.com', '332332', 'cdcsdcsd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labtest`
--
ALTER TABLE `labtest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `labtest`
--
ALTER TABLE `labtest`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
