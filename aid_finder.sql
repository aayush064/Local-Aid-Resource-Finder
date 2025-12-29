-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2025 at 02:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aid_finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `resource_id`, `sender_name`, `sender_email`, `message`, `created_at`) VALUES
(1, 1, 'Aayush Adhikari', 'aayushadh2064@gmail.com', 'I really want to collaborate with you . please mail me as fast as possible regarding this.', '2025-12-29 11:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `name`, `category`, `location`, `description`, `contact`) VALUES
(1, 'Helping Hands Food Bank', 'Food', 'Kathmandu, Nepal', 'Provides free food packages to underprivileged families, including rice, lentils, and vegetables. Open Monday to Saturday.', '+977-9800000001'),
(2, 'HealthFirst Clinic', 'Health', 'Lalitpur, Nepal', 'Offers free basic medical checkups, vaccinations, and health counseling to low-income communities.', '+977-9800000002'),
(3, 'Shelter for All', 'Shelter', 'Bhaktapur, Nepal', 'Temporary shelter for homeless families and individuals, provides bedding and basic necessities.', '+977-9800000003'),
(4, 'Bright Future School', 'Education', 'Pokhara, Nepal', 'Free educational programs for children from disadvantaged backgrounds, including literacy and computer skills.', '+977-9800000004'),
(5, 'Good Health Mobile Clinic', 'Health', 'Kathmandu, Nepal', 'Mobile medical unit visiting rural areas weekly, providing general health checkups and medicines.', '+977-9800000005'),
(6, 'Food for Hope', 'Food', ' Lalitpur, Nepal', 'Daily free meals for street children and elderly people, supported by local volunteers.', '+977-9800000006'),
(7, 'Community Learning Center', 'Education', 'Bhaktapur, Nepal', 'Evening classes and skill development workshops for children and adults, free of cost.', '+977-9800000007'),
(8, 'Safe Haven Shelter', 'Shelter', 'Kathmandu, Nepal', 'Offers temporary accommodation and counseling services for women and children escaping domestic violence.', '+977-9800000008'),
(9, 'Rainbow Food Drive', 'Food', 'Pokhara, Nepal', 'Organizes weekly food distribution events for vulnerable families and the elderly.', '+977-9800000009'),
(10, 'Care & Cure Health Center', 'Health', 'Lalitpur, Nepal', 'Free outpatient services including blood tests, general medicine, and health education sessions.', '+977-9800000010');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resource_id` (`resource_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
