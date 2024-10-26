-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 02:21 PM
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
-- Database: `vaccination`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `child_detail_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `vaccine_id`, `child_detail_id`, `date_created`) VALUES
(3, 4, 1, '2024-10-26 10:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `approved_appointments`
--

CREATE TABLE `approved_appointments` (
  `id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `child_detail_id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `schedule_time` time NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approved_appointments`
--

INSERT INTO `approved_appointments` (`id`, `vaccine_id`, `child_detail_id`, `schedule_date`, `schedule_time`, `date_created`) VALUES
(1, 3, 1, '0000-00-00', '00:00:00', '2024-10-24 17:03:54'),
(2, 3, 1, '2024-10-12', '12:13:00', '2024-10-24 17:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `email`, `password`, `date_created`) VALUES
(6, 'sabeer@gmail.com', '$2y$10$zZvYTMpcofwsLilCPPxx9OH.XeSDmlM76/OLfdGZsTmAkdwpnEpnu', '2024-10-20 07:36:58'),
(7, 'syedsabeer@gmail.com', '$2y$10$fKalMBoLyOMN3HMu9epWG.vjemdY8Ez52bxP59rJCH1ezaPA4L8ki', '2024-10-26 07:03:27'),
(8, 'sabeer2@gmail.com', '$2y$10$GGsDT58acYQBqkrjDwVII.vvoxPjZ8rYI8IhjktQHMmNhKJ06Bq1a', '2024-10-26 07:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `child_detail`
--

CREATE TABLE `child_detail` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `bloodgroup` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_detail`
--

INSERT INTO `child_detail` (`id`, `child_id`, `firstname`, `middlename`, `lastname`, `bloodgroup`, `age`, `city`, `gender`, `address`) VALUES
(1, 6, 'Syed', 'Sabeer', 'Faisal', 'B+', 18, 'Karachi', 'male', 'random lorem ipsum'),
(2, 8, 'Syed', 'Sabeer', 'Faisal', 'jh', 7, 'jk', 'jk', 'jkl');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `email` varchar(400) NOT NULL,
  `password` varchar(400) NOT NULL,
  `name` varchar(300) NOT NULL,
  `city` varchar(300) NOT NULL,
  `address` varchar(500) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `email`, `password`, `name`, `city`, `address`, `date_created`) VALUES
(1, 'sabeer@gmail.com', '$2y$10$r/zcwJJ6he7KNKyuuK3MKeOOA25eXsafzt07fMmUtPCah05CwBNBq', 'sabeer', 'sabeer', 'sabeer', '2024-10-23 15:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_appointments`
--

CREATE TABLE `rejected_appointments` (
  `id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `child_detail_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `child_detail_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `approved_appointments_id` int(11) NOT NULL,
  `ph` decimal(3,1) DEFAULT NULL,
  `blood_type` varchar(3) DEFAULT NULL,
  `hemoglobin` decimal(4,1) DEFAULT NULL,
  `other_details` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `child_detail_id`, `vaccine_id`, `approved_appointments_id`, `ph`, `blood_type`, `hemoglobin`, `other_details`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, 5.0, 'jhj', 4.0, 'hjkhjk', '2024-10-26 09:07:11', '2024-10-26 09:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `availability` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `hospital_id`, `name`, `availability`, `image`, `description`) VALUES
(2, 1, 'sabeer', 'unavailable', './uploads/Untitled design (3).png', 'sabeer'),
(3, 1, 'Sabeer', 'available', './uploads/Untitled design (1).png', 'klsdfnsdklfnv'),
(4, 1, 'Covid Vaccine', 'available', './uploads/2024-10-15 10_34_25.032.png', 'sfdklfjslf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_fk_child` (`child_detail_id`),
  ADD KEY `appointment_fk_vaccine` (`vaccine_id`);

--
-- Indexes for table `approved_appointments`
--
ALTER TABLE `approved_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaccine_fk_approve` (`vaccine_id`),
  ADD KEY `child_fk_approve` (`child_detail_id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_detail`
--
ALTER TABLE `child_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_detail_fk` (`child_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejected_appointments`
--
ALTER TABLE `rejected_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_fk_reject` (`child_detail_id`),
  ADD KEY `vaccine_fk_reject` (`vaccine_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_detail_id` (`child_detail_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `approved_appointments_id` (`approved_appointments_id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaccine_fk` (`hospital_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `approved_appointments`
--
ALTER TABLE `approved_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `child_detail`
--
ALTER TABLE `child_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rejected_appointments`
--
ALTER TABLE `rejected_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_fk_child` FOREIGN KEY (`child_detail_id`) REFERENCES `child_detail` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `appointment_fk_vaccine` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `approved_appointments`
--
ALTER TABLE `approved_appointments`
  ADD CONSTRAINT `child_fk_approve` FOREIGN KEY (`child_detail_id`) REFERENCES `child_detail` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vaccine_fk_approve` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `child_detail`
--
ALTER TABLE `child_detail`
  ADD CONSTRAINT `child_detail_fk` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rejected_appointments`
--
ALTER TABLE `rejected_appointments`
  ADD CONSTRAINT `child_fk_reject` FOREIGN KEY (`child_detail_id`) REFERENCES `child_detail` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vaccine_fk_reject` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`child_detail_id`) REFERENCES `child_detail` (`id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccine` (`id`),
  ADD CONSTRAINT `report_ibfk_3` FOREIGN KEY (`approved_appointments_id`) REFERENCES `approved_appointments` (`id`);

--
-- Constraints for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD CONSTRAINT `vaccine_fk` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
