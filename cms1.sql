-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2020 at 02:58 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms1`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `doctor_id` varchar(50) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `receptionist_id` varchar(50) NOT NULL,
  `is_emergency` varchar(5) NOT NULL,
  `reason` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `room_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`doctor_id`, `patient_id`, `receptionist_id`, `is_emergency`, `reason`, `date`, `time`, `room_no`) VALUES
('doc001', 'pa001', 'rec001', 'no', 'for dscikn sdvanv fnrwf wfvnwv ', '2020-01-02', '09:30:00', 3),
('doc001', 'pa0010', 'rec001', 'no', 'for dscikn sdvanv fnrwf wfvnwv ', '2020-01-02', '09:30:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_request`
--

CREATE TABLE `appointment_request` (
  `patient_id` varchar(50) NOT NULL,
  `doctor_id` varchar(50) NOT NULL,
  `reason` text NOT NULL,
  `is_emergency` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_request`
--

INSERT INTO `appointment_request` (`patient_id`, `doctor_id`, `reason`, `is_emergency`, `date`, `timestamp`) VALUES
('pa0010', 'doc001', 'for saf fa agh fa', 'no', '2020-01-01', '2019-12-31 14:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `doctor_id` varchar(50) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `laboratorist_id` varchar(50) NOT NULL,
  `requested_tests` longtext NOT NULL,
  `lab_results` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `laboratory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`doctor_id`, `patient_id`, `laboratorist_id`, `requested_tests`, `lab_results`, `date`, `laboratory_id`) VALUES
('doc001', 'pa001', 'lab001', 'blood', 'negative', '2019-12-31 17:02:15', 1),
('doc001', 'pa002', 'lab001', 'blood', 'positive', '2019-12-31 17:03:40', 2);

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `doctor_id` varchar(50) NOT NULL,
  `symptoms` longtext NOT NULL,
  `labratory_id` varchar(50) NOT NULL,
  `diagnosis` longtext NOT NULL,
  `prescription_id` varchar(50) NOT NULL,
  `receptionist_id` varchar(50) NOT NULL,
  `additional_note` longtext DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`id`, `patient_id`, `doctor_id`, `symptoms`, `labratory_id`, `diagnosis`, `prescription_id`, `receptionist_id`, `additional_note`, `date`) VALUES
(1, 'pa001', 'doc001', 'fah fuhef efuhef ewfuhwrgf wuhw wfuhwf ', '1', 'sdgads wfd wrg rg rg  wrg rrgrewgqr', '1', 'rec001', 'jfgh gf hjbj', '2019-12-31 17:04:08'),
(2, 'pa002', 'doc001', 'fah fuhef efuhef ewfuhwrgf wuhw wfuhwf ', '2', 'sdgads wfd wrg rg rg  wrg rrgrewgqr', '2', 'rec001', 'jfgh gf hjbj', '2019-12-31 17:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `size` int(11) NOT NULL,
  `usage_detail` text NOT NULL,
  `is_injection` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `name`, `size`, `usage_detail`, `is_injection`) VALUES
('001', 'omeprazole', 12, 'morning 1 night 1', 'no'),
('002', 'Dextromethorphan', 50, 'morning 1 night 1 ---- 10ml', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_request`
--

CREATE TABLE `medicine_request` (
  `medicine_name` text NOT NULL,
  `amount` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL,
  `doctor_id` varchar(50) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `medicine_id` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `doctor_id`, `patient_id`, `medicine_id`, `date`) VALUES
(1, 'doc001', 'pa001', '001', '2019-12-31 16:49:33'),
(2, 'doc001', 'pa002', '002', '2019-12-31 16:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `id` int(5) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `doctor_id` varchar(50) NOT NULL,
  `symptoms` text DEFAULT NULL,
  `laboratory_id` varchar(50) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `prescription_id` varchar(50) DEFAULT NULL,
  `additional_note` text DEFAULT NULL,
  `nurse_id` varchar(50) DEFAULT NULL,
  `receptionist_id` varchar(50) NOT NULL,
  `room_no` int(11) NOT NULL,
  `is_treated` varchar(10) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`id`, `patient_id`, `doctor_id`, `symptoms`, `laboratory_id`, `diagnosis`, `prescription_id`, `additional_note`, `nurse_id`, `receptionist_id`, `room_no`, `is_treated`, `date`) VALUES
(1, 'pa001', 'doc001', NULL, NULL, NULL, NULL, NULL, NULL, 'rec001', 2, '1', '2019-12-31 19:44:52'),
(3, 'pa002', 'doc001', NULL, NULL, NULL, NULL, NULL, NULL, 'rec001', 2, '1', '2020-01-03 12:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `referal`
--

CREATE TABLE `referal` (
  `doctor_id` varchar(50) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `referal_to` text NOT NULL,
  `referal_reason` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `special_food_request`
--

CREATE TABLE `special_food_request` (
  `doctor_id` varchar(50) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `reason` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(10) NOT NULL,
  `full_name` text NOT NULL,
  `age` int(11) NOT NULL,
  `gender` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `emergency_contact` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `age`, `gender`, `address`, `phone_number`, `email`, `emergency_contact`, `password`, `role`) VALUES
('doc001', 'Elias Amha Teshome', 26, 'M', 'adama bole', '+251943149882', 'elias@doctor.com', '+251978784659', 'elias', 'doctor'),
('doc002', 'bilise hussien obsa', 25, 'F', 'adama 04', '+251916005844', 'bilise@doctor.com', '+251978451236', 'bilise', 'doctor'),
('lab001', 'Mr laboratorist', 29, 'M', 'adama 02', '+251978965412', 'lab@laboratorist.com', '+251978451236', 'lab001', 'laboratorist'),
('lab002', 'Ms laboratorist', 28, 'F', 'adama posta', '+251956238475', 'lab@laboratorist.com', '+251978459631', 'lab002', 'laboratorist'),
('man', 'Mr manager', 38, 'M', 'adama bole', '+251978639512', 'man@manager.com', '+251985632147', 'man', 'manager'),
('nur001', 'Ms nurse', 28, 'F', 'adama 02', '+251978965412', 'nur@nurse.com', '+251989654831', 'nur001', 'nurse'),
('nur002', 'Ms nurse', 28, 'F', 'adama 02', '+251904432926', 'nur@nurse.com', '+25197878465', 'nur002', 'nurse'),
('pa001', 'Atsnagn Kifle', 26, 'M', 'adama posta', '+251985233113', 'atsnagn@patient.com', '+251912385695', 'pa001', 'patient'),
('pa002', 'Patient 002', 28, 'F', 'Addis Abeba kaliti', '+251904432926', 'patient@patient.com', '+25197878465', 'pa002', 'patient'),
('pha001', 'Mr pharmacist', 28, 'M', 'adama 01', '+251923147856', 'phar@pharmacist.com', '+251978451236', 'pha001', 'pharmacist'),
('pha002', 'Ms pharmacist', 28, 'F', 'adama 05', '+251904432926', 'phar@pharmacist.com', '+251989654831', 'pha002', 'pharmacist'),
('rec001', 'Ms receptionist', 28, 'F', 'adama 03', '+251978965412', 'rec@receptionist.com', '+251989654831', 'rec001', 'receptionist'),
('rec002', 'Ms receptionist 2', 28, 'F', 'adama 03', '+251923147856', 'rec@receptionist.com', '+251978456905', 'rec002', 'receptionist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `appointment_request`
--
ALTER TABLE `appointment_request`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`laboratory_id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `laboratory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
