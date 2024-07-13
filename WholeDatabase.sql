-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 08:07 PM
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
-- Database: `virtue2`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `rollno` decimal(11,0) NOT NULL,
  `class` varchar(50) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `type`, `email`, `password`, `name`, `rollno`, `class`, `is_deleted`, `image`) VALUES
(1, 'teacher', 't1@t1.t1', '202cb962ac59075b964b07152d234b70', 'teacher1', 1, '', 0, 'download (3).jpg'),
(2, 'teacher', 'Teacher2@gmail.comm', '202cb962ac59075b964b07152d234b70', 'Teacher2', 1, '', 0, 'images.jpg'),
(3, 'teacher', 'Teacher3@gmail.com', '202cb962ac59075b964b07152d234b70', 'Teacher3', 1, '', 0, 'download (2).jpg'),
(4, 'teacher', 'Teacher4@gmail.com', '202cb962ac59075b964b07152d234b70', 'Teacher4', 1, '', 0, 'download (1).jpg'),
(5, 'student', 's0@s0.s0', '202cb962ac59075b964b07152d234b70', 'student0', 92100938000, '', 1, ''),
(7, 'student', 's1@s1.s1', '202cb962ac59075b964b07152d234b70', 'student1', 92100938001, '4', 0, 'images.jpg'),
(8, 'student', 's2@s2.s2', '202cb962ac59075b964b07152d234b70', 'student2', 92100938002, '4', 0, 'images.jpg'),
(9, 'student', 's3@s3.s3', '202cb962ac59075b964b07152d234b70', 'student3', 92100938003, '4', 0, 'images.jpg'),
(10, 'student', 's4@s4.s4', '202cb962ac59075b964b07152d234b70', 'student4', 92100938004, '5', 0, 'images.jpg'),
(11, 'student', 's5@s5.s5', '202cb962ac59075b964b07152d234b70', 'student5', 92100938005, '5', 0, 'images.jpg'),
(12, 'student', 's6@s6.s6', '202cb962ac59075b964b07152d234b70', 'student6', 92100938006, '5', 0, 'images.jpg'),
(13, 'student', 's7@s7.s7', '202cb962ac59075b964b07152d234b70', 'student7', 92100938007, '6', 0, 'images.jpg'),
(14, 'student', 's8@s8.s8', '202cb962ac59075b964b07152d234b70', 'student8', 92100938008, '6', 0, 'images.jpg'),
(15, 'student', 's9@s9.s9', '202cb962ac59075b964b07152d234b70', 'student9', 92100938009, '6', 0, 'images.jpg'),
(16, 'student', 's10@s10.s10', '202cb962ac59075b964b07152d234b70', 'student10', 92100938010, '4', 0, 'images.jpg'),
(17, 'teacher', 'Teacher5@gmail.com', '202cb962ac59075b964b07152d234b70', 'Teacher5', 1, '', 0, 'download (1).jpg'),
(18, 'student', 's11@s11.s11', '202cb962ac59075b964b07152d234b70', 's11', 92100938011, '6', 0, 'images.png'),
(19, 'teacher', 't6@t6.t6', '202cb962ac59075b964b07152d234b70', 'Teacher6', 1, '', 0, 'bg img1.jpeg'),
(20, 'student', 's12@s12.s12', '202cb962ac59075b964b07152d234b70', 'student12', 92100938012, '4', 1, 'bg img1.jpeg'),
(24, 'student', 's13@s13.s13', '202cb962ac59075b964b07152d234b70', 's13', 92100938013, '4', 0, 'about_bg_1-removebghd.png'),
(25, 'student', 's14@s14.s14', '202cb962ac59075b964b07152d234b70', 's14', 92100938014, '4', 0, 'about sms.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `meta_id` int(11) NOT NULL,
  `rollno` decimal(11,0) NOT NULL,
  `name` text NOT NULL,
  `class` varchar(10) NOT NULL,
  `status` text NOT NULL,
  `date` date NOT NULL,
  `type` text NOT NULL,
  `percent` decimal(11,0) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `meta_id`, `rollno`, `name`, `class`, `status`, `date`, `type`, `percent`, `count`) VALUES
(1, 7, 92100938001, 'student1', '4', 'Present', '2024-02-12', 'student', 38, 1),
(2, 16, 92100938010, 'student10', '4', 'Present', '2024-02-12', 'student', 25, 1),
(3, 8, 92100938002, 'student2', '4', 'Present', '2024-02-12', 'student', 25, 1),
(4, 9, 92100938003, 'student3', '4', 'Present', '2024-02-12', 'student', 13, 1),
(5, 10, 92100938004, 'student4', '5', 'Present', '2024-02-12', 'student', 67, 2),
(6, 11, 92100938005, 'student5', '5', 'Present', '2024-02-12', 'student', 33, 2),
(7, 12, 92100938006, 'student6', '5', 'Present', '2024-02-12', 'student', 33, 2),
(8, 18, 92100938011, 's11', '6', 'Present', '2024-02-12', 'student', 67, 3),
(9, 13, 92100938007, 'student7', '6', 'Present', '2024-02-12', 'student', 33, 3),
(10, 14, 92100938008, 'student8', '6', 'Present', '2024-02-12', 'student', 100, 3),
(11, 15, 92100938009, 'student9', '6', 'Present', '2024-02-12', 'student', 33, 3),
(12, 7, 92100938001, 'student1', '4', 'Absent', '2024-02-12', 'student', 38, 4),
(13, 16, 92100938010, 'student10', '4', 'Absent', '2024-02-12', 'student', 25, 4),
(14, 8, 92100938002, 'student2', '4', 'Present', '2024-02-12', 'student', 25, 4),
(15, 9, 92100938003, 'student3', '4', 'Absent', '2024-02-12', 'student', 13, 4),
(16, 10, 92100938004, 'student4', '5', 'Present', '2024-02-12', 'student', 67, 5),
(17, 11, 92100938005, 'student5', '5', 'Absent', '2024-02-12', 'student', 33, 5),
(18, 12, 92100938006, 'student6', '5', 'Absent', '2024-02-12', 'student', 33, 5),
(19, 18, 92100938011, 's11', '6', 'Absent', '2024-02-12', 'student', 67, 6),
(20, 13, 92100938007, 'student7', '6', 'Absent', '2024-02-12', 'student', 33, 6),
(21, 14, 92100938008, 'student8', '6', 'Present', '2024-02-12', 'student', 100, 6),
(22, 15, 92100938009, 'student9', '6', 'Absent', '2024-02-12', 'student', 33, 6),
(23, 18, 92100938011, 's11', '6', 'Present', '2024-02-13', 'student', 67, 7),
(24, 13, 92100938007, 'student7', '6', 'Absent', '2024-02-13', 'student', 33, 7),
(25, 14, 92100938008, 'student8', '6', 'Present', '2024-02-13', 'student', 100, 7),
(26, 15, 92100938009, 'student9', '6', 'Absent', '2024-02-13', 'student', 33, 7),
(27, 7, 92100938001, 'student1', '4', 'Present', '2024-02-27', 'student', 38, 8),
(28, 16, 92100938010, 'student10', '4', 'Absent', '2024-02-27', 'student', 25, 8),
(29, 8, 92100938002, 'student2', '4', 'Absent', '2024-02-27', 'student', 25, 8),
(30, 9, 92100938003, 'student3', '4', 'Absent', '2024-02-27', 'student', 13, 8),
(31, 7, 92100938001, 'student1', '4', 'Absent', '2024-03-02', 'student', 38, 9),
(32, 16, 92100938010, 'student10', '4', 'Absent', '2024-03-02', 'student', 25, 9),
(33, 20, 92100938012, 'student12', '4', 'Present', '2024-03-02', 'student', 33, 9),
(34, 8, 92100938002, 'student2', '4', 'Absent', '2024-03-02', 'student', 25, 9),
(35, 9, 92100938003, 'student3', '4', 'Absent', '2024-03-02', 'student', 13, 9),
(36, 7, 92100938001, 'student1', '4', 'Absent', '2024-03-02', 'student', 38, 10),
(37, 16, 92100938010, 'student10', '4', 'Absent', '2024-03-02', 'student', 25, 10),
(38, 20, 92100938012, 'student12', '4', 'Absent', '2024-03-02', 'student', 33, 10),
(39, 8, 92100938002, 'student2', '4', 'Absent', '2024-03-02', 'student', 25, 10),
(40, 9, 92100938003, 'student3', '4', 'Absent', '2024-03-02', 'student', 13, 10),
(41, 7, 92100938001, 'student1', '4', 'Absent', '2024-03-02', 'student', 38, 11),
(42, 16, 92100938010, 'student10', '4', 'Absent', '2024-03-02', 'student', 25, 11),
(43, 20, 92100938012, 'student12', '4', 'Absent', '2024-03-02', 'student', 33, 11),
(44, 8, 92100938002, 'student2', '4', 'Absent', '2024-03-02', 'student', 25, 11),
(45, 9, 92100938003, 'student3', '4', 'Absent', '2024-03-02', 'student', 13, 11),
(46, 23, 92100938013, 'Smit', '5', 'Absent', '2024-03-02', 'student', 50, 12),
(47, 10, 92100938004, 'student4', '5', 'Absent', '2024-03-02', 'student', 67, 12),
(48, 11, 92100938005, 'student5', '5', 'Absent', '2024-03-02', 'student', 33, 12),
(49, 12, 92100938006, 'student6', '5', 'Absent', '2024-03-02', 'student', 33, 12),
(50, 7, 92100938001, 'student1', '4', 'Present', '2024-03-21', 'student', 38, 13),
(51, 16, 92100938010, 'student10', '4', 'Present', '2024-03-21', 'student', 25, 13),
(52, 8, 92100938002, 'student2', '4', 'Absent', '2024-03-21', 'student', 25, 13),
(53, 9, 92100938003, 'student3', '4', 'Absent', '2024-03-21', 'student', 13, 13),
(54, 24, 92100938013, 's13', '4', 'Present', '2024-04-04', 'student', 50, 14),
(55, 25, 92100938014, 's14', '4', 'Present', '2024-04-04', 'student', 100, 14),
(56, 7, 92100938001, 'student1', '4', 'Absent', '2024-04-04', 'student', 38, 14),
(57, 16, 92100938010, 'student10', '4', 'Absent', '2024-04-04', 'student', 25, 14),
(58, 8, 92100938002, 'student2', '4', 'Absent', '2024-04-04', 'student', 25, 14),
(59, 9, 92100938003, 'student3', '4', 'Absent', '2024-04-04', 'student', 13, 14);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `category` text NOT NULL,
  `path` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `category`, `path`) VALUES
(1, 'book1', 'author1', 'Humor', 'ADBMS (3).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `category` text NOT NULL,
  `sname` text NOT NULL,
  `sclass` varchar(20) NOT NULL,
  `rollno` decimal(11,0) NOT NULL,
  `issue_date` date NOT NULL,
  `renew_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`id`, `title`, `author`, `category`, `sname`, `sclass`, `rollno`, `issue_date`, `renew_date`, `return_date`) VALUES
(1, '', '', '', '0', '', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(2, 'book1', 'author1', 'Humor', '0', 'class-1', 92100938001, '2024-02-12', '2024-02-12', '2024-02-12'),
(3, '', '', '', '0', '', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(4, '', '', '', '0', '', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(5, '', '', '', '0', '', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(6, '', '', '', '0', '', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(7, '', '', '', '0', '', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(8, '', '', '', '0', '', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(9, '', '', '', '0', '', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(12, 'book1', 'author', 'Humor', '0', 'dasda', 0, '2024-04-11', '2024-04-18', '0000-00-00'),
(13, 'book', 'author', 'Humor', '0', '1', 0, '2024-01-01', '2025-01-01', '2025-01-02'),
(14, '', '', '', '0', '', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(15, '', '', '', '0', '', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(16, 'bool2', 'oijhbv', 'Maths', '0', 'class-5', 92100938014, '2024-04-10', '2024-04-17', '2024-04-10'),
(17, '', '', '', '0', '', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(18, 'iuhg', ';lkj', 'Social Study', '0', 'class-2', 92100938001, '2024-04-10', '0652-08-09', '0008-05-08'),
(19, 'iuhg', ';lkj', 'Social Study', '[p0oiuhgjk', 'class-2', 92100938001, '2024-04-10', '0652-08-09', '0008-05-08'),
(20, '', '', '', '', '', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(21, 'book', 'authhor', 'Humor', 'student1', 'class-1', 92100938002, '2024-01-01', '2024-02-01', '2024-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `section` varchar(50) NOT NULL,
  `added_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `category`, `duration`, `date`, `image`, `is_deleted`) VALUES
(1, 'HTML', 'web-design-and-development', '45min', '2024-02-09', 'html-head.jpg', 0),
(2, 'PHP', 'web-design-and-development', '1 hour', '2024-02-09', 'download (2).png', 0),
(3, 'C#', 'app-developement', '2 hour', '2024-02-09', 'cprogrammingbundle_resize_md.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `econtent`
--

CREATE TABLE `econtent` (
  `id` int(11) NOT NULL,
  `class` text NOT NULL,
  `unit` text NOT NULL,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `econtent`
--

INSERT INTO `econtent` (`id`, `class`, `unit`, `title`, `date`, `file`) VALUES
(1, '4', 'Unit 1', 'English', '2025-01-01', 'ADBMSUnit5pptx__2023_10_19_12_50_24 (1).pptx');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `description` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `venue` text NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `description`, `time`, `venue`, `is_deleted`) VALUES
(1, 'MU Fest', '2024-03-14', 'All must come in Uniform', '09:00:00', 'Ground', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `class` text NOT NULL,
  `subject` text NOT NULL,
  `teacher` text NOT NULL,
  `location` text NOT NULL,
  `date` date NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `class`, `subject`, `teacher`, `location`, `date`, `from`, `to`) VALUES
(1, '4', 'Maths', 'teacher1', 'Lab-1', '2024-02-12', '09:03:00', '21:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `quiry` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `title`, `email`, `quiry`) VALUES
(1, 'Milap', ' milap.dave111630@marwadiuniversity.ac.in', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `leave_type` text NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `from`, `to`, `leave_type`, `description`) VALUES
(3, '0002-06-09', '0520-06-09', 'Sick Leave (Personal)', 'description'),
(4, '0005-04-05', '0021-03-06', 'Study Leave', 'description'),
(5, '2024-04-15', '2024-04-17', 'Emergency Leave', 'description'),
(7, '2024-03-01', '2024-08-15', 'Sick Leave (Family', 'daoughter not well');

-- --------------------------------------------------------

--
-- Table structure for table `lib_book`
--

CREATE TABLE `lib_book` (
  `id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `author` varchar(500) NOT NULL,
  `publish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lib_book_status`
--

CREATE TABLE `lib_book_status` (
  `id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `rollno` decimal(20,0) NOT NULL,
  `issued_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manage_students_sections`
--

CREATE TABLE `manage_students_sections` (
  `id` int(11) NOT NULL,
  `rollno` decimal(12,0) NOT NULL,
  `name` text NOT NULL,
  `class` varchar(10) NOT NULL,
  `section` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_students_sections`
--

INSERT INTO `manage_students_sections` (`id`, `rollno`, `name`, `class`, `section`) VALUES
(1, 92100938001, 'student1', '4', '1'),
(2, 92100938010, 'student10', '4', '1'),
(5, 92100938002, 'student2', '4', '2'),
(6, 92100938003, 'student3', '4', '2'),
(7, 92100938004, 'student4', '5', '1'),
(8, 92100938005, 'student5', '5', '1'),
(9, 92100938006, 'student6', '5', '1'),
(12, 92100938011, 's11', '6', '1'),
(13, 92100938007, 'student7', '6', '1'),
(14, 92100938008, 'student8', '6', '2'),
(15, 92100938009, 'student9', '6', '3'),
(16, 92100938012, 'student12', '4', '1'),
(17, 92100938013, 's13', '4', '2');

-- --------------------------------------------------------

--
-- Table structure for table `meta_data`
--

CREATE TABLE `meta_data` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `meta_key` varchar(50) NOT NULL,
  `meta_value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meta_data`
--

INSERT INTO `meta_data` (`id`, `item_id`, `meta_key`, `meta_value`) VALUES
(1, 4, 'section', '1'),
(2, 4, 'section', '2'),
(3, 5, 'section', '1'),
(4, 6, 'section', '1'),
(5, 6, 'section', '2'),
(6, 6, 'section', '3'),
(139, 44, 'from', '07:00'),
(140, 44, 'to', '08:00'),
(141, 45, 'from', '08:00'),
(142, 45, 'to', '09:00'),
(143, 46, 'from', '09:00'),
(144, 46, 'to', '10:00'),
(145, 47, 'from', '10:00'),
(146, 47, 'to', '11:00'),
(147, 48, 'from', '11:00'),
(148, 48, 'to', '12:00'),
(149, 49, 'from', '12:00'),
(150, 49, 'to', '01:00'),
(151, 50, 'from', '12:00'),
(152, 50, 'to', '13:00'),
(201, 59, 'class_id', '4'),
(202, 59, 'section_id', '1'),
(203, 59, 'teacher_id', '1'),
(204, 59, 'period_id', '44'),
(205, 59, 'day_name', 'monday'),
(206, 59, 'subject_id', '7'),
(207, 60, 'class_id', '4'),
(208, 60, 'section_id', '1'),
(209, 60, 'teacher_id', '2'),
(210, 60, 'period_id', '44'),
(211, 60, 'day_name', 'tuesday'),
(212, 60, 'subject_id', '8'),
(213, 61, 'class_id', '4'),
(214, 61, 'section_id', '1'),
(215, 61, 'teacher_id', '3'),
(216, 61, 'period_id', '44'),
(217, 61, 'day_name', 'wednesday'),
(218, 61, 'subject_id', '8'),
(225, 63, 'from', '09:32'),
(226, 63, 'to', '10:33'),
(227, 64, 'class_id', '6'),
(228, 64, 'section_id', '3'),
(229, 64, 'teacher_id', '19'),
(230, 64, 'period_id', '50'),
(231, 64, 'day_name', 'wednesday'),
(232, 64, 'subject_id', '12'),
(233, 65, 'class_id', '6'),
(234, 65, 'section_id', '3'),
(235, 65, 'teacher_id', '19'),
(236, 65, 'period_id', '50'),
(237, 65, 'day_name', 'thursday'),
(238, 65, 'subject_id', '11');

-- --------------------------------------------------------

--
-- Table structure for table `othermeta`
--

CREATE TABLE `othermeta` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `father_mobile` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `doa` date DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `date_add` date DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `othermeta`
--

INSERT INTO `othermeta` (`id`, `name`, `dob`, `mobile`, `email`, `address`, `country`, `state`, `zip`, `father_name`, `father_mobile`, `mother_name`, `class`, `doa`, `type`, `date_add`, `payment_method`) VALUES
(1, 'teacher1', '2024-02-09', '123', 't1@t1.t1', '', '', '', '', '', '', '', '', '0000-00-00', 'teacher', '2024-02-09', ''),
(2, 'Teacher2', '2024-01-01', '123', 'Teacher2@gmail.comm', '', '', '', '', '', '', '', '', '0000-00-00', 'teacher', '2024-02-09', ''),
(3, 'Teacher3', '2024-01-01', '123', 'Teacher3@gmail.com', '', '', '', '', '', '', '', '', '0000-00-00', 'teacher', '2024-02-09', ''),
(4, 'Teacher4', '2024-01-01', '123', 'Teacher4@gmail.com', '', '', '', '', '', '', '', '', '0000-00-00', 'teacher', '2024-02-09', ''),
(5, 'student1', '0003-06-09', '123', 's1@s1.s1', '', '', '', '', '', '', '', '', '0000-00-00', 'student', '2024-02-09', ''),
(6, 's11', '0002-05-08', '123', 's11@s11.s11', '', '', '', '', '', '', '', '6', '0000-00-00', 'student', '2024-02-09', ''),
(7, 'Teacher6', '0004-06-23', '123', 't6@t6.t6', '', '', '', '', '', '', '', '', '0000-00-00', 'teacher', '2024-03-02', ''),
(8, 'student12', '0006-03-06', '123', 's12@s12.s12', '', '', '', '', '', '', '', '4', '0000-00-00', 'student', '2024-03-02', ''),
(9, 'Zeel Laheru', '2024-03-02', '123', 'z@z.z', '', '', '', '', '', '', '', '', '0000-00-00', 'teacher', '2024-03-02', ''),
(10, 'Smit Thacker', '2024-03-02', '123', 'st@st.st', '', '', '', '', '', '', '', '', '0000-00-00', 'teacher', '2024-03-02', ''),
(11, 'Smit', '1988-11-18', '9428684852', 'smit.thacker@marwadiuniversity.edu.in', '', '', '', '', '', '', '', '5', '0000-00-00', 'student', '2024-03-02', ''),
(12, 's13', '2024-04-04', '123', 's13@s13.s13', 'jdnffndofn', '', '', '', 'father', '1234567890', 'mother', '4', '0000-00-00', 'student', '2024-04-04', ''),
(13, 's14', '2024-04-04', '123', 's14@s14.s14', 'address', '', '', '', 'lkjh', '', 'hjkl', '4', '0000-00-00', 'student', '2024-04-04', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL DEFAULT 1,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL,
  `Class_onlyforsubject` varchar(11) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `description`, `type`, `publish_date`, `modified_date`, `status`, `parent`, `Class_onlyforsubject`, `is_deleted`) VALUES
(1, 1, 'Section A', '', 'section', '2024-02-09 03:43:00', '2024-02-09 08:13:00', 'publish', 0, '', 0),
(2, 1, 'Section B', '', 'section', '2024-02-09 03:44:01', '2024-02-09 08:14:01', 'publish', 0, '', 0),
(3, 1, 'Section C', '', 'section', '2024-02-09 03:44:14', '2024-02-09 08:14:14', 'publish', 0, '', 0),
(4, 1, 'class-1', '', 'class', '2024-02-09 03:44:39', '2024-02-09 08:14:39', 'publish', 0, '', 0),
(5, 1, 'class-2', '', 'class', '2024-02-09 03:44:48', '2024-02-09 08:14:48', 'publish', 0, '', 0),
(6, 1, 'class-3', '', 'class', '2024-02-12 14:44:40', '2024-02-09 08:14:58', 'publish', 0, '', 0),
(7, 1, 'Maths', '', 'subject', '2024-02-09 03:47:51', '2024-02-09 08:17:51', 'publish', 0, '4', 0),
(8, 1, 'English', '', 'subject', '2024-02-09 03:48:06', '2024-02-09 08:18:06', 'publish', 0, '4', 0),
(9, 1, 'Science', '', 'subject', '2024-02-09 03:48:21', '2024-02-09 08:18:21', 'publish', 0, '5', 0),
(10, 1, 'Hindi', '', 'subject', '2024-02-09 03:48:30', '2024-02-09 08:18:30', 'publish', 0, '5', 0),
(11, 1, 'Gujarati', '', 'subject', '2024-02-09 03:48:40', '2024-02-09 08:18:40', 'publish', 0, '6', 0),
(12, 1, 'Sanskrit', '', 'subject', '2024-02-09 03:49:03', '2024-02-09 08:19:03', 'publish', 0, '6', 0),
(44, 1, 'First', '', 'period', '2024-04-07 22:35:49', '2024-04-08 14:05:49', 'publish', 0, '', 0),
(45, 1, 'Second', '', 'period', '2024-04-07 22:36:24', '2024-04-08 14:06:24', 'publish', 0, '', 0),
(46, 1, 'Third', '', 'period', '2024-04-07 22:37:02', '2024-04-08 14:07:02', 'publish', 0, '', 0),
(47, 1, 'Fourth', '', 'period', '2024-04-07 22:37:18', '2024-04-08 14:07:18', 'publish', 0, '', 0),
(48, 1, 'Fifth', '', 'period', '2024-04-07 22:37:35', '2024-04-08 14:07:35', 'publish', 0, '', 0),
(50, 1, 'Sixth', '', 'period', '2024-04-07 22:38:48', '2024-04-08 14:08:48', 'publish', 0, '', 0),
(59, 1, '', '', 'timetable', '2024-04-07 23:06:15', '2024-04-08 14:36:15', 'publish', 0, '', 0),
(60, 1, '', '', 'timetable', '2024-04-07 23:07:49', '2024-04-08 14:37:49', 'publish', 0, '', 0),
(61, 1, '', '', 'timetable', '2024-04-09 03:17:16', '2024-04-09 06:47:16', 'publish', 0, '', 0),
(63, 1, 'seventh', '', 'period', '2024-04-10 03:03:19', '2024-04-10 03:03:08', 'publish', 0, '', 1),
(64, 1, '', '', 'timetable', '2024-04-11 01:41:43', '2024-04-11 05:11:43', 'publish', 0, '', 0),
(65, 1, '', '', 'timetable', '2024-04-11 01:45:09', '2024-04-11 05:15:09', 'publish', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `rollno` decimal(20,0) NOT NULL,
  `q1a` int(11) NOT NULL,
  `q1b` int(11) NOT NULL,
  `q2a` int(11) NOT NULL,
  `q2b` int(11) NOT NULL,
  `q3a` int(11) NOT NULL,
  `q3b` int(11) NOT NULL,
  `q4a` int(11) NOT NULL,
  `q4b` int(11) NOT NULL,
  `q5a` int(11) NOT NULL,
  `q5b` int(11) NOT NULL,
  `q6a` int(11) NOT NULL,
  `q6b` int(11) NOT NULL,
  `subject` text NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `count` int(11) NOT NULL,
  `percentage` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `acc_id`, `rollno`, `q1a`, `q1b`, `q2a`, `q2b`, `q3a`, `q3b`, `q4a`, `q4b`, `q5a`, `q5b`, `q6a`, `q6b`, `subject`, `total`, `count`, `percentage`) VALUES
(15, 0, 92100938002, 52, 42, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 'Maths', 95, 95, 95),
(16, 8, 92100938002, 50, 0, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 'English', 65, 160, 80),
(17, 10, 92100938004, 50, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 'Science', 55, 55, 55),
(18, 10, 92100938004, 65, 0, 0, 0, 0, 0, 0, 9, 0, 0, 0, 0, 'Hindi', 74, 129, 65),
(19, 0, 92100938013, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0),
(20, 0, 92100938014, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0),
(21, 7, 92100938001, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 'Maths', 78, 78, 78),
(22, 7, 92100938001, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 'Maths', 78, 156, 78);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_bus`
--

CREATE TABLE `transport_bus` (
  `id` int(11) NOT NULL,
  `bus_num` int(11) NOT NULL,
  `no_plate` varchar(100) NOT NULL,
  `type` text NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transport_bus`
--

INSERT INTO `transport_bus` (`id`, `bus_num`, `no_plate`, `type`, `capacity`) VALUES
(4, 1, 'GJ5AB', 'Mini-Bus', 50),
(5, 2, 'GJ5ABS', 'Full-Size-Bus', 50);

-- --------------------------------------------------------

--
-- Table structure for table `transport_driver`
--

CREATE TABLE `transport_driver` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `experience` varchar(50) NOT NULL,
  `driving_records` varchar(50) NOT NULL,
  `criminal_records` text NOT NULL,
  `certificate` varchar(500) NOT NULL,
  `license` text NOT NULL,
  `bus_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transport_driver`
--

INSERT INTO `transport_driver` (`id`, `name`, `experience`, `driving_records`, `criminal_records`, `certificate`, `license`, `bus_num`) VALUES
(2, 'Driver', '1 Year', 'none', 'Yes', '', '', 1),
(3, 'Driver 2', '2 Year', 'NO data', 'Yes', '1 month roadmap .png', '2 month roadmap.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transport_student`
--

CREATE TABLE `transport_student` (
  `id` int(11) NOT NULL,
  `rollno` decimal(11,0) NOT NULL,
  `bus_num` decimal(10,0) NOT NULL,
  `pick_up` text NOT NULL,
  `pick_up2` text NOT NULL,
  `pick_up3` text NOT NULL,
  `pick_up4` text NOT NULL,
  `drop_off` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transport_student`
--

INSERT INTO `transport_student` (`id`, `rollno`, `bus_num`, `pick_up`, `pick_up2`, `pick_up3`, `pick_up4`, `drop_off`) VALUES
(5, 92100938001, 1, 'Point 1', 'Point 1', 'Point 1', 'Point 1', 'Point 1'),
(6, 92100938002, 2, 'Point 1', 'Point 1', 'Point 1', 'Point 1', 'Point 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `econtent`
--
ALTER TABLE `econtent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_book`
--
ALTER TABLE `lib_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_book_status`
--
ALTER TABLE `lib_book_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_students_sections`
--
ALTER TABLE `manage_students_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_data`
--
ALTER TABLE `meta_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `othermeta`
--
ALTER TABLE `othermeta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_bus`
--
ALTER TABLE `transport_bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_driver`
--
ALTER TABLE `transport_driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_student`
--
ALTER TABLE `transport_student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `econtent`
--
ALTER TABLE `econtent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lib_book`
--
ALTER TABLE `lib_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lib_book_status`
--
ALTER TABLE `lib_book_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manage_students_sections`
--
ALTER TABLE `manage_students_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `meta_data`
--
ALTER TABLE `meta_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `othermeta`
--
ALTER TABLE `othermeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_bus`
--
ALTER TABLE `transport_bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transport_driver`
--
ALTER TABLE `transport_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transport_student`
--
ALTER TABLE `transport_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
