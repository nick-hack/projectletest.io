-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2022 at 04:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` text DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `city` text DEFAULT NULL,
  `RollNo` int(30) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `Updateddate` datetime DEFAULT NULL,
  `mobileno` text DEFAULT NULL,
  `IsDelete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `age`, `city`, `RollNo`, `CreatedDate`, `Updateddate`, `mobileno`, `IsDelete`) VALUES
(1, 'Abhishek Bhosle', 25, 'Bhose', 101, '2021-04-23 11:44:38', NULL, NULL, 0),
(2, 'Aniket Kavathekar', 25, 'Miraj', 102, '2021-05-21 02:44:38', NULL, NULL, 0),
(4, 'Harshad Pawar', 26, 'Jununi', 103, '2021-07-24 22:44:38', NULL, NULL, 0),
(5, 'Shubham Bhosale', 20, 'Miraj', 104, '2021-09-02 03:30:38', NULL, NULL, 0),
(6, 'neha lingam', 25, 'pune', 107, '2022-04-23 01:46:38', '2022-09-04 18:47:12', '9878675645', 1),
(7, 'pranali surve', 22, 'kolhapur', 108, '2022-09-04 15:10:53', NULL, NULL, 0),
(10, 'sunita kale', 22, 'kolhapur', 109, '2022-09-04 15:45:09', NULL, '', 0),
(11, 'sunita more', 21, 'jat', 110, '2022-09-04 15:48:38', NULL, '', 0),
(12, 'sunita kele', 21, 'jat', 110, '2022-09-04 15:51:22', NULL, '9876876790', 0),
(13, 'sunita nale', 21, 'bhose', 111, '2022-09-04 15:53:18', NULL, '9876876700', 0),
(14, 'sunita nurle', 21, 'bhose', 111, '2022-09-04 15:53:50', NULL, '9876876700', 0),
(15, 'priyanka jhoshi', 29, 'channai', 114, '2022-09-04 16:25:32', NULL, '9676876900', 1),
(16, 'priyanka jhoshi', 29, 'channai', 114, '2022-09-04 16:25:55', NULL, '9676876900', 1),
(17, 'priyanka jhoshi', 18, 'karnatak', 116, '2022-09-04 16:28:20', NULL, '9899876700', 0),
(18, 'priyanka jhoshi', 18, 'karnatak', 116, '2022-09-04 16:32:46', NULL, '', 0),
(19, 'priyanka jhoshi', 18, 'karnatak', 116, '2022-09-04 16:37:39', NULL, '', 0),
(20, 'priyanka koli', 20, 'Delhi', 120, '2022-09-04 18:55:43', NULL, '', 0),
(21, 'priyanka koli', 20, 'Delhi', 120, '2022-09-04 18:59:51', NULL, '', 0),
(22, 'priyanka koli', 20, 'Delhi', 120, '2022-09-04 19:00:10', NULL, '', 0),
(23, 'priyanka koli', 20, 'Delhi', 120, '2022-09-04 19:02:28', NULL, '8988876000', 0),
(24, 'priyanka kuru', 22, 'New Delhi', 121, '2022-09-04 19:03:26', NULL, '9989876000', 0),
(25, 'priyanka kuru', 22, 'New Delhi', 121, '2022-09-04 19:03:29', NULL, '9989876000', 0),
(26, 'priyanka kuru', 22, 'New Delhi', 121, '2022-09-04 19:03:56', NULL, '9989876000', 0),
(27, 'priyanka kuru', 22, 'New Delhi', 121, '2022-09-04 19:04:48', NULL, '9989871010', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
