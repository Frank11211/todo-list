-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 05:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `to-do-list-myware`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_desc` varchar(255) NOT NULL,
  `task_created_date` datetime(6) NOT NULL,
  `task_status` text NOT NULL,
  `task_prio` varchar(32) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_desc`, `task_created_date`, `task_status`, `task_prio`, `user_id`) VALUES
(1, 'Add New Modal (File Drop)', '- Create a drag and drop file modal in task\n- File support only PDF\n', '2024-02-03 16:29:47.905000', 'OPEN', 'LOW', 1),
(2, 'new listing page (Company XXX)', '- Company XXX need another listing page, but more action feature\n- feature for drop and drop DOC file\n- need develop A.S.A.P', '2024-02-03 16:26:04.268000', 'PENDING', 'HIGH', 1),
(3, 'Bug : Customer Listing page unable to view all TODO list', '', '2024-02-03 16:26:47.164000', 'COMPLETED', 'HIGH', 1),
(5, 'Create Setting page', '- Create new Setting page\n- Requirement \n  -  Require show user credential\n  -  Feature to upload user image', '2024-02-03 16:31:11.148000', 'OPEN', 'LOW', 1),
(6, 'Bug : Unable reset password on login page ', '', '2024-02-03 16:32:57.494000', 'PENDING', 'MEDIUM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_username`, `user_password`, `user_image`) VALUES
(1, 'Admin', '123123', NULL),
(2, 'Frank Lee', 'jojo1314', NULL),
(5, 'Joyee123', '123123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
