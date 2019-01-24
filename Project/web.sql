-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2019 at 04:03 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `fn` int(11) NOT NULL,
  `required_score` varchar(128) NOT NULL,
  `score` int(11) NOT NULL,
  `score_date` date NOT NULL,
  `notes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `fn`, `required_score`, `score`, `score_date`, `notes`) VALUES
(1, 81100, 'Homework1', 30, '2018-11-09', '....'),
(2, 81101, 'Homework1', 20, '2018-11-09', '...'),
(3, 81100, 'Homework2', 30, '2018-11-14', '...'),
(4, 81101, 'Homework2', 60, '2018-11-14', '..'),
(5, 81100, 'Homework3', 60, '2018-11-22', '...'),
(6, 81101, 'Homework3', 70, '2018-11-22', '...'),
(7, 81102, 'Homework1', 30, '2018-11-09', '...'),
(8, 81102, 'Homework2', 20, '2018-11-14', '...'),
(9, 81102, 'Homework3', 80, '2018-11-15', '...'),
(10, 81103, 'Homework1', 60, '2018-11-09', '...'),
(11, 81103, 'Homework2', 60, '2018-11-14', '...'),
(12, 81103, 'Homework3', 60, '2018-11-22', '...'),
(13, 81100, 'Review', 70, '2018-12-12', 'good structure'),
(14, 81101, 'Review', 60, '2018-12-12', 'the menu is not structured well'),
(15, 81103, 'Review', 60, '2018-12-12', 'The structure of user.php is not good'),
(17, 81104, 'Homework1', 80, '2018-11-08', '...'),
(18, 81104, 'Homework2', 60, '2018-11-21', 'change the name of the user.php file'),
(19, 81104, 'Homework3', 60, '2018-11-28', 'different name for the user class'),
(20, 81104, 'Review', 20, '2019-01-16', 'not enough information'),
(21, 81102, 'Review', 80, '2018-12-12', 'well done'),
(22, 81105, 'Homework1', 60, '2018-11-08', '...'),
(23, 81105, 'Homework2', 30, '2018-11-15', '...'),
(24, 81105, 'Homework3', 30, '2018-11-22', '...'),
(25, 81105, 'Review', 20, '2019-01-06', '...'),
(26, 81106, 'Homework1', 70, '2018-07-07', '...'),
(29, 81106, 'Homework2', 70, '2018-03-03', 'good structure'),
(30, 81106, 'Homework3', 80, '2018-05-04', 'different name for the class'),
(31, 81106, 'Review', 60, '2018-10-10', 'not enough information in section 2'),
(32, 81107, 'Homework1', 60, '2018-04-10', '...'),
(33, 81107, 'Homework2', 40, '2018-12-10', 'different name for the class'),
(34, 81107, 'Homework3', 20, '2018-02-01', 'does not wotk properly'),
(35, 81107, 'Review', 40, '2019-10-02', 'not enough information in section 3'),
(36, 81100, 'Homework4', 30, '2018-02-11', 'the user class is not used  properly'),
(39, 81108, 'Homework3', 60, '2018-10-20', 'different name for the class'),
(40, 81108, 'Homework1', 90, '2018-10-06', 'good job'),
(41, 81108, 'Homework2', 70, '2018-10-17', '...'),
(42, 81108, 'Review', 60, '2018-12-12', 'not enough information in section 2'),
(44, 81109, 'Homework1', 70, '2018-10-06', 'you do noy use <img> correctly'),
(46, 81101, 'Homework4', 50, '2018-02-12', 'not enough information in section 2');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `fn` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`fn`, `name`, `password`, `created_at`) VALUES
(0, 'Teacher', 'teach12', '2019-01-20 12:58:37'),
(81100, 'Todor Angelov\r\n', '1111', '2019-01-20 12:58:37'),
(81101, 'Maria Ivanova\r\n', '2222', '2019-01-20 12:58:37'),
(81102, 'Zara Ivanova', '3333', '2019-01-20 12:58:37'),
(81103, 'Rumen Todorov', '4444', '2019-01-20 12:58:37'),
(81104, 'Petar Malinov', '5555', '2019-01-20 12:58:37'),
(81105, 'Silvia Pavlova', '6666', '2019-01-20 12:58:37'),
(81106, 'Alex Marchev', '7777', '2019-01-20 12:59:52'),
(81107, 'Ivan Karev', '8888', '2019-01-20 15:00:43'),
(81108, 'Mila Leeva', '9999', '2019-01-21 13:59:17'),
(81109, 'Petar Petrov', '1010', '2019-01-21 15:19:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`fn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
