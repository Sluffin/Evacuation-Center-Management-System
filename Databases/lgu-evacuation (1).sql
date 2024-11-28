-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 11:01 AM
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
-- Database: `lgu-evacuation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `evacuees`
--

CREATE TABLE `evacuees` (
  `id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `head_of_family` varchar(50) DEFAULT NULL,
  `evacuation_center` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evacuees`
--

INSERT INTO `evacuees` (`id`, `last_name`, `first_name`, `middle_name`, `suffix`, `contact`, `age`, `gender`, `address`, `head_of_family`, `evacuation_center`) VALUES
(2, 'Reyes', 'Maria', 'Clara', '', '09123456780', 28, 'Female', '456 Bonifacio St, Makati', 'No', 'Evacuation Center 2'),
(3, 'Cruz', 'Jose', 'Miguel', 'III', '09123456781', 45, 'Male', '789 Aguinaldo Ave, Manila', 'Yes', 'Evacuation Center 3'),
(5, 'Villanueva', 'Carlos', 'Alberto', '', '09123456783', 50, 'Male', '654 Sta. Cruz St, Manila', 'Yes', 'Evacuation Center 2'),
(6, 'Alonzo', 'Liza', 'Mae', '', '09123456784', 29, 'Female', '987 San Juan St, San Juan', 'No', 'Evacuation Center 3'),
(7, 'Bautista', 'Mark', 'Anthony', '', '09123456785', 34, 'Male', '135 Malvar St, Batangas', 'Yes', 'Evacuation Center 1'),
(8, 'Dela Cruz', 'Sofia', 'Elena', 'jr', '09123456786', 23, '0', '246 Rizal St, Cebu City', 'No', 'Evacuation Center 2'),
(9, 'Lim', 'Eric', 'Tan', 'II', '09123456787', 52, 'Male', '369 Magsaysay Blvd, Davao City', 'Yes', 'Evacuation Center 3'),
(10, 'Torres', 'Grace', 'Anne', '', '09123456788', 29, 'Female', '159 J.P. Rizal St, Makati', 'No', 'Evacuation Center 1'),
(11, 'Garcia', 'Roberto', 'Luis', 'Sr.', '09123456789', 44, 'Male', '753 Quezon Ave, Quezon City', 'Yes', 'Evacuation Center 2'),
(12, 'Villanueva', 'Patricia', 'Joy', '', '09123456790', 27, 'Female', '852 San Pedro St, Manila', 'No', 'Evacuation Center 3'),
(13, 'Ramos', 'William', 'John', '', '09123456791', 35, 'Male', '951 Sta. Ana St, Manila', 'Yes', 'Evacuation Center 1'),
(14, 'Mendoza', 'Angela', 'Rose', '', '09123456792', 32, 'Female', '147 San Jose St, Quezon City', 'No', 'Evacuation Center 2'),
(15, 'Santos', 'George', 'Michael', '', '09123456793', 48, 'Male', '258 Rizal St, Cebu City', 'Yes', 'Evacuation Center 3'),
(16, 'Cruz', 'Nancy', 'Lynn', '', '09123456794', 29, 'Female', '369 Magsaysay St, Davao City', 'No', 'Evacuation Center 1'),
(17, 'Reyes', 'Brian', 'Keith', '', '09123456795', 39, 'Male', '478 Quezon Ave, Makati', 'Yes', 'Evacuation Center 2'),
(18, 'Alonzo', 'Angela', 'Marie', '', '09123456796', 24, 'Female', '589 San Juan St, Manila', 'No', 'Evacuation Center 3'),
(19, 'Bautista', 'Kevin', 'Scott', '', '09123456797', 46, 'Male', '690 Aguinaldo Ave, Quezon City', 'Yes', 'Evacuation Center 1'),
(20, 'Dela Cruz', 'Michelle', 'Anne', '', '09123456798', 26, 'Female', '701 Rizal St, Makati ', 'No', 'Evacuation Center 2'),
(21, 'Santos', 'Ricardo', 'Luis', '', '09123456799', 33, 'Male', '123 Rizal St, Quezon City', 'Yes', 'Evacuation Center 1'),
(22, 'Reyes', 'Isabel', 'Clara', '', '09123456800', 29, 'Female', '456 Bonifacio St, Makati', 'No', 'Evacuation Center 2'),
(23, 'Cruz', 'Antonio', 'Miguel', '', '09123456801', 41, 'Male', '789 Aguinaldo Ave, Manila', 'Yes', 'Evacuation Center 3'),
(24, 'Mendoza', 'Elena', 'Teresa', '', '09123456802', 38, 'Female', '321 Quezon Ave, Quezon City', 'No', 'Evacuation Center 1'),
(25, 'Villanueva', 'Carlos', 'Alberto', '', '09123456803', 50, 'Male', '654 Sta. Cruz St, Manila', 'Yes', 'Evacuation Center 2'),
(26, 'Alonzo', 'Liza', 'Mae', '', '09123456804', 25, 'Female', '987 San Juan St, San Juan', 'No', 'Evacuation Center 3'),
(27, 'Bautista', 'Mark', 'Anthony', '', '09123456805', 39, 'Male', '135 Malvar St, Batangas', 'Yes', 'Evacuation Center 1'),
(28, 'Dela Cruz', 'Sofia', 'Elena', '', '09123456806', 30, 'Female', '246 Rizal St, Cebu City', 'No', 'Evacuation Center 2'),
(29, 'Lim', 'Eric', 'Tan', 'II', '09123456807', 52, 'Male', '369 Magsaysay Blvd, Davao City', 'Yes', 'Evacuation Center 3'),
(30, 'Torres', 'Grace', 'Anne', '', '09123456808', 29, 'Female', '159 J.P. Rizal St, Makati', 'No', 'Evacuation Center 1'),
(31, 'Garcia', 'Roberto', 'Luis', 'Sr.', '09123456809', 44, 'Male', '753 Quezon Ave, Quezon City', 'Yes', 'Evacuation Center 2'),
(32, 'Villanueva', 'Patricia', 'Joy', '', '09123456810', 27, 'Female', '852 San Pedro St, Manila', 'No', 'Evacuation Center 3'),
(33, 'Ramos', 'William', 'John', '', '09123456811', 35, 'Male', '951 Sta. Ana St, Manila', 'Yes', 'Evacuation Center 1'),
(34, 'Mendoza', 'Angela', 'Rose', '', '09123456812', 32, 'Female', '147 San Jose St, Quezon City', 'No', 'Evacuation Center 2'),
(35, 'Santos', 'George', 'Michael', '', '09123456813', 48, 'Male', '258 Rizal St, Cebu City', 'Yes', 'Evacuation Center 3'),
(36, 'Cruz', 'Nancy', 'Lynn', '', '09123456814', 29, 'Female', '369 Magsaysay St, Davao City', 'No', 'Evacuation Center 1'),
(37, 'Reyes', 'Brian', 'Keith', '', '09123456815', 39, 'Male', '478 Quezon Ave, Makati', 'Yes', 'Evacuation Center 2'),
(38, 'Alonzo', 'Angela', 'Marie', '', '09123456816', 24, 'Female', '589 San Juan St, Manila', 'No', 'Evacuation Center 3'),
(39, 'Bautista', 'Kevin', 'Scott', '', '09123456817', 46, 'Male', '690 Aguinaldo Ave, Quezon City', 'Yes', 'Evacuation Center 1'),
(40, 'Dela Cruz', 'Michelle', 'Anne', '', '09123456818', 26, 'Female', '701 Rizal St, Makati ', 'No', 'Evacuation Center 2'),
(41, 'Santos', 'Fernando', 'Luis', '', '09123456819', 37, 'Male', '123 San Pedro St, Manila', 'Yes', 'Evacuation Center 3'),
(42, 'Reyes', 'Carmen', 'Isabel', '', '09123456820', 31, 'Female', '456 Quezon Ave, Quezon City', 'No', 'Evacuation Center 1'),
(43, 'Cruz', 'Alfredo', 'Javier', '', '09123456821', 40, 'Male', '789 Rizal St, Cebu City', 'Yes', 'Evacuation Center 2'),
(44, 'Mendoza', 'Rosa', 'Lynn', '', '09123456822', 29, 'Female', '321 Aguinaldo Ave, Davao City', 'No', 'Evacuation Center 3'),
(45, 'Villanueva', 'Jorge', 'Antonio', '', '09123456823', 55, 'Male', '654 Sta. Cruz St, Manila', 'Yes', 'Evacuation Center 1'),
(46, 'Alonzo', 'Diana', 'Mae', '', '09123456824', 22, 'Female', '987 San Juan St, San Juan', 'No', 'Evacuation Center 2'),
(47, 'Bautista', 'Hector', 'Luis', '', '09123456825', 34, 'Male', '135 Malvar St, Batangas', 'Yes', 'Evacuation Center 3'),
(48, 'Dela Cruz', 'Nina', 'Elena', '', '09123456826', 27, 'Female', '246 Rizal St, Cebu City', 'No', 'Evacuation Center 1'),
(49, 'Lim', 'Victor', 'Tan', 'III', '09123456827', 42, 'Male', '369 Magsaysay Blvd, Davao City', 'Yes', 'Evacuation Center 2'),
(50, 'Torres', 'Lara', 'Anne', '', '09123456828', 30, 'Female', '159 J.P. Rizal St, Makati', 'No', 'Evacuation Center 3'),
(51, 'Santos', 'Ricardo', 'Luis', '', '09123456829', 33, 'Male', '123 San Pedro St, Manila', 'Yes', 'Evacuation Center 1'),
(52, 'Reyes', 'Isabel', 'Clara', '', '09123456830', 29, 'Female', '456 Quezon Ave, Quezon City', 'No', 'Evacuation Center 2'),
(53, 'Cruz', 'Antonio', 'Miguel', '', '09123456831', 41, 'Male', '789 Rizal St, Cebu City', 'Yes', 'Evacuation Center 3'),
(54, 'Mendoza', 'Elena', 'Teresa', '', '09123456832', 38, 'Female', '321 Aguinaldo Ave, Davao City', 'No', 'Evacuation Center 4'),
(55, 'Villanueva', 'Carlos', 'Alberto', '', '09123456833', 50, 'Male', '654 Sta. Cruz St, Manila', 'Yes', 'Evacuation Center 1'),
(56, 'Alonzo', 'Liza', 'Mae', '', '09123456834', 25, 'Female', '987 San Juan St, San Juan', 'No', 'Evacuation Center 2'),
(57, 'Bautista', 'Mark', 'Anthony', '', '09123456835', 39, 'Male', '135 Malvar St, Batangas', 'Yes', 'Evacuation Center 3'),
(58, 'Dela Cruz', 'Sofia', 'Elena', '', '09123456836', 30, 'Female', '246 Rizal St, Cebu City', 'No', 'Evacuation Center 4'),
(59, 'Lim', 'Eric', 'Tan', 'II', '09123456837', 52, 'Male', '369 Magsaysay Blvd, Davao City', 'Yes', 'Evacuation Center 1'),
(60, 'Torres', 'Grace', 'Anne', '', '09123456838', 29, 'Female', '159 J.P. Rizal St, Makati', 'No', 'Evacuation Center 2'),
(61, 'Garcia', 'Roberto', 'Luis', 'Sr.', '09123456839', 44, 'Male', '753 Quezon Ave, Quezon City', 'Yes', 'Evacuation Center 3'),
(62, 'Villanueva', 'Patricia', 'Joy', '', '09123456840', 27, 'Female', '852 San Pedro St, Manila', 'No', 'Evacuation Center 4'),
(63, 'Ramos', 'William', 'John', '', '09123456841', 35, 'Male', '951 Sta. Ana St, Manila', 'Yes', 'Evacuation Center 1'),
(64, 'Mendoza', 'Angela', 'Rose', '', '09123456842', 32, 'Female', '147 San Jose St, Quezon City', 'No', 'Evacuation Center 2'),
(65, 'Santos', 'George', 'Michael', '', '09123456843', 48, 'Male', '258 Rizal St, Cebu City', 'Yes', 'Evacuation Center 3'),
(66, 'Cruz', 'Nancy', 'Lynn', '', '09123456844', 29, 'Female', '369 Magsaysay St, Davao City', 'No', 'Evacuation Center 4'),
(67, 'Reyes', 'Brian', 'Keith', '', '09123456845', 39, 'Male', '478 Quezon Ave, Makati', 'Yes', 'Evacuation Center 1'),
(68, 'Alonzo', 'Angela', 'Marie', '', '09123456846', 24, 'Female', '589 San Juan St, Manila', 'No', 'Evacuation Center 2'),
(69, 'Bautista', 'Kevin', 'Scott', '', '09123456847', 46, 'Male', '690 Aguinaldo Ave, Quezon City', 'Yes', 'Evacuation Center 3'),
(70, 'Dela Cruz', 'Michelle', 'Anne', '', '09123456848', 26, 'Female', '701 Rizal St, Makati', 'No', 'Evacuation Center 4'),
(71, 'Santos', 'Fernando', 'Luis', '', '09123456849', 37, 'Male', '123 San Pedro St, Manila', 'Yes', 'Evacuation Center 1'),
(72, 'Reyes', 'Carmen', 'Isabel', '', '09123456850', 31, 'Female', '456 Quezon Ave, Quezon City', 'No', 'Evacuation Center 2'),
(73, 'Cruz', 'Alfredo', 'Javier', '', '09123456851', 40, 'Male', '789 Rizal St, Cebu City', 'Yes', 'Evacuation Center 3'),
(74, 'Mendoza', 'Rosa', 'Lynn', '', '09123456852', 29, 'Female', '321 Aguinaldo Ave, Davao City', 'No', 'Evacuation Center 4'),
(75, 'Villanueva', 'Jorge', 'Antonio', '', '09123456853', 55, 'Male', '654 Sta. Cruz St, Manila', 'Yes', 'Evacuation Center 1'),
(76, 'Alonzo', 'Diana', 'Mae', '', '09123456854', 22, 'Female', '987 San Juan St, San Juan', 'No', 'Evacuation Center 2'),
(77, 'Bautista', 'Hector', 'Luis', '', '09123456855', 34, 'Male', '135 Malvar St, Batangas', 'Yes', 'Evacuation Center 3'),
(78, 'Dela Cruz', 'Nina', 'Elena', '', '09123456856', 27, 'Female', '246 Rizal St, Cebu City', 'No', 'Evacuation Center 4'),
(79, 'Lim', 'Victor', 'Tan', 'III', '09123456857', 42, 'Male', '369 Magsaysay Blvd, Davao City', 'Yes', 'Evacuation Center 1'),
(80, 'Torres', 'Lara', 'Anne', '', '09123456858', 30, 'Female', '159 J.P. Rizal St, Makati', 'No', 'Evacuation Center 2'),
(81, 'Santos', 'Emilio', 'Rafael', '', '09123456859', 36, 'Male', '123 San Pedro St, Manila', 'Yes', 'Evacuation Center 3'),
(82, 'Reyes', 'Lucia', 'Maria', '', '09123456860', 28, 'Female', '456 Quezon Ave, Quezon City', 'No', 'Evacuation Center 4'),
(83, 'Cruz', 'Felipe', 'Jose', '', '09123456861', 47, 'Male', '789 Rizal St, Cebu City', 'Yes', 'Evacuation Center 1'),
(84, 'Mendoza', 'Claudia', 'Rosa', '', '09123456862', 35, 'Female', '321 Aguinaldo Ave, Davao City', 'No', 'Evacuation Center 2'),
(85, 'Villanueva', 'Alfred', 'Javier', '', '09123456863', 53, 'Male', '654 Sta. Cruz St, Manila', 'Yes', 'Evacuation Center 3'),
(86, 'Alonzo', 'Miriam', 'Joy', '', '09123456864', 26, 'Female', '987 San Juan St, San Juan', 'No', 'Evacuation Center 4'),
(87, 'Bautista', 'Rafael', 'Luis', '', '09123456865', 39, 'Male', '135 Malvar St, Batangas', 'Yes', 'Evacuation Center 1'),
(88, 'Dela Cruz', 'Nina', 'Elena', '', '09123456866', 30, 'Female', '246 Rizal St, Cebu City', 'No', 'Evacuation Center 2'),
(89, 'Lim', 'Victor', 'Tan', 'III', '09123456867', 42, 'Male', '369 Magsaysay Blvd, Davao City', 'Yes', 'Evacuation Center 3'),
(90, 'Torres', 'Lara', 'Anne', '', '09123456868', 30, 'Female', '159 J.P. Rizal St, Makati', 'No', 'Evacuation Center 4'),
(91, 'Santos', 'Fernando', 'Luis', '', '09123456869', 37, 'Male', '123 San Pedro St, Manila', 'Yes', 'Evacuation Center 1'),
(92, 'Reyes', 'Carmen', 'Isabel', '', '09123456870', 31, 'Female', '456 Quezon Ave, Quezon City', 'No', 'Evacuation Center 2'),
(93, 'Cruz', 'Alfredo', 'Javier', '', '09123456871', 40, 'Male', '789 Rizal St, Cebu City', 'Yes', 'Evacuation Center 3'),
(94, 'Mendoza', 'Rosa', 'Lynn', '', '09123456872', 29, 'Female', '321 Aguinaldo Ave, Davao City', 'No', 'Evacuation Center 4'),
(95, 'Villanueva', 'Jorge', 'Antonio', '', '09123456873', 55, 'Male', '654 Sta. Cruz St, Manila', 'Yes', 'Evacuation Center 1'),
(96, 'Alonzo', 'Diana', 'Mae', '', '09123456874', 22, 'Female', '987 San Juan St, San Juan', 'No', 'Evacuation Center 2'),
(97, 'Bautista', 'Hector', 'Luis', '', '09123456875', 34, 'Male', '135 Malvar St, Batangas', 'Yes', 'Evacuation Center 3'),
(98, 'Dela Cruz', 'Nina', 'Elena', '', '09123456876', 27, 'Female', '246 Rizal St, Cebu City', 'No', 'Evacuation Center 4'),
(99, 'Lim', 'Victor', 'Tan', 'III', '09123456877', 42, 'Male', '369 Magsaysay Blvd, Davao City', 'Yes', 'Evacuation Center 1'),
(100, 'Torres', 'Lara', 'Anne', '', '09123456878', 30, 'Female', '159 J.P. Rizal St, Makati', 'No', 'Evacuation Center 2'),
(101, 'Santos', 'Emilio', 'Rafael', '', '09123456879', 36, 'Male', '123 San Pedro St, Manila', 'Yes', 'Evacuation Center 3'),
(102, 'Reyes', 'Lucia', 'Maria', '', '09123456880', 28, 'Female', '456 Quezon Ave, Quezon City', 'No', 'Evacuation Center 4'),
(103, 'Cruz', 'Felipe', 'Jose', '', '09123456881', 47, 'Male', '789 Rizal St, Cebu City', 'Yes', 'Evacuation Center 1'),
(104, 'Mendoza', 'Claudia', 'Rosa', '', '09123456882', 35, 'Female', '321 Aguinaldo Ave, Davao City', 'No', 'Evacuation Center 2'),
(105, 'Villanueva', 'Alfred', 'Javier', '', '09123456883', 53, 'Male', '654 Sta. Cruz St, Manila', 'Yes', 'Evacuation Center 3'),
(106, 'Alonzo', 'Miriam', 'Joy', '', '09123456884', 26, 'Female', '987 San Juan St, San Juan', 'No', 'Evacuation Center 4'),
(107, 'Bautista', 'Rafael', 'Luis', '', '09123456885', 39, 'Male', '135 Malvar St, Batangas', 'Yes', 'Evacuation Center 1'),
(108, 'Dela Cruz', 'Nina', 'Elena', '', '09123456886', 30, 'Female', '246 Rizal St, Cebu City', 'No', 'Evacuation Center 2'),
(109, 'Lim', 'Victor', 'Tan', 'III', '09123456887', 42, 'Male', '369 Magsaysay Blvd, Davao City', 'Yes', 'Evacuation Center 3'),
(110, 'Torres', 'Lara', 'Anne', '', '09123456888', 30, 'Female', '159 J.P. Rizal St, Makati', 'No', 'Evacuation Center 4'),
(111, 'Santos', 'Emilio', 'Rafael', '', '09123456889', 36, 'Male', '123 San Pedro St, Manila', 'Yes', 'Evacuation Center 1'),
(112, 'Reyes', 'Lucia', 'Maria', '', '09123456890', 28, 'Female', '456 Quezon Ave, Quezon City', 'No', 'Evacuation Center 2'),
(113, 'Cruz', 'Felipe', 'Jose', '', '09123456891', 47, 'Male', '789 Rizal St, Cebu City', 'Yes', 'Evacuation Center 3'),
(114, 'Mendoza', 'Claudia', 'Rosa', '', '09123456892', 35, 'Female', '321 Aguinaldo Ave, Davao City', 'No', 'Evacuation Center 4'),
(115, 'Villanueva', 'Alfred', 'Javier', '', '09123456893', 53, 'Male', '654 Sta. Cruz St, Manila', 'Yes', 'Evacuation Center 1'),
(116, 'Alonzo', 'Miriam', 'Joy', '', '09123456894', 26, 'Female', '987 San Juan St, San Juan', 'No', 'Evacuation Center 2'),
(117, 'Bautista', 'Rafael', 'Luis', '', '09123456895', 39, 'Male', '135 Malvar St, Batangas', 'Yes', 'Evacuation Center 3'),
(118, 'Dela Cruz', 'Nina', 'Elena', '', '09123456896', 27, 'Female', '246 Rizal St, Cebu City', 'No', 'Evacuation Center 4'),
(119, 'Lim', 'Victor', 'Tan', 'III', '09123456897', 42, 'Male', '369 Magsaysay Blvd, Davao City', 'Yes', 'Evacuation Center 1'),
(120, 'Torres', 'Lara', 'Anne', '', '09123456898', 30, 'Female', '159 J.P. Rizal St, Makati', 'No', 'Evacuation Center 2'),
(122, 'Santos', 'Maria', 'Cruz', NULL, '09123456789', 34, 'Female', '123 Main St, City A', 'Yes', 'Evacuation Center 1'),
(123, 'Dela Cruz', 'Juan', 'Pablo', 'Jr.', '09123456780', 45, 'Male', '456 Elm St, City B', 'No', 'Evacuation Center 2'),
(124, 'Reyes', 'Ana', 'Luna', NULL, '09123456781', 29, 'Female', '789 Oak St, City C', 'Yes', 'Evacuation Center 3'),
(125, 'Garcia', 'Carlos', 'Mendoza', NULL, '09123456782', 50, 'Male', '321 Pine St, City D', 'No', 'Evacuation Center 4'),
(126, 'Mendoza', 'Liza', 'Santos', NULL, '09123456783', 38, 'Female', '654 Maple St, City A', 'Yes', 'Evacuation Center 1'),
(127, 'Torres', 'Rafael', 'Alonzo', NULL, '09123456784', 27, 'Male', '987 Cedar St, City B', 'No', 'Evacuation Center 2'),
(128, 'Lim', 'Sofia', 'Tan', NULL, '09123456785', 22, 'Female', '135 Birch St, City C', 'Yes', 'Evacuation Center 3'),
(129, 'Ramos', 'Miguel', 'Cruz', NULL, '09123456786', 31, 'Male', '246 Spruce St, City D', 'No', 'Evacuation Center 4'),
(130, 'Villanueva', 'Clara', 'Dela Rosa', NULL, '09123456787', 40, 'Female', '357 Fir St, City A', 'Yes', 'Evacuation Center 1'),
(131, 'Cruz', 'Jorge', 'Santos', NULL, '09123456788', 55, 'Male', '468 Willow St, City B', 'No', 'Evacuation Center 2'),
(132, 'Martinez', 'Isabel', 'Reyes', NULL, '09123456789', 26, 'Female', '579 Chestnut St, City C', 'Yes', 'Evacuation Center 3'),
(133, 'Lopez', 'Fernando', 'Gonzales', NULL, '09123456790', 48, 'Male', '680 Ash St, City D', 'No', 'Evacuation Center 4'),
(134, 'Morales', 'Patricia', 'Cruz', NULL, '09123456791', 33, 'Female', '791 Maple St, City A', 'Yes', 'Evacuation Center 1'),
(135, 'Reyes', 'Eduardo', 'Santos', NULL, '09123456792', 60, 'Male', '802 Oak St, City B', 'No', 'Evacuation Center 2'),
(136, 'Diaz', 'Carmen', 'Alonzo', NULL, '09123456793', 41, 'Female', '913 Pine St, City C', 'Yes', 'Evacuation Center 3'),
(137, 'Fernandez', 'Luis', 'Mendoza', NULL, '09123456794', 36, 'Male', '024 Cedar St, City D', 'No', 'Evacuation Center 4'),
(138, 'Castillo', 'Teresa', 'Reyes', NULL, '09123456795', 28, 'Female', '135 Birch St, City A', 'Yes', 'Evacuation Center 1'),
(139, 'Alonzo', 'Victor', 'Torres', NULL, '09123456796', 39, 'Male', '246 Spruce St, City B', 'No', 'Evacuation Center 2'),
(140, 'Santos', 'Gloria', 'Cruz', NULL, '09123456797', 30, 'Female', '357 Fir St, City C', 'Yes ', 'Evacuation Center 3'),
(141, 'Jimenez', 'Pablo', 'Reyes', NULL, '09123456798', 52, 'Male', '468 Willow St, City D', 'No', 'Evacuation Center 4'),
(142, 'Torres', 'Rosa', 'Alonzo', NULL, '09123456799', 24, 'Female', '579 Chestnut St, City A', 'Yes', 'Evacuation Center 1'),
(143, 'Ramirez', 'Alfredo', 'Cruz', NULL, '09123456800', 47, 'Male', '680 Ash St, City B', 'No', 'Evacuation Center 2'),
(144, 'Ortega', 'Marisol', 'Mendoza', NULL, '09123456801', 35, 'Female', '791 Maple St, City C', 'Yes', 'Evacuation Center 3'),
(145, 'Vargas', 'Hector', 'Santos', NULL, '09123456802', 29, 'Male', '802 Oak St, City D', 'No', 'Evacuation Center 4'),
(146, 'Pineda', 'Lucia', 'Reyes', NULL, '09123456803', 42, 'Female', '913 Pine St, City A', 'Yes', 'Evacuation Center 1'),
(147, 'Morales', 'Julio', 'Alonzo', NULL, '09123456804', 53, 'Male', '135 Birch St, City B', 'No', 'Evacuation Center 2'),
(148, 'Rojas', 'Elena', 'Cruz', NULL, '09123456805', 31, 'Female', '246 Spruce St, City C', 'Yes', 'Evacuation Center 3'),
(149, 'Salazar', 'Oscar', 'Jimenez', NULL, '09123456806', 44, 'Male', '357 Fir St, City D', 'No', 'Evacuation Center 4'),
(150, 'Cruz', 'Nina', 'Torres', NULL, '09123456807', 25, 'Female', '468 Willow St, City A', 'Yes', 'Evacuation Center 1'),
(151, 'Torres', 'Andres', 'Santos', NULL, '09123456808', 58, 'Male', '579 Chestnut St, City B', 'No', 'Evacuation Center 2'),
(152, 'Reyes', 'Cecilia', 'Mendoza', NULL, '09123456809', 37, 'Female', '680 Ash St, City C', 'Yes', 'Evacuation Center 3'),
(153, 'Garcia', 'Manuel', 'Alonzo', NULL, '09123456810', 46, 'Male', '791 Maple St, City D', 'No', 'Evacuation Center 4'),
(154, 'Mendoza', 'Diana', 'Cruz', NULL, '09123456811', 32, 'Female', '802 Oak St, City A', 'Yes', 'Evacuation Center 1'),
(155, 'Lopez', 'Roberto', 'Reyes', NULL, '09123456812', 54, 'Male', '913 Pine St, City B', 'No', 'Evacuation Center 2'),
(156, 'Martinez', 'Angela', 'Santos', NULL, '09123456813', 39, 'Female', '135 Birch St, City C', 'Yes', 'Evacuation Center 3'),
(157, 'Jimenez', 'Santiago', 'Alonzo', NULL, '09123456814', 28, 'Male', '246 Spruce St, City D', 'No', 'Evacuation Center 4'),
(158, 'Alonzo', 'Veronica', 'Cruz', NULL, '09123456815', 23, 'Female', '357 Fir St, City A', 'Yes', 'Evacuation Center 1'),
(159, 'Vargas', 'Felipe', 'Reyes', NULL, '09123456816', 49, 'Male', '468 Willow St, City B', 'No', 'Evacuation Center 2'),
(160, 'Salazar', 'Patricia', 'Mendoza', NULL, '09123456817', 34, 'Female', '579 Chestnut St, City C', 'Yes', 'Evacuation Center 3'),
(161, 'Santos', 'Maria', 'Cruz', NULL, '09123456818', 34, 'Female', '101 Main St, City A', 'Yes', 'Evacuation Center 1'),
(162, 'Dela Cruz', 'Juan', 'Pablo', 'Jr.', '09123456819', 45, 'Male', '102 Main St, City A', 'No', 'Evacuation Center 1'),
(163, 'Reyes', 'Ana', 'Luna', NULL, '09123456820', 29, 'Female', '103 Main St, City A', 'Yes', 'Evacuation Center 1'),
(164, 'Garcia', 'Carlos', 'Mendoza', NULL, '09123456821', 50, 'Male', '104 Main St, City A', 'No', 'Evacuation Center 1'),
(165, 'Mendoza', 'Liza', 'Santos', NULL, '09123456822', 38, 'Female', '105 Main St, City A', 'Yes', 'Evacuation Center 1'),
(166, 'Torres', 'Rafael', 'Alonzo', NULL, '09123456823', 27, 'Male', '106 Main St, City A', 'No', 'Evacuation Center 1'),
(167, 'Lim', 'Sofia', 'Tan', NULL, '09123456824', 22, 'Female', '107 Main St, City A', 'Yes', 'Evacuation Center 1'),
(168, 'Ramos', 'Miguel', 'Cruz', NULL, '09123456825', 31, 'Male', '108 Main St, City A', 'No', 'Evacuation Center 1'),
(169, 'Villanueva', 'Clara', 'Dela Rosa', NULL, '09123456826', 40, 'Female', '109 Main St, City A', 'Yes', 'Evacuation Center 1'),
(170, 'Cruz', 'Jorge', 'Santos', NULL, '09123456827', 55, 'Male', '110 Main St, City A', 'No', 'Evacuation Center 1'),
(171, 'Martinez', 'Isabel', 'Reyes', NULL, '09123456828', 26, 'Female', '111 Main St, City A', 'Yes', 'Evacuation Center 1'),
(172, 'Lopez', 'Fernando', 'Gonzales', NULL, '09123456829', 48, 'Male', '112 Main St, City A', 'No', 'Evacuation Center 1'),
(173, 'Morales', 'Patricia', 'Cruz', NULL, '09123456830', 33, 'Female', '113 Main St, City A', 'Yes', 'Evacuation Center 1'),
(174, 'Reyes', 'Eduardo', 'Santos', NULL, '09123456831', 60, 'Male', '114 Main St, City A', 'No', 'Evacuation Center 1'),
(175, 'Diaz', 'Carmen', 'Alonzo', NULL, '09123456832', 41, 'Female', '115 Main St, City A', 'Yes', 'Evacuation Center 1'),
(176, 'Fernandez', 'Luis', 'Mendoza', NULL, '09123456833', 36, 'Male', '116 Main St, City A', 'No', 'Evacuation Center 1'),
(177, 'Castillo', 'Teresa', 'Reyes', NULL, '09123456834', 28, 'Female', '117 Main St, City A', 'Yes', 'Evacuation Center 1'),
(178, 'Alonzo', 'Victor', 'Torres', NULL, '09123456835', 39, 'Male', '118 Main St, City A', 'No', 'Evacuation Center 1'),
(179, 'Santos', 'Gloria', 'Cruz', NULL, '09123456836', 30, 'Female', '119 Main St, City A', 'Yes', 'Evacuation Center 1'),
(180, 'Jimenez', 'Pablo', 'Reyes', NULL, '09123456837', 52, 'Male', '120 Main St, City A', 'No', 'Evacuation Center 1'),
(181, 'Torres', 'Rosa', 'Alonzo', NULL, '09123456838', 24, 'Female', '121 Main St, City A', 'Yes', 'Evacuation Center 1'),
(182, 'Ramirez', 'Alfredo', 'Cruz', NULL, '09123456839', 47, 'Male', '122 Main St, City A', 'No', 'Evacuation Center 1'),
(183, 'Ortega', 'Marisol', 'Mendoza', NULL, '09123456840', 35, 'Female', '123 Main St, City A', 'Yes', 'Evacuation Center 1'),
(184, 'Vargas', 'Hector', 'Santos', NULL, '09123456841', 29, 'Male', '124 Main St, City A', 'No', 'Evacuation Center 1'),
(185, 'Pineda', 'Lucia', 'Reyes', NULL, '09123456842', 42, 'Female', '125 Main St, City A', 'Yes', 'Evacuation Center 1'),
(186, 'Morales', 'Julio', 'Alonzo', NULL, '09123456843', 53, 'Male', '126 Main St, City A', 'No', 'Evacuation Center 1'),
(187, 'Rojas', 'Elena', 'Cruz', NULL, '09123456844', 31, 'Female', '127 Main St, City A', 'Yes', 'Evacuation Center 1'),
(188, 'Salazar', 'Oscar', 'Jimenez', NULL, '09123456845', 44, 'Male', '128 Main St, City A', 'No', 'Evacuation Center 1'),
(189, 'Cruz', 'Nina', 'Torres', NULL, '09123456846', 25, 'Female', '129 Main St, City A', 'Yes', 'Evacuation Center 1'),
(190, 'Torres', 'Andres', 'Santos', NULL, '09123456847', 58, 'Male', '130 Main St, City A', 'No', 'Evacuation Center 1'),
(191, 'Reyes', 'Cecilia', 'Mendoza', NULL, '09123456848', 37, 'Female', '131 Main St, City A', 'Yes', 'Evacuation Center 1'),
(192, 'Garcia', 'Manuel', 'Alonzo', NULL, '09123456849', 46, 'Male', '132 Main St, City A', 'No', 'Evacuation Center 1'),
(193, 'Mendoza', 'Diana', 'Cruz', NULL, '09123456850', 32, 'Female', '133 Main St, City A', 'Yes', 'Evacuation Center 1'),
(194, 'Lopez', 'Roberto', 'Reyes', NULL, '09123456851', 54, 'Male', '134 Main St, City A', 'No', 'Evacuation Center 1'),
(195, 'Martinez', 'Angela', 'Santos', NULL, '09123456852', 39, 'Female', '135 Main St, City A', 'Yes', 'Evacuation Center 1'),
(196, 'Jimenez', 'Santiago', 'Alonzo', NULL, '09123456853', 28, 'Male', '136 Main St, City A', 'No', 'Evacuation Center 1'),
(197, 'Alonzo', 'Veronica', 'Cruz', NULL, '09123456854', 23, 'Female', '137 Main St, City A', 'Yes', 'Evacuation Center 1'),
(198, 'Vargas', 'Felipe', 'Reyes', NULL, '09123456855', 49, 'Male', '138 Main St, City A', 'No', 'Evacuation Center 1'),
(199, 'Salazar', 'Patricia', 'Mendoza', NULL, '09123456856', 34, 'Female', '139 Main St, City A', 'Yes', 'Evacuation Center 1'),
(200, 'Santos', 'Diego', 'Cruz', NULL, '09123456857', 41, 'Male', '140 Main St, City A', 'No', 'Evacuation Center 1'),
(201, 'Dela Cruz ', 'Luz', 'Pablo', NULL, '09123456858', 36, 'Female', '141 Main St, City A', 'Yes', 'Evacuation Center 1'),
(202, 'Reyes', 'Javier', 'Luna', NULL, '09123456859', 29, 'Male', '142 Main St, City A', 'No', 'Evacuation Center 1'),
(203, 'Garcia', 'Sofia', 'Mendoza', NULL, '09123456860', 32, 'Female', '143 Main St, City A', 'Yes', 'Evacuation Center 1'),
(204, 'Mendoza', 'Carlos', 'Santos', NULL, '09123456861', 45, 'Male', '144 Main St, City A', 'No', 'Evacuation Center 1'),
(205, 'Torres', 'Elena', 'Alonzo', NULL, '09123456862', 38, 'Female', '145 Main St, City A', 'Yes', 'Evacuation Center 1'),
(206, 'Lim', 'Andres', 'Tan', NULL, '09123456863', 50, 'Male', '146 Main St, City A', 'No', 'Evacuation Center 1'),
(207, 'Ramos', 'Patricia', 'Cruz', NULL, '09123456864', 27, 'Female', '147 Main St, City A', 'Yes', 'Evacuation Center 1'),
(208, 'Villanueva', 'Miguel', 'Dela Rosa', NULL, '09123456865', 41, 'Male', '148 Main St, City A', 'No', 'Evacuation Center 1'),
(209, 'Cruz', 'Isabel', 'Santos', NULL, '09123456866', 34, 'Female', '149 Main St, City A', 'Yes', 'Evacuation Center 1'),
(210, 'Martinez', 'Luis', 'Reyes', NULL, '09123456867', 39, 'Male', '150 Main St, City A', 'No', 'Evacuation Center 1'),
(211, 'Santos', 'Maria', 'Cruz', NULL, '09123456868', 34, 'Female', '151 Main St, City A', 'Yes', 'Evacuation Center 2'),
(212, 'Dela Cruz', 'Juan', 'Pablo', 'Jr.', '09123456869', 45, 'Male', '152 Main St, City A', 'No', 'Evacuation Center 2'),
(213, 'Reyes', 'Ana', 'Luna', NULL, '09123456870', 29, 'Female', '153 Main St, City A', 'Yes', 'Evacuation Center 2'),
(214, 'Garcia', 'Carlos', 'Mendoza', NULL, '09123456871', 50, 'Male', '154 Main St, City A', 'No', 'Evacuation Center 2'),
(215, 'Mendoza', 'Liza', 'Santos', NULL, '09123456872', 38, 'Female', '155 Main St, City A', 'Yes', 'Evacuation Center 2'),
(216, 'Torres', 'Rafael', 'Alonzo', NULL, '09123456873', 27, 'Male', '156 Main St, City A', 'No', 'Evacuation Center 2'),
(217, 'Lim', 'Sofia', 'Tan', NULL, '09123456874', 22, 'Female', '157 Main St, City A', 'Yes', 'Evacuation Center 2'),
(218, 'Ramos', 'Miguel', 'Cruz', NULL, '09123456875', 31, 'Male', '158 Main St, City A', 'No', 'Evacuation Center 2'),
(219, 'Villanueva', 'Clara', 'Dela Rosa', NULL, '09123456876', 40, 'Female', '159 Main St, City A', 'Yes', 'Evacuation Center 2'),
(220, 'Cruz', 'Jorge', 'Santos', NULL, '09123456877', 55, 'Male', '160 Main St, City A', 'No', 'Evacuation Center 2'),
(222, 'buhian', 'edgeniel', 'A.', '', '325346345674357', 34, 'male', 'k1 brgy pansol Q.C', 'yes', 'BCP'),
(223, 'Arcenal', 'Dave Joshua ', 'Siarot', '', '99915180344', 22, 'Male', 'Maligaya', 'Father', 'UP'),
(224, 'Calatrava', 'Billy', 'A', '', '92977592321', 23, 'Male', 'Maligaya', 'Elder Brother', 'Evacuation Center 6');

-- --------------------------------------------------------

--
-- Table structure for table `evac_centers`
--

CREATE TABLE `evac_centers` (
  `id` int(11) NOT NULL,
  `center_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(50) NOT NULL,
  `capacity` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evac_centers`
--

INSERT INTO `evac_centers` (`id`, `center_name`, `address`, `contact_info`, `capacity`) VALUES
(2, 'Evacuation Center 1', 'Pasig', '09534464565', 100),
(3, 'Evacuation Center 2', 'Makati', '09534464565', 100),
(4, 'Evacuation Center 3', 'Mandaluyong', '09915180344', 300),
(5, 'Evacuation Center 4', 'Taguig', '09534464565', 300),
(11, 'Evacuation Center 5', 'Novaliches Bayan', '098748347534', 300),
(12, 'Evacuation Center 6', 'QC', '	098748347534', 700);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evacuees`
--
ALTER TABLE `evacuees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evac_centers`
--
ALTER TABLE `evac_centers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evacuees`
--
ALTER TABLE `evacuees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `evac_centers`
--
ALTER TABLE `evac_centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
